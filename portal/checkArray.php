<?php 

function check($complete, $incomplete) {
    $count = 0;
    for ($i = 0; $i < count($complete); $i++) {
        for ($j = 0; $j < count($incomplete); $j++) {
            if ($complete[$i] == $incomplete[$j]) {
                $count++; // Increment the count if a match is found
                break; // Exit the inner loop since a match is found
            }
        }
    }
    // Check if the count of matches equals the count of elements in $incomplete
    return $count == count($incomplete);
}
$incomplete = ['c', 'b'];
$complete = ['a', 'b', 'd'];

var_dump(check($complete, $incomplete));



function sortByLastCharater($sentence){

    $break = explode(" ", $sentence);

    foreach ($break as $aword ) {
    //    print $aword. '</br>';
       
    // then convert to lower
    $lowerChar = strtolower($aword);
       $lastchar = substr($lowerChar, -1);
       
       // convert t
       print_r($lastchar. '</br>');
      

     
       

    }

    // You are tasked  with creating function sortByLastCharater which take a string agreement and returns the array of the words in that strings, sorted aphabetically by the final character in eacch word. You should be sure to convert the word into lowercase to ensure accurate sorting. However, the return array should show the actual capitailization that appeared on the original string. if two words have the same letter, the array should show them in order they appear. Must be done in php



     
}

echo sortByLastCharater('I am a man');



function addNumber($n) {
    $total= 0;
    for ($i=1; $i <= $n; $i++) { 
       $total = $total + $i;
        
       print ' + '.$i;
        
    }
    
    return ' = '.$total;
   
}
echo addNumber(4). '<br><br>';

//multiplication

function multiplication($n, $x)  {
    $result = "";
    for ($i=1; $i <= $x; $i++) { 
       $answer = $n * $i. '<br>';

       print $n. ' * ' .$i. ' = ' .$answer;
       
    }
    
}

echo multiplication(4, 12);


// Almighty Formular

function almighty($a, $b, $c) {
    // x is the first root/answer whic is the positive +
    $x = "";
    // y is the second root/answer which is negative part -
    $y = "";
    // break formular into small pieces for each root x and y 
    // Therefore solve for x root first
     $xFirstEquation =  $b * $b - (4*$a*$c); // First part of the formular bsquare-4ac 
     $xfindSquareRoot = sqrt($xFirstEquation); // fint the square root as written in the formular
    $xSecondEquation = -($b); // second part of the equation -b(-)
    $xThirdEquation = $xSecondEquation + $xfindSquareRoot; // Then the third equation sum up the first and second past of the equation which is the nominator of the formular  -b + square root of bsquare - 4ac
    $xFourthEquation = $xThirdEquation/ (2*$a); // the fourth equation takes the rest of the forular by dividing the nominator by the denominator

    // Now lets solve for y which is the second root; Negative

    $yFirstEquation =  $b * $b - (4*$a*$c); // First part of the formular bsquare-4ac
    $yfindSquareRoot = sqrt($yFirstEquation); // fint the square root as written in the formular
    $ySecondEquation = -($b);  // second part of the equation -b(-)
    $yThirdEquation = $ySecondEquation - $yfindSquareRoot; // Then the third equation sum up the first and second past of the equation which is the nominator of the formular  -b + square root of bsquare - 4ac
    $yFourthEquation = $yThirdEquation/ (2*$a);// the fourth equation takes the rest of the forular by dividing the nominator by the denominator
   
   $x = $xFourthEquation; 
   $y = $yFourthEquation;

   print $x. ' and ' .$y;  // final to both root; 

}
echo almighty(1,-4,4). '<br>';

function grading($grades) {
    foreach ($grades as $grade){

        if ($grade >= 75) {
            print $grade. ' = ' .'A<br>';
        }
        elseif ($grade >= 70 && $grade <= 74){
            print $grade. ' = ' .'B2<br>';
        }
       
        elseif ($grade >= 65 && $grade <= 69){
            print $grade. ' = ' .'B3<br>';
        }
        elseif ($grade >= 60 && $grade <= 64){
            print $grade. ' = ' .'C4<br>';
        }
        elseif ($grade >= 55 && $grade <= 59){
            print $grade. ' = ' .'C5<br>';
        }
        elseif ($grade >= 50 && $grade <= 54){
            print $grade. ' = ' .'C6<br>';
        }
        elseif ($grade >= 45 && $grade <= 44){
            print $grade. ' = ' .'E8<br>';
        }
        else {
            print $grade. ' = ' .'F9<br>';
        }
     }
    
    
}
$grades = [75, 70, 65, 69, 64, 60, 55, 59, 54, 50, 30];
echo grading($grades);
// store the scores of student in a variable

// if scores is greater than or equal to 75, Print A
// if scores is greater than 70 or Equal to 74, print B2
// if scores is greater than 65 or equal to 69, print B3
// if scores is greater than 60 or equal to 64, print C4 
// if scores is greater than 55 or equal to 59, print C5
// if scores is greater than 50 or equal to 54, print C6
// if scores is greater than 45 or equal to 44, print E8
// Else print F9 



// 

?>