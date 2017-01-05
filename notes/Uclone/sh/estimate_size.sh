#!/bin/sh
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



if [ "$1" !=  "backup" ] && [ "$1" !=  "clone" ] || ! [ -f "$2" ]  ;then
    echo "参数错误! \n参数：estimate_size  { backup | clone }  exclude_from "
    return 1
fi


EXCLUDES="/tmp/estimate_size_excludes"

# 将 /var/cache/apt/* 通通用 /var/cache/apt 代替，以加快 du 速度。
cat "$2" | grep -v '/var/cache/apt' > $EXCLUDES
echo '/var/cache/apt' >> $EXCLUDES


echo "正在估算，请稍候..."


curspaceusage=$(( $(du -c --bytes --exclude-from="$EXCLUDES"  /  2>>/dev/null  | tail --lines 1 | sed "s/\t/\n/g" |sed "s/ /\n/g" | head --lines 1) / 1048576 ))


case $1 in

    backup)
        #echo $curspaceusage
        echo "\n估算完毕。将生成大小约为 $(($curspaceusage*2/5)) MB 的 squashfs 映像文件。"
    ;;

    clone)
        echo "\n估算完毕。将传送约 $curspaceusage MB 数据。"
    ;;

esac





