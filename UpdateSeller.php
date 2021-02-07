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

    $username=$_SESSION["username"];

    $sql1 = "SELECT * FROM seller where username='$username'";
    $result1 = $conn->query($sql1);
    $row1=$result1->fetch_assoc();
    $conn->close();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Your Account</title>
        <!-- font awesome link to add different icons -->
        <script src="https://kit.fontawesome.com/f681854d4a.js" crossorigin="anonymous"></script>
        <link rel="icon" href="icon.jpg" type="image/gif" sizes="16x16">
        <!-- CSS FOR STYLING THE PAGE -->
        <style>
        body{
          background-color: #e8ffff;
        }
        table
        {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
            border-collapse: collapse;
        }
        input{
          width:68%;
          display: block;
          padding: 8px 9px;
          margin: 8px 0;
          box-sizing: border-box;
        }
        input:hover{
          background-color: #e8ffff;
          border: solid 2px black;

        }
        input:focus{
          border:solid 3px black;
          padding: 10px;
        }
        label{
          font-size: 120%;
        }

        h1,h3{
            text-align: center;
            color: #41aea9;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }

        td
        {
            border: 1px solid black;
        }

        th,td
        {
            border: 1px solid black;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }
        tr:hover {background-color: #f5f5f5;}

        .left-div{
          width:45%;
          padding-left: 100px;
          float: left;
          /*height:1350px;*/
          border:2px solid lightgrey;
          background-color: white;
        }
        .right-div{
          width: 45%;
          /*height:1350px;*/
          float: right;
          border:2px solid lightgrey;
          background-color: white;
        }
        .profile-pic{
          width:30%;
          padding: 2%;
          margin-left: 220px;
          border-radius: 100%;
        }
        .form{
          padding: 1%;
          margin-left: 180px;
          padding-top:2%;
          padding-bottom: 5%;
        }
        #update-Button{
          background-color: black;
          color: white;
          font-size: 100%;
          padding: 16px 20px;
          border: none;
          cursor: pointer;
          width: 70%;
          opacity: 0.9;
        }
        #update-Button:hover {
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        opacity: 1;
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

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  padding: 0px 10px;
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
  margin-top: 1400px;
  margin-left: 20px;
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
  <div class="sidebar">
  <!--<a href="#home"><i class="fa fa-fw fa-home"></i> Home</a>--> <br>
  <a href="ChangePassword_main.php"><i class="fas fa-key"></i></i> Change Password</a>
  <a href="UpdateUsername.php"><i class="fa fa-fw fa-user"></i> Change Username</a>
  <a href="DeleteAccount.php"><i class="fas fa-trash"></i></i> Delete Account</a>
</div>
  <div id="main">
      <h1>Update your Account , <?php echo $_SESSION["username"]; ?></h1>
<div class="left-div">
  <h3>Your Profile Details</h3>
  <img src="profile-pic.png" alt="profile-image" class="profile-pic"><br>
  <table cellpadding="8px">
    <tr>
      <th>First Name</th>
      <td><?php echo $row1["first_name"]?></td>
    </tr>
    <tr>
      <th>Last Name</th>
      <td><?php echo $row1["last_name"]?></td>
    </tr>
    <tr>
      <th>Email</th>
      <td><?php echo $row1["email"]?></td>
    </tr>
    <tr>
      <th>Username</th>
      <td><?php echo $row1["username"]?></td>
    </tr>
    <tr>
      <th>Phone Number</th>
      <td><?php echo $row1["phnumber"]?></td>
      </tr>
      <tr>
        <th>Age</th>
        <td><?php echo $row1["age"]?></td>
      </tr>
    <tr>
      <th>Birthday</th>
      <td><?php echo $row1["birthday"]?></td>
    </tr>
    <tr>
      <th>City</th>
      <td><?php echo $row1["city"]?></td>
    </tr>
    <tr>
      <th>Address</th>
      <td><?php echo $row1["address"]?></td>
    </tr>
    <tr>
      <th>Landmark</th>
      <td><?php echo $row1["landmark"]?></td>
    </tr>
    <tr>
      <th>Pincode</th>
      <td><?php echo $row1["pincode"]?></td>
    </tr>
    <tr>
      <th>State</th>
      <td><?php echo $row1["state"]?></td>
    </tr>
  </table>
</div>
<div class="right-div">
  <h3>Update Your Profile</h3>
  <form action="UpdatedProfile.php" method="post" class="form">
      <label for="firstname">First Name</label><br>
      <input type="text" name="firstname" id="fname" required value="<?php echo $row1["first_name"]?>"><br>

      <label for="lastname">Last Name</label><br>
      <input type="text" name="lastname" id="lname" required value="<?php echo $row1["last_name"]?>"><br>

      <label for="email">Email</label><br>
      <input type="email" name="email" id="email" required value="<?php echo $row1["email"]?>"><br>

      <label for="username">Username</label><br>
      <input type="text" name="username" id="username" required disabled value="<?php echo $row1["username"]?>"><br>

      <label for="phno">Phone Number</label><br>
      <input type="number" name="phnumber" id="phnumber" required maxlength="10" minlength="6" value="<?php echo $row1["phnumber"]?>"><br>

      <label for="age">Age</label><br>
      <input type="number" name="age" id="age" required min="18" max="100" value="<?php echo $row1["age"]?>"><br>

      <label for="bday">Birthday</label><br>
      <input type="date" name="birthday" id="birthday" required value="<?php echo $row1["birthday"]?>"><br>

      <label for="address">Address</label><br>
      <input type="text" name="address" id="address" required value="<?php echo $row1["address"]?>"><br>

      <label for="landmark">Landmark</label><br>
      <input type="landmark" name="landmark" id="landmark" required value="<?php echo $row1["landmark"]?>"><br>

      <label for="pincode">Pincode</label><br>
      <input type="number" name="pincode" id="pincode" required minlength="6" maxlength="6" value="<?php echo $row1["pincode"]?>"><br>

      <label for="city">City</label><br>
      <input type="text" name="city" id="city" required value="<?php echo $row1["city"]?>"><br>

      <label for="state">State</label><br>
      <input type="text" name="state" id="state" required value="<?php echo $row1["state"]?>"><br>

      <input type="Submit" name="Submit" id="update-Button">
  </form>
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
