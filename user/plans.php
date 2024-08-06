<?php
include "include/_dbconnect.php";
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("location:login.php");
    exit;
}

$user = $_SESSION['u_data'];

$uname = $user[1];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Fitness Plans , Royal Gym</title>
</head>

<body>
    <?php include 'include/header.php' ?>
    <hr style="width:100%;">
    <div class="plan-section" style="margin:20px;">



        <div class="con-items ">
            <div class="item item1">
                <div class="con-img">
                    <img src="1-3.png" alt="">
                </div>
                <header>
                    <form action="plans.php" method="post">
                        <h3>Basic</h3>
                        <p>
                            <b>
                                ₹800 / user Per Month
                            </b>
                        </p>
                </header>
                <ul>
                    <li>
                        <i class='bx bx-check'></i>
                        Get started with <b>Fully Basics </b>
                    </li>
                </ul>

                <!-- <a href="userdetails.php"> -->
                <?php


                $sql = "SELECT * FROM `plandb` WHERE `plan_id`='Basic' AND `uname`='$uname'";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if ($num > 0) {

                    echo ' <input type="text" readOnly value="Already Choosed" name="plan1" id="1Months-plan" class="border">';
                } else {
                    echo ' <input type="submit" value="Choose Plan" name="plan1" id="1Months-plan" class="border">';
                }



                ?>


                </form>
                <?php


                // if(!isset)


                // if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {


                $currentdt = new DateTime();
                $currentdt1 = $currentdt->format('d-m-Y');
                $expdate = $currentdt->add(new DateInterval('P1M'));
                $expdate1 = $expdate->format('d-m-Y');
                // $user=$_SESSION['u_data'];                 

                if (isset($_POST['plan1'])) {


                    $existSql = "SELECT * FROM `plandb` WHERE `uname`='$uname'";
                    $result = mysqli_query($conn, $existSql);
                    $numExistRows = mysqli_num_rows($result);
                    if ($numExistRows > 0) {
                        $ShowError = "User Has already choosen a plan";
                        echo "<script>alert('$ShowError');</script>";
                    } else {


                        $sql = "INSERT into `plandb`(`uname`,`plan_id`,`price`,`duration`,`purchase_dt`,`expiry_dt`) values('$user[1]','Basic','800','1 Month','$currentdt1','$expdate1')";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            // echo "<script>alert('Plan Purchased Successfully !');</script>";
                            echo "<script>window.location.href='plans.php';</script>";
                            header('location:plans.php');
                        }
                    }
                }




                ?>


                <!-- </a> -->
                <!-- <a href="userdetails.php" class="btn">Choose Plan </a> -->
            </div>
            <div class="item color item2">
                <div class="con-img">
                    <img src="2-1.png" alt="">
                </div>
                <span class="badge">
                    Popular
                </span>
                <header>
                    <form action="plans.php" method="post">
                        <h3>Pro</h3>
                        <p>
                            <b>
                                ₹2400 / user For 3 Months
                            </b>
                        </p>
                </header>
                <ul>
                    <li>
                        <i class='bx bx-check'></i>
                        All features in <b>Basic</b>
                    </li>
                    <li>
                        <i class='bx bx-check'></i>
                        Smart <b>Workout Plan</b>
                    </li>
                </ul>
                <!-- <button class="border" id="3Months-plan">
                    Choose Plan 
                </button> -->


                <?php


                $sql = "SELECT * FROM `plandb` WHERE `plan_id`='Pro' AND `uname`='$uname'";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if ($num > 0) {

                    echo ' <input type="text" readOnly value="Already Choosed" name="plan2" id="3Months-plan" class="border">';
                } else {
                    echo ' <input type="submit" value="Choose Plan" name="plan2" id="3Months-plan" class="border">';
                }



                ?>


                </form>
                <?php



                $currentdt = new DateTime();
                $currentdt1 = $currentdt->format('d-m-Y');
                $expdate = $currentdt->add(new DateInterval('P3M'));
                $expdate1 = $expdate->format('d-m-Y');

                if (isset($_POST['plan2'])) {

                    $user = $_SESSION['u_data'];

                    $uname = $user[1];
                    $existSql = "SELECT * FROM `plandb` WHERE `uname`='$uname'";
                    $result = mysqli_query($conn, $existSql);
                    $numExistRows = mysqli_num_rows($result);
                    if ($numExistRows > 0) {
                        $ShowError = "User Has already choosen a plan";
                        echo "<script>alert('$ShowError');</script>";
                    } else {

                        $sql = "INSERT into `plandb`(`uname`,`plan_id`,`price`,`duration`,`purchase_dt`,`expiry_dt`) values('$user[1]','Pro','2400','3 Month','$currentdt1','$expdate1')";

                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            // echo "<script>alert('Plan Purchased Successfully !');</script>";
                            echo "<script>window.location.href='plans.php';</script>";
                            header('location:plans.php');
                        }
                    }
                }
                ?>
            </div>
            <div class="item item3">
                <div class="con-img">
                    <img src="3-1.png" alt="">
                </div>
                <header>
                    <form action="plans.php" method="post">
                        <h3>Ultimate</h3>
                        <p>
                            <b>
                                ₹4500/ user For 6 Months
                            </b>
                        </p>
                </header>
                <ul>
                    <li>
                        <i class='bx bx-check'></i>
                        All features in <b>Ultimate</b>
                    </li>
                    <li>
                        <i class='bx bx-check'></i>
                        Smart <b>Workout Plan</b>
                    </li>
                    <li>
                        <i class='bx bx-check'></i>
                        <b>Personal</b> Trainer For 6 Months
                    </li>
                </ul>
                <!-- <button id="6Month-plan">
                    Choose Plan 
                </button> -->
                <?php


                $sql = "SELECT * FROM `plandb` WHERE `plan_id`='Ultimate' AND `uname`='$uname'";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                if ($num > 0) {

                    echo ' <input type="text" readOnly value="Already Choosed" name="plan3" id="6Months-plan" class="border">';
                } else {
                    echo ' <input type="submit" value="Choose Plan" name="plan3" id="6Months-plan" class="border">';
                }



                ?>


                </form>
                <?php
                $currentdt = new DateTime();
                $currentdt1 = $currentdt->format('d-m-Y');
                $expdate = $currentdt->add(new DateInterval('P6M'));
                $expdate1 = $expdate->format('d-m-Y');
                // $user=$_SESSION['u_data'];                 

                if (isset($_POST['plan3'])) {

                    $user = $_SESSION['u_data'];

                    $uname = $user[1];
                    $existSql = "SELECT * FROM `plandb` WHERE `uname`='$uname'";
                    $result = mysqli_query($conn, $existSql);
                    $numExistRows = mysqli_num_rows($result);
                    if ($numExistRows > 0) {
                        $ShowError = "User Has already choosen a plan";
                        echo "<script>alert('$ShowError');</script>";
                    } else {

                        $sql = "INSERT into `plandb`(`uname`,`plan_id`,`price`,`duration`,`purchase_dt`,`expiry_dt`) values('$user[1]','Ultimate','4500','6 Month','$currentdt1','$expdate1')";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            // echo "<script>alert('Plan Purchased Successfully !');</script>";
                            echo "<script>window.location.href='plans.php';</script>";
                            header('location:plans.php');
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include 'include/footer.php' ?>
</body>

</html>