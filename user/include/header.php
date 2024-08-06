<div class="menu">
      <div class="container flex">
        <!-- Mobile Button -->
        <!-- <div class="mobile-btn">
          <ion-icon name="grid"></ion-icon>
        </div> -->
        <div class="logo">
          <a href="index.php">
          <img src="assets/images/logo2.png"alt="Logo"/>
          <!-- <h3 class="gym-name">Royal Gym</h3> -->
          </a>
        </div>

        <ul class="nav">
          <li class="nav-item"><a href="index.php">Home</a></li>
          <li class="nav-item"><a href="index.php#why-us">Features</a></li>
          <li class="nav-item"><a href="index.php#explore">Explore</a></li>
          <li class="nav-item"><a href="plans.php">Plans</a></li>
        </ul>
        <?php 
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
          // $logged=true;
          echo'<a href="user.php" class="btn">Profile</a>';
        }else
        {
          echo'<a href="Register.php" class="btn">Register</a>
          <a href="Login.php" class="btn">LogIn</a>';

        }
        ?>
        
      </div>
    </div>
    <!-- End Menu -->