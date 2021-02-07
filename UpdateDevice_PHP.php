<?php 
if(isset($_POST["Submit"]))
{
    function OpenCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "Riya@123";
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
       $idX=$_SESSION["deviceID"];
       $conn = OpenCon();
        $name=$_POST["name"];    
        $brand=$_POST["brand"];
        $model=$_POST["model"];
        $price=$_POST["price"];
        $description=$_POST["description"];
        $img=$_POST["files"];
        $type=$_SESSION["type"];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Update Device</title>
        <link rel="icon" href="icon.jpg" type="image/gif" sizes="16x16">
        <link rel="stylesheet" type="text/css" href="HeaderFooter_Style.css">
        <style type="text/css">
           #card {
                  position: relative;
                  width: 320px;
                  display: block;
                  margin: 40px auto;
                  text-align: center;

                  font-family: 'Source Sans Pro', sans-serif;
                }
                #upper-side {
                  padding: 2em;
                  background-color: #66cccc;
                  display: block;
                  color: #fff;
                  border-top-right-radius: 8px;
                  border-top-left-radius: 8px;
                }

                #status {
                  font-weight: lighter;
                  text-transform: uppercase;
                  letter-spacing: 2px;
                  font-size: 1em;
                  margin-top: -.2em;
                  margin-bottom: 0;
                }
                #lower-side {
                  padding: 2em 2em 5em 2em;
                  background: #fff;
                  display: block;
                  border-bottom-right-radius: 8px;
                  border-bottom-left-radius: 8px;
                  border: solid #66cccc;
                }

                 #message {
                  margin-top: -.5em;
                  color: #757575;
                  letter-spacing: 1px;
                }
                #contBtn {
                  position: relative;
                  top: 1.5em;
                  text-decoration: none;
                  background: #66cccc;
                  color: #fff;
                  margin: auto;
                  padding: .8em 3em; 
                  box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
                  border-radius: 25px;  
                  transition: all .4s ease;
                }
                #contBtn:hover {
                  
                  box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.41);
                 
                    transition: all .4s ease;
                }
                body
                {
                    text-align: center;
                }
                .serverErrorImg
                {
                    border:solid;
                }
                .errorText
                {
                    text-align: center;
                    font-size: 25px;
                }
                            .title
                {
                width: 50%;
                float: left;
                background-color: #66cccc;
                height: 350px;
                position: relative;
                color: black;
            }
            .title h1
            {
                position: absolute;
                top: 150px;
                left:100px;
            }
            .title h3
            {
                position: absolute;
                top: 200px;
                left:60px;                
            }
        </style>
    </head>
    <body>
      <div style="width: 100%;height: 350px;">
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
                <li><a href="Logout.php">Logout</a></li>
                <li><a href="ContactUs.php">Contact Us</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
            </ul>
    </div>
            <div class="title">
                <h1>Update Your Device</h1> 
                <h3>Change the details which you wish to change!</h3>    
            </div>
            <div style="width: 50%;float: right;height: 350px;">
                <img src="updateDevice.jpeg" height="350px" style="width: 100%;">
            </div>
        </div>
<?php
        if(!empty($name)&&!empty($brand)&&!empty($model)&&!empty($price)&&!empty($description))
        {
            if(($type=="Laptop"&&$price<=8000)||($type=="Desktop"&&$price<=10000)||($type=="Mobile"&&$price<=2000)||($type=="Tablet"&&$price<=5000))
            {
                $sql1="UPDATE device SET name = '$name',brand = '$brand',model='$model',price='$price',description='$description' where id='$idX'";
                if($conn->query($sql1) === false)
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
                          Device Updated Successfully!
                        </p>
                        <a href="HomePage_Seller.php" id="contBtn">Continue</a>
                      </div>
                    </div>
<?php
                }
            }
            else
            {
?>
            <h1>Error</h1>
            <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
            <p class="errorText">Price Restrictions do not match. Please try again<a href="UpdateDevice.html">Update Device</a></p>
<?php

            }
        }
        else
        {
?>
            <h1>Error</h1>
            <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
            <p class="errorText">You left a field empty, please try again!<a href="UpdateDevice.html">Update Device</a></p>
<?php
        }
        if(!empty($files))
        {
                 $sql="UPDATE device SET image = '$img' where id='$idX'";
                if($conn->query($sql2) === false)
                {                                                    
?>
                    <h1>Error</h1>
                    <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                    <p class="errorText">There is some error with your server, please try again!<a href="UpdateDevice.html">Update Device</a></p>
<?php
                    echo "ERROR: There was some error with our server. Please try again. Sorry for the inconvinience!".$conn->error;
                }
        }
       

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
    </body>
</html>