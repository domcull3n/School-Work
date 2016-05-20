// Data Structures Assignment #2
// Maze Solver Application
// Dominic Cullen

#include <iostream>
#include <fstream>
#include <conio.h>
#include "Stack.h"
using namespace std;

void checkGoal(StackNode *top);
bool searchPath(char **maze, Stack &mazeStack);

int row = 0; //how big the array is
int col = 0;

bool finished = false; //if it has reached goal

int main(int argsc, char *argv[])
{
	Stack mazeStack; //stack for maze values

	char **maze = nullptr; //maze char array

	fstream mazeFile(argv[1], ios::in); //text maze file

	if (mazeFile.is_open())
	{
		char temp;
		while (!mazeFile.get(temp).eof())
		{
			if (temp == '\r' || temp == '\n')
			{
				if (row == 0)
					col++;

				row++;
			}
			else if (row == 0)
			{
				col++;
			}
		}

		maze = new char*[row]; //got from stack overflow - char array expression must have a constant value
		for (int i = 0; i <= row; i++)
		{
			maze[i] = new char[col - 1];
		}

		//need to load up the array
		row = 0, col = 0; //resetting filestream and row/col values
		mazeFile.clear();
		mazeFile.seekg(0, ios::beg);
		while (!mazeFile.get(temp).eof())
		{
			if (temp == '\r' || temp == '\n')
			{
				col++;
				maze[row][col] = temp;	//Increment the colsize so i can store the newline char

				row++;
				col = 0; //go to the next row down and reset the colsize counter
			}
			else
			{
				maze[row][col] = temp;
				col++;
			}
		}

	}
	else
	{
		cout << "File is not open!" << endl;
		cout << argv[1] << endl;
	}

	for (int i = 0; i <= row; i++)
	{
		for (int j = 0; j <= col; j++)
		{
			if (maze[i][j] == ' ')
			{
				maze[i][j] = '#';
				mazeStack.push(i, j);
				goto stopLoop;
			}
		}
	}
	stopLoop:

	if (searchPath(maze, mazeStack) == true)
	{
		cout << "Finished processing" << endl;
		_getch();
	}

	ofstream solution;
	solution.open("solution.txt");
	if (!solution)
	{
		cout << "Could not open file" << endl;
		_getch();
	}

	for (int i = 0; i <= row; i++)
	{
		for (int j = 0; j < col; j++)
		{
			if (maze[i][j] == 'X')
				maze[i][j] = ' ';
			
			solution << maze[i][j];
		}
		solution << '\n';
	}

	cout << "Finished writing to file solution.txt in the MazeSolver folder" << endl;
	_getch();

	return 0;
}//end main

void checkGoal(StackNode* top)
{
	if (top->getRow() == row - 1 && top->getCol() == col - 1)
		finished = true;
}// checkGoal

bool searchPath(char **maze, Stack &mazeStack) //didn't realize I wasn't meant to use recursion... ¯\_(ツ)_/¯
{
	StackNode *curr = mazeStack.getTopNode();
	int row = curr->getRow();
	int col = curr->getCol();
	
	checkGoal(curr);
	if (finished == true) //check goal
		return true;
	
	if (maze[row][col + 1] == ' ')//if east
	{
		maze[row][col + 1] = '#';
		mazeStack.push(row, col + 1);
		if (searchPath(maze, mazeStack) == true)
			return true;
	}
	else if (maze[row + 1][col] == ' ')//if south
	{
		maze[row + 1][col] = '#';
		mazeStack.push(row + 1, col);
		if (searchPath(maze, mazeStack) == true)
			return true;
	}
	else if (maze[row][col - 1] == ' ')//if west
	{
		maze[row][col - 1] = '#';
		mazeStack.push(row, col - 1);
		if (searchPath(maze, mazeStack) == true)
			return true;
	}
	else if (maze[row - 1][col] == ' ')//if north
	{
		maze[row - 1][col] = '#';
		mazeStack.push(row - 1, col);
		if (searchPath(maze, mazeStack) == true)
			return true;
	}
	else
	{
		maze[row][col] = 'X';			//if no spaces
		mazeStack.pop();
		searchPath(maze, mazeStack);
	}
}//end searchPath