/*
Program Name	: MuhammadDimasDewantara_GIP_Admission_Challenge_Answer.cpp
Description 	: Program of Sum of Square of Integers Calculation
I.S 			: Calculation has not been conducted
F.S				: Calculation has been conducted and display the result of calculation for each test cases.
Author 		    : Muhammad Dimas Dewantara 
Date/Version 	: January 12th 2014/0.1
Requirement     : Using Compiler Dev-C++ 4.9.9.2
*/

#include <stdio.h>
#include <iostream.h>
#include <stdlib.h>
#include <conio.h>

/*------------------ DEKLARASI MODUL FOR CALCULATION OF SUM OF SQUARE -------------------*/
void sum_of_square(int n);
void input_integers(int input);
void display_result(int array_index);
void integers_constrain(int input_validation);
void first_input_N(int input_N);
/*------------------ END OF MODUL FOR CALCULATION OF SUM OF SQUARE -------------------*/


/*------------------ GLOBAL VARIABLE -------------------*/

//variable that responsibility for store result of calculation of sum of square for each test cases
int sum[100];

//variable as array index of sum variable
int array;

//variable as first input of integers
int N;


main()
{
    array = 1; //set array index of sum in 1
    //cout<<"how many sum of square of integers's calculation? ";
    cout << "Input : \n";
    cin >> N;
    first_input_N(N);
    getch();
}

void first_input_N(int input_N){
     //procedure that responsibility for check input of integers 
     // is correct or not.
     if(input_N >= 1 && input_N <= 100){ 
       input_integers(input_N); //if input of integers 1-100
       cout << "\n" << "\n" << "Output : \n";
       display_result(input_N); //after previous process has done
    }else{
    integers_constrain(0);} //if input of integers are not 1-100
}

void integers_constrain(int input_validation){
  //procedure that responsibility to repeat input of integers
  // if input of integers are not 1-100 until it is correct
  if(input_validation == 0){
        cout << "please input integers 1 - 100! \n";
        cout << "input : \n";
        cin >> N;
        first_input_N(N);
    }else{
          integers_constrain(input_validation - 1); //recursive technic
          cout << "please input integers 1 - 100! \n";
          cout << "input : \n";
          cin >> N;
          first_input_N(N);
    }
}

void display_result(int array_index){
   //procedure that responsibility to display result
   // of sum of square of integers that has been store
   // in array
   if(array_index == 1 || array_index == 0){
          cout << "\n" << sum[array_index];   
   }
   else {
       display_result(array_index-1);//recursive technic
       cout << "\n";
       cout << sum[array_index];
   }
}

void input_integers(int input){
    //procedure that responsibility to count how many integers will be count 
    //in sum of square of integers 
    if(input == 1 || input == 0){
         //cout << "how many integers amount that will be count?";
         cin >> input;
         sum_of_square(input);   
    }else {
        input_integers(input-1);//recursive technic
        cout << "\n";
        //cout << "how many integers amount that will be count?";
        cin >> input;
        array = array + 1; //matched with input amount of integers
        sum_of_square(input);
    }

}

void sum_of_square(int n){
    //procedure that responsibility to make calculation
    //of sum of square of integers
    //int X = rand() % 101, Yn = (rand() % 100)-100; //automatically assigned 
   int Yn;
   cin >> Yn;
   if(n==1 || n == 0){
        if(Yn < 0){
             cout << " " << Yn;
        }else{
            cout << Yn;
            Yn = Yn * Yn;
            sum[array] = Yn; //after calculation has done
        }
    }else{
        sum_of_square(n-1);//recursive technic
        if(Yn < 0){
              cout <<" "<< Yn;
        }else{
            cout << " " << Yn;  
            Yn = Yn * Yn;
            sum[array] = sum[array] + Yn; 
        }
    }
}

