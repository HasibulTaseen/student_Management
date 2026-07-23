<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";

$courses = mysqli_query(
    $conn,
    "SELECT * FROM courses"
);

$teachers = mysqli_query(
    $conn,
    "SELECT * FROM teachers"
);

?>

<!DOCTYPE html>
<html>

<head>

<title>Create Section</title>

</head>

<body>

<h2>Create Section</h2>

<form action="insert_section.php" method="POST">

<label>Section Name</label>

<input type="text" name="section_name" required>

<br><br>


<label>Select Course</label>

<select name="course_code" required>

<option value="">
Select Course
</option>

<?php

while($course = mysqli_fetch_assoc($courses))
{

?>

<option value="<?php echo $course['course_code']; ?>">

<?php echo $course['course_code']; ?>

-

<?php echo $course['course_name']; ?>

</option>

<?php

}

?>

</select>

<br><br>


<label>Select Teacher</label>

<select name="teacher_id" required>

<option value="">
Select Teacher
</option>

<?php

while($teacher = mysqli_fetch_assoc($teachers))
{

?>

<option value="<?php echo $teacher['teacher_id']; ?>">

<?php echo $teacher['teacher_id']; ?>

-

<?php echo $teacher['name']; ?>

</option>

<?php

}

?>

</select>

<br><br>


<button type="submit">
Create Section
</button>

</form>

<br>

<a href="section_info.php">
Back
</a>

</body>

</html>