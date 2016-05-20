#pragma once
//Header for the CombinationList Class

#include <iostream>
#include <string>

struct ValueStruct
{
	std::string value;
};

struct Node
{
	ValueStruct value;
	Node *next; //pointer to next node in list
};

class LinkedList
{
private:
	Node *head;
	Node *current;

public:
	//methods go here
	LinkedList(int);
	~LinkedList();

	void goToNode(int); //go to specific node in list
	void deleteCurrentNode(); //deletes the current node
	void substituteNode(int); //swaps current node value with the value passed
	void resetList(); //resets the combolist to all zeroes 
	
	void writeToFile(char *fileName);

	friend std::ostream& operator<<(std::ostream& output, LinkedList& comboList);
};

