<?php
session_start();

//$_SESSION["username"]="just1";
//$_SESSION["type"]="buyer";
$username=$_SESSION["username"];
$_SESSION["cart"]=array();
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
    die("ERROR: Could not connect. " . $conn->connect_error);}
else
 //echo "Connected Successfully";
//echo "<br>";
$sql1="SELECT * FROM device";
//$sql1="SELECT * FROM device where status='unsold'";
if($conn->query($sql1)==true)
{
  $msg="";
}
else
{
  $msg="No devices available for selling";
}

if(isset($_POST["filter"]))
{
  $type=array();
  $counter=0;
  foreach($_POST['type'] as $selected)
  {
          array_push($type, $selected) ;
          $counter++;
  }
  if($counter==1)
  {
    $sql1="SELECT * FROM device where type='$type[0]' ";
  }
  else if($counter==2)
  {
    $sql1="SELECT * FROM device where type='$type[0]' or type='$type[1]'";
  }
  else if($counter==3)
  {
    $sql1="SELECT * FROM device where type='$type[0]' or type='$type[1]' or type='$type[2]'";
  }
    else if($counter==4)
  {
    $sql1="SELECT * FROM device where type='$type[0]' or type='$type[1]' or type='$type[2]' or type='$type[3]'";
  }
}
if(isset($_POST["search"]))
{
  $price=$_POST['price'];
  $sql1="SELECT * FROM device where price<'$price' ";
}
if(isset($_POST["search1"]))
{
  $brand=ucfirst($_POST['brand']);
  $sql1="SELECT * FROM device where brand='$brand' ";
}
$result1=$conn->query($sql1);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Display Devices</title>
    <!-- font awesome link to add different icons -->
    <script src="https://kit.fontawesome.com/f681854d4a.js" crossorigin="anonymous"></script>
    <link rel="icon" href="icon.jpg" type="image/gif" sizes="16x16">
    <!-- for usign ajax-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <script>
    var ar= [];
    var str="";
    function add(id){
      //window.alert("in add");
      ar.push(id);
      //window.alert("ar"+ar);
      //str=str+id;
      //window.alert("str"+str);
    }
    function goto(){
      var json_id=JSON.stringify(ar);
      //alert(json_id);
      document.cookie="cartItems="+json_id;
      window.location.href="Cart.php";
    }

    //var userdata = {'id':str};
      /*function goto(){
    $.ajax({
            type: "POST",
            url: "http://localhost/Cart.php",
            data:userdata,
            success: function(data){
              alert("success");
                console.log(data);
            }
            });
  }*/

    /*function call(){

      var receive = getCookie('cid');
      var arr = JSON.parse(receive);
      alert(arr);
    }*/
     /*$(document).ready(function(){
        $("#gocart").click(function(){
          $.ajax({
                type:"POST",
                 url: "http://localhost/Cart.php",
                 data: { cid : str},
                 success: function(data) {
                        alert("Success");
                        alert(data);
                  }
          });
        });
      });*/
  /*    $(document).ready(function () {
    createCookie("ids", str, "1");
    });

// Function to create the cookie
function createCookie(name, value, days) {
    var expires;

    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }

    document.cookie = escape(name) + "=" +
        escape(value) + expires + "; path=/";
}*/
      //unset($_COOKIE['cid']);

      //document.cookie= "xyz="+ str;
    </script>
		<style>

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
            margin-top:1600px;
            width: 100%;
            height: 300px;
            /*position: absolute;*/
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
    h1{
      color: #41aea9;
    }
    .box1,.box2{
      background-color: #f1fcfc;
      box-shadow: 5px 7px 8px #888888;
      width:22%;
      margin:20px;
      height: 67%;
      float:left;
      text-align:center;
    }
    .box3,.box4{
      background-color: #f1fcfc;
      box-shadow: 5px 7px 8px #888888;
      width:22%;
      margin:20px;
      height: 67%;
      float:right;
      text-align:center;
    }
    .device-img{
      height: 150px;
      width: 150px;
      margin-left:10px;
      margin-bottom: 10px;
      margin-top: 10px;
      transition: 0.5s all ease-in-out;
    }
    .device-img:hover{
      transform: scale(1.8);
      /* width:100%;
      height:100%; */

    }
    .cart-button{
      width:100%;
      /*margin-left: 90px;*/
      display: block;
      border: none;
      background-color: #ff5f40;
      padding: 14px 28px;
      font-size: 16px;
      cursor: pointer;
      text-align: center;
      opacity: 0.9;
    }
    .cart-button:hover{
      box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
      opacity: 1;
    }
    .display-filters{
      width:40%;
      height:500px;
      text-align: center;
      float: right;
    }
    .container{
      width:55%;
      height:500px;
      border-radius: 25px;
      float: left;
      background-color: #80d9df;
    }
    .buy-device{
      width:65%;
      margin-left: 100px;
    }
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    input[type="number"],input[type="text"]{
      width:30%;
      /*display: block;*/
      padding: 3px 4px;
      margin: 4px 0;
      box-sizing: border-box;
    }
    input[type="number"]:hover,input[type="text"]:hover{
      background-color: #e8ffff;
      border: solid 2px black;
    }
    input[type="checkbox"]{
      width: 15px;
      height: 15px;
    }
    input:focus{
      border:solid 3px black;
      padding: 10px;
    }
    label{
      font-size: 120%;
    }
    #filter-button,#price-search-button,#brand-search-button,#gocart{
      background-color: #01c5c4;
      border: none;
      color: white;
      font-size: 100%;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 16px;
    }
    #filter-button:hover,#price-search-button:hover,#brand-search-button:hover,#gocart:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
    opacity: 1;
    }
		</style>
	</head>
	<body>
      <!--Buyer-->
  <div class="navBar">
      <div class="dropdown">
          <button class="dropbtn"><i class="fa fa-bars" aria-hidden="true" style="font-size: 40px;"></i></button>
          <div class="dropdown-content">
               <a href="DisplayDevices.php">See Device</a>
               <a href="Cart.php">Cart</a>
               <a href="UpdateBuyer.php">Update Profile</a>
          </div>
      </div>
      <div style="float:left;font-size: 35px;text-align: center;margin: 10px;"><a href="HomePage_Common.php">EduTech</a></div>
      <ul>
          <li style="width: 50px;margin:0;padding: 0;text-align: center;"><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 20px;"></i></a></li>
          <li><a href="Logout.php">Logout</a></li>
          <li><a href="ContactUs.php">Contact Us</a></li>
          <li><a href="AboutUs.php">About Us</a></li>
      </ul>
  </div>
    <div class="container">
      <img src="buy-device.png" alt="buy" class="buy-device">
    </div>
    <div class="display-filters">
      <br><br><br><br>
      <h1>Hello user, <?php echo $_SESSION["username"]; ?></h1>
      <h1>Shop till your internet runs out!</h1><br>
      <form action="DisplayDevices.php" method="post">
        <input type="checkbox" name="type[]" value="Laptop"> Laptop
        <input type="checkbox" name="type[]" value="Desktop"> Desktop
        <input type="checkbox" name="type[]" value="Mobile"> Mobile
        <input type="checkbox" name="type[]" value="Tablet"> Tablet
        <input type="submit" name="filter" value="Filter" id="filter-button">
      </form>
        <form action="DisplayDevices.php" method="post">
            <label for="price">Price Less than: </label><input type="number" name="price" placeholder="Enter in rupees">
          <input type="submit" name="search" value="Search" id="price-search-button">
        </form>
        <form action="DisplayDevices.php" method="post">
            <label for="brand">Device Brand: </label><input type="text" name="brand" placeholder="Search for a brand">
          <input type="submit" name="search1" value="Search" id="brand-search-button">
        </form>
        <br>
      <!--<form name="form" action="Cart.php" method="post">-->
      <button type="button" name="carted" id="gocart" onclick="goto()"> Go to Cart </button>
      <!--<button type="button" name="button" onclick="call()">Call</button>
          <input type="submit" value=" Go to Cart " name="carted" id="gocart">
        </form>-->
      </div>
  <div class="display-main" style="width:100%;">
    <h3><?php echo $msg;?></h3>
  <?php $i=1; ?>
  <!-- PHP CODE TO FETCH DATA FROM ROWS-->
        <?php   // LOOP TILL END OF DATA
            while($row1=$result1->fetch_assoc())
            {
         ?>
         <?php if($i==1){
           ?>
           <div class="box1">
              <h3 style="text-align: center;color:#006a71;">Product Details</h3>
                 <img src="<?php echo $row1['image']?>" alt="Device Image" class="device-img"><br>
                 <p style="color:green;font-weight:bolder;font-size:120%;">Rs.<?php echo $row1["price"];?></p>
                 <p><?php echo $row1["name"].","; echo $row1["type"];?></p>
                 <p><?php echo $row1["brand"]." "; echo $row1["model"]; ;?></p>
                 <p style="padding-left:4%;padding-right:4%;"><?php echo $row1["description"];?></p>
             <button name="button" class="cart-button" onclick="add( <?php echo $row1["id"]; ?> )">Add to Cart</button>
           </div>
         <?php
       } ?>

       <?php if($i==2){
           ?>
           <div class="box2">
             <h3 style="text-align: center;color:#006a71;">Product Details</h3>
                <img src="<?php echo $row1['image']?>" alt="Device Image" class="device-img"><br>
                <p style="color:green;font-weight:bolder;font-size:120%;">Rs.<?php echo $row1["price"];?></p>
                <p><?php echo $row1["name"].","; echo $row1["type"];?></p>
                <p><?php echo $row1["brand"]." "; echo $row1["model"]; ;?></p>
                <p style="padding-left:4%;padding-right:4%;"><?php echo $row1["description"];?></p>
            <button name="button" class="cart-button" onclick="add( <?php echo $row1["id"]; ?> )">Add to Cart</button>
           </div>
         <?php
       } ?>
         <?php if($i==3){
             ?>
             <div class="box3">
               <h3 style="text-align: center;color:#006a71;">Product Details</h3>
                  <img src="<?php echo $row1['image']?>" alt="Device Image" class="device-img"><br>
                  <p style="color:green;font-weight:bolder;font-size:120%;">Rs.<?php echo $row1["price"];?></p>
                  <p><?php echo $row1["name"].","; echo $row1["type"];?></p>
                  <p><?php echo $row1["brand"]." "; echo $row1["model"]; ;?></p>
                  <p style="padding-left:4%;padding-right:4%;"><?php echo $row1["description"];?></p>
              <button name="button" class="cart-button" onclick="add( <?php echo $row1["id"]; ?> )">Add to Cart</button>
             </div>
           <?php $i=4;
          } ?>
          <?php if($i==4){
              ?>
              <div class="box4">
                <h3 style="text-align: center;color:#006a71;">Product Details</h3>
                   <img src="<?php echo $row1['image']?>" alt="Device Image" class="device-img"><br>
                   <p style="color:green;font-weight:bolder;font-size:120%;">Rs.<?php echo $row1["price"];?></p>
                   <p><?php echo $row1["name"].","; echo $row1["type"];?></p>
                   <p><?php echo $row1["brand"]." "; echo $row1["model"]; ;?></p>
                   <p style="padding-left:4%;padding-right:4%;"><?php echo $row1["description"];?></p>
               <button name="button" class="cart-button" onclick="add( <?php echo $row1["id"]; ?> )">Add to Cart </button>
              </div>
            <?php $i=5;
           } ?>
         <?php
       if($i==5){
         $i=$i-4;}
       //$i=$i+1;}
     }
     CloseCon($conn); ?>
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
