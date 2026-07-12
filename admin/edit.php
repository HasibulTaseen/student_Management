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

if(!isset($_GET['id']))
{
    die("Student ID not found.");
}

$student_id = $_GET['id'];

$query = "SELECT * FROM students WHERE student_id='$student_id'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result)==0)
{
    die("Student not found.");
}

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>

<head>

<title>Edit Student</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="LogIn">

<h2>Update Student</h2>

<form action="update.php" method="POST">

<input type="hidden" name="student_id" value="<?php echo $row['student_id']; ?>">

<label>Name</label>
<input type="text" name="name" value="<?php echo $row['name']; ?>" required>

<br><br>

<label>Department</label>
<input type="text" name="department" value="<?php echo $row['department']; ?>" required>

<br><br>

<label>Semester</label>
<input type="number" name="semester" value="<?php echo $row['semester']; ?>" required>

<br><br>

<label>Email</label>
<input type="email" name="email" value="<?php echo $row['email']; ?>">

<br><br>

<label>Phone</label>
<input type="text" name="phone" value="<?php echo $row['phone']; ?>">

<br><br>

<label>CGPA</label>
<input type="text" name="cgpa" value="<?php echo $row['cgpa']; ?>">

<br><br>

<button type="submit">
Update Student
</button>

</form>

<br>

<a href="view.php">
Back
</a>

</div>

</body>

</html>