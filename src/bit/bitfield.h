/*******************
* �ļ���: bitfield.h
* ����: ���峣�����ݽṹ����
* ����: �α���
********************/

#ifndef BITFIELD_H
#define BITFIELD_H

#define	CHN_BUSY	0
#define	CHN_FREE	1

#define NO_ERR		0
#define ERROR_1		1


/*
 * ����Ϊ645-2007Э����ض���
 * 
 */

#define PREFIX_CODE			0xFE	//ǰ����
#define PREFIX_CNT			4		//ǰ��������
#define START_CODE			0x68	//��ʼ��
#define END_CODE			0x16	//��ʼ��
#define BIAS_CODE			0x33	//645Э��Ҫ�������������0x33����������

/*
 * ����Ϊ�����붨��
 * 
 */
#define CTL_645_REV			0x00	//����
#define CTL_645_WTIME		0x08	//�㲥Уʱ
#define CTL_645_RDATA		0x11	//������
#define CTL_645_RSUCD		0x12	//����������
#define CTL_645_RADDR		0x13	//��ͨ�ŵ�ַ
#define CTL_645_WDATA		0x14	//д����
#define CTL_645_WADDR		0x15	//дͨ�ŵ�ַ
#define CTL_645_FRZ			0x16	//��������
#define CTL_645_WBAUD		0x17	//����ͨ������
#define CTL_645_WPASSWD		0x18	//�޸�����
#define CTL_645_CLRDEM		0x19	//�����������
#define CTL_645_CLRMETER	0x1A	//�������
#define CTL_645_CLRENT		0x1B	//�¼�����

typedef unsigned char	u8;
typedef unsigned short	u16;
typedef unsigned int	u32;

typedef char	s8;
typedef short	s16;
typedef int		s32;

#pragma pack(push)
#pragma pack(1)

typedef union {//376.1-2009������ṹ
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

typedef union {//376.2-2009, AFN=03, F5: �ز����ڵ�״̬�ֺ��ز�����, ״̬��
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

typedef union {//645-07Э�������ṹ
	u8 u8b;
	struct {
		u8 func		: 5;//������
		u8 succeed	: 1;//���޺��֡, 0: �޺�������֡, 1: �к�������֡
		u8 slaveAsw	: 1;//��վӦ��, 0: ��վ��ȷӦ��, 1: ��վ�쳣Ӧ��
		u8 dir		: 1;//���䷽��, 0: ��վ����������֡, 1: ��վ������Ӧ��֡
	} ctlSTR;
} ctl645UN;

typedef union {//645-07Э�����ݱ�ʶ���ṹ
	u32 u32b;
	u8	u8array[4];
	struct {
		u8 di0;//��ʶ����0�ֽ�
		u8 di1;//��ʶ����1�ֽ�
		u8 di2;//��ʶ����2�ֽ�
		u8 di3;//��ʶ����3�ֽ�
	} idSTR;
} id645UN;

typedef struct {
	u8	start1;
	u8	addr[6];
	u8	start2;
	ctl645UN ctlCode;
	u8	len;
	u8	data[512];
	u8	cs;
	u8	end;
} frm645STR;
typedef frm645STR* frm645PTR;

#pragma pack(pop)

#endif// BITFIELD_H