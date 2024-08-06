<?php 
session_start();
?>
<?php
	
	$AdminEmail=$_SESSION['email'];
	if ($AdminEmail==false) {
		header('location:login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/style.css">
    <title>Plans</title>
</head>

<body>
    <!-- <?php // include 'include/header.php'; 
            ?> -->

    <?php include 'include/sidebar.php'; ?>

    <section id="content">

        <?php include 'include/header.php'; ?>
        <!-- MAIN -->
        <main>
            <div class="table-data" id="table-data">
                <div class="order" id="users">
                    <div class="head">
                        <h3>New Admin Registration</h3>
                    </div>
                    <form action="new-admin.php" method="post">
                        <input type="text" name="name" id="name" placeholder="Admin Name*" required><br>
                        <input type="email" name="email" id="email" placeholder="Email*" required><br>
                        <input type="password" name="pass" id="pass" placeholder="password*" required><br>
                        <button type="submit" class="f-btn">Submit</button>
                        <button type="reset" class="f-btn">Reset</button>
                    </form>
                    <?php
                    // if (condition) {
                        # code...
                        // INSERT INTO `admindb` (`srno`, `adname`, `email`, `password`) VALUES (NULL, 'rohit', 'rk@mail.com', '123');
                    // }

                    ?>
                    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            include ('../user/include/_dbconnect.php');
            
            $name=$_POST['name'];
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            $existSql="SELECT * FROM `admindb` WHERE email='$email';";
            $result=mysqli_query($conn,$existSql);
            $numExistRows=mysqli_num_rows($result);
            if($numExistRows > 0){
                $ShowError="Email already Exist";
                echo "<script>alert('$ShowError');</script>";
            }
            else{
                
                $sql=" INSERT INTO `admindb` (`adname`, `email`, `password`) VALUES ('$name', '$email', '$pass');";
                // $sql="INSERT INTO `userdb` (`name`, `uname`, `email`, `mobile_no`, `password`, `dt`) VALUES ('$name', '$uname', '$email', '$mno', '$pass', current_timestamp());";
                $res=mysqli_query($conn,$sql);
                if ($res) {
                    echo "<script>
                    alert('Registrition is Completed ');
                    </script>";
                }
            }
            
        }
    ?>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>

</body>

</html>