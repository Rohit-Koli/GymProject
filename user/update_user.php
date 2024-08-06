<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("location:login.php");
    exit();
}
?>
<?php
if (isset($_SESSION['u_data'])) {
    $user = $_SESSION['u_data'];
    $id=$user['4'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css"/>
    <title>User Profile </title>
</head>
<body>
    <?php include('include/header.php');?>
    <?php
        include 'include/_dbconnect.php';
        // $id=$_GET['edit'];
        if ($id) {
            $sql = "SELECT * FROM userdb WHERE srno=$id";
            $showData = mysqli_query($conn, $sql);
            while ($rows = mysqli_fetch_assoc($showData)) {
                echo '
                <center>
                <form action="update_user.php" method="post">
                <label for="name">Enter Name*</label><br>
            <input type="text" name="name" id="name" value="' . $rows['name'] . '" style="width:55%;" required><br>
                <input type="hidden" name="edit" value="' . $id . '"><br>
            <label for="uname">Enter UserName*</label><br>
            <input type="text" name="uname" id="uname" value="' . $rows['uname'] . '" placeholder="Enter Username*" style="width:55%;" required><br>
            <label for="email">Enter Email*</label><br>
            <input type="email" name="email" id="email " value="' . $rows['email'] . '" placeholder="Enter Email ID *" style="width:55%;" required><br><br>
            <label for="mobile">Enter Mobile No *</label><br>
            <input type="text" name="mobile" id="mobile" value="' . $rows['mobile_no'] . '" placeholder="Enter Your Mobile Number *" style="width:55%;" maxlength="10" minlength="10" pattern="[0-9]{10}" required><br>
            <label for="pass">Enter Password*"</label><br>
            <input type="password" name="pass" id="pass" placeholder="" value="' . $rows['password'] . '" style="width:55%;" required><br></center>';
        
        } 
        
    }else {
        echo"<script>alert('Error 1');</script>";
    }
        ?><center>
        <button type="submit" class="f-btn" id="submit-btn" onclick="">Submit</button>
        <a href="user.php" class="f-btn">Cancel</a>
</form>
        <?php
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $name = $_POST['name'];
                        $edit = $_POST['edit'];

                        $uname = $_POST['uname'];
                        $mno = $_POST['mobile'];
                        $email = $_POST['email'];
                        $pass = $_POST['pass'];
                        $query = "UPDATE userdb SET name='$name', uname='$uname', email='$email', mobile_no='$mno', password='$pass' WHERE `userdb`.`srno`=$edit";
                        $query_run = mysqli_query($conn, $query);
                        if ($query_run) {
                            echo "<script>window.location.href='user.php';</script>";
                            header('location:user.php');
                        } else {
                            echo "<script>alert('Fail To Update Data !');</script>";
                        }
                    }
        ?>
    <?php include('include/footer.php');?>

</body>
</html>