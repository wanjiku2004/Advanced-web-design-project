<?php
include("dBConnect.php");

$message = "";

if(isset($_POST['register'])){
    
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO students(fullname,email,password)
    VALUES('$fullname','$email','$password')";
    
    if($conn->query($sql)){
        $message = "Registration Successful!";
    }else{
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Registration</title>
</head>
<body>

<h2>Student Registration</h2>

<form method="POST">
<input type="text" name="fullname" placeholder="Full Name" required><br><br>

<input type="email" name="email" placeholder="Email" required><br><br>

<input type="password" name="password" placeholder="Password" required><br><br>

<button type="submit" name="register">Register</button>
</form>

<p><?php echo $message; ?></p>

<a href="LOGIN.php">Login Here</a>

</body>
</html>
