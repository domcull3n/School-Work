#ifdef _MSC_VER
#define _CRT_SECURE_NO_WARNINGS
#endif // _MSC_VER


#include <iostream>
#include <string>
#include <time.h>
#include <chrono>
#include <conio.h>
#include <fstream>

#include "ArraySearcher.h"
#include "AvlTree.h"
using namespace std;

typedef chrono::high_resolution_clock Clock;
#define DURATION (chrono::duration_cast<chrono::milliseconds>(end - start).count())

int main()
{
	//Assignment 4 part 1

	const int arraySize = 100000;

	int* arr = ArraySearcher::generateArray(arraySize);

	cout << "Results for searches:" << endl;

	auto start = Clock::now(); //start time
	for (int i = 0; i < arraySize; i++)
		ArraySearcher::sequentialSearch(arr, i, arraySize);
	auto end = Clock::now(); //end time

	cout << "Sequential: " << DURATION << " milliseconds" << endl;

	start = Clock::now();
	for (int i = 0; i < arraySize; i++)
		ArraySearcher::binarySearch(arr, i, arraySize);
	end = Clock::now();

	cout << "Binary: " << DURATION << " milliseconds" << endl;
	
	_getch();

	cout << "~~~~~~~~~~~~~~~~~~~~~~" << endl << endl;

	/* Assignment 4 - Part 2 */

	AvlTree tree;

	/* Fill tree with words from dictionary */

	ifstream dictionary("../resources/dictionary.txt");

	if (dictionary.is_open())
	{
		string line;

		while (getline(dictionary, line))
		{
			tree.insertValue(line); 
		}

		dictionary.close();
	}
	else
	{
		cout << "Couldn't open file!" << endl;
	}

	/* Print the full tree */

	cout << "Full dictionary avl tree: " << endl << endl;

	tree.printTree();

	cout << endl << endl << endl;

	/* Checking misspelled words */

	ifstream mispelled("../resources/mispelled.txt");

	if (mispelled.is_open())
	{
		cout << "Mispelled words: " << endl;

		string data;
		getline(mispelled, data);

		char* delim = " ,.!?()#&1234567890\"";
		char* buffer = new char[data.length() + 1];
		strcpy(buffer, data.c_str());
		char* word;

		word = strtok(buffer, delim);

		while (word != NULL)
		{
			int i = 0;
			while (word[i])
			{
				word[i] = tolower(word[i]);
				i++;
			}

			if (!tree.searchTree(word))
			{
				cout << word << endl;
			}

			word = strtok(NULL, delim);
		}

		mispelled.close();
	}
	else
	{
		cout << "Couldn't open file!" << endl;
	}

	_getch();
	return 0;
}