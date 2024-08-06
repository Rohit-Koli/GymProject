<?php
$id="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <title>LogIn</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <?php include 'include/header.php'; ?>
    <div class="login-window">
        <h1>
            Login
        </h1>
        <form action="" method="post">
            <center>
                <input type="text" name="uname" id="uname" placeholder="Enter Registered Username*" required>
                <input type="password" name="pass" id="pass" placeholder="Enter Password*" required>
                <button type="submit" class="f-btn" onclick="sub()">Submit</button>
                <button type="reset" class="f-btn" onclick="res()">Reset</button>
            </center>
        </form>
    </div>
    <?php
    $login = false;
    $ShowError = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        include('include/_dbconnect.php');
        $conn = mysqli_connect($servername, $username, $password, $database);
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        if (!$conn) {
            die("Fail TO Connect with Database ! Due to this Error" . mysqli_connect_error());
        } else {
            // Inseating Data to Database
            // $sql="INSERT INTO `userdb` (`name`, `email`, `mobile_no`, `password`, `dt`) VALUES ('$name', '$email', '$mno', '$pass', current_timestamp());";
            $sql = "Select * from userdb where uname='$uname' AND password='$pass'";
            $res = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($res);
            if ($num == 1) {
                $login = true;
                session_start();
                $records=mysqli_fetch_assoc($res);
                $u_data=array($records['name'],$records['uname'],$records['email'],$records['mobile_no'],$records['srno']);
                $id=$u_data['4'];
                $_SESSION['loggedin'] = true;
                $_SESSION['u_data'] = $u_data;
                $_SESSION['id']=$id;
            } else {
                $ShowError = "Invalid Login Credentials !";
                echo "<script>alert('$ShowError')</script>";
            }
        }
    }

    ?>
    <?php
    if ($login == true) {
        header("location:user.php");
    }
    ?>


    <?php include 'include/footer.php'; ?>
</body>

</html>