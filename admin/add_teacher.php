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

    <title>Add Teacher</title>

</head>

<body>

<h2>Add Teacher</h2>

<form action="insert_teacher.php" method="POST">

<label>Teacher ID</label>

<input type="text" name="teacher_id" required>

<br><br>

<label>Name</label>

<input type="text" name="name" required>

<br><br>

<label>Department</label>

<input type="text" name="department" required>

<br><br>

<label>Email</label>

<input type="email" name="email">

<br><br>

<label>Phone</label>

<input type="text" name="phone">

<br><br>

<button type="submit">
Add Teacher
</button>

</form>

<br>

<a href="teacher_info.php">
Back
</a>

</body>

</html>