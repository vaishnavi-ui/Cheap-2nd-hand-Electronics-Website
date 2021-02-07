<?php
    //Establishing connection
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
    $username=$_SESSION['username'];
     $sqlID="SELECT * FROM SELLER WHERE USERNAME='$username'";
    $resultID=($conn->query($sqlID))->fetch_assoc();
    $id=$resultID['id'];

     $sql = "SELECT * FROM device where seller_id='$id'";

    if(isset($_POST["all"]))
    {
    $sql = "SELECT * FROM device where seller_id='$id'";

    }
    else if(isset($_POST["sold"]))
    {
        $sql = "SELECT * FROM device where seller_id='$id' and status='Sold'";
    }
    else if(isset($_POST["unsold"]))
    {
        $sql = "SELECT * FROM device where seller_id='$id' and status='Unsold'";
    }
    if(isset($_POST["laptop"]))
    {
        $sql = "SELECT * FROM device where seller_id='$id' and type='Laptop'";
    }
    else if(isset($_POST["mobile"]))
    {
        $sql = "SELECT * FROM device where seller_id='$id' and type='Mobile'";
    }
    else if(isset($_POST["tablet"]))
    {
        $sql = "SELECT * FROM device where seller_id='$id' and type='Tablet'";
    }
    else if(isset($_POST["desktop"]))
    {
        $sql= "SELECT * FROM device where seller_id='$id' and type='Desktop'";
    }

    $result = $conn->query($sql);
    function fetchBuyer($xID)
    {

        $sql5="SELECT * FROM order_items WHERE device_id='$xID'";
        $conn1=$GLOBALS['conn'];
        $result=$conn1->query($sql5);
        $rowX=$result->fetch_assoc();
        $buyerID=$rowX['buyer_id'];
        $sql6="SELECT * FROM buyer WHERE id='$buyerID'";
        $resultX=$conn1->query($sql6);
        $rowB=$resultX->fetch_assoc();
        return $rowB;
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Your Devices</title>
        <link rel="stylesheet" type="text/css" href="HeaderFooter_Style.css">
        <script src="https://kit.fontawesome.com/f681854d4a.js" crossorigin="anonymous"></script>
        <link rel="icon" href="icon.jpg" type="image/gif" sizes="16x16">
        <link rel="stylesheet" type="text/css" href="DisplayStatusOfDevice_Style.css">
        <script type="text/javascript" src="DisplayStatusOfDevice_Script.js"></script>
        <!-- CSS FOR STYLING THE PAGE -->
        <style>


        </style>
    </head>

    <body>
        <div class="navBar">
            <div class="dropdown">
                <button class="dropbtn" ><i class="fa fa-bars" aria-hidden="true" style="font-size: 40px;"></i></button>
                <div class="dropdown-content">
                     <a href="AddDevice.php">Add Device</a>
                     <a href="DisplayStatusOfDevice.php">My Devices</a>
                     <a  href="UpdateDevice.php">Update Device</a>
                     <a href="UpdateSeller.php">Update Profile</a>
                </div>
            </div>
            <div style="float:  left;font-size: 35px;text-align: center;margin: 10px;"><a href="HomePage_Seller.php">EduTech</a></div>
            <ul>
                <li><a href="Logout.php">Logout</a></li>
                <li><a href="ContactUs.php">Contact Us</a></li>
                <li><a href="AboutUS.php">About Us</a></li>
            </ul>
        </div>
      <!--
            <div style="width: 100%;">
                <div style="width: 100%;">
                    <div style="width: 50%;float: left;">
                        <img src="laptop.jpg" height="300px;" width="100%" class="headerImg">
                    </div>
                    <div style="width: 50%;float: right">
                        <img src="mobile.jpg" height="300px;" width="100%" class="headerImg">
                    </div>
                </div>
                <div style="width: 100%">
                    <div style="width: 50%;float: left;">
                        <img src="desktop.jpg" height="300px;" width="100%" class="headerImg">
                    </div>
                    <div style="width: 50%;float: right">
                        <img src="tablet.jpg" height="300px;" width="100%" class="headerImg">
                    </div>
                </div>
                <div class="text-block">
                    <p>Your Devices</p>
                  </div>
            </div>-->
            <div style="height: 350px;margin-top: 10px;">
                <div class="title">
                    <h1>Your Devices</h1>
                    <h3>Hello user <?php echo $username?>, your devices are:</h3>
                </div>
                <div style="width: 50%;float: right;height: 350px;">
                   <img src="laptop.jpg" height="350px" width="300px" style="width: 100%;">
                </div>
            </div>



            <div style="width: 65%;float: left;">
            <div style="background-color:#41aea9; width: 1000px;margin: 20px;margin-left: 300px;height: 50px;text-align: center;">
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">

                <p> Status:
                    <button name="all" style="margin-top: 15px;">All</button>
                    <button name="sold">Sold</button>
                    <button name="unsold">Unsold</button>
                    &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp
                    Type:
                    <button name="all">All</button>
                    <button name="laptop">Laptop</button>
                    <button name="mobile">Mobile</button>
                    <button name="tablet">Tablet</button>
                    <button name="desktop">Desktop</button>

                </p>
            </form>


            <!--
            <div>

            <b>Filters: </b>
            <b>Status</b>
            <input type="checkbox" name="status[]" value="all"/>
            <label for="all"> All </label>
            <input type="checkbox" name="status[]" value="Sold"/>
            <label for="saturday"> Sold</label>
            <input type="checkbox" name="status[]" value="Unsold" />
            <label for="sunday"> Unsold</label>

                <b>Type</b>
            <input type="checkbox" name="type[]" value="all"/>
            <label for="all"> All </label>
            <input type="checkbox" name="type[]" value="Laptop"/>
            <label for="saturday"> Laptop</label>
            <input type="checkbox" name="type[]" value="Mobile" />
            <label for="sunday"> Mobile</label>
            <input type="checkbox" name="type[]" value="Tablet" />
            <label for="sunday"> Tablet</label>
            <input type="checkbox" name="type[]" value="Desktop" />
            <label for="sunday"> Desktop</label>
            <input type="submit" name="Submit">
       </div>
            </form>   -->

            </div>

<?php
            if($result->num_rows==0)
            {
?>
                <p style="font-size: 20px;text-align: center;font-weight: bold;">Looks like there is no device right now! <a href="AddDevice.php">Add a device</a> right now and help someone in need!</p>
<?php
            }
            else
            {
?>

                <table style="margin-top: 100px;" class="table1" id="myTable">
                    <tr style="background-color:#41aea9; ">
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Status</th>
                        <th>View</th>
                        <th>Action</th>
                    </tr>
<?php
                   // LOOP TILL END OF DATA
                    while($rows=$result->fetch_assoc())
                    {
                        if($rows['status']=="Sold")
                        {
                            $buyerDetails=fetchBuyer($rows['id']);
?>

                            <tr style="background-color:  #edfffa">
                                <td><?php echo $rows['id'];?></td>
                                <td><?php echo $rows['name'];?></td>
                                <td><?php echo $rows['type'];?></td>
                                <td><?php echo $rows['price'];?></td>
                                <td><?php echo $rows['brand'];?></td>
                                <td><?php echo $rows['model'];?></td>
                                <td><?php echo $rows['status'];?></td>
                                <td>
                                        <button onclick="display('<?php echo $rows['name'];?>','<?php echo $rows['image'];?>','<?php echo $rows['type'];?>','<?php echo $rows['price'];?>','<?php echo $rows['brand'];?>','<?php echo $rows['model'];?>','<?php echo $rows['description'];?>','<?php echo $rows['id'];?>','<?php echo $rows['status'];?>')">View</button>
                                </td>
                                <td>
<?php
                                    $Bfirstname=$buyerDetails['first_name'];
                                    $Blastname=$buyerDetails['last_name'];
                                    $Bnumber=$buyerDetails['phnumber'];
                                    $Baddress=$buyerDetails['address'];
                                    $Bemail=$buyerDetails['email'];
                                    $Blandmark=$buyerDetails['pincode'];
                                    $Bcity=$buyerDetails['city'];
                                    $Bstate=$buyerDetails['state'];
?>
                                    <button onclick="displayBuyer('<?php echo($Bfirstname) ?>','<?php echo($Blastname) ?>','<?php echo($Bnumber) ?>','<?php echo($Bemail) ?>','<?php echo($Baddress) ?>','<?php echo($Blandmark) ?>','<?php echo($Bcity) ?>','<?php echo($Bstate) ?>')">Buyer </button>
                                </td>
                            </tr>
<?php
                        }
                        else
                        {
?>

                                <tr>

                                   <td><?php echo $rows['id'];?></td>
                                    <td><?php echo $rows['name'];?></td>
                                    <td><?php echo $rows['type'];?></td>
                                    <td><?php echo $rows['price'];?></td>
                                    <td><?php echo $rows['brand'];?></td>
                                    <td><?php echo $rows['model'];?></td>
                                    <td><?php echo $rows['status'];?></td>
                                    <td><button onclick="display('<?php echo $rows['name'];?>','<?php echo $rows['image'];?>','<?php echo $rows['type'];?>','<?php echo $rows['price'];?>','<?php echo $rows['brand'];?>','<?php echo $rows['model'];?>','<?php echo $rows['description'];?>','<?php echo $rows['id'];?>','<?php echo $rows['status'];?>')">View</button>
                                    </td>
                                    <td>
                                        <button onclick="callUpdatePHP(<?php echo $rows['id'];?>)">Update</button>
                                    </td>
                                </tr>

<?php
                        }
                    }
?>
                </table>
<?php
            }
            $conn->close();
?>
</div>
<div style="float: right;width: 35%;">
     <div id="dispDetailsDiv">
         <div id="dispDiv"></div>
     </div>
</div>
<div class="footer"style="margin-top: 1000px;">
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
