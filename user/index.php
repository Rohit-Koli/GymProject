
<?php 
session_start();
if(isset($_SESSION['loggedin'])){
    // header("location:login.php");
    // exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
    <title>Royal Gym , Shirpur</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css"/>
  </head>
  <body>
    
  <!-- Header -->
    <?php include 'include/header.php';?>
    <!-- End Menu -->

    <!-- Header -->
    <header class="header">
      <div class="container flex">
        <div class="text">
          <h1 class="mb">
            Complete Daily <br />
            <span>Workout</span> At Our Gym
          </h1>

          <p class="mb">
            We Believe that fitness is more than a workout,It's a lifestyle.
            Our Gym is a community of like-minded individual who support and 
            inspire each other to reach their goals.You'll make new friends ,
            find workout partners , and feel a sense of belonging at our gym.
          </p>
          <!-- Registration Button -->
          <a href="Register.php" class="btn mt">Get Started Now</a>
        </div>

        <div class="visual">
          <img src="assets/images/fitness_PNG109.png" alt="Image With Bodybuilder">
        </div>
      </div>
    </header>
    <!-- End Header -->
    <!-- Why Us -->
    <div class="section" id="why-us">
      <div class="container flex">
        <div class="text">
          <h2 class="primary mb">Why Choose Us?</h2>
          <h3 class="secondary mb">Experienced Trainers</h3>
          <p class="tertiary">
            Our team of certified trainers are here to guide you every step of the way.
            They will create a personalized workout plan tailored to your goals,help you stay
            motivated , and provide support and encouragement throughout your fitness journey.
            <br><br>
          </p>

          <h3 class="secondary mb">Afordable Membership</h3>
          <p class="tertiary">
            We offer a raneg of flexible memberhsip plans to fit budget and lifestyle.
            Whether you are looking for a short-term commitment or a long-term fitness
            plan, we have a membership option that works for you.
          </p>
        </div>
        <div class="visual">
          <img src="assets/images/pic1.jpg"alt=""/>
        </div>
      </div>
    </div>
    <!-- End Why Us -->

    <!-- Explore -->
    <div class="section" id="explore">
      <div class="container flex">
        <div class="visual">
          <img src="assets/images/pic6.jpg"alt=""/>
        </div>
        <div class="text">
          <h2 class="primary mb">
            Explore Our Fitness <br />
            Studio
          </h2>
          <p class="tertiary mb">
            Our Gym is equipped with the latest and most advanced fitness equipment,
            designed to help you get most of your workouts.
            We offer a range fitness classes and programs to keep your workout fun and engaging.
            
          </p>

          <a href="plans.php" class="btn mt">Get Started Now</a>
        </div>
      </div>
    </div>
    <!-- End Explore -->
    
    <!-- Discount -->
    <div class="section" id="discount">
      <div class="container flex">
        <div class="visual">
          <img src="assets/images/pic5.jpg"alt=""/>
        </div>
        <div class="text">
          <h2 class="primary mb">
            Fitness Classes This Summer, Pay Now And Get 25% Discount
          </h2>

          <p class="tertiary mb">
            We believe that fitness should be accessible to everyone , which is why we are
            excited to offer a limited time discount on our gym membership!
            For a limited time only, new members can take advantage of our special offer and get
            25% Discount off our regular membership rate.<br>
            By Joining our gym , you'll get access to our state-of-the-art facilities,Experienced
            trainers , and a supportive community of like minded individuals who are commited to their
             fitness goals.
          </p>

          <a href="plans.php" class="btn bt">Book Now</a>
        </div>
      </div>
    </div>
    <!-- End Discount -->

    <!-- Footer -->
    <?php include 'include/footer.php';?>
    <!-- End Footer -->
    <!-- JS -->
    <link rel="stylesheet/script" href="assets/Js/script.js">
  </body>
</html>
