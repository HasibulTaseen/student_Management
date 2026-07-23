<?php

session_start();

include "db.php";

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];


// =========================
// ADMIN LOGIN
// =========================

if($role == "admin")
{
    // Change these to your actual Admin username and password

    if($username == "admin" && $password == "admin123")
    {
        $_SESSION['username'] = "admin";
        $_SESSION['role'] = "admin";

        header("Location: admin/dashboard.php");
        exit();
    }
    else
    {
        echo "Wrong Admin Username or Password.";
        exit();
    }
}


// =========================
// STUDENT / TEACHER LOGIN
// =========================

$query = "SELECT * FROM users
          WHERE username='$username'
          AND role='$role'";

$result = mysqli_query($conn, $query);


if(mysqli_num_rows($result) > 0)
{
    $user = mysqli_fetch_assoc($result);

    if(password_verify($password, $user['password']))
    {
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];


        // Teacher
        if($role == "teacher")
        {
            header("Location: teachers/dashboard.php");
            exit();
        }


        // Student
        elseif($role == "student")
        {
            header("Location: student/dashboard.php");
            exit();
        }
    }
    else
    {
        echo "Wrong Password.";
    }
}
else
{
    echo "Username or Account Not Found.";
}

?>