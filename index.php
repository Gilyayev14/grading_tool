<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grading Tool</title>
</head>
<body>
    <h1>Enter Grades</h1>
    <form action="submit_grades.php" method="post">
        <?php
       
        $conn = new mysqli('localhost', 'root', '', 'grading_tool');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

       
        $sql = "SELECT * FROM Students";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<h3>" . $row['name'] . "</h3>";
            for ($i = 1; $i <= 5; $i++) {
                echo "Homework $i: <input type='number' name='homework[{$row['student_id']}][]' required><br>";
            }
            for ($i = 1; $i <= 5; $i++) {
                echo "Quiz $i: <input type='number' name='quiz[{$row['student_id']}][]' required><br>";
            }
            echo "Midterm: <input type='number' name='midterm[{$row['student_id']}]' required><br>";
            echo "Final Project: <input type='number' name='final_project[{$row['student_id']}]' required><br><br>";
        }

        $conn->close();
        ?>
        <input type="submit" value="Submit Grades">
    </form>
</body>
</html>