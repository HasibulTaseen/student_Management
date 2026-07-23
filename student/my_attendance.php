<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'student')
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";


$student_id = $_SESSION['username'];


$query = "SELECT
          sections.course_code,
          sections.section_name,
          courses.course_name,

          COUNT(attendance.id) AS total_classes,

          SUM(
              CASE
              WHEN attendance.status='Present'
              THEN 1
              ELSE 0
              END
          ) AS present_classes

          FROM attendance

          JOIN sections
          ON attendance.section_id = sections.id

          JOIN courses
          ON sections.course_code = courses.course_code

          WHERE attendance.student_id='$student_id'

          GROUP BY attendance.section_id";


$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

<title>My Attendance</title>

</head>

<body>

<h2>My Attendance</h2>

<table border="1" cellpadding="10">

<tr>

<th>Course Code</th>

<th>Course Name</th>

<th>Section</th>

<th>Total Classes</th>

<th>Present</th>

<th>Attendance %</th>

</tr>


<?php

while($row = mysqli_fetch_assoc($result))
{

$total = $row['total_classes'];

$present = $row['present_classes'];


if($total > 0)
{
    $percentage = ($present / $total) * 100;
}
else
{
    $percentage = 0;
}

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
<?php echo $total; ?>
</td>

<td>
<?php echo $present; ?>
</td>

<td>
<?php echo number_format($percentage, 2); ?>%
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