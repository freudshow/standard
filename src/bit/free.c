#include <stdio.h>
#include <stdlib.h>

void strCpy( char *dest, const char *src);

int main(int argc, char* argv)
{
	int *p = malloc(sizeof(int));
	free(p);
	free(p);

	printf("free 2 times\n");
	return 0;
}