<?php

use PHPUnit\Framework\TestCase;

require_once 'GradeCalculator.php';

class GradeCalculatorTest extends TestCase {

    public function testCalculateAverage() {
        $scores = [75, 89, 103, 55, 100];
        $avg = calculateAverage($scores);
        $this->assertEquals(84.4, $avg);
    }

    public function testDropLowestQuiz() {
        $quizScores = [65, 78, 99, 76, 69];
        $quizAvg = dropLowestQuiz($quizScores);
        $this->assertEquals(80.5, $quizAvg);
    }

    public function testCalculateFinalGrade() {
        $homeworkAvg = 84.4;
        $quizAvg = 80.5;
        $midterm = 86;
        $finalProject = 90;

        $finalGrade = calculateFinalGrade($homeworkAvg, $quizAvg, $midterm, $finalProject);
        $this->assertEquals(87, $finalGrade);
    }
}
?>