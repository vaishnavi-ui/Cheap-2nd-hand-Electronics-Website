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
//$_SESSION["username"]="vaish1";
$prev_username=$_SESSION["username"];
$new_username=$_POST["new_username"];

$sql1="SELECT username from buyer where username='$new_username'";
$result1=$conn->query($sql1);

$sql2="SELECT username from seller where username='$new_username'";
$result2=$conn->query($sql2);


 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Update Username</title>
     <!-- font awesome link to add different icons -->
     <script src="https://kit.fontawesome.com/f681854d4a.js" crossorigin="anonymous"></script>
     <link rel="icon" href="icon.jpg" type="image/gif" sizes="16x16">
     <style>
     h1{
         text-align: center;
         color: #41aea9;
         font-size: xx-large;
         font-family: 'Gill Sans', 'Gill Sans MT',
         ' Calibri', 'Trebuchet MS', 'sans-serif';
     }
   .sidebar {
   height: 100%;
   width: 220px;
   position: fixed;
   z-index: 1;
   top: 0;
   left: 0;
   background-color: #41aea9;
   overflow-x: hidden;
   padding-top: 16px;
 }

 .sidebar a {
   padding: 6px 8px 6px 16px;
   text-decoration: none;
   font-size: 20px;
   color: white;
   display: block;
 }

 .sidebar a:hover {
   color: black;
 }
   @media screen and (max-height: 450px) {
     .sidebar {padding-top: 15px;}
     .sidebar a {font-size: 18px;}
   }
     .footer
     {
       background-color:black;
       width: 100%;
       height: 300px;
       margin-left: 40px;
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
     </style>
   </head>
   <body>
     <div class="sidebar">
     <!--<a href="#home"><i class="fa fa-fw fa-home"></i> Home</a>--> <br>
     <a href="ChangePassword_main.php"><i class="fas fa-key"></i></i> Change Password</a>
     <a href="UpdateUsername.php"><i class="fa fa-fw fa-user"></i> Change Username</a>
     <a href="DeleteAccount.php"><i class="fas fa-trash"></i></i> Delete Account</a>
   </div>
     <div class="main">
         <h1>Hello ,<?php echo $_SESSION["username"]; ?></h1>
         <?php if ($result1->num_rows> 0 || $result2->num_rows>0) {
         while($row1 = $result1->fetch_assoc()||$row2=$result2->fetch_assoc()) { ?>
           <div id='card'>
               <div id='upper-side'>
                   <h3 id='status'>Error</h3>
                 </div>
           <div id='lower-side'>
                 <p id='message'>Requested username is taken, try another one.</p>
                   <a href="UpdateUsername.php" id="contBtn">Go Back</a>
            </div>
            </div>
         <?php break;}
         }
         else{
           $sql4 = "UPDATE seller SET username='$new_username' where username='$prev_username'";
           $sql3 = "UPDATE buyer SET username='$new_username' where username='$prev_username'";
           if($conn->query($sql3)==true || $conn->query($sql4)==true)
           {
             $_SESSION["username"]=$new_username;?>
             <div id='card'>
                 <div id='upper-side'>
                     <h3 id='status'>Success</h3>
                   </div>
             <div id='lower-side'>
                   <p id='message'>Your username has been changed!.</p>
                     <a href="ChangePassword_main.php" id="contBtn">Continue</a>
              </div>
            </div>
           <?php }
         }
         $conn->close(); ?>
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
 </html>
