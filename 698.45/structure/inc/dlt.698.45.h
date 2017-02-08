/*******************
* 文件名: bitfield.h
* 功能: 定义常用数据结构及宏
* 作者: 宋宝善
********************/

#ifndef DLT_698_45_H
#define DLT_698_45_H

#ifdef __cplusplus
extern "C" {
#endif

#define LITTLE_ENDIAN//小端格式

typedef unsigned char	INT8U;
typedef unsigned short	INT16U;
typedef unsigned int	INT32U;

typedef char	INT8S;
typedef short	INT16S;
typedef int		INT32S;

#define CTL_LINKMAN	1		//LINK management(log in; heat beat; log out.)
#define CTL_USERDATAMAN	3	//Application management and data exchange.

#define	ADDR_TYPE_SGL	0	//Single address
#define	ADDR_TYPE_WILD	1	//Wild address
#define	ADDR_TYPE_GRP	2	//Group address
#define	ADDR_TYPE_BRD	3	//Broadcast address

#define	MAX_SGL_ADDR_LEN	16	//Max single address's bytes

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

typedef union {//控制域
	INT8U u8b;
	struct {
#ifdef LITTLE_ENDIAN
		INT8U func		: 3;//功能码
		INT8U rev		: 2;//保留
		INT8U divS		: 1;//分帧标志位
		INT8U prm		: 1;//启动标志位
		INT8U dir		: 1;//传输方向位
#else
		INT8U dir		: 1;//传输方向位
		INT8U prm		: 1;//启动标志位
		INT8U divS		: 1;//分帧标志位
		INT8U rev		: 2;//保留
		INT8U func		: 3;//功能码
#endif
	} ctlSTR;
} ctlUN;

typedef union {//分帧格式域
	INT16U u16b;
	struct {
#ifdef LITTLE_ENDIAN
		INT16U length	: 12;//分帧传输过程的帧序号
		INT16U rev		: 2;//保留
		INT16U pos		: 2;//bit14=0, bit15=0: 表示分帧传输数据起始帧;
							//bit14=0, bit15=1: 表示分帧传输确认帧(确认帧不包含APDU片段域);
							//bit14=1, bit15=0: 表示分帧传输最后帧;
							//bit14=1, bit15=1: 表示分帧传输中间帧
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
