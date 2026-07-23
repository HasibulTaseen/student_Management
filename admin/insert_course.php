<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";

$course_code = $_POST['course_code'];

$course_name = $_POST['course_name'];

$credit = $_POST['credit'];


$query = "INSERT INTO courses
(course_code, course_name, credit)

VALUES
('$course_code',
 '$course_name',
 '$credit')";


if(mysqli_query($conn, $query))
{
    echo "Course Added Successfully";

    echo "<br><br>";

    echo "<a href='view_courses.php'>
    View Courses
    </a>";
}
else
{
    echo "Error: " . mysqli_error($conn);
}

?>