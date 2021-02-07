<?php
session_start();
    //Establishing connection
    function OpenCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "123";
        $db = "WP Project Phase 1";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
        return $conn;
    }

    //Closing connection
    function CloseCon($conn)
    {
        $conn -> close();
    }

    $conn = OpenCon();
    if($conn === false)
    {
        die("ERROR: Could not connect. " . $conn->connect_error);
    }
    $sql1="SELECT COUNT(*) as countD FROM order_items";
    $result1=($conn->query($sql1))->fetch_assoc();
    $noOfDevices=$result1['countD'];
    $sql2="SELECT COUNT(*) as countB FROM orders";
    $result2=($conn->query($sql2))->fetch_assoc();
    $noOfOrders=$result2['countB'];
    $sql3="SELECT COUNT(*) as countS FROM seller";
    $result3=($conn->query($sql3))->fetch_assoc();
    $noOfSellers=$result3['countS'];
    $conn->close();
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Homepage</title>
    <!-- font awesome link to add different icons -->
    <script src="https://kit.fontawesome.com/f681854d4a.js" crossorigin="anonymous"></script>
    <link rel="icon" href="icon.jpg" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="HomePage_Style.css">
    <style>
    #whyHelp p{
      color: #686d76;
      padding-left:50px;
      padding-right: 50px;
      padding-top: 5px;
      text-align: left;
      font-size: 100%;
    }
    </style>
  </head>
  <body>

            <!--Buyer-->
        <div class="navBar">
            <div class="dropdown">
                <button class="dropbtn"><i class="fa fa-bars" aria-hidden="true" style="font-size: 40px;"></i></button>
                <div class="dropdown-content">
                     <a href="DisplayDevices.php">See Device</a>
                     <a href="Cart.php">Cart</a>
                     <a href="UpdateBuyer.php">Update Profile</a>
                </div>
            </div>
            <div style="float:  left;font-size: 35px;text-align: center;margin: 10px;"><a href="HomePage_Buyer.php">EduTech</a></div>
            <ul>
                <li style="width: 50px;margin:0;padding: 0;text-align: center;"><a href="Cart.php"><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 20px;"></i></a></li>
                <li><a href="Logout.php">Logout</a></li>
                <li><a href="ContactUs.php">Contact Us</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
            </ul>
        </div>

    <!--Our Introduction of who we are-->
    <div id="intro" style="margin-top: 10px;">
      <div class="intro-left-div">
        <h1 class="brand-name">Edutech</h1>
        <p class="brand-quote">Left behind in education because you can't afford the online learning equipments, or have some old unused devices at home? You have come to the right place. We allow you to <em>sell and buy</em> electronic devices so no one stops learning. </p>
      </div>
      <div class="intro-right-div">
        <img src="homepage-header.jpeg" alt="sgd-education" class="main-img">
      </div>
    </div>
    <div id="buyerInfo">
      <div style="width: 50%;height: 400px;float: left;">
        <img src="impact.jpg" alt="Impact" height="400px" width="680px" style="filter: grayscale(100%);">
      </div>
      <div style="width: 50%;height: 400px;float: right;text-align: center;">
        <h2>Who can buy from our site?</h2>
        <p style="margin-left: 0px">If you are someone who
        <ul style="list-style-type: none;text-align: left;margin-left: 150px;">
          <li><i class="fa fa-check"></i>Has the interest and desire to study</li>
          <li><i class="fa fa-check"></i>A School/College Student</li>
          <li><i class="fa fa-check"></i>Has no or little access to electronic devices</li>
          <li><i class="fa fa-check"></i>Comes from a family with low annual income</li>
        </ul></p>
      <p style="text-align:center;margin-left: 100px;margin-right: 80px;">then you have come at the right place. At EduTech, we let you buy devices at a very cheap rate which are sold by other people. <br><br>Register to our site, buy the devices which you desire and continue your education!</p>
      </div>
    </div>
    <!--Why help-->
    <div style="margin-top: 100px;height: 400px;width:100%;">
        <div id="whyHelp">
            <h2>Why you should sell?</h2>
            <div class="help-left">
              <i class="fas fa-virus fa-2x"></i><p> Lockdown due to covid has been implemented since March,2020.Schools have started implementing online education making electronic devices neccessary.</p>
              <i class="fas fa-user-friends fa-2x"></i><p> Under privileged children have the passion and interest to learn and study and are very keen about their education.</p>


            </div>
            <div class="help-mid">
              <i class="fas fa-chart-bar fa-2x"></i><p>Nationally over 320 million children are out of the classroom.</p>

              <i class="fas fa-piggy-bank fa-2x"></i><p> They don't have financial backing and access to electronic devices and their parents are barely able to afford basic neccessities.</p>
            </div>
            <div class="help-right">
               <i class="fas fa-school fa-2x"></i><p> As a result, education has changed dramatically, whereby teaching is undertaken remotely and on digital platforms.</p>
              <i class="fas fa-laptop fa-2x"></i><p> A little harmless help from our side can help boost the education of a child in these tough times, plus you can get rid of that unused electronic device and help reduce e-waste as well.</p>
            </div>
        </div>
    </div>
    <div style="text-align: center;height: 450px;margin-bottom: 200px;">
        <h2>How it Works</h2>
        <div class="howItWorksSteps" style="margin-left:170px ">
            <img src="mobile.jpg" height="150px" width="170px" class="howItWorksStepsImg"><br>
            <img src="1.png" alt="Number1" class="stepno">
            <p>Select an old device like phones,tablets,laptops or computer which is no longer used and remove all your data from it.</p>
        </div>
        <div class="howItWorksSteps">
            <img src="step2.jpg" height="150px" width="200px;" class="howItWorksStepsImg"><br>
            <img src="2.png" alt="Number2" class="stepno">
            <p>Upload a device on our website at a suitable and reasonable price with picture and a short description and let buyers find it.</p>
        </div>

        <div class="howItWorksSteps">
            <img src="step3.jpg" height="150px" width="170px" class="howItWorksStepsImg"><br>
            <img src="3.png" alt="Number3" class="stepno">
            <p>After someone buys your device, pack it up and courier them to the address mentioned and feel good about yourself for helping someone :)</p>
        </div>
    </div>
    <div id="ourImpact">
      <div style="width: 50%;height: 400px;float: left;">
        <h2>Our Impact</h2>
        <div style="margin-left: 100px;">
          <h1><?php echo $noOfDevices?></h1>
          <h3><i class="fa fa-desktop" style="margin-right: 10px;"></i>Devices Sold</h3>
        </div>
        <div style="margin-left: 400px;">
          <h1><?php echo $noOfOrders?></h1>
          <h3><i class="fa fa-graduation-cap" style="margin-right: 10px;"></i>Students Helped</h3>
        </div>
        <div style="margin-left: 100px;">
          <h1><?php echo $noOfSellers?></h1>
          <h3> <i class="fa fa-users" style="margin-right: 10px;"></i>Helpers</h3>
        </div>
      </div>
      <div style="width: 50%;float: right;height: 400px;">
        <img src="impactImage.jpeg" alt="Impact Image" height="400px">
      </div>
    </div>
    <!-- what's our mission-->
    <div id="mission-div" style="margin-top: 10px;height: 420px;width:100%;">
      <h2>Our mission</h2>
      <div class="mission-left">
        <i class="fas fa-globe-africa fa-2x"></i><p> Follow United Nation's Sustainability Development Goals no.4</p>
        <i class="fas fa-book-reader fa-2x"></i><p> “Ensure inclusive and equitable quality education and promote lifelong learning opportunities for all.”.</p>
      </div>
      <div class="mission-mid">
        <i class="fas fa-user-graduate fa-2x"></i><p> Since children are the future, we must make sure on shaping them for tomorrow.</p>
        <i class="fas fa-chalkboard-teacher fa-2x"></i><p> Help children that want to learn but are held back by their backgrounds.</p>
      </div>
      <div class="mission-right">
        <i class="fas fa-home fa-2x"></i><p> Encourage all families to let their children learn.</p>
        <i class="fas fa-smile fa-2x"></i><p> We as members of the soceity must do everything in our power to make it better.</p>
      </div>
    </div>

    <!-- Carousel of images of children and what they say about us-->
    <div class="carousel-div">
      <div class="content display-container">
      <img class="mySlides" src="carousel1.png" alt="Carousel Image 1">
      <img class="mySlides" src="carousel2.png" alt="Carousel Image 2">
      <img class="mySlides" src="carousel3.png" alt="Carousel Image 3">
      <img class="mySlides" src="carousel4.png" alt="Carousel Image 4">

      <button class="c2-button black display-left" onclick="plusDivs(-1)">&#10094;</button>
      <button class="c1-button black display-right" onclick="plusDivs(1)">&#10095;</button>
    </div>
    </div>
    <div class="footer">
      <div class="footerContact">
          <div class="footerPhone">
                <div class="iconBg">
                  <i class="fas fa fa-phone" aria-hidden="true"></i>
                </div>
                <p>9858952250</p>
          </div>
          <div class="footerLocation">
                <div class="iconBg">
                  <i class="fas fa fa-map-marker" aria-hidden="true"></i>
                </div>
                <p>EduTech, Mumbai, Maharashtra</p>
          </div>
          <div class="footerEmail">
                <div class="iconBg">
                  <i class="fas fa fa-envelope" aria-hidden="true"></i>
                </div>
                <p>edutechsupport@gmail.com</p>
          </div>

      </div>
      <div class="footerAboutUs">
        <div><p>About EduTech</p>
          <p style="color:gray;">We at EduTech give a free platform for people to sell their old devices at cheap rates and let the under priveleged students buy these devices, helping them with their education in these tough and trying times of Covid 19; Our mission is <em>"Education for all".</em></p>
        </div>
        <div class="footerCopyRight" style="position: absolute;top: 250px;"><i class="fa fa-copyright" aria-hidden="true"></i>EduTech 2020.</div>
      </div>
      <div class="footerPages">
        <div class="footerPagesList">
        <p>
          <ul>
            <li>Pages</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
            <li><a href="ContactUs.php">Contact Us</a></li>
          </ul>
        </p>
      </div>
      <div class="footerPagesLinks">
        <button style="margin-left: 55px; "><a href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></button>
        <button><a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin"></i></a></button>
        <button><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></button>
        <button><a href="https://www.twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a></button><br>

      </div>

      </div>
    </div>
    </body>

    <script>
    var myIndex = 0;
    carousel();

    function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      myIndex++;
      if (myIndex > x.length) {myIndex = 1}
      x[myIndex-1].style.display = "block";
      setTimeout(carousel, 3000);
    }
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
      showDivs(slideIndex += n);
    }

    function showDivs(n) {
      var i;
      var x = document.getElementsByClassName("mySlides");
      if (n > x.length) {slideIndex = 1}
      if (n < 1) {slideIndex = x.length}
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      x[slideIndex-1].style.display = "block";
    }
    </script>

</html>
