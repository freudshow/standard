.section .data
.section .text
.globl _start#.globl 指示告诉汇编器， _start 这个符号要被链接器用到
_start:
movl $1, %eax
movl $4, %ebx
int $0x80