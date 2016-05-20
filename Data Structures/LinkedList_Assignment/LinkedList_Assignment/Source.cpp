//main source file for the combination lock program
#include "LinkedList.h"
#include <iostream>
#include <conio.h>
#include <fstream>
#include <cstdlib>

using namespace std;

void displayCommands()
{
	//cout some shit about the commands
	cout << "List of commands:" << endl << endl;
	cout << "Q - Exits the application without saving changes" << endl;
	cout << "E - Exits the application and saves the combination in the text file" << endl;
	cout << "G - Go to a specific position in the combination" << endl;
	cout << "S - Substitutes the current position in the combination with the number you pass it" << endl;
	cout << "D - Sets the current position as 0 but preserves the direction" << endl;
	cout << "R - Resets the whole combination list to 0 while preserving their direction" << endl << endl;
}

int main(int argsc, char *argsv[])
{
	const int listSize = 7;
	CombinationList comboList(listSize);

	char userInput[6];

	while (true)
	{
		system("cls");

		displayCommands();

		cout << comboList;
		
		cin.getline(userInput, sizeof(userInput)); //puts user input into char array

		switch (tolower(userInput[0])) //checks the first cell of the char array
		{
			case 'q':
				comboList.~CombinationList(); //deletes combolist and exits the application
				return 0;
			case 'e':
				if (argsc > 1) //if it has command line arguments then write to file
				{
					comboList.writeToFile(argsv[1]);
					return 0;
				}
			case 'g':
				if (isdigit(userInput[2]) && userInput[2] - 48 < listSize) //can be slightly broken
					comboList.goToNode(userInput[2] - 48);				   //doesn't check for numbers with double digits
				break;
			case 's':
				int substitute;	//very convuluted way to substitute numbers

				if (isdigit(userInput[2]))
				{
					substitute = userInput[2] - 48; //converts char ascii value by - 48 from the value to get actual number
				}
				
				if (isdigit(userInput[3]))
				{
					substitute *= 10;
					substitute += userInput[3] - 48;
				}

				if (substitute >= 0 && substitute < 50)
				{
					comboList.substituteNode(substitute);
					break;
				}
				else
				{
					break;
				}
			case 'd':
				comboList.deleteCurrentNode();
				break;
			case 'r':
				comboList.resetList();
				break;
			default:
				cout << "Invalid Command" << endl;
				_getch();
		}//end switch

	}//end while(true)

	_getch();

	return 0;
}