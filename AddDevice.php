<!DOCTYPE html>
<html>
	<head>
		<title>Add Device</title>
		<link rel="stylesheet" type="text/css" href="HeaderFooter_Style.css">
		<script src="https://kit.fontawesome.com/f681854d4a.js" crossorigin="anonymous"></script>
		<link rel="icon" href="icon.jpg" type="image/gif" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="AddDevice_Style.css">
	</head>
	<body>
		    <!--Normal-->
		    <!--Normal-->
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
            <div style="float:  left;font-size: 35px;text-align: center;margin: 10px;"><a href="HomePage_Seller.html">EduTech</a></div>
            <ul>
                <li><a href="Logout.php">Logout</a></li>
                <li><a href="ContactUs.php">Contact Us</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
            </ul>
    </div>
		<div class="mainDiv">

			<div id="form">
				<h1>Add a Device to Sell</h1>
				<p><em>Help out kids and sell devices for free or cheap rates!</em></p>
				<form style="float: right;" action="http://localhost/AddDevice_PHP.php"5 method="post">

					<!--Name of the device-->
					<input type="text" name="name" id="name" placeholder="Device Name">

					<!--type of device:dropdown menu-->
					<select id="type" name="type" required>
						<option value="" disabled selected hidden>Device Options</option>
						<option value="Laptop">Laptop</option>
						<option value="Desktop">Desktop</option>
						<option value="Tablet">Tablet</option>
						<option value="Mobile">Mobile Phone</option>
					</select><br>

					<!--Price input for the device-enabled only when type of device is selected first-->
					<label for="price">Price at which you want to sell: </label>
					<input type="number" name="price" id="price" style="width: 15%; border:solid 1px;" required onblur="priceCheck()" disabled  min="0"><br>

					<!--Label to display output of price validation-->
					<label id="priceValidate" style="color: red;font-size: 12px;"></label>

					<!--To input brandand model of the device-->
					<input type="text" name="brand" id="brand" placeholder="Brand of device" required>

					<input type="text" name="model" id="model" placeholder="Model of Device" required><br>

					<!--Inputing sample image of the device-->
					<label for="files">Upload one image of your device:</label>
				  	<input type="file" id="files" name="files" style="border:none;width: auto;" required><br><br>

				  	<!--Short description of the device-->
					<textarea name="description" id="description" placeholder="Add a small description of your device." rows="5" cols="60"></textarea><br>

					<input type="Submit" name="Submit" id="buttonStyle">


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
		var x=document.getElementById("type");
		x.onblur=function()
		{
			var typeField=document.getElementById("type").value;
			document.getElementById("priceValidate").innerHTML="";
			var priceField=document.getElementById("price")
			priceField.disabled= false;
			if (typeField=="Laptop")
			{
				priceField.max="8000";
			}
			else if(typeField=="Mobile")
			{
				priceField.max="2000";
			}
			else if(typeField=="Tablet")
			{
				priceField.max="5000";
			}
			else if(typeField=="Desktop")
			{
				priceField.max="10000";
			}

		}
		function priceCheck()
		{
			var deviceType=document.getElementById("type").value;
			var devicePrice=document.getElementById("price").value;
			if (deviceType==""||deviceType==null)
			{
				document.getElementById("priceValidate").innerHTML="Please select a device type first!";
			}
			if (deviceType=="Laptop"&&devicePrice>8000)
			{
				document.getElementById("priceValidate").innerHTML="Please ensure that the price is less than Rs. 8000!";
			}
			else if(deviceType=="Laptop"&&devicePrice<8000)
			{
				document.getElementById("priceValidate").innerHTML="";
			}
			if (deviceType=="Desktop"&&devicePrice>10000)
			{
				document.getElementById("priceValidate").innerHTML="Please ensure that the price is less than Rs.10000!";
			}
			else if(deviceType=="Desktop"&&devicePrice<10000)
			{
				document.getElementById("priceValidate").innerHTML="";
			}
			if (deviceType=="Mobile"&&devicePrice>2000)
			{
				document.getElementById("priceValidate").innerHTML="Please ensure that the price is less than Rs.2000!";
			}
			else if(deviceType=="Mobile"&&devicePrice<2000)
			{
				document.getElementById("priceValidate").innerHTML="";
			}
			if (deviceType=="Tablet"&&devicePrice>5000)
			{
				document.getElementById("priceValidate").innerHTML="Please ensure that the price is less than Rs.5000!";
			}
			else if(deviceType=="Tablet"&&devicePrice<5000)
			{
				document.getElementById("priceValidate").innerHTML="";
			}

		}
	</script>


</html>
