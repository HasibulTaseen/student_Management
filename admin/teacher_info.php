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

    <title>Teacher Information</title>

</head>

<body>

<h2>Teacher Information</h2>

<br>

<a href="add_teacher.php">
Add Teacher
</a>

<br><br>

<a href="view_teachers.php">
View Teachers
</a>

<br><br>

<a href="dashboard.php">
Back to Dashboard
</a>

</body>

</html>