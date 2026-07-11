<?php

include "../db.php";


$student_id = $_POST['student_id'];
$name = $_POST['name'];
$department = $_POST['department'];
$semester = $_POST['semester'];
$email = $_POST['email'];
$phone = $_POST['phone'];



$query = "INSERT INTO students
(student_id, name, department, semester, email, phone)

VALUES

('$student_id',
'$name',
'$department',
'$semester',
'$email',
'$phone')";



$result = mysqli_query($conn, $query);



if($result)
{

    echo "Student Added Successfully";

    echo "<br>";

    echo "<a href='view.php'>View Students</a>";

}
else
{

    echo "Insert Failed: " . mysqli_error($conn);

}


?>