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
}
?>
<?php
if (isset($_SESSION['id'])) {
    $id=$_SESSION['id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Welcome</title>
</head>

<body>
    <?php include 'include/header.php'; ?>
    <div class="user-container">
        <center>
            <?php
            include'include/_dbconnect.php';
                $sql="SELECT * FROM `userdb` WHERE srno=$id";
                $query=mysqli_query($conn,$sql);
                while ($rows=mysqli_fetch_assoc($query)) {
                    echo'<h2>
                    Welcome -'.$rows['name'].'
                </h2><br>
                
            
            <div class="userinfo">


                 <p class="user-details">Your Name is :-'.$rows['name'].'</p>
                <p class="user-details">UserName is :- '.$rows['uname'].'</p>
                <p class="user-details">Email ID :-'.$rows['email'].'</p>
                <p class="user-details">Mobile No :-'.$rows['mobile_no'].'</p>
                ';
                }
                ?>

                <?php
                include "include/_dbconnect.php";


                $plan_details = null;
                $pd = null;
                $sql = "Select * from plandb where uname='$user[1]'";
                $res = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($res);
                if ($num == 1) {
                    $records = mysqli_fetch_assoc($res);
                    $plan_details = array($records['plan_id'], $records['price'], $records['duration'], $records['purchase_dt'], $records['expiry_dt']);
                    $pd = $plan_details;
                    // echo $pd;
                } else {
                    echo '<p class="user-details">Plan :-None</p>';
                }


                ?>
                <?php $pd = $plan_details; ?>
                <!-- New  -->
                <?php 
                    $uname=$user['1'];
                    $sql = "SELECT * FROM `plandb` WHERE  `uname`='$uname'";
                    $result = mysqli_query($conn , $sql);
                    $num = mysqli_num_rows($result);
                    if($num > 0) {
    
                        // echo ' <input type="text" readOnly value="Already Choosed" name="plan1" id="1Months-plan" class="border">';
                        echo'<p class="user-details">Plan Price :-'.$pd['1'].'</p>
                        <p class="user-details">Plan Duration :-'.$pd['2'].'</p>
                        <p class="user-details">Plan Purchase Date :-'.$pd['3'].'</p>
                        <p class="user-details">Plan Expiry Date :-'.$pd['4'].'</p>';
                        
    
    
                    }
                ?>
                


                </p>
               

            </div>
            <a href="logout.php" class="Logout-btn">
                <button class="f-btn">LogOut</button>
            </a>
            <a href="update_user.php" class="Logout-btn">
                <button class="f-btn">Update</button>
            </a>

        </center>
    </div>

    <?php include 'include/footer.php'; ?>
</body>

</html>