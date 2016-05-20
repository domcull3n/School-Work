//Data Structures Assignment 3 - Sorting

#include <cstdlib>
#include <iostream>
#include <conio.h>
#include <time.h>
#include <chrono>
#include <fstream>

#include "Sorting.h";
using namespace std;
typedef chrono::high_resolution_clock Clock;
#define DURATION (chrono::duration_cast<chrono::milliseconds>(end - start).count())

int main()	
{
	arrayStruct randArr;
	
	srand(time(NULL)); //initialize random seed

	for (int i = 0; i < randArr.size; i++) //fill up the array with random numbers
	{
		randArr.randArray[i] = rand(); 
	}

	cout << "Starting sorts" << endl << endl;

	//Part 1 sorting algorithms
	auto start = Clock::now(); //used to calc time it took
	Sorting::bubbleSort(randArr); //pass struct by value so it copies array
	auto end = Clock::now();
	cout << "Bubble sort took " << DURATION << " milliseconds" << endl;

	_getch();

	start = Clock::now();
	Sorting::selectionSort(randArr);
	end = Clock::now();
	cout << "Selection sort took " << DURATION << " milliseconds" << endl;

	_getch();

	start = Clock::now();
	Sorting::insertionSort(randArr);
	end = Clock::now();
	cout << "Insertion sort took " << DURATION << " milliseconds" << endl;

	_getch();

	start = Clock::now();
	Sorting::shellSort(randArr);
	end = Clock::now();
	cout << "Shell sort took " << DURATION << " milliseconds" << endl;

	_getch();

	start = Clock::now();
	Sorting::startMergeSort(randArr);
	end = Clock::now();
	cout << "Merge sort took " << DURATION << " milliseconds" << endl;

	_getch();

	start = Clock::now();
	Sorting::startQuickSort(randArr);
	end = Clock::now();
	cout << "Quick sort took " << DURATION << " milliseconds" << endl;

	_getch();

	//External merge sort begins here
	/*Sorting::writeFile("unsortedExternal.txt", randArr);
	cout << "Finished writing unsorted array to text file" << endl;

	Sorting::startExternalSort();
	cout << "Finished test of function" << endl;

	_getch();*/

	return 0;
}