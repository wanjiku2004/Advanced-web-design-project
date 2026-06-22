<?php
session_start();

if(!isset($_SESSION['employee_id'])){
    header("Location: LOgin.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Employee Dashboard</title>
</head>
<body>

<h1>Employee Dashboard</h1>

<h3>
Welcome,
<?php echo $_SESSION['fullname']; ?>
</h3>

<p>
Department:
<?php echo $_SESSION['department']; ?>
</p>

<hr>

<h3>Employee Services</h3>

<ul>
<li>View Profile</li>
<li>Leave Application</li>
<li>Payroll Information</li>
<li>Performance Reports</li>
<li>Company Announcements</li>
</ul>

<a href="profile.php">Profile Page</a><br><br>

<a href="LOGOUT.php">Logout</a>

</body>
</html>
