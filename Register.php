<?php
include("DBConnect.php");

$message = "";

if(isset($_POST['register'])){
    
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO employees
    (fullname,email,department,password)
    VALUES
    ('$fullname','$email','$department','$password')";
    
    if($conn->query($sql)){
        $message = "Employee Registered Successfully";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Employee Registration</title>
</head>
<body>

<h2>Employee Registration</h2>

<form method="POST">

<label>Full Name</label><br>
<input type="text" name="fullname" required><br><br>

<label>Email</label><br>
<input type="email" name="email" required><br><br>

<label>Department</label><br>
<input type="text" name="department" required><br><br>

<label>Password</label><br>
<input type="password" name="password" required><br><br>

<button type="submit" name="register">
Register
</button>

</form>

<p><?php echo $message; ?></p>

<a href="LOgin.php">Login Here</a>

</body>
</html>
