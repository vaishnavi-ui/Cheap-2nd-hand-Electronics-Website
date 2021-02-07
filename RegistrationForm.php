
<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
	<script src="https://kit.fontawesome.com/f681854d4a.js" crossorigin="anonymous"></script>
	<link rel="icon" href="icon.jpg" type="image/gif" sizes="16x16">
	<link rel="stylesheet" type="text/css" href="RegistrationForm_Style.css">
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
        <div>
			<div style="width: 50%;float: left;text-align: center;background-color:  white;height: 900px">
				<h1><em>Registration Form</em></h1>
				<p><em>New to this site? Register with us! Help other kids or get a boost for your education!</em></p>
	  			<form action="http://localhost/RegistrationForm_PHP.php" method="post">

	    			<!--To input the first and last name, conditions: should be text only-->
	    			<input type="text" name="first_name" id="first_name" placeholder="First Name" required title="Can contain only text." pattern="(?=.*[a-z])(?=.*[A-Z]).{1,}">

					<input type="text" name="last_name" id="last_name" placeholder="Last Name" required title="Can contain only text." pattern="((?=.*[a-z])(?=.*[A-Z]).{1,}"><br>

					<!-- To input email id-->
					<input type="email" name="email" id="email" placeholder="Email-Id" required title="Enter your email id"><br>

					<!--To input username, in php file we check if the username is already present-->
					<input type="text" name="username" id="username" placeholder="Username" required title="Username"><br>

					<!--To input password, it should have one number,character,uppercase,lowercase and should be of size 8:javascript validation is done so we can display right on the page when user enters password-->
					<input type="password" name="password" id="password" placeholder="Password" required title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" onblur="regexPass()" style="margin-left: 60px;">
					<label class="switch"><input type="checkbox" onclick="showPwd('password')"><span class="slider"></span></label><br>

					<!--Label to display password validation-->
					<label id="passwordValidate" style="color: red;"></label><br>

					<!--To recheck the password: after password is entered, this field gets activated and then we check if both the entered passwords are same, validation done in javascript,ie, on blur function is called-->
					<input type="password" name="passwordCheck" id="passwordCheck" placeholder=" ReType Password" required title="Type your password again" onblur="passwordSame()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" disabled style="margin-left: 60px;">
					<label class="switch"><input type="checkbox" onclick="showPwd('passwordCheck')"><span class="slider"></span></label><br>

					<!--Label to display recheck validation-->
					<label id="passwordDisp" style="color: red;"></label><br>

					<!--To input phone number, age abd birthday-->
					<input type="number" name="phnumber" id="phnumber" placeholder="Phone Number" required title="Phone Number" minlength="10" maxlength="10"><br>

					<input type="number" name="age" id="age" placeholder="Age" title="Age" ><br>

					<label for="birthday">Birthday:</label><br>
	  				<input type="date" id="birthday" name="birthday"><br>

	  				<!-- To input address, landmark,pincode and city and a dropdown to select state-->
	  				<div>
	  					Address:<br>
	  					<input type="text" name="address" placeholder="Address" style="width: 50%" required title="Address"><br>

	  					<input type="text" name="landmark" placeholder="Landmark" style="width: 10%" title="Landmark ">

	  					<input type="number" name="pincode" placeholder="Pin Code" style="width: 10%" required title="Pin Code">

	  					<input type="text" name="city" placeholder="City" style="width: 10%" required title="City">


						<select name="state" id="state" style="width: 30%" required>
							<option value="" disabled hidden selected>State</option>
							<option value="Andhra Pradesh">Andhra Pradesh</option>
							<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
							<option value="Arunachal Pradesh">Arunachal Pradesh</option>
							<option value="Assam">Assam</option>
							<option value="Bihar">Bihar</option>
							<option value="Chandigarh">Chandigarh</option>
							<option value="Chhattisgarh">Chhattisgarh</option>
							<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
							<option value="Daman and Diu">Daman and Diu</option>
							<option value="Delhi">Delhi</option>
							<option value="Lakshadweep">Lakshadweep</option>
							<option value="Puducherry">Puducherry</option>
							<option value="Goa">Goa</option>
							<option value="Gujarat">Gujarat</option>
							<option value="Haryana">Haryana</option>
							<option value="Himachal Pradesh">Himachal Pradesh</option>
							<option value="Jammu and Kashmir">Jammu and Kashmir</option>
							<option value="Jharkhand">Jharkhand</option>
							<option value="Karnataka">Karnataka</option>
							<option value="Kerala">Kerala</option>
							<option value="Madhya Pradesh">Madhya Pradesh</option>
							<option value="Maharashtra">Maharashtra</option>
							<option value="Manipur">Manipur</option>
							<option value="Meghalaya">Meghalaya</option>
							<option value="Mizoram">Mizoram</option>
							<option value="Nagaland">Nagaland</option>
							<option value="Odisha">Odisha</option>
							<option value="Punjab">Punjab</option>
							<option value="Rajasthan">Rajasthan</option>
							<option value="Sikkim">Sikkim</option>
							<option value="Tamil Nadu">Tamil Nadu</option>
							<option value="Telangana">Telangana</option>
							<option value="Tripura">Tripura</option>
							<option value="Uttar Pradesh">Uttar Pradesh</option>
							<option value="Uttarakhand">Uttarakhand</option>
							<option value="West Bengal">West Bengal</option>
						</select>
	  				</div>

	  				<input type="submit" name="submit" id="buttonStyle" value="Submit">
	  				<p>By clicking on Submit and Registering, you argree and accept our <a href="#">Terms and Conditions.</a></p>
	      		</form>
			</div>
			<div style="float: right;width: 50%;height: 900px;margin-top: 0px;">
				<img src="RegistrationForm_Img.jpg" height="900px" width="750px;">
			</div>
		</div>
		    <div class="footer" style="background-color: black;">
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
	<script>
		//Function to check the password, if it is correct then re enter password is enabled.
		function regexPass()
		{
			var password=document.getElementById("password").value;
			document.getElementById("passwordValidate").appendChild(document.createElement("br"));
			var pass=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
			if(password==""||password==null)
			{
			document.getElementById("passwordValidate").innerHTML="Enter password first!";
			}
			else if((password.length)<8)
			{
				document.getElementById("passwordValidate").innerHTML="Password should  be of minimum 8 characters!";
			}
			else if (!password.match(pass))
			{
			document.getElementById("passwordValidate").innerHTML="Must Contain one uppercase,lowercase,special character!";
			}
			else
			{
				document.getElementById("passwordValidate").innerHTML="";
				document.getElementById("passwordCheck").disabled = false;
			}
		}

		//Checking if both the passwords are matching
		function passwordSame()
		{
			var password=document.getElementById("password").value;
			var retype=document.getElementById("passwordCheck").value;
			if(password==null||password=="")
			{
				document.getElementById("passwordDisp").innerHTML="Please enter password first!";
			}
			else
			{
				if(retype!=""||retype!=null)
				{
					if (password!=retype)
					{
					document.getElementById("passwordDisp").innerHTML="Passwords don't match!";
					}
					else
					{
						document.getElementById("passwordDisp").innerHTML="";
					}
				}
			}
		}
		function showPwd(variable) {
			var x = document.getElementById(variable);
			if (x.type === "password")
			{
			   x.type = "text";
			}
			else
			{
			  x.type = "password";
			}
		}

		function validateForm()
		{
			//Retreiving all the form values
			first_name=document.getElementById("first_name").value;
			last_name=document.getElementById("last_name").value;
			username=document.getElementById("username").value;
			password=document.getElementById("password").value;
			email=document.getElementById("email").value;
			num=document.getElementById("phnumber").value;
			passwordCheck=document.getElementById("passwordCheck").value;
			//Experessions to check email and password
			var reg=new RegExp("(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}")
			var pass=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
			var em=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
			//Checking if entire name is entered
			if(first_name==""||first_name==null||last_name==""||last_name==null)
			{
				alert("Enter your name!");
			}
			else
			{
				//Checking if username is entered
				if(username==""||username==null)
				{
					alert("Enter username!");
				}
				else
				{
					//Checking if password is entered
					if(password==""||password==null)
					{
						alert("Enter Password!");
					}
					//Checking if the password entered is correct and matches the regular expression
					else if(password.match(pass))
					{
						//Checking if email id is entered
						if(email==""||email==null)
							alert("Enter your email ID!");
						//Checking if email id entered is correct
						else if (email.match(em))
						{
							//checkes for the phone number entered
							if (num==null||num.length!=10)
								alert("Enter a valid number!");
							else
							{
								//Checking that for the gender variable atleast one is checked
								if (passwordCheck!=""||passwordCheck!=null)
								{
									if(passwordCheck==password)
									{
										alert("Form Filled Successfully!");
									}
									else
									{
										alert("Passwords don't match");
									}
								}
								else
								{
									alert("Please fill re-type password");
								}
						   	}
				   		}
				   		else
				   			alert("Incorect Email ID!");
					}
					else
					{
						alert("Enter correct password! Ensure password has an upper case, lower case and special character and a numerical value.");
					}
				}
			}
		}
	</script>


</html>
