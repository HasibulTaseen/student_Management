<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";

if(isset($_POST['student_id']))
{

    $student_id = $_POST['student_id'];

    $query = "SELECT student_id, name, cgpa
              FROM students
              WHERE student_id='$student_id'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
    }
    else
    {
        echo "<h2>No student found!</h2>";
        exit();
    }

}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Student Result</title>

</head>

<body>

<h2>Student Result</h2>

<table border="1" cellpadding="10">

<tr>
    <th>Student ID</th>
    <td><?php echo $row['student_id']; ?></td>
</tr>

<tr>
    <th>Name</th>
    <td><?php echo $row['name']; ?></td>
</tr>

<tr>
    <th>CGPA</th>
    <td><?php echo $row['cgpa']; ?></td>
</tr>

</table>

<br>

<a href="dashboard.php">
Back
</a>

</body>

</html>