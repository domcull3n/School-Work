#pragma once

class ArraySearcher
{
public:
	static int * generateArray(int size);

	static bool sequentialSearch(int* arr, int value, int size);
	static bool binarySearch(int* arr, int value, int size);

};