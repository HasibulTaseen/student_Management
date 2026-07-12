<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("Location: login.php");
    exit();
}

?>


<!DOCTYPE html>
<html>

<head>
<title>Add Student</title>
</head>


<body>


<h2>Add Student</h2>


<form action="insert.php" method="POST">


Student ID:
<input type="number" name="student_id" required>

<br><br>


Name:
<input type="text" name="name" required>

<br><br>


Department:
<input type="text" name="department" required>

<br><br>


Semester:
<input type="number" name="semester" required>

<br><br>


Email:
<input type="email" name="email">

<br><br>


Phone:
<input type="text" name="phone">


<br><br>

cgpa:
<input type="text" name="cgpa">


<br><br>
<button type="submit">
Add Student
</button>


</form>


<br>


<a href="dashboard.php">
Back to Dashboard
</a>


</body>

</html>