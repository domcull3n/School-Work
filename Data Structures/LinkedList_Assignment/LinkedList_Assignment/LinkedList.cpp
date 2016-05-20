//Implementation file for the CombinationList class

#include "LinkedList.h";
#include <fstream>;

LinkedList::LinkedList(int number)
{
	head = nullptr;
	current = nullptr;
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

void LinkedList::goToNode(int nodeNumber)
{
	int counter = 0;
	current = head;

	while (counter != nodeNumber)
	{
		current = current->next;
		counter++;
	}
}

void LinkedList::deleteCurrentNode()
{
	current->value.value = "";
}

void LinkedList::substituteNode(std::string substitute)
{
	current->value.value = substitute;
}

void CombinationList::resetList()
{
	current = head;
	
	while (current != nullptr)
	{
		current->combo.value = 0;
		current = current->next;
	}

	current = head;
}

void CombinationList::writeToFile(char *fileName)
{
	std::fstream writeFile;
	writeFile.open(fileName, std::fstream::out);

	if (!writeFile.is_open())
	{
		std::cout << "Couldn't open file" << std::endl;
	}
	else
	{
		current = head;
		
		while (current != nullptr)
		{
			writeFile <<current->combo.direction << current->combo.value << std::endl;
			current = current->next;
		}
	}

	writeFile.close();
}

std::ostream & operator<<(std::ostream & output, CombinationList & comboList)
{
	Node *moveNode = comboList.head;

	while (moveNode != nullptr)
	{
		if (moveNode == comboList.current)
		{
			output << ">" << moveNode->combo.direction << moveNode->combo.value << "<" << std::endl;
		}
		else
		{
			output << moveNode->combo.direction << moveNode->combo.value << std::endl;
		}

		moveNode = moveNode->next;
	}

	output << std::endl;

	return output;
}