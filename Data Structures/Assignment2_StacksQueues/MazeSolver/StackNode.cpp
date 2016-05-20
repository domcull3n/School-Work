//Implementation for the StackNode class
#include "StackNode.h";

StackNode::StackNode(int row, int col)
{
	this->row = row;
	this->col = col;
}

StackNode::~StackNode()
{
}

int StackNode::getRow()
{
	return row;
}

void StackNode::setRow(int num)
{
	row = num;
}

int StackNode::getCol()
{
	return col;
}

void StackNode::setCol(int num)
{
	col = num;
}

StackNode * StackNode::getNext()
{
	return nextNode;
}

void StackNode::setNext(StackNode *next)
{
	nextNode = next;
}
