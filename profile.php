<?php
    session_start();
    if (!isset($_SESSION['username'])){ //if username isn't empty
        header("Location: login.php");
        exit;
    }

    $conn = @mysqli_connect("localhost","root","","user");

    $username = $_SESSION['username'];
    $query ="SELECT*FROM `user` WHERE username='$username'";
    $result= mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result); //fetch next row
?>
<h1>My Profile</h1>
<p><strong>Username: </strong><?php echo $user['username']; ?></p>
<p><strong>Email: </strong><?php echo $user['email']; ?></p>

<h1>Edit Email</h1>
<form action="update_profile.php" method="POST">
    <input type="email" name="newEmail" placeholder="Your New Email" required>
    <button type="submit">Update</button>
</form>
