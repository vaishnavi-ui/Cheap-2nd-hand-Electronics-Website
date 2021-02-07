<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Registration Form</title>
		<script src="https://kit.fontawesome.com/f681854d4a.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="PreRegistration_Style.css">
		<link rel="icon" href="icon.jpg" type="image/gif" sizes="16x16">

	</head>

	<body>
		<div class="navBar">
	        <div style="float:  left;font-size: 35px;text-align: center;margin: 10px;"><a href="HomePage_Common.php">EduTech</a></div>
	        <ul>
	            <li><a href="Login.html">Login</a></li>
	            <li><a href="PreRegistrationForm.php">Register</a></li>
	            <li><a href="ContactUs.php">Contact Us</a></li>
	            <li><a href="AboutUs.php">About Us</a></li>
	        </ul>
    	</div>
		<!--Image at the top-->
		<div style="width: 100%;position: relative;">
			<img src="PreRegistration_Img.jpg" alt="Pre Registration-Poor Kids" class="headerImg">
			<div class="overlay">Registration Page</div>
		</div>

		<div style="margin-left: 150px;margin-right: 140px;text-align: center;background-color: #edfffa">
			<h3>New to this site? Register with us!</h3>
			<p><em>Either sell devices at cheap prices or buy them for your education!</em></p>

			<!--Form for buyer and seller-->
  			<form action="http://localhost/PreRegistrationForm_PHP.php" method="post">
    			<div>
					Please select if you want to buy or sell:<br>
					<input type="radio" id="typeOfUser" name="typeOfUser" value="seller" onfocus="remove()" checked="checked">
					<label for="seller"> Seller </label><br>
					<input type="radio" id="typeOfUser" name="typeOfUser" value="buyer"  onfocus="checkForUser()">
					<label for="buyer"> Buyer </label>	<br><br>
					<div id="disp"></div>
					<input type="submit" name="Submit" value="Submit" class="submitButton"><br>
				</div>
      		</form>

      		<!--Information about who the buyer and seller is-->
      		<div>
				<details style="margin-left: 300px;" >
      				<summary class="dropButton">Who is  a Buyer?</summary>
      				<div class="panel">
      					<p>A buyer is someone who in not previleged enough to buy electronic products and does not have the finiancial backing to buy expensive gadgets which are must for education in current Covid times.<br>
      					A buyer can buy electronic gadgets from our site. We ensure that the income of the buyer is genuienly low and the buyer is a student. Please provide the neccessary documents. </p>
      			</div>
      			</details>
      			<details style="margin-left: 300px;">
      				<summary class="dropButton">Who is a Seller</summary>
      				<div class="panel">
      					<p> A seller is anyone who wants to donate or sell new/used electronic gadgets at a lower rate. You will be allowed to sell products and not buy them.</p><br>
      				</div>
      			</details>
      		</div>
     	 	<p> If you have any queries please check our <a href="AboutUs.php">About Us</a> and <a href="TermsAndConditions.php">Terms and Conditions</a> pages.</p>
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
	            <li><a href="AboutUs.html">About Us</a></li>
	            <li><a href="ContactUs.html">Contact Us</a></li>
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
		//Function to take the input for income and id proof for buyer- to ensure that the user is aunthetic
		function checkForUser()
		{
			var type = document.getElementById("typeOfUser");
			var parent=document.getElementById("disp");

			//removing child nodes
			while(parent.hasChildNodes())
			{
					parent.removeChild(parent.lastChild);
			}
			parent.appendChild(document.createElement("br"));

			//Setting field and settings for annual income
			parent.appendChild(document.createTextNode("Income: "));
			var inp=document.createElement("input");
			inp.type="number";
			inp.id="income";
			inp.name="income";
			inp.placeholder="Annual Income";
			inp.max="100000";
			inp.min="0";
			inp.required=true;
			inp.title="We allow people to buy only if income is less than Rs.20,000";
			inp.setAttribute('style','width:40%;height:28px;');
			parent.appendChild(inp);

			parent.appendChild(document.createElement("br"));
			parent.appendChild(document.createElement("br"));

			//Setting field and settings for id proof
			parent.appendChild(document.createTextNode("Please upload your college/school id: "));
			var proof=document.createElement("input");
			proof.type="file";
			proof.name="college_proof";
			proof.id="college_proof";
			proof.required=true;
			proof.setAttribute('style','margin-bottom:50px;');
			parent.appendChild(proof);
		}

		//If the buyer selects seller, then the input fields of buyer are removed
		function remove()
		{
			var parent=document.getElementById("disp");

			//removing child nodes
			while(parent.hasChildNodes())
			{
					parent.removeChild(parent.lastChild);
			}

			parent.innerHTML="";

		}

	</script>
</html>
