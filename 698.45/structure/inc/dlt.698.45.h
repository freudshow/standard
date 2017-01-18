/*******************
* �ļ���: bitfield.h
* ����: ���峣�����ݽṹ����
* ����: �α���
********************/

#ifndef DLT_698_45_H
#define DLT_698_45_H

#ifdef __cplusplus
extern "C" {
#endif

#define LITTLE_ENDIAN//С�˸�ʽ

typedef unsigned char	INT8U;
typedef unsigned short	INT16U;
typedef unsigned int	INT32U;

typedef char	INT8S;
typedef short	INT16S;
typedef int		INT32S;


#pragma pack(push)
#pragma pack(1)

typedef union {
	INT16U u16b;
	struct {
#ifdef LITTLE_ENDIAN
		INT16U length	: 14;
		INT16U rev	: 2;
#else
		INT16U rev	: 2;
		INT16U length	: 14;
#endif
	} lengthSTR;
} lengthUN;

typedef union {//������
	INT8U u8b;
	struct {
#ifdef LITTLE_ENDIAN
		INT8U func		: 3;//������
		INT8U rev		: 2;//����
		INT8U divS		: 1;//��֡��־λ
		INT8U prm		: 1;//������־λ
		INT8U dir		: 1;//���䷽��λ
#else
		INT8U dir		: 1;//���䷽��λ
		INT8U prm		: 1;//������־λ
		INT8U divS		: 1;//��֡��־λ
		INT8U rev		: 2;//����
		INT8U func		: 3;//������
#endif
	} ctlSTR;
} ctlUN;

typedef union {//��֡��ʽ��
	INT16U u16b;
	struct {
#ifdef LITTLE_ENDIAN
		INT16U length	: 12;//��֡������̵�֡���
		INT16U rev		: 2;//����
		INT16U pos		: 2;//bit14=0, bit15=0: ��ʾ��֡����������ʼ֡;
							//bit14=0, bit15=1: ��ʾ��֡����ȷ��֡(ȷ��֡������APDUƬ����);
							//bit14=1, bit15=0: ��ʾ��֡�������֡;
							//bit14=1, bit15=1: ��ʾ��֡�����м�֡
#else
		INT16U pos		: 2;
		INT16U rev		: 2;
		INT16U length	: 12;
#endif
	} lengthSTR;
} lengthUN;

#pragma pack(pop)

#ifdef __cplusplus
}
#endif

#endif// DLT_698_45_H