<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'admin')
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";


$query = "SELECT * FROM teachers";

$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>

<head>

    <title>View Teachers</title>

</head>

<body>

<h2>Teacher List</h2>

<table border="1" cellpadding="10">

<tr>

<th>Teacher ID</th>

<th>Name</th>

<th>Department</th>

<th>Email</th>

<th>Phone</th>

<th>Action</th>

</tr>


<?php

while($row = mysqli_fetch_assoc($result))
{

?>

<tr>

<td>
<?php echo $row['teacher_id']; ?>
</td>

<td>
<?php echo $row['name']; ?>
</td>

<td>
<?php echo $row['department']; ?>
</td>

<td>
<?php echo $row['email']; ?>
</td>

<td>
<?php echo $row['phone']; ?>
</td>

<td>

<a href="delete_teacher.php?id=<?php echo $row['teacher_id']; ?>">
Delete
</a>

</td>

</tr>

<?php

}

?>

</table>

<br>

<a href="teacher_info.php">
Back
</a>

</body>

</html>