#include "ArraySearcher.h"

int * ArraySearcher::generateArray(int size)
{
	int *temp = new int[size];

	for (int i = 0; i < size; i++)
	{
		temp[i] = i + 1;
	}

	return temp;
}

bool ArraySearcher::sequentialSearch(int* arr, int value, int size)
{
	for (int i = 0; i < size; i++)
	{
		if (arr[i] == value)
			return true;
	}

	return false;
}

bool ArraySearcher::binarySearch(int* arr, int value, int size)
{
	int low = 0;
	int mid = 0;
	int high = size - 1;

	if (low < high)
	{
		while (low <= high)
		{
			 mid = (low + high) / 2; 

			if (arr[mid] == value)
				return true;
			
			if (arr[mid] > value)
				high = mid - 1;
			else
				low = mid + 1;
		}
	}

	return false;
}

