//StackNode Header file
#pragma once

class StackNode
{
private:
	int row;
	int col;

	StackNode *nextNode;

public:
	StackNode(int row, int col);
	~StackNode();

	int getRow();
	void setRow(int num);

	int getCol();
	void setCol(int num);

	StackNode* getNext();
	void setNext(StackNode *next);
};