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
                 students.name

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

<title>Attendance</title>

</head>

<body>

<h2>Give Attendance</h2>

<form action="save_attendance.php" method="POST">

<input type="hidden"
       name="section_id"
       value="<?php echo $section_id; ?>">


<label>Date</label>

<input type="date"
       name="attendance_date"
       required>

<br><br>


<table border="1" cellpadding="10">

<tr>

<th>Student ID</th>

<th>Name</th>

<th>Attendance</th>

</tr>


<?php

while($row = mysqli_fetch_assoc($result))
{

?>

<tr>

<td>

<?php echo $row['student_id']; ?>

<input type="hidden"
       name="student_id[]"
       value="<?php echo $row['student_id']; ?>">

</td>

<td>

<?php echo $row['name']; ?>

</td>

<td>

<select name="status[]">

<option value="Present">
Present
</option>

<option value="Absent">
Absent
</option>

</select>

</td>

</tr>

<?php

}

?>

</table>

<br>

<button type="submit">
Save Attendance
</button>

</form>

</body>

</html>