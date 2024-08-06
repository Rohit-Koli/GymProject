<?php 
session_start();
error_reporting(0);
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
                        <h3>Admin Details</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Sr Number</th>
                                <th>Admin Name</th>
                                <th>Email</th>
                                <th>

                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            include '../user/include/_dbconnect.php';

                            // echo var_dump($conn)

                            // $sql = "SELECT * FROM `userdb` ";
                            // $sql = "SELECT * FROM `plans` ";
                            $sql = "SELECT * FROM `admindb`";
                            $result = mysqli_query($conn, $sql);
                            while ($rows = mysqli_fetch_assoc($result)) {
                                echo '<tr>                                
                            <td>' . $rows['srno'] . '</td>
                            <td>' . $rows['adname'] . '</td>
                            <td>' . $rows['email'] . '</td>
                            <td><a href="manage-admin.php?sno=' . $rows['srno'] . '" >Remove</a></td>
                            <td><a href="admin-edit.php?edit=' . $rows['srno'] . '" >Edit</a></td>
                            </tr>';
                            }
                            ?>

                            <?php
                            //  Delete user
                            if (isset($_GET['sno'])) {

                                $s = $_GET['sno'];
                                $sql2="DELETE FROM admindb WHERE `admindb`.`srno` = $s";
                                $res = mysqli_query($conn, $sql2);
                                if ($res) {
                                    // echo "<script>alert('Admin is Deleted !');</script>";
                                    header('location:manage-admin.php');
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

</body>

</html>