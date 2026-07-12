<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("Location: login.php");
    exit();
}

?>
<!-- <img src="image/AD_D.JPG" alt=""> -->
<link rel="stylesheet" href="css/style.css">
<div class="admin_dasboard">
<h1 class="admin_Welcome">
Welcome <?php echo $_SESSION['username']; ?>
</h1>

<div class="dashboard_content">
<a class="dashboard_link" href="index.php">
Add Student
</a>

<br><br>
<a class="dashboard_link" href="view.php">
Update Student
</a>

<br><br>

<a class="dashboard_link" href="delete.php">
Delete Student
</a>

<br><br>

<a class="dashboard_link" href="view.php">
View Students
</a>

<br><br>

<a class="dashboard_link" href="logout.php">
Logout
</a>
</div>
</div>