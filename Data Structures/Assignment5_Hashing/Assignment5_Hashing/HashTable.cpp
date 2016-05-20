#include "HashTable.h"
#include <iostream>

int HashTable::hash(std::string value)
{
	int hash = 0;

	for (int i = 0; i < value.length(); i++)
	{
		hash += value[i]; //gets char number
	}

	return (hash + value.length()) % arraySize;
}

void HashTable::insert(std::string value)
{
	int index = hash(value);

	table[index].insertItem(value);
}

void HashTable::printTable()
{
	for (int i = 0; i < arraySize; i++)
	{
		table[i].printList();
		std::cout << std::endl;
	}
}

bool HashTable::searchTable(std::string value)
{
	int index = hash(value);

	return table[index].searchList(value);
}
