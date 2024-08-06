<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <title>Admin Panel</title>
    <!-- CSS -->
    <link rel="stylesheet" href="../user/assets/css/style.css">
</head>

<body>
    <div class="login-window">
        <h1>
            Admin Login Only
        </h1>
        <form action="login.php" method="post">
            <center>
                <input type="email" name="email" id="email" placeholder="Enter Registered Email ID">
                <input type="password" name="pass" id="pass" placeholder="Enter Password">
                <button type="submit" class="f-btn">Submit</button>
                <button type="reset" class="f-btn">Reset</button>
            </center>
        </form>
        <?php
        $login = false;
        $ShowError = false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            include('../user/include/_dbconnect.php');
            $conn = mysqli_connect($servername, $username, $password, $database);

            $id=0;
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            if (!$conn) {
                die("Fail TO Connect with Database ! Due to this Error" . mysqli_connect_error());
            } else {
                // $sql="SELECT * FROM 'admindb' WHERE email='$email' AND password='$pass'";
                $sql="Select * from admindb where email='$email' AND password='$pass'";
                $res = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($res);
                if ($num == 1) {
                    $login = true;
                    session_start();
                    $_SESSION['srno']=$id;
                    $_SESSION['email']=$email;
                    header('location:index.php');
                } else {
                    echo "<script>alert('Invalid Login Credentials !')</script>";
                }
            }
        }
        if ($login==true) {
            header('location:index.php');
        }

        ?>
        
    </div>
</body>

</html>