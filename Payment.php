<?php
session_start();
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

    $username=$_SESSION["username"];
    $sql0 = "SELECT * FROM buyer where username='$username'";
    $result0 = $conn->query($sql0);
    $row0=$result0->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}
.serverErrorImg
{
    border:solid;
}
.errorText
{
    text-align: center;
    font-size: 25px;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f1fcfc;
  /*background-color: #f2f2f2;*/
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text],input[type=number] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
  color:#16697a;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color:#41aea9;;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
  opacity: 0.9;
}

.btn:hover {
  background-color: #41aea9;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  opacity: 1;
}
#left-div{
  float: left;
  width:67%;
  /*height: 600px;*/
}
#right-div{
  float: right;
  width: 30%;
  margin-bottom: 400px;
  /*height: 600px;*/
}

h5 {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}
h3{
  color: #41aea9;
}
span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
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
        margin-top: 700px;
        position: absolute;
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
        <li><a href="Logout.php">Logout</a></li>
        <li><a href="PreRegistrationForm.php">Register</a></li>
        <li><a href="ContactUs.php">Contact Us</a></li>
        <li><a href="AboutUs.php">About Us</a></li>
    </ul>
</div>
<h2> Checkout </h2>
<?php

            //Retriveing all the information
            //session_start();
            //$cart=$_SESSION["cart"];
            //$amount=$_SESSION["amount"];
            //$items=$_SESSION["items"];
            //$id=$_SESSION["id"];
            //session_start();
            //$cart=null;
            //$cartItems=array(1,2,3);
            $cartItems = json_decode($_COOKIE['cartItems']);
            $date=date("Y-m-d");
            $time=date("h:i:sa");
            $amount=$_SESSION['price'];
            $items=$_SESSION['noOfItems'];
            $idU=$_SESSION['id'];
            //$idU=3;
            if($cartItems!=null)
            {
                if($items!=0)
                {
                     //Creating the table
                    $sql="CREATE TABLE if not exists orders(
                            id INT PRIMARY KEY AUTO_INCREMENT,
                            buyer_id INT NOT NULL,
                            purchase_date DATE NOT NULL,
                            purchase_time TIME NOT NULL,
                            total_amount INT NOT NULL,
                            items_count INT NOT NULL
                        )";

                    $sql1="CREATE TABLE if not exists order_items(
                            id INT PRIMARY KEY AUTO_INCREMENT,
                            buyer_id INT NOT NULL,
                            order_id INT NOT NULL,
                            seller_id INT NOT NULL,
                            device_id INT NOT NULL
                        )";
                    if($conn->query($sql)==false)
                    {
?>
                        <h1>Error</h1>
                        <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                        <p class="errorText">There seems to be an error with our server! Please try again!<a href="#">Cart!</a>
                        </p>
<?php
                        echo "Error: ".$conn->error;
                    }
                    else
                    {
                        if($conn->query($sql1)==false)
                        {
?>
                            <h1>Error</h1>
                            <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                            <p class="errorText">There seems to be an error! Please try again!<a href="#">Cart!</a>
                            </p>
<?php
                            echo "Error: ".$conn->error;
                        }
                        else
                        {
                            $sql2="INSERT INTO orders SET buyer_id='$idU',  purchase_date='$date',purchase_time='$time',total_amount='$amount',items_count='$items'";
                            if($conn->query($sql2)==false)
                            {
?>
                                <h1>Error</h1>
                                <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                                <p class="errorText">There seems to be an error! Please try again!<a href="#">Cart!</a>
                                </p>
<?php
                            }
                            else
                            {
                                $sql3="SELECT * FROM orders where buyer_id='$idU' and purchase_date='$date' and purchase_time='$time' and total_amount='$amount' and items_count='$items'";
                                $result=$conn->query($sql3);
                                $row=$result->fetch_assoc();
                                $orderID=$row['id'];
                                $buyerID=$row['buyer_id'];
                               for($i=0;$i<$items;$i++)
                               {
                                    $sql4="SELECT * FROM device WHERE id='$cartItems[$i]'";
                                    $result2=$conn->query($sql4);
                                    $row2=$result2->fetch_assoc();
                                    $sql6="UPDATE device SET status='Sold' where id='$cartItems[$i]'";
                                    if($conn->query($sql6)==false)
                                    {
?>
                                <h1>Error</h1>
                                <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                                <p class="errorText">There seems to be an error! Please try again!<a href="#">Cart!</a>
                                </p>
<?php
                                    }
                                    $sellerID=$row2['seller_id'];
                                    $sql5="INSERT INTO order_items SET  order_id='$orderID',buyer_id='$buyerID',seller_id='$sellerID',device_id='$cartItems[$i]'";
                                    if($conn->query($sql5)==false)
                                    {
?>
                                <h1>Error</h1>
                                <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                                <p class="errorText">There seems to be an error! Please try again!<a href="#">Cart!</a>
                                </p>
<?php
                                        echo $conn->error;
                                    }
                               }
                            }
                        }
                    }
                }
                else
                {
?>
                    <h1>Error</h1>
                    <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                    <p class="errorText">There seems to be an error! There are 0 items in your cart..Please try again!<a href="#">Check out devices!</a></p>
<?php
                }
            }
            else
            {
?>
                <h1>Error</h1>
                <img src="serverError.jpg" width="500px" height="300px;" class="serverErrorImg" alt="Error">
                <p class="errorText">Oops! Looks like your cart is empty and there is nothing to order!<a href="#">Check out devices!</a></p>
<?php
            }
            $sql8="SELECT * from orders where buyer_id=$idU";
            $result8 = $conn->query($sql8);
            $row8=$result8->fetch_assoc();
            CloseCon($conn);

?>

</body>
</html>
  <div class="col-75">
    <div class="container" id="left-div">
      <form action="HomePage_Buyer.php">

        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="fullname" value="<?php echo $row0["first_name"]." ".$row0["last_name"];?> " required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" value="<?php echo $row0["email"]?>" required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" value="<?php echo $row0["address"]?>" required>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" value="<?php echo $row0["city"]?>" required>

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" value="<?php echo $row0["state"]?>" required>
              </div>
              <div class="col-50">
                <label for="zip">Pincode</label>
                <input type="text" id="zip" name="zip" required minlength="6" maxlength="6" value="<?php echo $row0["pincode"]?>">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe" maxlength="25" required>
            <label for="ccnum">Credit card number</label>
            <input type="number" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" minlength="16" required>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September" required>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="number" id="expyear" name="expyear" placeholder="2018" min="1990" max='2030' required>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="number" id="cvv" name="cvv" placeholder="352" min="100" max="999" required>
              </div>
            </div>
          </div>

        </div>
        <input type="submit" value="Checkout" class="btn">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container" id="right-div">
      <h4> <u> Your Order </u><span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h4>
      <p><b>Order Number </b><span class="price"><?php echo $row8["id"]?></span></p>
      <p><b>Purchase Date </b><span class="price"><?php echo $row8["purchase_date"]?></span></p>
      <p><b>Purchase Time </b><span class="price"><?php echo $row8["purchase_time"]?></span></p>
      <p><b>Total Items</b><span class="price"><?php echo $row8["items_count"]?></span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>Rs.<?php echo $row8["total_amount"]?></b></span></p>
    </div>
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
