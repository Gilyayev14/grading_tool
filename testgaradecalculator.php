<?php

use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../src/GradingTool.php';

class GradingToolTest extends TestCase
{
    public function testAverageHomework()
    {
        $homeworks = [75, 89, 103, 55, 100];
        $result = GradingTool::averageHomework($homeworks);
        $this->assertEquals(84.4, $result);
    }

    public function testDropLowestQuiz()
    {
        $quizzes = [65, 78, 99, 76, 69];
        $result = GradingTool::dropLowestQuiz($quizzes);
        $this->assertEquals([69, 76, 78, 99], $result);
    }

    public function testCalculateFinalGrade()
    {
        $homeworks = [75, 89, 103, 55, 100];
        $quizzes = [65, 78, 99, 76, 69];
        $midterm = 86;
        $finalProject = 90;

        $finalGrade = GradingTool::calculateFinalGrade($homeworks, $quizzes, $midterm, $finalProject);
        $this->assertEquals(87, $finalGrade);
    }

    public function testEdgeCases()
    {
        $homeworks = [0, 0, 0, 0, 0];
        $quizzes = [0, 0, 0, 0, 0];
        $midterm = 0;
        $finalProject = 0;

        $finalGrade = GradingTool::calculateFinalGrade($homeworks, $quizzes, $midterm, $finalProject);
        $this->assertEquals(0, $finalGrade);

        $homeworks = [100, 100, 100, 100, 100];
        $quizzes = [100, 100, 100, 100, 100];
        $midterm = 100;
        $finalProject = 100;

        $finalGrade = GradingTool::calculateFinalGrade($homeworks, $quizzes, $midterm, $finalProject);
        $this->assertEquals(100, $finalGrade);
    }
}
