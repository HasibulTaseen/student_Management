<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("Location: login.php");
    exit();
}

?>

<h1>
Welcome <?php echo $_SESSION['username']; ?>
</h1>


<!-- <a href="index.php">
Add Student
</a>

<br><br>

<a href="delete.php">
Delete Student
</a> -->

<br><br>

<a href="view.php">
View Students
</a>

<br><br>

<!-- <a href="logout.php">
Logout
</a> -->

<?php

// session_start();

// if(!isset($_SESSION['username']))
// {
//     header("Location: ../login.php");
//     exit();
// }

?>

<!DOCTYPE html>
<html>

<head>

    <title>Student Dashboard</title>

</head>

<body>

<h2>Check Your CGPA</h2>

<form action="result.php" method="POST">

    <label>Student ID</label>

    <input type="text" name="student_id" required>

    <br><br>

    <button type="submit">
        Search CGPA
    </button>

</form>

<br>

<a href="logout.php">Logout</a>

</body>

</html>