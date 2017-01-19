#PURPOSE: This program finds the maximum number of a set of data items.
#
#VARIABLES: The registers have the following uses:
#
# %edi - Holds the index of the data item being examined
# %ebx - Largest data item found
# %eax - Current data item
#
# The following memory locations are used:
#
# data_items - contains the item data. A 0 is used
# to terminate the data
#

.section .data
	data_items:
	.long 3,67,34,222,45,75,54,34,44,33,22,11,66,0
.section .text

.globl _start
_start:
movl $0, %edi
movl data_items(,%edi,4), %eax 
movl %eax, %ebx
start_loop:
cmpl $0, %eax
je loop_exit
incl %edi
movl data_items(,%edi,4), %eax #ADDRESS_OR_OFFSET(%BASE_OR_OFFSET,%INDEX,MULTIPLIER)
cmpl %ebx, %eax
jle start_loop
movl %eax, %ebx
jmp start_loop
loop_exit:
movl $1, %eax #eax 和ebx 寄存器的值是传递给系统调用的两个参数,eax 的值是系统调用号,1表
#示_exit 系统调用,ebx 的值则是传给_exit 系统调用的参数,也就是退出状态。_exit 这个
#系统调用会终止掉当前进程,而不会返回它继续执行。以后我们会讲到其它系统调用,也
#是由int $0x80 指令引发的,eax 的值是系统调用的编号,不同的系统调用需要的参数个数
#也不同,比如有的需要ebx 、ecx 、edx 三个寄存器的值做参数,大多数系统调用完成之后
#是会返回用户程序继续执行的,本例的_exit 系统调用比较特殊。

int $0x80

