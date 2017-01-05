#!/usr/bin/python
# -*- coding: utf-8 -*-
#
#    作者： ptptptptptpt < ptptptptptpt@163.com >
#
#    This program is free software; you can redistribute it and/or modify
#    it under the terms of the GNU General Public License as published by
#    the Free Software Foundation; either version 2 of the License, or
#    (at your option) any later version.
#
#    This program is distributed in the hope that it will be useful,
#    but WITHOUT ANY WARRANTY; without even the implied warranty of
#    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#    GNU General Public License for more details.
#
#    You should have received a copy of the GNU General Public License
#    along with this program; if not, write to the Free Software
#    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
#


import os
import sys
import commands
import time


import functions



def new_dir( path ):
    newdir = path
    i = 1
    while os.path.exists( newdir ):
        newdir = path + '-' + str( i )
        i += 1
    return newdir



def continue_or_not():
    if cn_or_en == 'cn':
        print '要继续吗？ (y|n) ',
    else:
        print 'continue ? (y|n) ',
    ch = sys.stdin.readline(10)
    if ch[0] == 'y':
        pass
    else:
        sys.exit(0)


def warn_formating():
    mp_text = ''
    MPs = mp_cfg.keys()
    MPs.sort()
    for each in MPs:
        if cn_or_en == 'cn':
            if mp_cfg[each]['fs'] == 'current':
                mp_text += '%s 将使用现有文件系统，挂载点为 %s \n'%( mp_cfg[each]['part'], each )
            else:
                mp_text += '%s 将被格式化为 %s，挂载点为 %s \n'%( mp_cfg[each]['part'], mp_cfg[each]['fs'], each )
        else:
            if mp_cfg[each]['fs'] == 'current':
                mp_text += '%s will use current filesystem，and be mounted to %s \n'%( mp_cfg[each]['part'], each )
            else:
                mp_text += '%s will be formated as %s，and mounted to %s \n'%( mp_cfg[each]['part'], mp_cfg[each]['fs'], each )

    swap_text = ''
    if swappart:
        if cn_or_en == 'cn':
            swap_text = '%s 将被格式化为 swap\n'%swappart
        else:
            swap_text = '%s will be formated as swap\n'%swappart

    newhostname_text = ''
    if newhostname:
        if cn_or_en == 'cn':
            newhostname_text = '主机名将设为 %s\n'%newhostname
        else:
            newhostname_text = 'The hostname will be set as "%s"\n'%newhostname

    grubdev_text = ''
    if grubdev:
        if cn_or_en == 'cn':
            grubdev_text = 'Grub2 将被安装至 %s\n'%grubdev
        else:
            grubdev_text = 'Grub2 will be installed to %s\n'%grubdev
    else:
        if cn_or_en == 'cn':
            grubdev_text = '将不安装 GRUB，您需要手动设置引导\n'
        else:
            grubdev_text = 'GRUB will NOT be installed\n'


    if cn_or_en == 'cn':
        warning_text = '\n' + mp_text + swap_text + newhostname_text + grubdev_text
    else:
        warning_text = '\n' + mp_text + swap_text + newhostname_text + grubdev_text
    
    print warning_text
    
    continue_or_not()



def prepare_partitions():
    # 检查目标分区
    ret = functions.check_target_partitions( mp_cfg, swappart, cn_or_en )
    if ret[0] != 0:
        print ret[1]
        if cn_or_en == 'cn':
            print 'check_target_partitions 出错, 程序中止.\n'
        else:
            print 'check_target_partitions error, exit.\n'
        sys.exit(1)
        
    # 格式化警告
    warn_formating()
    
    # 格式化目标分区
    ret = functions.format_target_partitions( mp_cfg, swappart, cn_or_en )
    if ret[0] != 0:
        print ret[1]
        if cn_or_en == 'cn':
            print 'format_target_partitions 出错, 程序中止.\n'
        else:
            print 'format_target_partitions error, exit.\n'
        sys.exit(1)
    print '\n****** format_target_partitions done. ******\n'
    
    # 挂载目标分区
    target_dir = new_dir( '/tmp/UCloner-target' )
    ret = functions.mount_target_partitions( target_dir, mp_cfg, cn_or_en )
    if ret[0] != 0:
        print ret[1]
        if cn_or_en == 'cn':
            print 'mount_target_partitions 出错, 程序中止.\n'
        else:
            print 'mount_target_partitions error, exit.\n'
        sys.exit(1)
    
    return target_dir



def finish_clone_restore( target_dir ):
    # 创建系统目录
    ret = functions.make_system_dirs( target_dir, 'cn' )
    if ret[0] != 0:
        print 'make_system_dirs error:\n'
        print '\n\n' + ret[1]
        continue_or_not()
    else:
        print 'functions.make_system_dirs() done.'
        
    # 生成 fstab 
    ret = functions.generate_fstab( target_dir+'/etc/fstab', mp_cfg, swappart )
    if ret[0] != 0:
        print '\n\n' + ret[1]
        if cn_or_en == 'cn':
            print '生成 fstab 时出错, 程序中止.\n'
        else:
            print 'functions.generate_fstab error, exit.\n'
        sys.exit(1)
    else:
        print 'functions.generate_fstab() done.'
        
    # 生成 mtab
    tmp = commands.getstatusoutput( 'touch ' + target_dir+'/etc/mtab' )
    
    # 修复休眠功能
    ret = functions.fix_resume( target_dir, swappart, 'cn' )
    if ret[0] != 0:
        print '\n\n' + ret[1]
        continue_or_not()
    else:
        print 'functions.fix_resume() done.'
        
    # 更改主机名
    if newhostname:
        ret = functions.change_host_name( target_dir, newhostname, 'cn' )
        if ret[0] != 0:
            print '\n\n' + ret[1]
            continue_or_not()
        else:
            print 'functions.change_host_name() done.'

    # 安装 grub2
    if grubdev:
        ret = functions.install_grub2( target_dir, grubdev, 'cn' )
        if ret[0] != 0:
            print '\n\n' + ret[1]
            continue_or_not()
        else:
            print 'Grub2 han been set up successfully.'


def get_default_excludes():
    defaultExcludes = []
    defaultExcludes.append( '/proc' )
    defaultExcludes.append( '/sys' )
    defaultExcludes.append( '/tmp' )
    defaultExcludes.append( '/mnt' )
    defaultExcludes.append( '/media' )
    
    defaultExcludes.append( '/boot/grub' )
    defaultExcludes.append( '/etc/fstab' )
    defaultExcludes.append( '/etc/mtab' )
    defaultExcludes.append( '/etc/blkid.tab' )
    defaultExcludes.append( '/etc/udev/rules.d/70-persistent-net.rules' )


    #待补全
    
    #tmp = commands.getstatusoutput( 'swapon -s | grep file | cut -d " " -f 1' )

	#for i in `swapon -s | grep file | cut -d " " -f 1`; do
	#echo "${i#/}" >> $exclude
	#done


    if os.path.exists( '/host' ):
        defaultExcludes.append( '/host' )

    if os.path.exists( '/rofs' ):
        defaultExcludes.append( '/rofs' )

    # /lost+found
    if os.path.exists( '/lost+found' ):
        defaultExcludes.append( '/lost+found' )

    # /*/lost+found
    for each in [ '/home', '/boot', '/usr', '/var', '/opt', '/srv', '/usr/local' ]:
        if os.path.exists( each + '/lost+found' ):
            defaultExcludes.append( each + '/lost+found' )

    # .gvfs 目录比较特殊，只有其 owner 才有访问权限，其他用户（即使是 root ）用 os.path.exists( '/home/' + 用户名 + '/.gvfs' ) 或 [ -e /home/pt/.gvfs ] 都检测不到。
    # /root/.gvfs
    if os.path.exists( '/root/.gvfs' ):
        defaultExcludes.append( '/root/.gvfs' )
    # 无论如何，还是得加上 /home/*/.gvfs ，否则 rsync 会出错。（mksquashfs 倒不会出错）
    defaultExcludes.append( '/home/*/.gvfs' )

    # 注意： ''.split( '\n' ) 为 [ '' ] ，不为空。 ''.split() 为空。

    # /lib/modules/$(uname -r)/volatile/*
    kernelVersion = commands.getoutput( 'uname -r' )
    if os.path.exists( '/lib/modules/' + kernelVersion + '/volatile' ):
        contents = commands.getoutput( 'ls ' + '/lib/modules/' + kernelVersion + '/volatile' )
        if contents:
            for each in contents.split('\n'):
                defaultExcludes.append( '/lib/modules/' + kernelVersion + '/volatile/' + each )

    # /var/cache/apt/archives/*.deb
    contents = commands.getoutput( 'ls /var/cache/apt/archives | grep ".deb" ' )
    if contents:
        for each in contents.split('\n'):
            defaultExcludes.append( '/var/cache/apt/archives/' + each )
    
    # /var/cache/apt/archives/partial/*
    contents = commands.getoutput( 'ls /var/cache/apt/archives/partial/' )
    if contents:
        for each in contents.split('\n'):
            defaultExcludes.append( '/var/cache/apt/archives/partial/' + each )
    
    return defaultExcludes




# 写入日志
def write_to_log( logText ):
    f = file('./log', 'a')
    f.write( logText )
    f.close()






if __name__ == '__main__':

    ############# 获取参数 #################
    
    mount_points = [ '/', '/home', '/boot', '/tmp', '/usr', '/var', '/opt', '/srv', '/usr/local' ]
    mp_cfg = {}
    for each in mount_points:
        mp_cfg[each] = { 'part':'', 'fs':'' }

    cn_or_en = 'en'
    mode = ''
    
    swappart = ''
    
    grubdev = ''
    newhostname = ''

    backup_to=''

    restore_from=''
    
    for each_arg in sys.argv:
        if each_arg[0:5] == 'mode=':
            mode = each_arg[5:]

        for each_mp in mp_cfg:
            lenth = len(each_mp)
            if each_arg[0:lenth+1] == (each_mp + '=') :
                mp_cfg[each_mp]['part'] = each_arg[lenth+1:]
            if each_arg[0:lenth+4] == (each_mp + '_fs=') :
                mp_cfg[each_mp]['fs'] = each_arg[lenth+4:]
        
        if each_arg[0:5] == 'swap=':
            swappart = each_arg[5:]
        
        if each_arg[0:12] == 'newhostname=':
            newhostname = each_arg[12:]
        
        if each_arg[0:8] == 'grubdev=':
            grubdev = each_arg[8:]
        
        if each_arg[0:5] == 'lang=':
            cn_or_en = each_arg[5:]

        if each_arg[0:10] == 'backup_to=':
            backup_to = each_arg[10:]
            
        if each_arg[0:13] == 'restore_from=':
            restore_from = each_arg[13:]


    #############  #################
        
    print ''
    
    if not ( mode in ['clone', 'backup', 'restore'] ):
        print 'ERROR: mode is unspecified.'
        sys.exit(1)
    
    for each_mp in mp_cfg.keys():
        if mp_cfg[each_mp]['part'] == '':
            del mp_cfg[each_mp]


    #print mp_cfg

    exclusionListFile = './excludes'
    
    called_by_gui = False
    for each_arg in sys.argv:
        if each_arg[0:13] == 'called_by_gui':
            called_by_gui = True

    if not called_by_gui:
        exList = get_default_excludes()
        for each_arg in sys.argv:
            if each_arg[0:8] == 'exclude=': # 目录或文件
                exList.append( each_arg[8:] )
        f = file(exclusionListFile, 'w')
        for each in exList:
            f.write( each + '\n' )
        f.close()




    if mode == 'clone':
        # 准备分区
        target_dir = prepare_partitions()
        
        # 提醒取出光盘
        print ''
        if cn_or_en == 'cn':
            print "分区准备就绪，即将复制系统文件。光驱中如果有光盘，请取出。"
        else:
            print "Starting to clone... If there is any disk in CD-ROM, please remove it."
        continue_or_not()
        
        # 写日志
        write_to_log( '\n\n\n' )
        msg = 'mode = clone\nswappart = %s\nnewhostname = %s\ngrubdev = %s\n'%(swappart, newhostname, grubdev)
        for each_mp in mp_cfg.keys():
            msg += ( each_mp + ' = ' + mp_cfg[each_mp]['part'] + ', ' +  mp_cfg[each_mp]['fs'] + '\n' )
        write_to_log( msg )
        
        start = ( time.strftime('%Y-%m-%d %H:%M:%S'), time.time() )
        if cn_or_en == 'cn':
            msg = '开始复制系统文件...\n'
        else:
            msg = 'Cpoying system files...\n'
        write_to_log( start[0] + '  ' + msg )
        print ''
        print msg
        
        # 开始复制系统文件
        cmd = 'rsync -av --exclude-from=%s / %s'%(exclusionListFile, target_dir)
        ret = os.system( cmd )
        if ret != 0:
            print 'rsync error.\n'
            sys.exit(1)

        # 写日志
        if cn_or_en == 'cn':
            msg = "系统文件复制完毕，执行后续操作...\n"
        else:
            msg = "System files have been copied. Continuing...\n"
        write_to_log( time.strftime('%Y-%m-%d %H:%M:%S') + '  ' + msg )
        print msg

        # 扫尾工作
        finish_clone_restore( target_dir )
        
        end = ( time.strftime('%Y-%m-%d %H:%M:%S'), time.time() )
        mins = int(end[1]-start[1])/60
        secs = int(end[1]-start[1])%60
        
        # 写日志
        if cn_or_en == 'cn':
            msg = '系统克隆完毕，耗时 %d 分 %d 秒 \n'%( mins, secs )
        else:
            msg = 'System has been cloned. %d minutes and %d seconds elapsed.\n'%( mins, secs )
        write_to_log( end[0] + '  ' + msg )
        print msg

    
    elif mode == 'backup':
        if not functions.check_package_install( 'squashfs-tools' ):
            if cn_or_en == 'cn':
                print '错误：需要先安装 squashfs-tools 才能备份系统。可用如下命令安装：sudo apt-get install squashfs-tools \n' 
            else:
                print 'Error: "squashfs-tools" is needed to backup system. Ues "sudo apt-get install squashfs-tools" to install it.\n' 
            sys.exit(1)
            
        if not backup_to:
            if cn_or_en == 'cn':
                print '错误: 未指定 backup_to 。'
            else:
                print 'ERROR: backup_to is unspecified.'
            sys.exit(1)

        # 提醒取出光盘
        print ''
        if cn_or_en == 'cn':
            print '将把当前系统备份为 %s 。光驱中如果有光盘，请取出。'%backup_to
        else:
            print 'Current system will be backup to %s. If there is any disk in CD-ROM, please remove it.'%backup_to

        continue_or_not()


        # 写日志
        write_to_log( '\n\n\n' )
        msg = 'mode = backup\nbackup_to = %s\n'%backup_to
        write_to_log( msg )
        
        start = ( time.strftime('%Y-%m-%d %H:%M:%S'), time.time() )
        if cn_or_en == 'cn':
            msg = '正在将当前系统备份到 %s ...\n'%backup_to
        else:
            msg = 'Backing up current system to %s...\n'%backup_to
        write_to_log( start[0] + '  ' + msg )
        print ''
        print msg

        # 开始备份
        cmd = 'mksquashfs /  %s -no-duplicates -ef %s -e %s '%(backup_to, exclusionListFile, backup_to)
        ret = os.system( cmd )
        if ret != 0:
            print 'mksquashfs error.\n'
            sys.exit(1)

        # 添加被排除的系统目录
        tmpdir = new_dir( '/tmp/ucloner_tmp' )
        for each in ( '/proc', '/sys', '/tmp', '/mnt', '/media' ):
            tmp = commands.getstatusoutput( 'mkdir -p %s'%(tmpdir+each) )
        tmp = commands.getstatusoutput( 'chmod 1777 %s/tmp' %tmpdir )
        
        print "Adding system dirs ..."
        cmd = 'mksquashfs %s %s -no-duplicates '%(tmpdir, backup_to)
        ret = os.system( cmd )
        if ret != 0:
            print 'mksquashfs error when adding system dirs.\n'
            sys.exit(1)

        # 结束
        end = ( time.strftime('%Y-%m-%d %H:%M:%S'), time.time() )
        mins = int(end[1]-start[1])/60
        secs = int(end[1]-start[1])%60
        
        # 写日志
        if cn_or_en == 'cn':
            msg = '系统备份完毕，耗时 %d 分 %d 秒 \n'%( mins, secs )
        else:
            msg = 'System has been backed up. %d minutes and %d seconds elapsed.\n'%( mins, secs )
        write_to_log( end[0] + '  ' + msg )
        print msg
        

    elif mode == 'restore':
        if not restore_from:
            if cn_or_en == 'cn':
                print '错误: 未指定 restore_from .'
            else:
                print 'ERROR: "restore_from" is unspecified.'
            sys.exit(1)
        else:
            # 创建源目录
            source_dir = new_dir( '/tmp/UCloner-source' )
            tmp = commands.getstatusoutput( 'mkdir -p %s' %source_dir )
            if tmp[0] != 0:
                if cn_or_en == 'cn':
                    print '\n\nmkdir -p %s' %source_dir + '失败：\n\n' + tmp[1] 
                else:
                    print '\n\nmkdir -p %s' %source_dir + 'failed：\n\n' + tmp[1]
                sys.exit(1)
            else:
                print '\n%s has been made.\n' %source_dir
            
            # 挂载系统映像
            tmp = commands.getstatusoutput( 'mount %s %s -o loop' %(restore_from,source_dir)  )
            if tmp[0] != 0:
                if cn_or_en == 'cn':
                    print '\n\nmount %s %s -o loop' %(restore_from,source_dir) + '失败：\n\n' + tmp[1] 
                else:
                    print '\n\nmount %s %s -o loop' %(restore_from,source_dir) + 'failed：\n\n' + tmp[1]
                sys.exit(1)
            else:
                print '\n%s has been mounted to %s.\n' %(restore_from,source_dir)
            
            # 准备分区
            target_dir = prepare_partitions()

            # 写日志
            write_to_log( '\n\n\n' )
            msg = 'mode = restore\nrestore_from = %s\nswappart = %s\nnewhostname = %s\ngrubdev = %s\n'%(restore_from, swappart, newhostname, grubdev)
            for each_mp in mp_cfg.keys():
                msg += ( each_mp + ' = ' + mp_cfg[each_mp]['part'] + ', ' +  mp_cfg[each_mp]['fs'] + '\n' )
            write_to_log( msg )
            
            start = ( time.strftime('%Y-%m-%d %H:%M:%S'), time.time() )
            if cn_or_en == 'cn':
                msg = '开始恢复...\n'
            else:
                msg = 'Start to restore ...\n'
            write_to_log( start[0] + '  ' + msg )
            print ''
            print msg

            # 开始恢复
            cmd = 'rsync -av --exclude "/lost+found" --exclude "/*/lost+found" --exclude "/lib/modules/*/volatile/*" %s/ %s' %(source_dir,target_dir)
            ret = os.system( cmd )
            if ret != 0:
                print '\nrsync error.\n'
                sys.exit(1)
            
            # 扫尾工作
            finish_clone_restore( target_dir )


            # 结束
            end = ( time.strftime('%Y-%m-%d %H:%M:%S'), time.time() )
            mins = int(end[1]-start[1])/60
            secs = int(end[1]-start[1])%60
            
            # 写日志
            if cn_or_en == 'cn':
                msg = '系统恢复完毕，耗时 %d 分 %d 秒 \n'%( mins, secs )
            else:
                msg = 'System has been restored. %d minutes and %d seconds elapsed.\n'%( mins, secs )
            write_to_log( end[0] + '  ' + msg )
            print msg

    else:
        pass




















