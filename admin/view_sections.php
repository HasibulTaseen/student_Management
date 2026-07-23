<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";


$query = "SELECT sections.*,
                 courses.course_name,
                 teachers.name AS teacher_name

          FROM sections

          JOIN courses
          ON sections.course_code = courses.course_code

          JOIN teachers
          ON sections.teacher_id = teachers.teacher_id";


$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

<title>View Sections</title>

</head>

<body>

<h2>Section List</h2>

<table border="1" cellpadding="10">

<tr>

<th>Section</th>

<th>Course</th>

<th>Teacher ID</th>

<th>Teacher Name</th>

</tr>


<?php

while($row = mysqli_fetch_assoc($result))
{

?>

<tr>

<td>
<?php echo $row['section_name']; ?>
</td>

<td>
<?php echo $row['course_code']; ?>
</td>

<td>
<?php echo $row['teacher_id']; ?>
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

<a href="section_info.php">
Back
</a>

</body>

</html>