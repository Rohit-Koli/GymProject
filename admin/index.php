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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="shortcut icon" href="../user/assets/images/admin_profile.png" type="image/x-icon">
	<!-- My CSS -->
	<link rel="stylesheet" href="assets/style.css">

	<title>Admin Panel</title>
</head>
<body>
	<!-- SIDEBAR -->
	<?php include'include/sidebar.php';?>
	<!-- CONTENT -->
	<section id="content">
		
		<?php include'include/header.php';?>
		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="table-data" id="table-data">
				<h1?>Hello Admin</h1>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->


	<script src="assets/script.js"></script>
</body>

</html>