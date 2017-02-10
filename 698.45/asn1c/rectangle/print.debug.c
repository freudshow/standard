#include <stdio.h>
#include <stdlib.h>

typedef unsigned char u8;
typedef unsigned short u16;

void print1byteBin(u8 c)
{
	int i = 0;

	for(i=7;i>=0;i--) {
		printf("%c", ((c & (1 << i))?'1':'0'));
		if(i%4 == 0)
			printf(" ");
	}
	printf("\t");
}

void print1byteHex(u8 c)
{
	int i = 0;

	printf("%02X ", c);
}

int main(int argc, char* argv[])
{
	float f = 2.314;
	u8 *pU8 = (u8*)&f;
	int i = 0;

	for(i=0;i<sizeof(f);i++, pU8++)
		print1byteBin(*pU8);
	printf("\n");
	pU8 = (u8*)&f;
	for(i=0;i<sizeof(f);i++, pU8++)
		print1byteHex(*pU8);
	printf("\n");
	return 0;
}
