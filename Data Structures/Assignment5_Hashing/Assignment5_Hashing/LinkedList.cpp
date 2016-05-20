#include "LinkedList.h"
#include <iostream>

LinkedList::LinkedList()
{
	head = nullptr;
	current = nullptr;
	tail = nullptr;
}

LinkedList::~LinkedList()
{
	current = head;

	while (!current)
	{
		Node *temp = current;

		current = temp->next;

		delete temp;
	}
}

void LinkedList::insertItem(std::string value)
{
	Node* node = new Node(value);

	if (head == nullptr)
	{
		head = node;
		current = node;
		tail = node;
	}
	else
	{
		tail->next = node;
		tail = node;
	}	
}

std::string LinkedList::getItem(std::string value)
{
	return std::string();
}

bool LinkedList::searchList(std::string value)
{
	current = head;

	while (current != nullptr)
	{
		if (current->value == value)
		{
			return true;
		}

		current = current->next;
	}

	return false;
}

void LinkedList::printList()
{
	current = head;

	while (current != nullptr)
	{
		std::cout << current->value << "\t";

		current = current->next;
	}
}
