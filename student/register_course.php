<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'student')
{
    header("Location: ../login.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Register Course</title>

</head>

<body>

<h2>Register Course</h2>

<form action="find_teacher_courses.php" method="POST">

<label>Enter Teacher ID</label>

<input type="text" name="teacher_id" required>

<br><br>

<button type="submit">
Find Courses
</button>

</form>

<br>

<a href="dashboard.php">
Back
</a>

</body>

</html>