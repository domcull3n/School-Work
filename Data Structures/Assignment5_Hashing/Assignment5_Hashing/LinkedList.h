#pragma once

#include <string>

struct Node
{
	std::string value;
	Node* next;
	Node(std::string v) { value = v; next = nullptr; }
};

class LinkedList
{
private:
	Node* head;
	Node* current;
	Node* tail;

public:
	LinkedList();
	~LinkedList();

	void insertItem(std::string value);
	std::string getItem(std::string value);
	bool searchList(std::string value);

	void printList();
};