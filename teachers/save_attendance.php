<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'teacher')
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";


$section_id = $_POST['section_id'];

$attendance_date = $_POST['attendance_date'];

$student_ids = $_POST['student_id'];

$statuses = $_POST['status'];


for($i = 0; $i < count($student_ids); $i++)
{

    $student_id = $student_ids[$i];

    $status = $statuses[$i];


    $query = "INSERT INTO attendance
    (student_id,
     section_id,
     attendance_date,
     status)

    VALUES
    ('$student_id',
     '$section_id',
     '$attendance_date',
     '$status')";


    mysqli_query($conn, $query);

}


echo "Attendance Saved Successfully";

echo "<br><br>";

echo "<a href='my_sections.php'>
Back to Sections
</a>";

?>