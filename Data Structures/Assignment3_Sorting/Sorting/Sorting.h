#pragma once

struct arrayStruct
{
	int randArray[100000];
	int size = 100000;
};

class Sorting
{
public:
	static void bubbleSort(arrayStruct arr);
	static void selectionSort(arrayStruct arr);
	static void insertionSort(arrayStruct arr);
	static void shellSort(arrayStruct arr);

	static void startMergeSort(arrayStruct arr); //for merge algorithm
	static void mergeSort(arrayStruct &arr, int low, int high, int* workArr); 
	static void merge(arrayStruct &arr, int low, int mid, int high, int* workArr);

	static void startQuickSort(arrayStruct arr); //for quicksort
	static void quickSort(arrayStruct &arr, int start, int end);

	static void startExternalSort();
	static void externalSort(int* run, int start, int end);
	static void writeRunToFile(int* run, int length, int fileNum);

	static void writeFile(char* fileName, arrayStruct &arr);
};