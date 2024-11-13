<?php

function calculateQuizAverage($quizzes) {
    sort($quizzes);
    array_shift($quizzes);
    return array_sum($quizzes) / count($quizzes);
}


function calculateFinalGrade($homeworks, $quizzes, $midterm, $final_project) {
    $homework_avg = array_sum($homeworks) / count($homeworks);
    $quiz_avg = calculateQuizAverage($quizzes);

    $final_score = ($homework_avg * 0.2) + ($quiz_avg * 0.1) + ($midterm * 0.3) + ($final_project * 0.4);
    return round($final_score);
}
?>
