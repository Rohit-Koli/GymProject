<?php 
error_reporting(0);
?>
<?php 
session_start();
?>
<?php
	
	$userLogin=$_SESSION['email'];
	if ($userLogin==false) {
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
                <h3>Registered Users</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Mobile No</th>
                        <th>
                            
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    include '../user/include/_dbconnect.php';

                    // echo var_dump($conn)

                    $sql = "SELECT * FROM `userdb` ";
                    $result = mysqli_query($conn, $sql);
                    while ($rows = mysqli_fetch_assoc($result)) {
                        echo '<tr>                                
                            <td>' . $rows['name'] . '</td>
                            <td>' . $rows['uname'] . '</td>
                            <td>' . $rows['email'] . '</td>
                            <td>' . $rows['mobile_no'] . '</td>
                            <td><a href="register-users.php?id=' . $rows['srno'] . '" >Remove</a></td>                            
                            <td><a href="register-users-edit.php?edit=' . $rows['srno'] . '" >Edit</a></td>
                            </tr>';
                    }
                    ?>

                    <?php
                    //  Delete user
                    if (isset($_GET['id'])) {

                        $id = $_GET['id'];
                        $sql = "DELETE  FROM `userdb` WHERE `srno`=$id";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            echo "<script>window.location.href='register-users.php';</script>";
                            header('location:register-users.php');
                        }
                    }
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