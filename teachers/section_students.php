<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'teacher')
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";


$teacher_id = $_SESSION['username'];

$section_id = $_GET['id'];


$query = "SELECT students.student_id,
                 students.name,
                 students.department

          FROM course_registration

          JOIN students
          ON course_registration.student_id = students.student_id

          JOIN sections
          ON course_registration.section_id = sections.id

          WHERE course_registration.section_id='$section_id'

          AND sections.teacher_id='$teacher_id'";


$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

<title>Section Students</title>

</head>

<body>

<h2>Registered Students</h2>

<table border="1" cellpadding="10">

<tr>

<th>Student ID</th>

<th>Name</th>

<th>Department</th>

</tr>


<?php

while($row = mysqli_fetch_assoc($result))
{

?>

<tr>

<td>
<?php echo $row['student_id']; ?>
</td>

<td>
<?php echo $row['name']; ?>
</td>

<td>
<?php echo $row['department']; ?>
</td>

</tr>

<?php

}

?>

</table>

<br>

<a href="my_sections.php">
Back
</a>

</body>

</html>