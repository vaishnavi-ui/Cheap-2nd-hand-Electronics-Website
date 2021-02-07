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
    //$_SESSION["type"]="buyer";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>About Us</title>
    <!-- font awesome link to add different icons -->
    <script src="https://kit.fontawesome.com/f681854d4a.js" crossorigin="anonymous"></script>
    <!-- CSS stylesheet-->
    <!--<link rel="stylesheet" href="HomePage_Style.css">-->
    <link rel="icon" href="icon.jpg" type="image/gif" sizes="16x16">
    <style>
    .quote{
      text-align:center;
      font-size: 30px;
      background: -webkit-linear-gradient(#19d3da, #2d6187);
     -webkit-background-clip: text;
     -webkit-text-fill-color: transparent;
     width:100%;
    }
    .quote-name{
      text-align:center;
      color: #0f3057;
    }
    .quoting{
      background-color:white;
      text-align: center;
      width:100%;
    }
    .india{
      width:100%;
    }
    .main-about{
      width:100%;
      height:2200px;
    }

      .left-about{
        width:450px;
        height:450px;
        float:left;
        /*border: 2px solid black;*/
        padding: 0.5%;
        background-color: #edfffa;
        box-shadow: 5px 10px 18px #888888;
      }
      .mid-about{
        margin-left: 50px;
        width:450px;
        height:450px;
        float: left;
        /*border: 2px solid black;*/
        padding: 0.5%;
        background-color: #edfffa;
        box-shadow: 5px 10px 18px #888888;
      }
      .right-about{
        width:450px;
        height:450px;
        float:right;
        /*border: 2px solid black;*/
        padding: 0.5%;
        background-color: #edfffa;
        box-shadow: 5px 10px 18px #888888;
      }
      .story-about{
        background-color:#5eb7b7;
        width:50%;
        height:550px;
        float:left;
        font-size: 110%;

      }
      .img-about{
        width:50%;
        height:550px;
        float:right;
      }
      .about2-img{
        margin-left: 470px;
        width:50%;
      }
      .about1-img{
        margin: auto;
        width: 80%;
        margin-left: 90px;
        margin-top: 90px;
      }
      .testimonials{
        width:100%;
        float:left;
        height:400px;
      }
      .about-para{
        padding: 0.8%;
        width: 90%;
        margin-left: 2%;
        color: white;
      }
      h2{
        margin-left: 2%;
        color: black;
        font-weight: 600;
      }

      h3{
        text-align: center;
        font-size: 150%;
        color: grey;
      }
      td{
        font-size: 150%;
        color: #24a19c;
      }
      .reviews{
        font-family: serif, Book Antiqua;
        font-size: 120%;
        color: #686d76;
        padding: 5%;
      }
      .profile{
        border-radius: 100%;
      }
      hr{
        width:600px;
        height: 1px;
        background: white;
        margin: auto;
        margin-bottom: 12px;
        margin-top: 18px;
      }

      .navBar
      {
          width: 100%;
          height: 60px;
          background-color: #006a71;
          color: white;

      }
      .navBar ul
      {
          list-style-type: none;
          text-align: center;
      }
      .navBar li
      {
          float: right;
          width: 130px;
          text-align: center;
      }
      .navBar a
      {
          text-decoration: none;
          color: white;
      }
      .navBar li a
      {
          text-decoration: none;
          color: white;
          height:30px;
          display: block;
          text-align: center;
          padding-top: 15px;
          margin: 10px;
          font-size:20px;
      }
      .navBar li a:hover
      {
          background-color: black;
      }
      .dropdown
      {
        float: left;
        overflow: hidden;
      }

      .dropdown .dropbtn
      {
        font-size: 16px;
        border: none;
        outline: none;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
      }
      .dropdown-content
      {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
      }
      .dropdown-content a {
        float: none;
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: left;
      }
      .dropdown-content a:hover
      {
          background-color: #14274E;
          color: white;
          text-decoration: none;
      }
      .dropdown:hover .dropdown-content
      {
        display: block;
      }

      .footer
      {
        background-color:black;
        width: 100%;
        height: 300px;
      }
      .footerContact
      {
        width: 40%;
        float: left;
        height: 300px;
        position: relative;
      }
      .footerContact i
      {
        font-size:30px;
        color:white;
        margin: 10px;
        margin-right: 20px;
      }
      .footerContact p
      {
        float: left;
      }
      .footerPhone
      {
        position: absolute;
        top: 60px;
        left: 200px;
        color: white;
        font-size: 18px;
      }

      .footerLocation
      {
        position: absolute;
        top: 130px;
        left: 200px;
        color: white;
        font-size: 18px;
      }
      .footerEmail
      {
        position: absolute;
        top: 200px;
        left: 200px;
        color: white;
        font-size: 18px;
      }
      .iconBg
      {
        border-radius: 100%;
        background-color:#373a40;
        width: 40px;
        height:40px;
        text-align: center;
        padding: 5px;
        float: left;
        margin-right: 30px;
      }
      .footerAboutUs
      {
        width: 30%;
        float: left;
        height: 300px;
        position: relative;
        color: white;
        font-size: 18px;
        text-align: justify;
      }
      .footerAboutUs div
      {
        position: absolute;
        top: 60px;
        width: 80%
      }
      .footerPages
      {
        width: 30%;
        float: left;
        position: relative;
        font-size: 20px;
      }
      .footerPagesList
      {
        position: absolute;
        top: 60px;
        width: 80%;
        color: white;
      }
      .footerPagesList ul
      {
        list-style-type: none;
      }
      .footerPagesList li
      {
        margin: 20px;
      }
      .footerPages a
      {
        text-decoration: none;
        color: white;
      }
      .footerPagesLinks
      {
        position: absolute;
        top: 200px;
      }
      .footerPagesLinks button
      {
        height: 40px;
        width: 40px;
        background-color:#373a40;
        border:1px solid #373a40;
        border-radius: 10%;
        margin: 5px;

      }
      .footerPagesLinks i
      {
        color: white;
        font-size: 25px;
      }
      .footerCopyRight
      {
        color: white;
        font-size: 15px;
        float: right;
      }
      .footerCopyRight i
      {
        font-size: 15px;
        color: white;
        margin-right: 10px;
      }
    </style>
  </head>
  <body>
    <?php if($_SESSION["typeOfUser"]=="buyer"){ ?>
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
          <li style="width: 50px;margin:0;padding: 0;text-align: center;"><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 20px;"></i></a></li>
          <li><a href="Logout.php">Logout</a></li>
          <li><a href="ContactUs.php">Contact Us</a></li>
          <li><a href="AboutUs.php">About Us</a></li>
      </ul>
  </div>
<?php  }
else if($_SESSION["typeOfUser"]=="seller"){ ?>
  <!--Seller-->
  <div class="navBar">
          <div class="dropdown">
              <button class="dropbtn" ><i class="fa fa-bars" aria-hidden="true" style="font-size: 40px;"></i></button>
              <div class="dropdown-content">
                   <a href="AddDevice.php">Add Device</a>
                   <a href="DisplayStatusOfDevice_PHP.php">My Devices</a>
                   <a  href="UpdateDevice.php">Update Device</a>
                   <a href="UpdateSeller.php">Update Profile</a>
              </div>
          </div>
          <div style="float:  left;font-size: 35px;text-align: center;margin: 10px;"><a href="HomePage_Seller.php">EduTech</a></div>
          <ul>
              <li><a href="logout.php">Logout</a></li>
              <li><a href="ContactUs.php">Contact Us</a></li>
              <li><a href="AboutUs.php">About Us</a></li>
          </ul>
  </div>
<?php }
 else { ?>
  <!--Normal-->
  <div class="navBar">
      <div style="float:  left;font-size: 35px;text-align: center;margin: 10px;"><a href="HomePage_Common.php">EduTech</a></div>
      <ul>
          <li><a href="login.html">Login</a></li>
          <li><a href="PreRegistrationForm.php">Register</a></li>
          <li><a href="ContactUs.php">Contact Us</a></li>
          <li><a href="AboutUs.php">About Us</a></li>
      </ul>
  </div>
<?php } $conn->close(); ?>
<div class="main-about">
  <div class="quoting">
    <br> <hr>
    <h1 class="quote"><em>"When you educate one person you can change a life,</em></h1>
    <h1 class="quote"><em> when you educate many you can change the world."</em></h1>
    <h3 class="quote-name">~ Shai Reshef</h3><hr><br>
  </div>
<div class="story-about">
  <h2> Our story </h2>
  <p class="about-para"><strong>EduTech</strong> is a electronics re-sharing website based in India. We have observed that as all the education has moved to the online platforms, the less priviledged are remaining behind. Their education is getting compromised because of the lack of resources and they are hesitant to ask their parents because they know they can't afford it. We heard of so many suicides this year because the children were unable to continue their education and their parents could help them. All such incidents are sad and we have started this website so no such incident happens again. </p>
  <p class="about-para">So we strive to request people to sell their used or new electronic devices that they no longer need. This way the poor students can buy the devices at a much lower price than the market and continue learning online. We stand by the United Nations Sustainable Developments Goals that states education for all.</p>
  <h2> Our mission </h2>
  <p class="about-para">"We want to work towards creating a better India which provides basic education to every child."</p>
  <p class="about-para">Every child in our country irrespective of the background they come from is eligible for education. We want to remove certain road blocks from their road to education and developement so their journey ahead is smooth and filled with happiness.</p>
</div>
<div class="img-about">
  <img src="about1.jpg" alt="children" class="about1-img"><br>
</div>
<br>
<div class="india">
  <h3>Now you can purchase devices from any part of India!</h3>
  <img src="about2.png" alt="india-stores" class="about2-img">
</div>
<div class="testimonials">
  <h2>Testimonials</h2>
<div class="left-about">
  <table>
    <tr>
      <td><img src="profile1.jpg" alt="profile1" class="profile"></td>
      <td><h4>Pankaj Gupta<em>, Branch Manager</em></h4></td>
    </tr>
  </table>
  <p class="reviews">I am very pleased to say that my experience of associating with Edutech has been excellent and I feel it is a privilege too. My appreciation for the excellent work EduTech is carrying out in uplifting under- privileged children. By providing opportunities to needy children, EduTech is investing in a better future for India, since children are the future.</p>
  <br>
</div>
<div class="mid-about">
  <table>
    <tr>
      <td><img src="profile2.jpg" alt="profile2" class="profile"></td>
      <td><h4>Seema Pandey, <em> Creatives Head</em></h4></td>
    </tr>
  </table>
  <p class="reviews">I’m fortunate to have been part of EduTech and really happy to see outstanding work done by them. It is a best way to stay connected with strangers. Everyone live their life for themselves, their family, friends and relatives but life is complete if we live for others too.”</p>
  <br>
</div>
<div class="right-about">
  <table>
    <tr>
      <td><img src="profile3.jpg" alt="profile3" class="profile"></td>
      <td><h4>Ambrish Verma,<em> General Secretary</em></h4></td>
    </tr>
  </table>
  <p class="reviews">It gives me immense pleasure to share my thoughts about EduTech. The idea to have a realistic NGO strike to me when I came across with underprivileged children who were deprived of basic needs like education, health care and nutrition. In short duration EduTech has done tremendous work for upliftment of underprivileged children</p>
  <br>
</div>
</div>
</div>
<br>
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
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact Us</a></li>
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
</html>
