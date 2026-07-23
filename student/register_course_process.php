<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'student')
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";


$student_id = $_SESSION['username'];

$section_id = $_POST['section_id'];


$query = "INSERT INTO course_registration
(student_id, section_id)

VALUES
('$student_id',
 '$section_id')";


if(mysqli_query($conn, $query))
{
    echo "Course Registered Successfully";

    echo "<br><br>";

    echo "<a href='my_courses.php'>
    View My Courses
    </a>";
}
else
{
    echo "You have already registered for this course or an error occurred.";

    echo "<br><br>";

    echo mysqli_error($conn);
}

?>