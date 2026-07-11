<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("Location: ../login.php");
    exit();
}


include "../db.php";


$query="SELECT * FROM students";


$result=mysqli_query($conn,$query);


?>


<!DOCTYPE html>
<html>


<head>

<title>View Students</title>

</head>


<body>


<h2>Student List</h2>



<table border="1" cellpadding="10">


<tr>

<th>ID</th>

<th>Name</th>

<th>Department</th>

<th>Semester</th>

<th>Email</th>

<th>Phone</th>
<th>cgpa</th>

<th>Action</th>


</tr>



<?php


while($row=mysqli_fetch_assoc($result))

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


<td>
<?php echo $row['semester']; ?>
</td>


<td>
<?php echo $row['email']; ?>
</td>


<td>
<?php echo $row['phone']; ?>
</td>

<td>
<?php echo $row['cgpa']; ?>
</td>
<td>
<!-- 
<a href="delete.php?id=<?php echo $row['student_id']; ?>">

Delete

</a> -->


</td>


</tr>


<?php

}

?>


</table>


<br>


<a href="dashboard.php">

Back Dashboard

</a>


</body>


</html>