/*******************
* 命名约定: 
* STR - struct;
* UN - union;
********************/

#include <stdio.h>
#include <string.h>
#include "bitfield.h"

void printBuf(u8 *data, u16 len, char* file, char* func, int line)
{
	u16 i;
	printf("[%s][%s][%d]", file, func, line);
	for (i = 0; i < len; i++)
		printf("%02X ", data[i]);
	printf("\n");
}

//校验, 累加和
u8 countCheck(u8 *data, u16 len)
{
	u16 cs = 0;
	u16 i;

	for (i = 0; i < len; i++)
		cs += data[i];

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
	length = ((u8*)&(pFrame->data) - (u8*)&(pFrame->start1));//数据域以前的长度

	length += pFrame->len;//数据域长度
	pFrame->cs = countCheck((u8*)&(pFrame->start1), length);//校验字
	pFrame->end = END_CODE;//结束符
	memcpy(pu8, (u8*)pFrame, length);
	pu8 += length;
	pu8++;
	*pu8 = pFrame->cs;
	pu8++;
	*pu8 = pFrame->end;
	*pDataLength = (pu8 - pBuf + 1);
}

int main(int argc, char* argv[])
{
	ctlUN  ctlCode;
	id645UN idCode;
	frm645STR frame;
	u8 buf[1024] = {0};
	u16 bufSize = 0;
	int i;

	//ctlCode.u8b = 0x4B;
	//printf("ctlCode.ctlSTR.dir = %d, ctlCode.ctlSTR.prm = %d, ctlCode.ctlSTR.fcbAcd = %d, ctlCode.ctlSTR.fcvRev = %d, ctlCode.ctlSTR.func = %d\n", \
	//ctlCode.ctlSTR.dir, ctlCode.ctlSTR.prm, ctlCode.ctlSTR.fcbAcd, ctlCode.ctlSTR.fcvRev, ctlCode.ctlSTR.func);

	//idCode.idSTR.di0 = 1;
	//idCode.idSTR.di1 = 2;
	//idCode.idSTR.di2 = 3;
	//idCode.idSTR.di3 = 4;

	//for(i=0;i<4;i++)
	//	printf("%02X ", idCode.u8array[i]);
	//printf("\n");

	frame.addr[0] = 0x06;
	frame.addr[1] = 0x05;
	frame.addr[2] = 0x04;
	frame.addr[3] = 0x03;
	frame.addr[4] = 0x02;
	frame.addr[5] = 0x01;

	frame.ctlCode.u8b = 0x11;
	frame.data[0] = 0x18;
	frame.data[1] = 0x01;
	frame.data[2] = 0x01;
	frame.data[3] = 0x0C;
	frame.len = 4;

	createFrm(buf, &bufSize, &frame);
	printBuf(buf, bufSize, FILE_LINE);
	return 0;
}