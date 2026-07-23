<?php

session_start();

if(!isset($_SESSION['username']) || $_SESSION['role'] != 'teacher')
{
    header("Location: ../login.php");
    exit();
}

include "../db.php";

$teacher_id = $_SESSION['username'];

$query = "SELECT * FROM teachers
          WHERE teacher_id='$teacher_id'";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0)
{
    $teacher = mysqli_fetch_assoc($result);
}
else
{
    echo "Teacher information not found.";
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Teacher Dashboard</title>

</head>

<body>

<h1>Teacher Dashboard</h1>

<h3>
Welcome, <?php echo $teacher['name']; ?>
</h3>

<p>
Teacher ID:
<?php echo $teacher['teacher_id']; ?>
</p>


<button onclick="showInfo()">
Show My Information
</button>

<button onclick="hideInfo()">
Hide Information
</button>


<br><br>


<div id="teacherInfo" style="display:none;">

<h2>My Information</h2>

<table border="1" cellpadding="10">

<tr>
    <th>Teacher ID</th>
    <td><?php echo $teacher['teacher_id']; ?></td>
</tr>

<tr>
    <th>Name</th>
    <td><?php echo $teacher['name']; ?></td>
</tr>

<tr>
    <th>Department</th>
    <td><?php echo $teacher['department']; ?></td>
</tr>

<tr>
    <th>Email</th>
    <td><?php echo $teacher['email']; ?></td>
</tr>

<tr>
    <th>Phone</th>
    <td><?php echo $teacher['phone']; ?></td>
</tr>

</table>

</div>


<br><br>
<br><br>

<a href="my_sections.php">
My Assigned Sections
</a>
<a href="../logout.php">
Logout
</a>


<script>

function showInfo()
{
    document.getElementById("teacherInfo").style.display = "block";
}

function hideInfo()
{
    document.getElementById("teacherInfo").style.display = "none";
}

</script>

</body>

</html>