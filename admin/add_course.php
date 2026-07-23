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

<title>Add Course</title>

</head>

<body>

<h2>Add Course</h2>

<form action="insert_course.php" method="POST">

<label>Course Code</label>

<input type="text" name="course_code" required>

<br><br>

<label>Course Name</label>

<input type="text" name="course_name" required>

<br><br>

<label>Credit</label>

<input type="number" name="credit" required>

<br><br>

<button type="submit">
Add Course
</button>

</form>

<br>

<a href="course_info.php">
Back
</a>

</body>

</html>