#pragma once

#include "LinkedList.h"
#include <string>

class HashTable
{
private:
	static const int arraySize = 47;
	LinkedList table[arraySize];

	int hash(std::string value);
public:
	void insert(std::string value);
	void printTable();
	bool searchTable(std::string value);

};