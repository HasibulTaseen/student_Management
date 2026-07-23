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

<title>Section Management</title>

</head>

<body>

<h2>Section Management</h2>

<br>

<a href="add_section.php">
Create Section
</a>

<br><br>

<a href="view_sections.php">
View Sections
</a>

<br><br>

<a href="dashboard.php">
Back to Dashboard
</a>

</body>

</html>