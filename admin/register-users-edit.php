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
// error_reporting(0);
// session_start();

$id = "";

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
}

// echo $id;
$id2 = $id;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/style.css">
    <title>Edit User Details Users
        <?php echo $id2; ?>
    </title>
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
                        <h3>Edit User Details</h3>
                        <i class='bx bx-search'></i>
                        <i class='bx bx-filter'></i>
                    </div>
                    <?php
                    include '../user/include/_dbconnect.php';
                    // $id=$_GET['edit'];
                    if ($id) {
                        $sql = "SELECT * FROM userdb WHERE srno=$id";
                        $showData = mysqli_query($conn, $sql);
                        while ($rows = mysqli_fetch_assoc($showData)) {
                            echo '<form action="register-users-edit.php" method="post">
                            <label for="name">Enter Name*</label><br>
                        <input type="text" name="name" id="name" value="' . $rows['name'] . '" placeholder="" required><br>
                            <input type="hidden" name="edit" value="' . $id . '">
                        <label for="uname">Enter UserName*</label><br>
                        <input type="text" name="uname" id="uname" value="' . $rows['uname'] . '" placeholder="Enter Username*" required><br>

                        <label for="email">Enter Email*</label><br>
                        <input type="email" name="email" id="email " value="' . $rows['email'] . '" placeholder="Enter Email ID *" required><br>

                        <label for="mobile">Enter Mobile No *</label><br>
                        <input type="text" name="mobile" id="mobile" value="' . $rows['mobile_no'] . '" placeholder="Enter Your Mobile Number *" maxlength="10" minlength="10" pattern="[0-9]{10}" required><br>

                        <label for="pass">Enter Password*"</label><br>
                        <input type="password" name="pass" id="pass" placeholder="" value="' . $rows['password'] . '" required><br>';
                        }

                    } else {
                        header("location:register-users.php");
                    }

                    ?>






                    <button type="submit" class="f-btn" id="submit-btn" onclick="">Submit</button>
                    <!-- <input type="submit" class="f-btn" id="submit-btn"></input> -->
                    <a href="register-users.php" class="f-btn">Cancel</a>
                    </form>


                    <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        // $id2=$_POST['srno'];
                        $name = $_POST['name'];
                        $edit = $_POST['edit'];

                        $uname = $_POST['uname'];
                        $mno = $_POST['mobile'];
                        $email = $_POST['email'];
                        $pass = $_POST['pass'];
                        $query = "UPDATE userdb SET name='$name', uname='$uname', email='$email', mobile_no='$mno', password='$pass' WHERE `userdb`.`srno`=$edit";
                        $query_run = mysqli_query($conn, $query);
                        if ($query_run) {
                            echo "<script>window.location.href='register-users.php';</script>";
                            header('location:register-users.php');
                        } else {
                            echo "<script>alert('Fail To Update Data !');</script>";
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