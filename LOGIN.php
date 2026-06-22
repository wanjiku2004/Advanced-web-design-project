<?php
session_start();
include("dBConnect.php");

$message = "";

if(isset($_POST['login'])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM students WHERE email='$email'";
    $result = $conn->query($sql);
    
    if($result->num_rows > 0){
        
        $row = $result->fetch_assoc();
        
        if(password_verify($password, $row['password'])){
            
            $_SESSION['student_id'] = $row['id'];
            $_SESSION['fullname'] = $row['fullname'];
            
            header("Location: Dashboard.php");
            exit();
            
        }else{
            $message = "Incorrect Password";
        }
        
    }else{
        $message = "Student Not Found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Login</title>
</head>
<body>

<h2>Student Login</h2>

<form method="POST">

<input type="email" name="email" placeholder="Email" required><br><br>

<input type="password" name="password" placeholder="Password" required><br><br>

<button type="submit" name="login">Login</button>

</form>

<p><?php echo $message; ?></p>

<a href="register.php">Create Account</a>

</body>
</html>
