<?php
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
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add Device</title>
        <link rel="stylesheet" type="text/css" href="HeaderFooter_Style.css">
        <script src="https://kit.fontawesome.com/f681854d4a.js" crossorigin="anonymous"></script>
        <link rel="icon" href="icon.jpg" type="image/gif" sizes="16x16">
        <style>
            body
            {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="navBar">
            <div class="dropdown">
                <button class="dropbtn" ><i class="fa fa-bars" aria-hidden="true" style="font-size: 40px;"></i></button>
                <div class="dropdown-content">
                     <a href="AddDevice.php">Add Device</a>
                     <a href="DisplayStatusOfDevice.php">My Devices</a>
                     <a  href="UpdateDevice.php">Update Device</a>
                     <a href="UpdateSeller.php">Update Profile</a>
                </div>
            </div>
            <div style="float:  left;font-size: 35px;text-align: center;margin: 10px;"><a href="#">EduTech</a></div>
            <ul>
                <li><a href="Logout.php">Logout</a></li>
                <li><a href="ContactUs.php">Contact Us</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
            </ul>
    </div>
<?php
        if(isset($_POST['Submit']))
        {
            //Retriveing all the information
            $type=$_POST["type"];
            $name=ucfirst($_POST["name"]);
            $brand=ucfirst($_POST["brand"]);
            $model=$_POST["model"];
            $price=$_POST["price"];
            $description=ucfirst($_POST["description"]);
            $img=$_POST["files"];

            if($type!=null&&$name!=null&&$brand!=null&&$model!=null&&$price!=null&&$img!=null)
            {
                if($type=="Laptop"||$type=="Mobile"||$type=="Tablet"||$type=="Desktop")
                {
                    if(($type=="Laptop"&&$price<=8000)||($type=="Desktop"&&$price<=10000)||($type=="Mobile"&&$price<=2000)||($type=="Tablet"&&$price<=5000))
                    {
                         //Creating the table
                        $sql = "CREATE TABLE if not exists DEVICE(
                            id INT PRIMARY KEY AUTO_INCREMENT,
                            name VARCHAR(30) NOT NULL,
                            type VARCHAR(10) NOT NULL,
                            price INT NOT NULL,
                            model VARCHAR(50) NOT NULL,
                            brand VARCHAR(50),
                            description VARCHAR(100) NOT NULL,
                            image BLOB NOT NULL,
                            status VARCHAR(10) NOT NULL,
                            seller_id INT NOT NULL
                        )";


                        if($conn->query($sql) === false)
                        {
?>
                            <h1>Error</h1>
                            <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                            <p class="errorText">There is some error with our server. Please try again! <a href="AddDevice.html">Add Device Page</a></p>
<?php
                            echo "ERROR: Could not able to execute  " . $conn->error;
                        }

                        //Storing the seller username from sessions variable
                        session_start();
                        $username=$_SESSION["username"];

                        //Retreving the id of the user from the table
                        $sql1="SELECT * FROM SELLER WHERE USERNAME='$username'";
                        $result=$conn->query($sql1);
                        if($conn->query($sql1) === false)
                        {
?>
                            <h1>Error</h1>
                            <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                            <p class="errorText">There is some error with our server. Please try again! <a href="AddDevice.html">Add Device Page</a></p>
<?php
                            echo "ERROR: There was some error with our server. Please try again. Sorry for the inconvinience!".$conn->error;
                        }
                        else
                        {
                            while($row = $result->fetch_assoc())
                            {
                                $seller_id=intval($row["id"]);
                            }
                            $sql2="INSERT INTO device SET name='$name',  brand='$brand',model='$model',price='$price',type='$type',description='$description',image='$img',seller_id='$seller_id',status='unsold'";
                            if($conn->query($sql2) === false)
                            {
?>
                                <h1>Error</h1>
                                <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                                <p class="errorText">There is some error with our server. Please try again! <a href="AddDevice.html">Add Device Page</a></p>
<?php
                                echo "ERROR: ".$conn->error;
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
                                                Your device has been sucessfully added!.
                                            </p>
                                            <a href="HomePage_Seller.php" id="contBtn">Continue</a>
                                        </div>
                                    </div>
<?php
                            }
                        }
                    }
                    else
                   {
?>
                        <h1>Error</h1>
                        <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                        <p class="errorText">Looks like you have entered a higher price than our rules. Please follow the mentioned prices. Remember you are doing this to help other students!<a href="AddDevice.html">Add Device Page</a></p>
<?php
                    }
                }
                else
                {
?>
                    <h1>Error</h1>
                    <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                    <p class="errorText">The type of device chosen is incorrect! There is some error..Please try again.<a href="AddDevice.html">Add Device Page</a></p>
<?php
                }
            }
            else
            {
?>
                <h1>Error</h1>
                <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                <p class="errorText">Oops! Looks like you put a mandatory field empty! <a href="AddDevice.html">Add Device Page</a></p>
<?php
            }
            CloseCon($conn);
        }
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
