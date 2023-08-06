<?php
include 'config.php';
$userId = $_GET['id'];

$sql = "DELETE FROM user WHERE user_id= $userId";

if (mysqli_query($conn, $sql)) {
    header('Location: http://localhost/Pondit%20Code/news-site/admin/users.php');
}
?>