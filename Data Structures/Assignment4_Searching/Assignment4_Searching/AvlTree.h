#pragma once
#include <string>

struct Node
{
	//data, height and pointers
	std::string value;

	Node* left;
	Node* right;

	int height;

	Node(std::string v) : value(v), left(nullptr), right(nullptr), height(0) {}
};

class AvlTree
{
private:
	Node* root; //root node, needed in public to start inserts and such

	int balanceFactor(Node*); //calculates the balance of the nodes
	void setHeight(Node*); //sets the height based on subtrees
	int getHeight(Node*);

	Node* leftRotation(Node*); 
	Node* rightRotation(Node*);

	Node* balanceTree(Node*); 

	Node* treeInsert(std::string, Node*);
	void treePrint(Node*, int);
	bool treeSearch(std::string, Node*);

public:
	void insertValue(std::string);
	void printTree();
	bool searchTree(std::string);

	AvlTree();
};