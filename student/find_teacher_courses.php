<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'student')
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";

$teacher_id = $_POST['teacher_id'];


$query = "SELECT sections.*,
                 courses.course_name,
                 courses.credit,
                 teachers.name AS teacher_name

          FROM sections

          JOIN courses
          ON sections.course_code = courses.course_code

          JOIN teachers
          ON sections.teacher_id = teachers.teacher_id

          WHERE sections.teacher_id='$teacher_id'";


$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

<title>Available Courses</title>

</head>

<body>

<h2>Available Courses</h2>

<?php

if(mysqli_num_rows($result) == 0)
{

echo "No courses found for this Teacher ID.";

}
else
{

?>

<table border="1" cellpadding="10">

<tr>

<th>Course Code</th>

<th>Course Name</th>

<th>Credit</th>

<th>Section</th>

<th>Teacher</th>

<th>Action</th>

</tr>


<?php

while($row = mysqli_fetch_assoc($result))
{

?>

<tr>

<td>
<?php echo $row['course_code']; ?>
</td>

<td>
<?php echo $row['course_name']; ?>
</td>

<td>
<?php echo $row['credit']; ?>
</td>

<td>
<?php echo $row['section_name']; ?>
</td>

<td>
<?php echo $row['teacher_name']; ?>
</td>

<td>

<form action="register_course_process.php" method="POST">

<input type="hidden"
       name="section_id"
       value="<?php echo $row['id']; ?>">

<button type="submit">
Register
</button>

</form>

</td>

</tr>

<?php

}

?>

</table>

<?php

}

?>

<br>

<a href="register_course.php">
Back
</a>

</body>

</html>