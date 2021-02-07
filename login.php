<?php
session_start();
if(isset($_POST["submit"]))
{
	$username=$_POST["username"];
	$password=$_POST["password"];
	// session variable to store the username from login to logout

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

 if($conn === false){
	 $connection="Connection Unsuccessful!";
    die("ERROR: Could not connect. " . $conn->connect_error);
}
else
$connection="Connected Successfully";
 //echo "Connected Successfully";
// queries to check if the entered username and password entered by the user are correct
$sql1="SELECT * FROM buyer WHERE username='$username' AND password='$password'";
$result1=$conn->query($sql1);

$sql2="SELECT * FROM seller WHERE username='$username' AND password='$password'";
$result2=$conn->query($sql2);


if($result1||$result2){
	if($result1->num_rows>0)
	{
		while($row1=$result1->fetch_assoc())
		{
			//echo "Welcome buyer ";
			$_SESSION["username"]=$row1["username"];
			$_SESSION["typeOfUser"]= "buyer";
			$_SESSION["id"]=$row1["id"];
			$login="Login Successful!";
			$link="<button><a href='HomePage_Buyer.php'>Continue</a></button>";
			break;
		}
	}
	else if($result2->num_rows>0)
	{
		while($row2=$result2->fetch_assoc())
		{
			$_SESSION["username"]=$row2["username"];
			$_SESSION["typeOfUser"]= "seller";
			$_SESSION["id"]=$row1["id"];
			$login="Login Successful!";
			$link="<button><a href='HomePage_Seller.php'>Continue</a></button>";
			break;
		}
	}
	else{
		$login="Incorrect username or password";
		$link="<button><a href='login.html'>Go Back</a></button>";
	}
}
else{
	$login="Incorrect username or password";
	$link="<button><a href='login.html'>Go Back</a></button>";
}
CloseCon($conn);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<!-- font awesome link to add different icons -->
    <script src="https://kit.fontawesome.com/f681854d4a.js" crossorigin="anonymous"></script>
		<link rel="icon" href="icon.jpg" type="image/gif" sizes="16x16">
		<style>
		h1{
      font-size: 250%;
    }
    h2{
      font-size: 180%;
      color: #006a71;
    }
    .main{
      background-image: url("login-img.png");
      min-height: 365px;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      position: relative;
    }
		.form{
      width:30%;
      border:2px solid grey;
      padding: 1%;
      margin-left: 1030px;
      background-color: #eeeeee;
      padding-top:2%;
      padding-bottom: 5%;
      opacity: 0.9;
    }
		a{
			color: white;
			font-size: 120%;
			text-decoration: none;
		}
		button{
      background-color: black;
      color: white;
      font-size: 100%;
      padding: 16px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }
    button:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    opacity: 1;
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
		<!--Normal-->
    <div class="navBar">
        <div style="float:  left;font-size: 35px;text-align: center;margin: 10px;"><a href="#">EduTech</a></div>
        <ul>
            <!--<li><a href="login.html">Login</a></li>-->
            <li><a href="PreRegistrationForm.php">Register</a></li>
            <li><a href="ContactUs.php">Contact Us</a></li>
            <li><a href="AboutUs.php">About Us</a></li>
        </ul>
    </div>
		<div class="main">
			<div class="form">
				<br>
				<h1>Authentication</h1>
				<h2>Welcome to EduTech</h2><br>
				<h3><?php echo $login; ?></h3>
				<br>
				<p><?php echo $link; ?></p>
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
</html>
