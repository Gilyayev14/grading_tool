CREATE TABLE Students (
    student_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL
);

-- Create the Grades table
CREATE TABLE Grades (
    grade_id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT,
    homework1 INT,
    homework2 INT,
    homework3 INT,
    homework4 INT,
    homework5 INT,
    quiz1 INT,
    quiz2 INT,
    quiz3 INT,
    quiz4 INT,
    quiz5 INT,
    midterm INT,
    final_project INT,
    FOREIGN KEY (student_id) REFERENCES Students(student_id)
);

-- Insert sample students
INSERT INTO Students (name) VALUES 
    ('John Doe'),
    ('Jane Smith'),
    ('Emily Davis'),
    ('Michael Brown'),
    ('Linda Johnson');

-- Insert sample grades for each student
INSERT INTO Grades (student_id, homework1, homework2, homework3, homework4, homework5, quiz1, quiz2, quiz3, quiz4, quiz5, midterm, final_project) VALUES
    (1, 75, 89, 103, 55, 100, 65, 78, 99, 76, 69, 86, 90),
    (2, 80, 85, 90, 60, 100, 70, 88, 95, 80, 72, 88, 92),
    (3, 70, 80, 95, 60, 85, 68, 85, 90, 78, 75, 82, 85),
    (4, 90, 88, 78, 82, 85, 77, 84, 80, 86, 70, 78, 89),
    (5, 88, 92, 80, 75, 93, 74, 82, 88, 79, 71, 83, 91);