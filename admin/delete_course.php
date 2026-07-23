<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";

$id = $_GET['id'];

$query = "DELETE FROM courses
          WHERE id='$id'";

if(mysqli_query($conn, $query))
{
    header("Location: view_courses.php");
    exit();
}
else
{
    echo "Error: " . mysqli_error($conn);
}

?>