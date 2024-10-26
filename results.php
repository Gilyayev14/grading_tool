<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Grades</title>
</head>
<body>
    <h1>Final Grades</h1>
    <table border="1">
        <tr>
            <th>Student Name</th>
            <th>Final Grade</th>
        </tr>
        <?php
        // Connect to database
        $conn = new mysqli('localhost', 'root', '', 'grading_tool');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

       
        $sql = "SELECT s.name, g.homework1, g.homework2, g.homework3, g.homework4, g.homework5, 
                       g.quiz1, g.quiz2, g.quiz3, g.quiz4, g.quiz5, g.midterm, g.final_project 
                FROM Students s JOIN Grades g ON s.student_id = g.student_id";
        
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            $homework_avg = ($row['homework1'] + $row['homework2'] + $row['homework3'] + 
                             $row['homework4'] + $row['homework5']) / 5;
            $quizzes = [$row['quiz1'], $row['quiz2'], $row['quiz3'], $row['quiz4'], $row['quiz5']];
            sort($quizzes);
            array_shift($quizzes);
            $quiz_avg = array_sum($quizzes) / count($quizzes);
            $midterm = $row['midterm'];
            $final_project = $row['final_project'];

            $final_grade = round(($homework_avg * 0.2) + ($quiz_avg * 0.1) + ($midterm * 0.3) + ($final_project * 0.4));

            echo "<tr><td>" . $row['name'] . "</td><td>$final_grade</td></tr>";
        }

        $conn->close();
        ?>
    </table>
    <a href="index.php">Back to Enter Grades</a>
</body>
</html>
