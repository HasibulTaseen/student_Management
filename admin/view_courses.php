<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";

$query = "SELECT * FROM courses";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

<title>View Courses</title>

</head>

<body>

<h2>Course List</h2>

<table border="1" cellpadding="10">

<tr>

<th>Course Code</th>

<th>Course Name</th>

<th>Credit</th>

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

<a href="delete_course.php?id=<?php echo $row['id']; ?>">
Delete
</a>

</td>

</tr>

<?php

}

?>

</table>

<br>

<a href="course_info.php">
Back
</a>

</body>

</html>