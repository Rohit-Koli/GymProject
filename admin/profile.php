<?php 
session_start();
?>
<?php
	
	$AdminEmail=$_SESSION['email'];
    $id=$_SESSION['srno'];
	if ($AdminEmail==false) {
		header('location:login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="shortcut icon" href="../user/assets/images/admin_profile.png" type="image/x-icon">
	<!-- My CSS -->
	<link rel="stylesheet" href="assets/style.css">

	<title>Admin Profile</title>
</head>
<body>
	<!-- SIDEBAR -->
	<?php include'include/sidebar.php';?>
	<!-- CONTENT -->
	<section id="content">
		
		<?php include'include/header.php';?>
		<!-- MAIN -->
		<main>
            <div class="table-data" id="table-data">
                <div class="order" id="users">
                    <div class="head">
                        <h3>Admin Profile</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Srno</th>
                                <th>Admin Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>

                                </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id=$AdminEmail;
                            // echo $id;
                            include '../user/include/_dbconnect.php';
                            $sql = "SELECT * FROM `admindb` WHERE `email`='$id';";
                            $result = mysqli_query($conn, $sql);
                            while ($rows = mysqli_fetch_assoc($result)) {
                                echo '<tr>                                
                            <td>' . $rows['srno'] . '</td>
                            <td>' . $rows['adname'] . '</td>
                            <td>' . $rows['email'] . '</td>
                            <td>' . $rows['password'] . '</td>
                            </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="assets/script.js"></script>
</body>

</html>