<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'student')
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";


$student_id = $_SESSION['username'];


$query = "SELECT marks.marks,
                 sections.section_name,
                 sections.course_code,
                 courses.course_name

          FROM marks

          JOIN sections
          ON marks.section_id = sections.id

          JOIN courses
          ON sections.course_code = courses.course_code

          WHERE marks.student_id='$student_id'";


$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

<title>My Marks</title>

</head>

<body>

<h2>My Marks</h2>

<table border="1" cellpadding="10">

<tr>

<th>Course Code</th>

<th>Course Name</th>

<th>Section</th>

<th>Marks</th>

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
<?php echo $row['marks']; ?>
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