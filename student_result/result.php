<?php

$subjects = [
    "Bangla",
    "English",
    "Maths",
    "ICT",
    "Science"
];

function getGrade($average){
    switch(true){
        case ($average >= 80 && $average <= 100):
            return "A+";
        case ($average >= 70 && $average <= 79):
            return "A";
        case ($average >= 60 && $average <= 69):
            return "A-";
        case ($average >= 50 && $average <= 59):
            return "B";
        case ($average >= 40 && $average <= 49):
            return "C";
        case ($average >= 33 && $average <= 39):
            return "D";
        default:
            return "F";
    }
}

function calculateResult($studentName, $marks) {

    foreach($marks as $subject => $mark){
        if($mark < 1 || $mark > 100){
            echo "Student: $studentName<br>";
            echo "Mark range is invalid for $subject.<br><br>";
            return;
        }
        if($mark < 33){
            echo "Student: $studentName<br>";
            echo "Result: Fail<br><br>";
            return;
        }
    }

    // total and avarage
    $total = array_sum($marks);
    $average = $total / count($marks);

    // grade
    $grade = getGrade($average);

    // result
    echo "Student: $studentName<br>";
    echo "Total Marks: " . $total . "<br>";
    echo "Average Marks: " . number_format($average, 2) . "<br>";
    echo "Grade: " . $grade . "<br><br>";
}


$students = [
    [
        'name' => 'Porosh',
        'Bangla' => 100,      
        'English' => 50,     
        'Maths' => 88,       
        'ICT' => 40,         
        'Science' => 60      
    ], 
    //Normal result
    [
        'name' => 'Mahbir',
        'Bangla' => 101,      
        'English' => 90,     
        'Maths' => 95,       
        'ICT' => 88,         
        'Science' => 92      
    ],
    // Invalid mark
    [
        'name' => 'Rafi',
        'Bangla' => 65,      
        'English' => 70,     
        'Maths' => 60,       
        'ICT' => 68,         
        'Science' => 30      
    ] 
    // Fail
];


foreach ($students as $student) {
    calculateResult(
        $student['name'],
        [
            'Bangla' => $student['Bangla'],
            'English' => $student['English'],
            'Maths' => $student['Maths'],
            'ICT' => $student['ICT'],
            'Science' => $student['Science']
        ]
    );
}

?>
