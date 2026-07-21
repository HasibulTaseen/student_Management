<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";


if(isset($_GET['id']))
{

    $teacher_id = $_GET['id'];


    $query = "DELETE FROM teachers
              WHERE teacher_id='$teacher_id'";


    if(mysqli_query($conn, $query))
    {
        echo "Teacher Deleted Successfully";

        echo "<br><br>";

        echo "<a href='view_teachers.php'>
                Back to Teacher List
              </a>";
    }
    else
    {
        echo "Error: " . mysqli_error($conn);
    }

}

?>