<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: LOGin.php");
    exit();
}

if($_SESSION['role'] != 'student'){
    header("Location: LOGin.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Dashboard</title>
</head>
<body>

<h1>Student Dashboard</h1>

<h3>Welcome
<?php echo $_SESSION['fullname']; ?>
</h3>

<ul>
<li>View Courses</li>
<li>Check Results</li>
<li>View Timetable</li>
<li>Fee Statement</li>
</ul>

<a href="LOgout.php">Logout</a>

</body>
</html>
