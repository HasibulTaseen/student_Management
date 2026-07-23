<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";


$section_name = $_POST['section_name'];

$course_code = $_POST['course_code'];

$teacher_id = $_POST['teacher_id'];


$query = "INSERT INTO sections
(section_name, course_code, teacher_id)

VALUES
('$section_name',
 '$course_code',
 '$teacher_id')";


if(mysqli_query($conn, $query))
{
    echo "Section Created Successfully";

    echo "<br><br>";

    echo "<a href='view_sections.php'>
    View Sections
    </a>";
}
else
{
    echo "Error: " . mysqli_error($conn);
}

?>