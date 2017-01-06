/*******************
* 命名约定: 
* STR - struct;
* UN - union;
********************/

#include <stdio.h>

#define	CHN_BUSY	0
#define	CHN_FREE	1

typedef unsigned char	u8;
typedef unsigned short	u16;
typedef unsigned int	u32;

#pragma pack(push)
#pragma pack(1)

typedef union {
	u16 u16b;
	struct {
		u16 swSt	: 9;
		u16 rev		: 7;
	} bs16STR;
} bs16UN;

typedef union {
	u8 u8b;
	struct {
		u8 func		: 4;
		u8 fcvRev	: 1;
		u8 fcbAcd	: 1;
		u8 prm		: 1;
		u8 dir		: 1;
	} ctlSTR;
} ctlUN;

typedef union {
	u16 u16b;
	struct {
		u16 cmdST	: 1;
		u16 ch1ST	: 1;
		u16 ch2ST	: 1;
		u16 ch3ST	: 1;
		u16 ch4ST	: 1;
		u16 ch5ST	: 1;
		u16 ch6ST	: 1;
		u16 ch7ST	: 1;
		u16 ch8ST	: 1;
		u16 ch9ST	: 1;
		u16 ch10ST	: 1;
		u16 ch11ST	: 1;
		u16 ch12ST	: 1;
		u16 ch13ST	: 1;
		u16 ch14ST	: 1;
		u16 ch15ST	: 1;
	} confirmSTR;
} confirmUN;

typedef union {//376.2-2009, AFN=03, F5: 载波主节点状态字和载波速率, 状态字
	u16 u16b;
	struct {
		u16 carrierRateCnt	:4;
		u16 hostNodeChnCht	:2;
		u16 routeId			:1;
		u16 rsv1			:1;
		u16 carrierChnCnt	:4;
		u16 rsv2			:4;
	} stSTR;
} stUN;



#pragma pack(pop)


/*
 * 以下为645-2007协议相关定义
 * 
 */
 
#define CTL_645_REV			0x00	//保留
#define CTL_645_WTIME		0x08	//广播校时
#define CTL_645_RDATA		0x11	//读数据
#define CTL_645_RSUCD		0x12	//读后续数据
#define CTL_645_RADDR		0x13	//读通信地址
#define CTL_645_WDATA		0x14	//写数据
#define CTL_645_WADDR		0x15	//写通信地址
#define CTL_645_FRZ			0x16	//冻结命令
#define CTL_645_WBAUD		0x17	//更改通信速率
#define CTL_645_WPASSWD		0x18	//修改密码
#define CTL_645_CLRDEM		0x19	//最大需量清零
#define CTL_645_CLRMETER	0x1A	//电表清零
#define CTL_645_CLRENT		0x1B	//事件清零


#pragma pack(push)
#pragma pack(1)

typedef union {//645-07协议控制码结构
	u8 u8b;
	struct {
		u8 func		: 5;//功能码
		u8 succeed	: 1;//有无后继帧, 0: 无后续数据帧, 1: 有后续数据帧
		u8 slaveAsw	: 1;//从站应答, 0: 从站正确应答, 1: 从站异常应答
		u8 dir		: 1;//传输方向, 0: 主站发出的命令帧, 1: 从站发出的应答帧
	} ctlSTR;
} 645ctlUN;


#pragma pack(pop)


int main(int argc, char* argv[])
{
	bs16UN b16;
	ctlUN  ctlCode;

	b16.u16b = 0;
	b16.bs16STR.swSt = 4;
	printf("%04X\n", b16);
	
	ctlCode.u8b = 0x4B;
	printf("ctlCode.ctlSTR.dir = %d, ctlCode.ctlSTR.prm = %d, ctlCode.ctlSTR.fcbAcd = %d, ctlCode.ctlSTR.fcvRev = %d, ctlCode.ctlSTR.func = %d\n", \
	ctlCode.ctlSTR.dir, ctlCode.ctlSTR.prm, ctlCode.ctlSTR.fcbAcd, ctlCode.ctlSTR.fcvRev, ctlCode.ctlSTR.func);
	return 0;
}