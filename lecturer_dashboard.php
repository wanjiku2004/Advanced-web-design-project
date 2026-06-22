<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: LOGin.php");
    exit();
}

if($_SESSION['role'] != 'lecturer'){
    header("Location: LOGin.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Lecturer Dashboard</title>
</head>
<body>

<h1>Lecturer Dashboard</h1>

<h3>Welcome
<?php echo $_SESSION['fullname']; ?>
</h3>

<ul>
<li>Manage Courses</li>
<li>Upload Results</li>
<li>View Students</li>
<li>Attendance Records</li>
</ul>

<a href="LOgout.php">Logout</a>

</body>
</html>
