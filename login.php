<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="profile.php" method="POST">
        <input type="text" name="username" placeholder="Your username" required><br>
        <input type="text" name="password" placeholder="Your password" required><br>
        <button type="submit">Login</button>
    </form>
    <?php
        session_start();
        $conn = @mysqli_connect("localhost","root","","user");
        if (!$conn){
            die ("Connection failed: " . mysqli_connect_error());
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $username = $_POST["username"];
            $password = $_POST["password"];

            $query ="SELECT*FROM `user` WHERE username='$username' AND password='$password'";
            $result= mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1){
                $_SESSION['username'] = $username;
                header("Location: profile.php");
                exit;
            }else{
                echo "<p>Incorrect username or password</p>";
            }
        }
    ?>
</body>
</html>