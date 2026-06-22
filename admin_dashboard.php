<?php
session_start();

if(!isset($_SESSION['id'])){
    header("Location: LOGin.php");
    exit();
}

if($_SESSION['role'] != 'administrator'){
    header("Location: LOGin.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Administrator Dashboard</title>
</head>
<body>

<h1>Administrator Dashboard</h1>

<h3>Welcome
<?php echo $_SESSION['fullname']; ?>
</h3>

<ul>
<li>Manage Users</li>
<li>Manage Courses</li>
<li>Generate Reports</li>
<li>System Settings</li>
</ul>

<a href="LOgout.php">Logout</a>

</body>
</html>
