//implementation for the sorting class
#include "Sorting.h"
#include <fstream>
#include <iostream>

using namespace std;

void Sorting::bubbleSort(arrayStruct arr)
{

	for (int outer = arr.size - 1; outer > 0; outer--)
	{
		for (int inner = 0; inner < outer; inner++)
		{
			if (arr.randArray[inner] > arr.randArray[inner + 1])
			{
				int temp = arr.randArray[inner];
				arr.randArray[inner] = arr.randArray[inner + 1];
				arr.randArray[inner + 1] = temp;
			}
		}
	}

	writeFile("BubbleSort.txt", arr);
}

void Sorting::selectionSort(arrayStruct arr)
{
	int min;

	for (int outer = 0; outer < arr.size; outer++)
	{
		min = outer;

		for (int inner = outer + 1; inner < arr.size; inner++)
		{
			if (arr.randArray[inner] < arr.randArray[min])
			{
				min = inner;
			}
		}

		int temp = arr.randArray[outer];
		arr.randArray[outer] = arr.randArray[min];
		arr.randArray[min] = temp;
	}

	writeFile("SelectionSort.txt", arr);
}

void Sorting::insertionSort(arrayStruct arr)
{
	for (int outer = 1; outer < arr.size; outer++)
	{
		int inner = outer; //used to move back through the array
		int currentValue = arr.randArray[outer]; //value to be moved

		while (inner > 0 && arr.randArray[inner - 1] > currentValue)
		{
			arr.randArray[inner] = arr.randArray[inner - 1];
			arr.randArray[inner - 1] = currentValue;
			inner--;
		}
	}

	writeFile("InsertionSort.txt", arr);
}

void Sorting::shellSort(arrayStruct arr)
{
	int gap, i, j; //gap is the space in which it jumps to sort
	for (gap = arr.size / 2; gap > 0; gap /= 2)
	{
		for (i = gap; i < arr.size; i++)
		{
			int temp = arr.randArray[i]; //stores the value to move

			for (j = i; j >= gap && temp < arr.randArray[j - gap]; j -= gap)
			{
				arr.randArray[j] = arr.randArray[j - gap];
			}

			arr.randArray[j] = temp;
		}
	}

	writeFile("ShellSort.txt", arr);
}

void Sorting::startMergeSort(arrayStruct arr)
{
	int* workArr = new int[100000];
	Sorting::mergeSort(arr, 0, arr.size, workArr); //starts the merge sort with a reference to the copy
	writeFile("MergeSort.txt", arr);
}

void Sorting::mergeSort(arrayStruct &arr, int low, int high, int* workArr)
{
	if (high - low > 1)
	{
		int mid = (low + high) / 2;
		mergeSort(arr, low, mid, workArr);
		mergeSort(arr, mid, high, workArr);
		merge(arr, low, mid, high, workArr);
	}
}

void Sorting::merge(arrayStruct &arr, int low, int mid, int high, int* workArr)
{
	int i = low, j = mid, k;
	
	for (k = 0; i < mid && j < high; k++)
	{
		if (arr.randArray[i] <= arr.randArray[j])
			workArr[k] = arr.randArray[i++];
		else
			workArr[k] = arr.randArray[j++];
	}

	for (; i < mid; k++)
	{
		workArr[k] = arr.randArray[i++];
	}
	
	for (; j < high; k++)
	{
		workArr[k] = arr.randArray[j++];
	}

	for (int index = 0; index < high - low; index++)
	{
		arr.randArray[low + index] = workArr[index];
	}

}

void Sorting::startQuickSort(arrayStruct arr)
{
	quickSort(arr, 0, arr.size);
	writeFile("QuickSort.txt", arr);
}

void Sorting::quickSort(arrayStruct &arr, int start, int end)
{
	int i = start, j = end;
	int temp;
	int pivot = arr.randArray[(start + end) / 2];

	while (i <= j)
	{
		while (arr.randArray[i] < pivot)
			i++;
		while (arr.randArray[j] > pivot)
			j--;
		if (i <= j)
		{
			temp = arr.randArray[i];
			arr.randArray[i] = arr.randArray[j];
			arr.randArray[j] = temp;
			i++;
			j--;
		}
	}

	if (start < j)
		quickSort(arr, start, j);
	if (i < end)
		quickSort(arr, i, end);
	
}


//doesn't completely work
void Sorting::startExternalSort()
{
	ifstream unsortedExternal("unsortedExternal.txt");

	int run[1000];

	int runBound = 1000;
	int runLength = 0;
	int i = 0;
	int tempFileNum = 1;

	if (unsortedExternal.is_open())
	{
		while (!unsortedExternal.eof())
		{
		
			for (i; i < runBound; i++)
			{
				if (!unsortedExternal.eof())
					break;

				unsortedExternal >> run[i];

				runLength++;
			}

			externalSort(run, 0, runLength); //does the sort on the run PS. have to put in actual size of array

			writeRunToFile(run, runLength , tempFileNum);

			if (tempFileNum == 1)
				tempFileNum = 2;
			else if (tempFileNum == 2)
				tempFileNum = 1;

			runBound += 1000;
		}
	}
	else
	{
		cout << "couldn't open file" << endl;
	}
}

void Sorting::externalSort(int* run, int start, int end)
{
	//do the sort of the run here
	int i = start, j = end;
	int temp;
	int pivot = run[(start + end) / 2];

	while (i <= j)
	{
		while (run[i] < pivot)
			i++;
		while (run[j] > pivot)
			j--;
		if (i <= j)
		{
			temp = run[i];
			run[i] = run[j];
			run[j] = temp;
			i++;
			j--;
		}
	}

	if (start < j)
		externalSort(run, start, j);
	if (i < end)
		externalSort(run, i, end);
}

void Sorting::writeRunToFile(int * run, int length, int fileNum)
{
	if (fileNum == 1) //temp file 1
	{
		ofstream file;
		file.open("tempFile1.txt", ios::app);

		for (int i = 0; i < length; i++)
		{
			file << run[i] << endl;
		}

	}
	else if (fileNum == 2) //temp file 2
	{
		ofstream file;
		file.open("tempFile2.txt", ios::app);

		for (int i = 0; i < length; i++)
		{
			file << run[i] << endl;
		}
	}
	else
	{
		cout << "Could not append to file!!" << endl;
	}
}

void Sorting::writeFile(char * fileName, arrayStruct &arr)
{
	ofstream resultsFile(fileName);

	for (int i = 0; i < arr.size; i++)
	{
		resultsFile << arr.randArray[i] << endl;
	}

	resultsFile.close();
}