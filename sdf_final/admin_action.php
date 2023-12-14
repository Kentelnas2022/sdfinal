<?php
include 'dbcon.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM tb_admin WHERE username ='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $hashedPassword = $user['password'];
   
    if (password_verify($password, $hashedPassword)) {
        session_start();
        $_SESSION['admin_id'] = $user['id'];
        $conn->close();
        header('Location: admin_dashboard.php'); // password encrypt og decrypt 
    } else {
        header("Location: admin_reglog.php?error=Middle"); // password na naka register pero wala na decrypt 
    }
} else {
    header("Location: admin_reglog.php?error=Bottom"); // password na wala pa na register
}
?>
