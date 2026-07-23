<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'teacher')
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";


$section_id = $_POST['section_id'];

$student_ids = $_POST['student_id'];

$marks = $_POST['marks'];


for($i = 0; $i < count($student_ids); $i++)
{

    $student_id = $student_ids[$i];

    $mark = $marks[$i];


    $query = "INSERT INTO marks
    (student_id, section_id, marks)

    VALUES
    ('$student_id',
     '$section_id',
     '$mark')

    ON DUPLICATE KEY UPDATE
    marks='$mark'";


    mysqli_query($conn, $query);

}


echo "Marks Saved Successfully";

echo "<br><br>";

echo "<a href='my_sections.php'>
Back to Sections
</a>";

?>