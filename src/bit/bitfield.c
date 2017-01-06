/*******************
* 命名约定: 
* STR - struct;
* UN - union;
********************/

#include <stdio.h>
#include <string.h>
#include "bitfield.h"

//校验, 累加和
u8 countCheck(u8 *data, u16 len)
{
	u16 cs = 0;
	u16 i;

	for (i = 0; i < len; i++, data++)
		cs += *data;

	return cs;
}

/*
 * 645组帧函数
 * @pBuf: 帧缓冲区
 * @pDataLength: 帧的总长度
 * @pFrame: 已携带部分信息的645帧结构
 */
u8 createFrm(u8* pBuf, u16* pDataLength, frm645PTR pFrame)
{
	u8* pu8 = pBuf;
	u16 length = 0;

	memset(pu8, PREFIX_CODE, PREFIX_CNT);
	pu8 += PREFIX_CNT;

	pFrame->start1 = START_CODE;
	pFrame->start2 = START_CODE;
	length = ((u8*)&(pFrame->data) - (u8*)&(pFrame->start1) + 1);//数据域以前的长度
	printf("head length: %d\n", length);
	length += pFrame->len;//数据域长度
	pFrame->cs = countCheck((u8*)&(pFrame.start1), length);//校验字
	pFrame->end = END_CODE;//结束符
	memcpy(pu8, (u8*)pFrame, length);
	pu8++;
	*pu8 = pFrame->cs;
	pu8++;
	*pu8 = pFrame->end;
	*pDataLength = (pu8 - pBuf + 1);
	printf("pDataLength: %d\n", *pDataLength);
}

int main(int argc, char* argv[])
{
	bs16UN b16;
	ctlUN  ctlCode;
	id645UN idCode;
	int i;

	b16.u16b = 0;
	b16.bs16STR.swSt = 4;
	printf("%04X\n", b16);

	ctlCode.u8b = 0x4B;
	printf("ctlCode.ctlSTR.dir = %d, ctlCode.ctlSTR.prm = %d, ctlCode.ctlSTR.fcbAcd = %d, ctlCode.ctlSTR.fcvRev = %d, ctlCode.ctlSTR.func = %d\n", \
	ctlCode.ctlSTR.dir, ctlCode.ctlSTR.prm, ctlCode.ctlSTR.fcbAcd, ctlCode.ctlSTR.fcvRev, ctlCode.ctlSTR.func);

	idCode.idSTR.di0 = 1;
	idCode.idSTR.di1 = 2;
	idCode.idSTR.di2 = 3;
	idCode.idSTR.di3 = 4;

	for(i=0;i<4;i++)
		printf("%02X ", idCode.u8array[i]);
	printf("\n");
	return 0;
}