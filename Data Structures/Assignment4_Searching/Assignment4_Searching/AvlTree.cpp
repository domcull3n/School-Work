#include "AvlTree.h"
#include <iostream>

int AvlTree::balanceFactor(Node * curr)
{
	return getHeight(curr->right) - getHeight(curr->left);
}

void AvlTree::setHeight(Node * node)
{
	//set the node height
	if (node == nullptr)
	{
		return;
	}
	else if (getHeight(node->right) > getHeight(node->left))
	{
		node->height = node->right->height + 1;
	}
	else if (getHeight(node->right) < getHeight(node->left))
	{
		node->height = node->left->height + 1;
	}
}

Node * AvlTree::leftRotation(Node * node)
{
	Node* temp = node->right;
	node->right = temp->left;
	temp->left = node;

	setHeight(node);
	setHeight(temp);

	return temp;
}

Node * AvlTree::rightRotation(Node * node)
{
	Node* temp = node->left;
	node->left = temp->right;
	temp->right = node;
	
	setHeight(node);
	setHeight(temp);

	return temp;
}


Node* AvlTree::balanceTree(Node * node)
{
	setHeight(node);

	if (balanceFactor(node) > 1) //if root tree is right heavy
	{
		if (balanceFactor(node->right) < 0) //if right subtree is left heavy
		{
			node->right = rightRotation(node->right);
		}
		node = leftRotation(node);
	}
	else if (balanceFactor(node) < -1) //if root tree is left heavy
	{
		if (balanceFactor(node->left) > 0) //if left sub tree is right heavy
		{
			node->left = leftRotation(node->left);
		}
		node = rightRotation(node);
	}
	return node;
}

Node * AvlTree::treeInsert(std::string value, Node * node)
{
	if (node == nullptr) //if node passed in is null
	{
		node = new Node(value);
		return node;
	}

	if (node->value < value) //traverses the tree here
	{
		node->left = treeInsert(value, node->left);

		node = balanceTree(node);
	}
	else
	{
		node->right = treeInsert(value, node->right);

		node = balanceTree(node);
	}

	return node;
}

void AvlTree::treePrint(Node * node, int level)
{
	if (node != nullptr)
	{
		treePrint(node->left, level + 1);

		std::cout << std::string(level, '	') << node->value << std::endl;

		treePrint(node->right, level + 1);
	}
}

bool AvlTree::treeSearch(std::string value, Node * node) //returns true if value has been found
{
	while (node != nullptr)
	{
		if (node->value == value)
		{
			return true;
		}

		if (node->value < value)
		{
			node = node->left;
		}
		else
		{
			node = node->right;
		}
	}

	return false;
}

void AvlTree::printTree() //user function
{
	treePrint(root, 0);
}

bool AvlTree::searchTree(std::string value)
{
	if (treeSearch(value, root))
	{
		return true;
	}
	else
	{
		return false;
	}
}

AvlTree::AvlTree()
{
	root = nullptr;
}

int AvlTree::getHeight(Node * node)
{
	return node ? node->height : -1;
}

void AvlTree::insertValue(std::string value)
{
	root = treeInsert(value, root);
}