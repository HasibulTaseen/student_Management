<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";


$teacher_id = $_POST['teacher_id'];

$name = $_POST['name'];

$department = $_POST['department'];

$email = $_POST['email'];

$phone = $_POST['phone'];


$query = "INSERT INTO teachers
(teacher_id, name, department, email, phone)

VALUES
('$teacher_id',
 '$name',
 '$department',
 '$email',
 '$phone')";


$result = mysqli_query($conn, $query);


if($result)
{
    echo "Teacher Added Successfully";

    echo "<br><br>";

    echo "<a href='view_teachers.php'>
            View Teachers
          </a>";

    echo "<br><br>";

    echo "<a href='teacher_info.php'>
            Back
          </a>";
}
else
{
    echo "Error: " . mysqli_error($conn);
}

?>