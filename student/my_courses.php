<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'student')
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";

$student_id = $_SESSION['username'];


$query = "SELECT course_registration.*,
                 sections.section_name,
                 sections.course_code,
                 courses.course_name,
                 teachers.name AS teacher_name

          FROM course_registration

          JOIN sections
          ON course_registration.section_id = sections.id

          JOIN courses
          ON sections.course_code = courses.course_code

          JOIN teachers
          ON sections.teacher_id = teachers.teacher_id

          WHERE course_registration.student_id='$student_id'";


$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

<title>My Courses</title>

</head>

<body>

<h2>My Registered Courses</h2>

<table border="1" cellpadding="10">

<tr>

<th>Course Code</th>

<th>Course Name</th>

<th>Section</th>

<th>Teacher</th>

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
<?php echo $row['section_name']; ?>
</td>

<td>
<?php echo $row['teacher_name']; ?>
</td>

</tr>

<?php

}

?>

</table>

<br>

<a href="dashboard.php">
Back
</a>

</body>

</html>