<?php

include "db.php";


// Get form data

$role = $_POST['role'];

$user_id = $_POST['user_id'];

$password = $_POST['password'];

$confirm_password = $_POST['confirm_password'];


// Check passwords

if($password != $confirm_password)
{
    die("Passwords do not match.");
}


// ==================================
// STUDENT REGISTRATION
// ==================================

if($role == "student")
{

    // Check Student ID

    $query = "SELECT * FROM students
              WHERE student_id='$user_id'";

    $result = mysqli_query($conn, $query);


    // Student ID not found

    if(mysqli_num_rows($result) == 0)
    {
        die("Student ID not found. Please contact the administrator.");
    }


    // Get student data

    $data = mysqli_fetch_assoc($result);

    $name = $data['name'];

    $email = $data['email'];


    // Check if already registered

    $check = "SELECT * FROM users
              WHERE username='$user_id'
              AND role='student'";

    $check_result = mysqli_query($conn, $check);


    if(mysqli_num_rows($check_result) > 0)
    {
        die("This Student ID is already registered.");
    }


    // Hash password

    $hashed_password = password_hash(
        $password,
        PASSWORD_DEFAULT
    );


    // Create student account

    $insert = "INSERT INTO users
    (fullname, username, email, password, role)

    VALUES
    ('$name',
     '$user_id',
     '$email',
     '$hashed_password',
     'student')";


    if(mysqli_query($conn, $insert))
    {
        echo "Student account created successfully.";

        echo "<br><br>";

        echo "<a href='login.php'>
                Go to Login
              </a>";
    }
    else
    {
        echo "Registration Failed: "
             . mysqli_error($conn);
    }

}


// ==================================
// TEACHER REGISTRATION
// ==================================

elseif($role == "teacher")
{

    // Check Teacher ID

    $query = "SELECT * FROM teachers
              WHERE teacher_id='$user_id'";

    $result = mysqli_query($conn, $query);


    // Teacher ID not found

    if(mysqli_num_rows($result) == 0)
    {
        die("Teacher ID not found. Please contact the administrator.");
    }


    // Get teacher data

    $data = mysqli_fetch_assoc($result);

    $name = $data['name'];

    $email = $data['email'];


    // Check if already registered

    $check = "SELECT * FROM users
              WHERE username='$user_id'
              AND role='teacher'";

    $check_result = mysqli_query($conn, $check);


    if(mysqli_num_rows($check_result) > 0)
    {
        die("This Teacher ID is already registered.");
    }


    // Hash password

    $hashed_password = password_hash(
        $password,
        PASSWORD_DEFAULT
    );


    // Create teacher account

    $insert = "INSERT INTO users
    (fullname, username, email, password, role)

    VALUES
    ('$name',
     '$user_id',
     '$email',
     '$hashed_password',
     'teacher')";


    if(mysqli_query($conn, $insert))
    {
        echo "Teacher account created successfully.";

        echo "<br><br>";

        echo "<a href='login.php'>
                Go to Login
              </a>";
    }
    else
    {
        echo "Registration Failed: "
             . mysqli_error($conn);
    }

}


else
{
    echo "Invalid Registration Role.";
}

?>