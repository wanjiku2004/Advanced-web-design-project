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
<title>Employee Profile</title>
</head>
<body>

<h2>Employee Profile</h2>

<p>
Employee:
<?php echo $_SESSION['fullname']; ?>
</p>

<p>
Department:
<?php echo $_SESSION['department']; ?>
</p>

<a href="DAshboard.php">
Back to Dashboard
</a>

</body>
</html>
