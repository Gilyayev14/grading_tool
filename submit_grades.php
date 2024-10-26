<?php
$conn = new mysqli('localhost', 'root', '', 'grading_tool');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


foreach ($_POST['homework'] as $student_id => $homeworks) {
   
    $homework_avg = array_sum($homeworks) / count($homeworks);
    
   
    $quizzes = $_POST['quiz'][$student_id];
    sort($quizzes);
    array_shift($quizzes); 
    $quiz_avg = array_sum($quizzes) / count($quizzes);
    
  
    $midterm = $_POST['midterm'][$student_id];
    $final_project = $_POST['final_project'][$student_id];


    $final_grade = round(($homework_avg * 0.2) + ($quiz_avg * 0.1) + ($midterm * 0.3) + ($final_project * 0.4));
    
    
    $sql = "INSERT INTO Grades (student_id, homework1, homework2, homework3, homework4, homework5, 
            quiz1, quiz2, quiz3, quiz4, quiz5, midterm, final_project) 
            VALUES ($student_id, " . implode(", ", $homeworks) . ", 
            " . implode(", ", $quizzes) . ", $midterm, $final_project)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Grades for student ID $student_id submitted successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<a href="results.php">View Results</a>