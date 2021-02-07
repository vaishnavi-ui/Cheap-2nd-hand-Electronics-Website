<?php
    if(isset($_POST["submit"]))
    {
        //Retreving all session variables for the database
        session_start();
        $type=$_SESSION['typeOfUser'];
        $fn=ucfirst($_POST["first_name"]);
        $ln=ucfirst($_POST["last_name"]);
        $email=$_POST["email"];
        $username=$_POST["username"];
        $password=$_POST["password"];
        $recheck=$_POST["passwordCheck"];
        $phnumber=$_POST["phnumber"];
        $age=$_POST["age"];
        $bday=$_POST["birthday"];
        $address=$_POST["address"];
        $landmark=$_POST["landmark"];
        $pincode=$_POST["pincode"];
        $state=$_POST["state"];
        $city=$_POST["city"];

        //Opening the connection and connecting to database
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

        //Creating the table seller if it doesnt exist with all the attributes
        $sql = "CREATE TABLE if not exists SELLER
        (
            id INT PRIMARY KEY AUTO_INCREMENT,
            first_name VARCHAR(30) NOT NULL,
            last_name VARCHAR(30) NOT NULL,
            email VARCHAR(70) NOT NULL UNIQUE,
            username VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(15) NOT NULL,
            phnumber INT NOT NULL,
            age INT,
            birthday DATE,
            address VARCHAR(50) NOT NULL,
            landmark VARCHAR(50),
            pincode INT NOT NULL,
            city VARCHAR(50) NOT NULL,
            state VARCHAR(20) NOT NULL
        )";

        //Creating the table buyer if does not exist with all the attributes
        $sq2 = "CREATE TABLE if not exists BUYER
        (
            id INT PRIMARY KEY AUTO_INCREMENT,
            first_name VARCHAR(30) NOT NULL,
            last_name VARCHAR(30) NOT NULL,
            email VARCHAR(70) NOT NULL UNIQUE,
            username VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(15) NOT NULL,
            phnumber INT NOT NULL,
            age INT,
            birthday DATE,
            address VARCHAR(50) NOT NULL,
            landmark VARCHAR(50),
            pincode INT NOT NULL,
            city VARCHAR(50) NOT NULL,
            state VARCHAR(20) NOT NULL,
            income INT NOT NULL,
            proof BLOB NOT NULL
        )";
        if($conn->query($sql) === false)
        {
            echo "ERROR: Could not able to execute  " . $conn->error;
        }

        if($conn->query($sq2) === false)
        {
            echo "ERROR: Could not able to execute  " . $conn->error;
        }
?>
        <!DOCTYPE html>
        <html>
            <head>
                <title>Registration Page</title>
                <link rel="stylesheet" type="text/css" href="HeaderFooter_Style.css">
                <script src="https://kit.fontawesome.com/f681854d4a.js" crossorigin="anonymous"></script>
                <link rel="icon" href="icon.jpg" type="image/gif" sizes="16x16">

                <style type="text/css">
                    body
                    {
                        text-align: center;
                    }


                </style>
            </head>
            <body>
                <div class="navBar">
                    <div style="float:  left;font-size: 35px;text-align: center;margin: 10px;"><a href="HomePage_Seller.php">EduTech</a></div>
                    <ul>
                        <li><a href="Login.php">Login</a></li>
                        <li><a href="PreRegistrationForm.php">Register</a></li>
                        <li><a href="ContactUs.php">Contact Us</a></li>
                        <li><a href="AboutUs.php">About Us</a></li>
                    </ul>
                </div>
<?php
        //Doing php validation
        //Checking the type of user is correct
        if ($type!=null&&($type=="buyer"||$type=="seller"))
        {
            //Checking that no field is empty
            if ($username!=null&&$fn!=null&&$ln!=null&&$email!=null&&$password!=null&&$address!=null&&$pincode!=null&&$state!=null&&$city!=null&&$recheck!=null&&$phnumber!=null)
            {
                //Checking if the password matches regex
                if(preg_match('/^(?=.{8,})(?=.*[a-z])(?=.*[A-Z])(?=.*[^\w\d]).*$/', $password))
                {
                    //Checking if the passwords match
                    if ($password==$recheck)
                    {
                        //Checking if the phone number is correct
                        if(strlen((string)$phnumber)==10)
                        {
                            $phnumber=intval($phnumber);
                            //From session variable we check if the user is a seller, if yes then we add the details to table
                            if ($type=="seller")
                            {
                                //Checking if the email exists
                                $sql2="SELECT * FROM seller WHERE email='$email'";
                                $result1=$conn->query($sql2);
                                if($result1->num_rows>0)
                                {
?>
                                    <h1>Error</h1>
                                    <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                                    <p class="errorText">Looks like you have already registered with this email id , please try again!<a href="RegistraionForm.html">Registration Page</a></p>
<?php
                                }
                                else
                                {
                                    //Checking if the username exists
                                    $sql3 = "SELECT * FROM seller WHERE username='$username'";
                                    $result = $conn->query($sql3);
                                    if ($result->num_rows> 0)
                                    {
?>
                                        <h1>Error</h1>
                                        <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                                        <p class="errorText">This username is already taken! Please try some other username!<a href="RegistraionForm.html">Registration Page</a></p>
<?php
                                    }
                                    else
                                    {
                                        //Inserting data
                                        $sql4="INSERT INTO SELLER SET first_name='$fn', last_name='$ln', email='$email',username='$username',password='$password',phnumber='$phnumber',age='$age',birthday='$bday',address='$address',landmark='$landmark',pincode='$pincode',city='$city',state='$state'";
                                        //Setting username as session for further use
                                        $_SESSION['username']=$username;
                                        if($conn->query($sql4) === false)
                                        {
?>
                                            <h1>Error</h1>
                                            <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                                            <p class="errorText">There is some error with your server, please try again!<a href="RegistraionForm.html">Registration Form</a></p>
<?php
                                            echo "ERROR: There was some error with our server.".$conn->error;
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
                                                  Congratulations, your account has been successfully created.
                                                </p>
                                                <a href="HomePage_Seller.php" id="contBtn">Continue</a>
                                              </div>
                                            </div>
<?php

                                         $sqlID="SELECT * FROM SELLER WHERE USERNAME='$username'";
                                        $resultID=($conn->query($sqlID))->fetch_assoc();
                                        $id=$resultID['id'];
                                        $_SESSION['id']=$id;
                                       }
                                    }
                                }
                            }

                            //Checking from session variable if the user is a buyer
                            if ($type=="buyer")
                            {
                                //Checking if the email exists
                                $sqlB1="SELECT * FROM buyer WHERE email='$email'";
                                $resultB1=$conn->query($sqlB1);
                                if($resultB1->num_rows>0)
                                {
?>
                                    <h1>Error</h1>
                                    <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                                    <p class="errorText">Looks like you have already registered with this email id , please try again!<a href="RegistraionForm.html">Registration Page</a></p>
<?php
                                }
                                else
                                {
                                    //Checking if username exists already
                                    $sqlB2 = "SELECT * FROM buyer WHERE username='$username'";
                                    $resultB2 = $conn->query($sqlB2);
                                    if ($resultB2->num_rows> 0)
                                    {
?>
                                        <h1>Error</h1>
                                        <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                                        <p class="errorText">This username is taken, please try again with some other username!<a href="RegistraionForm.html">Registration Page</a></p>
<?php
                                    }
                                    else
                                    {
                                        //Retreving the data for the buyer from the pre registration page
                                        $income=$_SESSION['income'];
                                        $proof=$_SESSION['proof'];
                                        if ($income!=null||$proof!=null)
                                        {
                                        //Inserting data
                                            $sqlB3="INSERT INTO BUYER SET first_name='$fn', last_name='$ln', email='$email',username='$username',password='$password',phnumber='$phnumber',age='$age',birthday='bday',address='$address',landmark='$landmark',pincode='$pincode',city='$city',state='$state',income='$income',proof='$proof'";
                                            if($conn->query($sqlB3) === false)
                                            {
?>
                                                <h1>Error</h1>
                                                <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                                                <p class="errorText">Looks like there is some error with our server, please try again!<a href="RegistraionForm.html">Registration Page</a></p>
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
                                                      Congratulations, your account has been successfully created.
                                                    </p>
                                                    <a href="HomePage_Buyer.php" id="contBtn">Continue</a>
                                                  </div>
                                                </div>
<?php

                                                 $sqlID="SELECT * FROM BUYER WHERE USERNAME='$username'";
                                                $resultID=($conn->query($sqlID))->fetch_assoc();
                                                $id=$resultID['id'];
                                            }
                                        }
                                        else
                                        {
?>
                                            <h1>Error</h1>
                                            <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                                            <p class="errorText">Sorry seems like that there has been some error with the pre registration form details. Please go back to the page and fill again. Sorry for the inconvinience!<a href="RegistraionForm.html">Registration Page</a></p>
<?php
                                        }
                                    }
                                }
                            }//buyer ends here
                        }//check for phone number length ends here
                        else
                        {
?>
                            <h1>Error</h1>
                            <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                            <p class="errorText">Looks like your phone number entered is incorrect! Please click on the link and go back to the registration page!<a href="RegistraionForm.html">Registration Page</a></p>
<?php
                        }
                    }//password check with retype password ends
                    else
                    {
?>
                        <h1>Error</h1>
                        <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                        <p class="errorText">Looks like the passwords don't match! Please click on the link and go back to the registration page and fill again!<a href="RegistraionForm.html">Registration Page</a></p>
<?php

                    }
                }//Password validation ends
                else
                {
?>
                    <h1>Error</h1>
                    <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                    <p class="errorText">Looks password doesn't match required criteria! Please click on the link and go back to the registration page and fill again!<a href="RegistraionForm.html">Registration Page</a></p>
<?php
                }
            }
            else
            {
?>
                <h1>Error</h1>
                <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                <p class="errorText">Sorry seems that you have left some required field empty! Please refer this link for our registration page and fill again.<a href="RegistraionForm.html">Registration Page</a></p>
<?php
            }
        }
        else
        {
?>
            <h1>Error</h1>
            <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
            <p class="errorText">Sorry seems that there is some error with the type of user that you are!Please refer this link for our pre registration page and fill again.<a href="RegistraionForm.html">Registration Page</a></p>
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
                <li><a href="AboutUS.php">About Us</a></li>
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
