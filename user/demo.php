<?php 
session_start();
if (isset($_SESSION['id'])) {
    $id=$_SESSION['id'];
    echo $id;
}
?>  
<?php
    include 'include/_dbconnect.php';
    $sql="SELECT * FROM `userdb` WHERE srno=$id";
    $showData=mysqli_query($conn,$sql);
    while ($row=mysqli_fetch_assoc($showData)) {
        echo $row['name'];
    }
?>