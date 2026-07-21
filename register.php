<!DOCTYPE html>
<html>

<head>

    <title>Create Account</title>

</head>

<body>

<h2>Create Account</h2>

<form action="register_process.php" method="POST">

    <label>Register As</label>

    <select name="role" required>

        <option value="">
            -- Select Role --
        </option>

        <option value="student">
            Student
        </option>

        <option value="teacher">
            Teacher
        </option>

    </select>

    <br><br>


    <label>Student ID / Teacher ID</label>

    <input type="text" name="user_id" required>

    <br><br>


    <label>Password</label>

    <input type="password" name="password" required>

    <br><br>


    <label>Confirm Password</label>

    <input type="password" name="confirm_password" required>

    <br><br>


    <button type="submit">
        Create Account
    </button>

</form>

<br>

<a href="login.php">
    Back to Login
</a>

</body>

</html>