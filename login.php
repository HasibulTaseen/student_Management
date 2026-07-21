<!DOCTYPE html>
<html>
   <div class="img_login">
        <img src="image/diu img.jpg" alt="">
    </div>

<head>

    <title>Student Management System</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="LogIn">

<h1 class="banner_text">Student Management System</h1>

<h3>Daffodil International University</h3>

<form action="authenticate.php" method="POST">

<label>Login As</label>

<select name="role" required>

    <option value="">-- Select Role --</option>

    <option value="admin">Admin</option>

    <option value="teacher">Teacher</option>

    <option value="student">Student</option>

</select>

<br><br>

<label>Username</label>

<input type="text" name="username" required>

<br><br>

<label>Password</label>

<input type="password" name="password" required>

<br><br>

<button class="btn_primary" type="submit">
Login
</button>

</form>

<br>

<p>
Don't have an account?
<a href="register.php">Create Account</a>
</p>

</div>

</body>

</html>