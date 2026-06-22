<?php
session_start();
include("DBCOnnect.php");

$message = "";

if(isset($_POST['login'])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users
    WHERE email='$email'";
    
    $result = $conn->query($sql);
    
    if($result->num_rows > 0){
        
        $user = $result->fetch_assoc();
        
        if($password == $user['password']){
            
            $_SESSION['id'] = $user['id'];
        $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['role'] = $user['role'];
        
        if($user['role'] == 'student'){
            header("Location: student_dashboard.php");
        }
        
        if($user['role'] == 'lecturer'){
            header("Location: lecturer_dashboard.php");
        }
        
        if($user['role'] == 'administrator'){
            header("Location: admin_dashboard.php");
        }
        
        exit();
        
            }else{
                $message = "Invalid Password";
            }
            
    }else{
        $message = "User Not Found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>University Portal Login</title>
</head>
<body>

<h2>Login</h2>

<form method="POST">

<input type="email"
name="email"
placeholder="Email"
required><br><br>

<input type="password"
name="password"
placeholder="Password"
required><br><br>

<button type="submit"
name="login">
Login
</button>

</form>

<p><?php echo $message; ?></p>

</body>
</html>
