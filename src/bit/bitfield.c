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