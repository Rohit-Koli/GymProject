<?php 
session_start();
?>
<?php
	
	$userLogin=$_SESSION['email'];
	if ($userLogin==false) {
		header('location:login.php');
	}
?>
<?php 
error_reporting(0);
include '../user/include/_dbconnect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- <link rel="shortcut icon" href="../user/assets/images/admin_profile.png" type="image/x-icon"> -->
    <!-- My CSS -->
    <link rel="stylesheet" href="assets/style.css">
    <title>Users</title>
</head>

<body>
<!-- <?php // include 'include/header.php'; ?> -->

    <?php include 'include/sidebar.php'; ?>

    <section id="content">
		
		<?php include'include/header.php';?>
		<!-- MAIN -->
		<main>
			<div class="table-data" id="table-data">
            <div class="order" id="users">
            <div class="head">
                <h3>Subscribers</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Plan Name</th>
                        <th>Price</th>
                        <th>Duration</th>
                        <th>Purchase Date</th>
                        <th>Expiry Date</th>
                        <th>Fees Status</th>
                        <!-- <th>Mobile No</th> -->
                        <!-- <th></th> -->
                        <th></th>
                        <th>Fees</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    include '../user/include/_dbconnect.php';

                    $sql = "SELECT * FROM `plandb` ";
                    $result = mysqli_query($conn, $sql);
                    while ($rows = mysqli_fetch_assoc($result)) {

                        echo '<tr>
                                
                            <td>' . $rows['uname'] . '</td>
                            <td>' . $rows['plan_id'] . '</td>
                            <td>' . $rows['price'] . '</td>
                            <td>' . $rows['duration'] . '</td>
                            <td>' . $rows['purchase_dt'] . '</td>
                            <td>' . $rows['expiry_dt'] . '</td>
                            <td>' . $rows['fees_status'] . '</td>
                            <td><a href="Subscribers.php?id=' . $rows['srno'] . '" >Remove</a></td>
                            <td><a href="Subscribers.php?plan_status=' . $rows['srno'] . '" >Paid</a></td>
                            </tr>';
                    }
                    ?>

                    <?php
                    //  Delete user
                    if (isset($_GET['id'])) {

                        $id = $_GET['id'];
                        $sql = "DELETE  FROM `plandb` WHERE `srno`=$id";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            echo "<script>window.location.href='subscribers.php';</script>";
                            header('location:Subscribers.php');
                        }
                    }
                    ?>
                    <?php
                    //  Update user Fees Staus
                    $id = "";

                    if(isset($_GET['plan_status'])) {
                        $id = $_GET['plan_status'];
                        $sql="UPDATE `plandb` SET `fees_status` = 'Paid' WHERE `plandb`.`srno` = $id;";
                        // $sql = "UPDATE  'fees_status' FROM `plandb` WHERE `srno`=$id" SET 'fees_status'=value;
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            echo "<script>window.location.href='subscribers.php';</script>";

                            header('location:subscribers.php');
                            // header('location:Subscribers.php');
                        }else{
                            echo"<script>alert('Fail to Update Fees Status !');</script>";
                        }
                    }
                        
                    // }
                    ?>
                </tbody>
            </table>
        </div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
    <!-- <section class="table-data">
        
    </section> -->

</body>

</html>