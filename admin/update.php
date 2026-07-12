<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if(!isset($_SESSION['username']))
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";

$student_id = $_POST['student_id'];
$name = $_POST['name'];
$department = $_POST['department'];
$semester = $_POST['semester'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$cgpa = $_POST['cgpa'];

$query = "UPDATE students SET

name='$name',
department='$department',
semester='$semester',
email='$email',
phone='$phone',
cgpa='$cgpa'

WHERE student_id='$student_id'";

$result = mysqli_query($conn,$query);

if($result)
{
    header("Location: view.php");
    exit();
}
else
{
    echo "Update Failed: " . mysqli_error($conn);
}
?>