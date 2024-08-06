<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Register Page , Royal Gym</title>
</head>
<body>
    <!-- HEader -->
    <?php include 'include/header.php'; ?>
    <!-- Header End -->
    <img src="assets/images/gymBG.jpg" class="bg-image-rg" alt="">
    <div class="fname">
        <h2 class="fh3">Welcome To Registration Form Of Royal Gym</h2>
    </div>
    <form action="Register.php" method="post">
        <center>
            <input type="text" name="name" id="name" placeholder="Enter Your Name*" required><br>
            <input type="text" name="uname" id="uname" placeholder="Enter Username*" required><br>
            <input type="email" name="email" id="email "placeholder="Enter Email ID *" required><br>
            <input type="text" name="mobile" id="mobile"placeholder="Enter Your Mobile Number *" maxlength="10" minlength="10" pattern="[0-9]{10}" required><br>
            <input type="password" name="pass" id="pass"placeholder="Enter Password*"  required><br>    
            <button type="submit" class="f-btn" id="submit-btn" onclick="">Submit</button>
            <button type="reset" class="f-btn">Reset</button>
        </center>        
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            include ('include/_dbconnect.php');
            
            $name=$_POST['name'];
            $uname=$_POST['uname'];
            $mno=$_POST['mobile'];
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            $existSql="SELECT * FROM `userdb` WHERE uname='$uname';";
            $result=mysqli_query($conn,$existSql);
            $numExistRows=mysqli_num_rows($result);
            if($numExistRows > 0){
                $ShowError="Username Already Exist";
                echo "<script>alert('$ShowError');</script>";
            }
            else{
                
                $sql="INSERT INTO `userdb` (`name`, `uname`, `email`, `mobile_no`, `password`, `dt`) VALUES ('$name', '$uname', '$email', '$mno', '$pass', current_timestamp());";
                $res=mysqli_query($conn,$sql);
                if ($res) {
                    echo "<script>
                    alert('Registrition is Completed ');
                    </script>";
                }
            }
            
        }
    ?>
    <!-- Footer -->
    <?php include 'include/footer.php'; ?>
    <!-- Footer End -->
    
    <!-- Javascript File -->

    <!-- <script src="assets/Js/script.js"></script> -->
</body>
</html>