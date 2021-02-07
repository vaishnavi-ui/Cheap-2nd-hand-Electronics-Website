<!DOCTYPE html>
<html>
	<head>
		<title>Contact Us</title>
		<link rel="stylesheet" type="text/css" href="HeaderFooter_Style.css">
                <script src="https://kit.fontawesome.com/f681854d4a.js" crossorigin="anonymous"></script>
                <link rel="icon" href="icon.jpg" type="image/gif" sizes="16x16">
		<style>
			.overlay 
			{
			  position: absolute; 
			  bottom: 0; 
			  background: rgb(0, 0, 0);
			  background: rgba(0, 0, 0, 0.5); /* Black see-through */
			  color: #f1f1f1; 
			  width: 1500px;
			  transition: .5s ease;
			  opacity:50;
			  color: white;
			  font-size: 30px;
			  font-weight: bold;
			  text-align: center;
			  height: 100px;
			}
			.gallery
			{
				height:350px;
				width: 300px;
				border-top: solid  #006a71 5px;
				padding: 2px;
				margin: 35px;
				background-color: #e8ffff;
				float: left;
				border-bottom: solid lightgray 2px;
				border-left: solid lightgray 2px;
				border-right: solid lightgray 2px;
				text-align: center;
				box-shadow:5px 10px 18px #888888;
				transition: 1s;

			}
			.gallery img
			{
				height: 100px;
				width: 100px;
			}
			.gallery p
			{
				line-height: 30px;
				font-size: 17px;
			}
			.gallery:hover
			{
				box-shadow:20px 20px 28px #888888;
				
			}
			input, textarea {
			  width: 80%; 
			  padding: 12px; /* Some padding */ 
			  border: 1px solid #ccc; /* Gray border */
			  border-radius: 4px; /* Rounded borders */
			  box-sizing: border-box; /* Make sure that padding and width stays in place */
			  margin-top: 6px; /* Add a top margin */
			  margin-bottom: 16px; /* Bottom margin */
			   /* Allow the user to vertically resize the textarea (not horizontally) */
			}
			.contactForm
			{
				width: 50%;
				float: right;
				margin-top: 100px;
				background-color: #e8ffff;
				font-family: serif, Book Antiqua;
				color:  #006a71;
				font-size: 15px;
			}
		</style>
	</head>
	<body>
		<?php 
			if(!isset($_SESSION['typeOfUser']))
			{
		?>
				<div class="navBar">
			        <div style="float:  left;font-size: 35px;text-align: center;margin: 10px;"><a href="#">EduTech</a></div>
			        <ul>
			            <li><a href="#">Login</a></li>
			            <li><a href="#">Register</a></li>
			            <li><a href="#">Contact Us</a></li>
			            <li><a href="#">About Us</a></li>
			        </ul>
			    </div>
		<?php
			}
			else if($_SESSION['typeOfUser']=="buyer")
			{
?>
				<div class="navBar">
            <div class="dropdown">
                <button class="dropbtn"><i class="fa fa-bars" aria-hidden="true" style="font-size: 40px;"></i></button>
                <div class="dropdown-content">
                     <a href="#">See Device</a>
                     <a href="#">Cart</a>
                     <a href="#">Update Profile</a>
                </div>
            </div>
            <div style="float:  left;font-size: 35px;text-align: center;margin: 10px;"><a href="#">EduTech</a></div>
            <ul>
                <li style="width: 50px;margin:0;padding: 0;text-align: center;"><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 20px;"></i></a></li>
                <li><a href="#">Logout</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
        </div>
<?php
			}
			else if($_SESSION['typeOfUser']=="seller")
			{
		?>
				    <div class="navBar">
			            <div class="dropdown">
			                <button class="dropbtn" ><i class="fa fa-bars" aria-hidden="true" style="font-size: 40px;"></i></button>
			                <div class="dropdown-content">
			                     <a href="AddDevice.html">Add Device</a>
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
			}
?>

		<div style="margin-left: 0px;margin-right: 0px;position: relative;width: 1500px;height: 405px;background-image: url(ContactUsImage.jpg);background-position: center;background-repeat:no-repeat;background-size: cover;display: block; ">			
			<div class="overlay"><p style="margin-top:35px;">Contact Us </p></div>
		</div>
		<div style="margin-left: 180px;margin-top: 100px;" >
				<div class="gallery">
					<h3> Email</h3>
					<img src="contactUsEmail.jpg" alt="Email Image">
					<h3>Contact Us on our company email IDs mentioned here: </h3>
					<p>ourcompany@company.com<br>
					   comapnymail2@company.com</p>
				</div>
				<div class="gallery">
					<h3>Number</h3>
					<img src="contactUsPhone.jpg" alt="Email Image">
					<h3>Contact Us on our numbers mentioned here: </h3>
					<p>Mobile Number: 9858965260<br>
						Landline: 0225896585260<br>
						Office: 022895475120<br><br></p>
				</div>
				<div class="gallery">
					<h3>Address</h3>
					<img src="contactUsLocation.jpg" alt="Email Image">
					<h3>Visit us at our office address:  </h3>
					<p>EduTech,Nehru Road, <br>
						Vile Parle West,<br>
						Mumbai, Maharashta<br><br></p>
				</div>
		</div>
		<div style="margin-top: 100px;margin-right: 55px;">
			<div style="width: 50%;float: left;">				
				<img src="contactUs3.jpg" style="height: 450px;float: right;width: 650px;margin-top: 100px;">
			</div>
			<div class="contactForm">
				<h1 style="text-align: center;">Write to Us</h1>
				<form style="margin-left: 50px;">
					<label for="name">Your Name </label><br>
					<input type="text" name="name"><br>
					<label for="email">Your Email</label><br>
					<input type="email" name="email"><br><br>
					<label for="questions">Your Questions</label><br>
					<textarea rows="5"></textarea>
					<input type="submit" name="submit" value="Submit" style="background-color:  #006a71">
				</form>
			</div>
		</div>
		    <div class="footer" style="margin-top: 1200px;">
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