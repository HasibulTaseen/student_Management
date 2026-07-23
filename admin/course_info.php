<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Course Management</title>

</head>

<body>

<h2>Course Management</h2>

<br>

<a href="add_course.php">
Add Course
</a>

<br><br>

<a href="view_courses.php">
View Courses
</a>

<br><br>

<a href="dashboard.php">
Back to Dashboard
</a>

</body>

</html>