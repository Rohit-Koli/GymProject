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
                        <h3>Plan Details</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Sr Number</th>
                                <th>Plan Name</th>
                                <th>Duration</th>
                                <th>Price</th>
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
                            $sql = "SELECT * FROM `plans`";
                            $result = mysqli_query($conn, $sql);
                            while ($rows = mysqli_fetch_assoc($result)) {
                                echo '<tr>                                
                            <td>' . $rows['srno'] . '</td>
                            <td>' . $rows['plan_id'] . '</td>
                            <td>' . $rows['price'] . '</td>
                            <td>' . $rows['duration'] . '</td>
                            <td><a href="plans.php?sno=' . $rows['srno'] . '" >Remove</a></td>
                            </tr>';
                            }
                            ?>

                            <?php
                            //  Delete user
                            if (isset($_GET['sno'])) {

                                $s = $_GET['sno'];
                                // $sql2 = "DELETE  FROM `plans' WHERE srno=$id";
                                $sql2="DELETE FROM plans WHERE `plans`.`srno` = $s";
                                $res = mysqli_query($conn, $sql2);
                                if ($res) {
                                    echo "<script>alert('Plan is Deleted !');</script>";
                                    header('location:plans.php');
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