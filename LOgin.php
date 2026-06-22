<?php
session_start();
include("DBConnect.php");

$message = "";

if(isset($_POST['login'])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM employees
    WHERE email='$email'";
    
    $result = $conn->query($sql);
    
    if($result->num_rows > 0){
        
        $employee = $result->fetch_assoc();
        
        if(password_verify(
            $password,
            $employee['password']
        )){
            
            $_SESSION['employee_id']
            = $employee['employee_id'];
            
            $_SESSION['fullname']
            = $employee['fullname'];
            
            $_SESSION['department']
            = $employee['department'];
            
            header("Location: DAshboard.php");
            exit();
            
        }else{
            $message = "Incorrect Password";
        }
        
    }else{
        $message = "Employee Not Found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Employee Login</title>
</head>
<body>

<h2>Employee Login</h2>

<form method="POST">

<label>Email</label><br>
<input type="email" name="email" required><br><br>

<label>Password</label><br>
<input type="password" name="password" required><br><br>

<button type="submit" name="login">
Login
</button>

</form>

<p><?php echo $message; ?></p>

<a href="Register.php">Register</a>

</body>
</html>
