<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'teacher')
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";


$teacher_id = $_SESSION['username'];


$query = "SELECT sections.*,
                 courses.course_name,
                 courses.credit

          FROM sections

          JOIN courses
          ON sections.course_code = courses.course_code

          WHERE sections.teacher_id='$teacher_id'";


$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

<title>My Sections</title>

</head>

<body>

<h2>My Assigned Sections</h2>

<table border="1" cellpadding="10">

<tr>

<th>Course Code</th>

<th>Course Name</th>

<th>Section</th>

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
<?php echo $row['section_name']; ?>
</td>

<td>

<a href="section_students.php?id=<?php echo $row['id']; ?>">
View Students
</a>

<br><br>

<a href="enter_marks.php?id=<?php echo $row['id']; ?>">
Enter Marks
</a>

<br><br>

<a href="attendance.php?id=<?php echo $row['id']; ?>">
Give Attendance
</a>

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