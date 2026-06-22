<?php
session_start();

if(!isset($_SESSION['student_id'])){
    header("Location: LOGIN.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Dashboard</title>
</head>
<body>

<h1>Student Portal Dashboard</h1>

<h3>Welcome,
<?php echo $_SESSION['fullname']; ?>
</h3>

<hr>

<h4>Student Services</h4>

<ul>
<li>View Profile</li>
<li>Course Registration</li>
<li>Exam Results</li>
<li>Fee Statement</li>
</ul>

<a href="Logout.php">Logout</a>

</body>
</html>
