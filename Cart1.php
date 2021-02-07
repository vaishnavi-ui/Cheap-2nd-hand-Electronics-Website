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
    if(isset($_COOKIE["cartItems"])){
      $cartItems = json_decode($_COOKIE['cartItems']);
      echo $_COOKIE["cartItems"];
      //echo $cartItems;
    }
    //echo var_dump($_COOKIE['xyz']);

    $cartItems=array(1,3,5,6);
    $n=count($cartItems);
    $results=array();
    $conn = OpenCon();
    if($conn === false)
    {
        die("ERROR: Could not connect. " . $conn->connect_error);
    }

    session_start();
    //$id=$_SESSION['id'];
    //echo $_COOKIE["ids"];
    //echo $_SESSION["tp"];
    $username=$_SESSION['username'];
    if ($cartItems!=null)
    {
        $price=0;
        for ($i=0;$i<$n;$i++)
        {
            $sql1 = "SELECT * FROM device where id='$cartItems[$i]'";
            $results[$i] = $conn->query($sql1);
            $sql2="SELECT price FROM device where id='$cartItems[$i]'";
            $result=$conn->query($sql2);
            $resultAdd=$result->fetch_assoc();
            $price+=$resultAdd["price"];
        }
        $_SESSION['price']=$price;
        $_SESSION['noOfItems']=$n;
    }

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Cart</title>
        <script src="https://kit.fontawesome.com/f681854d4a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="Cart_Style.css">
        <link rel="icon" href="icon.jpg" type="image/gif" sizes="16x16">
    </head>
    <body>
        <div class="navBar">
            <div class="dropdown">
                <button class="dropbtn"><i class="fa fa-bars" aria-hidden="true" style="font-size: 40px;"></i></button>
                <div class="dropdown-content">
                     <a href="DisplayDevice.php">See Device</a>
                     <a href="Cart.php">Cart</a>
                     <a href="UpdateBuyer.php">Update Profile</a>
                </div>
            </div>
            <div style="float:  left;font-size: 35px;text-align: center;margin: 10px;"><a href="HomePage_Buyer.php">EduTech</a></div>
            <ul>
                <li style="width: 50px;margin:0;padding: 0;text-align: center;"><a href="Cart.php"><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 20px;"></i></a></li>
                <li><a href="Logout.php">Logout</a></li>
                <li><a href="ContactUs.php">Contact Us</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
            </ul>
        </div>
        <div style="margin-top: 10px;">
            <div id="title" >
                <h1>Cart</h1>
                <p><br>A collection of all the items that you want to shop from our website.<br>Click on proceed to check out after you are done reviewing.<br><br>
                Hello user <?php echo $username?>, your cart is:</p>
            </div>
            <div style="float: right;width: 40%;height: 250px;margin-bottom: 100px;background-color: white;">
                <img src="cart.jpeg" alt="Cart Image" style="float: right;margin-right: 80px;" height="250px">
            </div>
        </div>
            <?php
                if ($cartItems==null)
                {
            ?>
                    <h1>Your cart is empty!</h1>
            <?php
                }
                else
                {
            ?>
                    <div style="float: right;width: 35%;">
                        <div id="orderSummary">
                            <h2>Order Summary</h2>
                            <p>Total number of items ordered: <strong><?php echo $n?></strong></p>
                            <p>Total Price: <strong><?php echo $price?></strong></p>
                            <button> <a href="Payment.php">Proceed to checkout</a></button>
                        </div>
                    </div>

            <?php
                for($i=0;$i<$n;$i++)
                {
                    $rows=$results[$i]->fetch_assoc();
                    $sell_id=$rows["seller_id"];
                    $sql2="SELECT * FROM seller where id='$sell_id'";
                    $seller[$i]=$conn->query($sql2);
                    $sellerRow=$seller[$i]->fetch_assoc();
            ?>

                    <div style="float: left; width: 65%;">
                        <div class="displayDevice">
                            <div class="displayDivImage">
                                <img src="<?php echo $rows['image']?>" alt="Device Image">
                            </div>
                            <div class="displayDeviceDetails">
                                <div style="width: 100%;">
                                    <div style="width: 80%;float: left;height: 65px;">
                                        <h2><?php echo $rows['name']?></h2>
                                    </div>
                                    <div style="width: 20%;float: right;height: 65px;">
                                        <h3>Rs. <?php echo $rows['price']?></h3>

                                    </div>
                                </div>

                                <div>
                                    <p><?php echo $rows["type"]?>,<?php echo $rows["brand"]?>&nbsp<?php echo $rows["model"]?>
                                    <button onclick="del('<?php echo $rows['id'];?>','<?php echo $n; ?>')"><i class="fa fa-trash"  style="font: 25px;color: black;"></i></button>
                                    </p>
                                </div>


                                <table align="center">
                                    <tr>
                                        <th colspan="4" style="text-align: center;">Seller Details</th>
                                    </tr>
                                    <tr>
                                        <td class="header">Name:</td>
                                        <td class="details"><?php echo $sellerRow["first_name"]?>&nbsp<?php echo $sellerRow["last_name"]?></td>
                                        <td class="header">Number: </td>
                                        <td class="details"><?php echo $sellerRow["phnumber"]?></td>
                                    </tr>
                                    <tr rowspan="3">
                                        <td class="header">Address: </td>
                                        <td colspan="3"><?php echo $sellerRow["address"]?>,<?php echo $sellerRow["landmark"]?><?php echo $sellerRow["city"]?>,<?php echo $sellerRow["state"]?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

            <?php
                    }
                }
                $conn->close();
            ?>
                <div class="footer" style="margin-top: 1500px;">
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
    <script type="text/javascript">
        function del(id,n) {
            items= <?php echo json_encode($cartItems); ?>;
            for(i=0;i<n;i++)
            {
                if(items[i]==id)
                {
                    index=i;
                    break;
                }
            }
            alert(index)
            items.splice(index, index);
            alert(items)
        }
    </script>
</html>
