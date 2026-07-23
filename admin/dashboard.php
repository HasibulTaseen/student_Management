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


    <title>Admin Dashboard</title>
<link rel="stylesheet" href="css/style.css">
<div class="admin_dasboard">
<h1 class="admin_Welcome">


    <link rel="stylesheet" href="../css/style.css">


</head>


<body>


<div class="admin_dashboard">


<h1>
Welcome <?php echo $_SESSION['username']; ?>
</h1>


<div class="dashboard_content">


<a class="dashboard_link" href="index.php">
Add Student
</a>


<br><br>


<a class="dashboard_link" href="view.php">
View Students
</a>


<br><br>


<a class="dashboard_link" href="delete.php">
Delete Student
</a>


<br><br>


<a class="dashboard_link" href="teacher_info.php">
Teacher Information
</a>


<br><br>

<a class="dashboard_link" href="course_info.php">
Course Management
</a>

<br><br>
<a class="dashboard_link" href="section_info.php">
Section Management
</a>
<br> <br>
<a class="dashboard_link" href="../logout.php">
Logout
</a>

</div>


</div>


</body>


</html>

