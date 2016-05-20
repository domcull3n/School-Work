//Stack implementation file
#include "Stack.h";

Stack::~Stack()
{
	while (topNode != nullptr)
	{
		pop();
	}
}

bool Stack::isEmpty()
{
	if (topNode == nullptr)
		return true;
	else
		return false;
}

::error_code Stack::push(int row, int col)
{
	if (stackSize < maxStackSize)
	{
		StackNode *node = new StackNode(row, col);
		if (isEmpty() == true)
		{
			topNode = node;
		}
		else
		{
			node->setNext(topNode);
			topNode = node;
		}
		
		stackSize++;

		return success;
	}
	else
	{
		return overflow;
	}
}

::error_code Stack::pop()
{
	if (isEmpty() == false)
	{
		StackNode *tempNode = topNode;
		topNode = topNode->getNext();
		delete tempNode;
		stackSize--;
		return success;
	}
	else
	{
		return underflow;
	}
}

StackNode* Stack::getTopNode()
{
	return topNode;
}
