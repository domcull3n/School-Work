//Stack header file
#pragma once
#include "StackNode.h";

enum error_code { success, underflow, overflow };

class Stack
{
private:
	StackNode *topNode;
	int stackSize;

	const int maxStackSize = 5000;
public:
	Stack() { topNode:nullptr; };
	~Stack();

	bool isEmpty();
	::error_code push(int row, int col);
	::error_code pop();
	StackNode *getTopNode();

};