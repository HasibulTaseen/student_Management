<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("Location: login.php");
    exit();
}

?>

<h1>
Welcome <?php echo $_SESSION['username']; ?>
</h1>


<!-- <a href="index.php">
Add Student
</a>

<br><br>

<a href="delete.php">
Delete Student
</a> -->

<br><br>

<a href="view.php">
View Students
</a>

<br><br>

<a href="logout.php">
Logout
</a>