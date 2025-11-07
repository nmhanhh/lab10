<?php
    session_start();
    if (!isset($_SESSION['username'])){
        header("Location: login.php");
        exit;
    }
    $conn = @mysqli_connect("localhost","root","","user");

    $newEmail = $_POST['newEmail'];
    $username = $_SESSION['username'];

    $sql= "UPDATE `user` SET email='$newEmail' WHERE username='$username'";
    mysqli_query($conn, $sql);

    header("Location: profile.php");
    exit;
?>