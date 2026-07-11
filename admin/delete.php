<?php

include "../db.php";


if(isset($_GET['id']))
{

$id=$_GET['id'];


$query="DELETE FROM students 
WHERE student_id='$id'";


$result=mysqli_query($conn,$query);



if($result)
{

header("Location:view.php");

exit();

}

else
{

echo "Delete Failed";

}


}


?>


<!DOCTYPE html>
<html>


<head>

<title>Delete Student</title>

</head>


<body>


<h2>Delete Student</h2>



<form method="POST" action="delete.php">


Student ID:

<input type="number" name="id" required>


<br><br>


<button type="submit">

Delete Student

</button>


</form>



</body>


</html>