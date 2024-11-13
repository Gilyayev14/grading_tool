<?php
require 'grade_calculator.php';

function assertEquals($expected, $actual, $testName) {
    if ($expected === $actual) {
        echo "$testName: PASSED\n";
    } else {
        echo "$testName: FAILED (Expected $expected, got $actual)\n";
    }
}

assertEquals(80, calculateQuizAverage([70, 80, 90, 80, 85]), "Test Quiz Average 1");
assertEquals(85, calculateQuizAverage([85, 85, 85, 85, 70]), "Test Quiz Average 2");


assertEquals(87, calculateFinalGrade([75, 89, 103, 55, 100], [65, 78, 99, 76, 69], 86, 90), "Test Final Grade 1");
assertEquals(90, calculateFinalGrade([100, 95, 90, 85, 100], [90, 80, 70, 60, 50], 90, 95), "Test Final Grade 2");


assertEquals(100, calculateFinalGrade([100, 100, 100, 100, 100], [100, 100, 100, 100, 100], 100, 100), "Test Perfect Scores");
assertEquals(0, calculateFinalGrade([0, 0, 0, 0, 0], [0, 0, 0, 0, 0], 0, 0), "Test Zero Scores");

assertEquals(0, calculateQuizAverage([]), "Test Empty Quiz Array");
assertEquals(0, calculateFinalGrade([], [], 0, 0), "Test Empty Inputs");

ssertEquals(90, calculateQuizAverage([90]), "Test Single Quiz Score");
assertEquals(85, calculateFinalGrade([85], [90], 80, 90), "Test Single Element in Homework and Quizzes");

?>
