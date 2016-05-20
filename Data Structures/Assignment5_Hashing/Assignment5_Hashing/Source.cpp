//Data Structures Assignment 5 - Hashing
//Dominic Cullen 

#ifdef _MSC_VER
#define _CRT_SECURE_NO_WARNINGS
#endif // _MSC_VER

#include "HashTable.h"
#include <iostream>
#include <conio.h>
#include <fstream>
using namespace std;

int main()
{
	HashTable table;

	ifstream dictionary("../resources/dictionary.txt");

	/* Insert values from file into hash table */
	if (dictionary.is_open())
	{
		string line;

		while (getline(dictionary, line))
		{
			table.insert(line);
		}

		dictionary.close();
	}
	else
	{
		cout << "Couldn't open file!" << endl;
		_getch();
		return 0;
	}

	/* Printing of the hash table */
	cout << "Printing the Hash Table: " << endl << endl;

	table.printTable();
	
	cout << endl << "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~" << endl;
	/* Checking of mispelled words */
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

			if (!table.searchTable(word))
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