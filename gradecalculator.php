<?php

function calculateAverage(array $scores): float {
    return array_sum($scores) / count($scores);
}

function dropLowestQuiz(array $quizzes): float {
    sort($quizzes);
    array_shift($quizzes); // Remove the lowest score
    return calculateAverage($quizzes);
}

function calculateFinalGrade(float $homeworkAvg, float $quizAvg, float $midterm, float $finalProject): int {
    $totalScore = ($homeworkAvg * 0.2) + ($quizAvg * 0.1) + ($midterm * 0.3) + ($finalProject * 0.4);
    return round($totalScore);
}
?>