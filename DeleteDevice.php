<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update Your Device</title>
        <link rel="stylesheet" type="text/css" href="HeaderFooter_Style.css">
        <script src="https://kit.fontawesome.com/f681854d4a.js" crossorigin="anonymous"></script>
        <body>
            <div class="navBar">
            <div class="dropdown">
                <button class="dropbtn" ><i class="fa fa-bars" aria-hidden="true" style="font-size: 40px;"></i></button>
                <div class="dropdown-content">
                     <a href="AddDevice.php">Add Device</a>
                     <a href="DisplayStatusOfDevice_PHP.php">My Devices</a>
                     <a  href="UpdateDevice.php">Update Device</a>
                     <a href="#">Update Profile</a>
                </div>
            </div>
            <div style="float:  left;font-size: 35px;text-align: center;margin: 10px;"><a href="HomePage_Seller.php">EduTech</a></div>
            <ul>
                <li><a href="Logout.php">Logout</a></li>
                <li><a href="ContactUs.php">Contact Us</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
            </ul>
    </div>
<?php
    function OpenCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "123";
        $db = "WP Project Phase 1";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
        return $conn;
    }
    function CloseCon($conn)
    {
            $conn -> close();
    }

    $conn = OpenCon();
    if($conn === false)
    {
        die("ERROR: Could not connect. " . $conn->connect_error);
    }
    session_start();
    $id=$_COOKIE['updateDeviceID'];


    $_SESSION['deviceID']=$id;
    $username=$_SESSION['username'];
    $sql = "DELETE FROM device where id='$id'";
    $result = $conn->query($sql);
    if($result==false)
    {
?>
                    <h1>Error</h1>
                    <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                    <p class="errorText">There is some error with your server, please try again!<a href="UpdateDevice.html">Update Device</a></p>
<?php
                    echo "ERROR: There was some error with our server. Please try again. Sorry for the inconvinience!".$conn->error;
    }
    else
    {
?>
                   <div id='card'>
                      <div id='upper-side'>
                          <h3 id='status'>Success</h3>
                      </div>
                      <div id='lower-side'>
                        <p id='message'>
                          Device Deleted Successfully!
                        </p>
                        <a href="HomePage_Seller.php" id="contBtn">Continue</a>
                      </div>
                    </div>
<?php
    }

    $conn->close();

?>
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
