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
    $id=$_COOKIE['updateDeviceID'];
    if(isset($_POST["submitId"]))
    {
        $id=$_POST["devId"];
        $_SESSION['deviceID']=$id;
    }
    if($id!=null)
{
    $_SESSION['deviceID']=$id;
    $username=$_SESSION['username'];
    $sql = "SELECT * FROM device where id='$id'";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    $_SESSION["type"]=$row["type"];
}
    $conn->close();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update Your Device</title>
        <link rel="stylesheet" type="text/css" href="HeaderFooter_Style.css">
        <script src="https://kit.fontawesome.com/f681854d4a.js" crossorigin="anonymous"></script>
         <link rel="icon" href="icon.jpg" type="image/gif" sizes="16x16">
        <link rel="stylesheet" type="text/css" href="UpdateDevice_Style.css">
    </head>

    <body>
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
            <div style="float:  left;font-size: 35px;text-align: center;margin: 10px;"><a href="HomePage_Seller.php">EduTech</a></div>
            <ul>
                <li><a href="Logout.php">Logout</a></li>
                <li><a href="ContactUs.php">Contact Us</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
            </ul>
    </div>

        <div style="width: 100%;height: 350px;margin-top: 10px;">
            <div class="title">
                <h1>Update Your Device</h1>
                <h3>Change the details which you wish to change!</h3>
            </div>
            <div style="width: 50%;float: right;height: 350px;">
                <img src="updateDevice.jpeg" height="350px" style="width: 100%;">
            </div>
        </div>
<?php
        if($id==null)
        {

?>
            <div class="form">
                <form action="UpdateDevice.php" method="post">
                    <label for="devId">Enter your device ID: </label>
                    <input type="number" name="devId">
                    <input type="submit" name="submitId">
                    <p>If you don't know the id of your device, please visit the <a href="DisplayStatusOfDevice_PHP.php">Status of Device</a> Page</p>
                </form>
            </div>

<?php
        }
        else
        {
?>
            <div id="informationMain">
                <div id="informationInside">
                    <h3> <?php echo $row["name"]?> </h4>
                    <img src="<?php echo $row["image"]?>" height="300" width="350" style="margin-bottom: 30px;">
                    <table>
                        <tr>
                            <td class="tableHeader">Type:</td>
                            <td><?php echo $row["type"]?></td>
                            <td class="tableHeader">Price:</td>
                            <td><?php echo $row["price"]?></td>
                        </tr>
                        <tr>
                            <td class="tableHeader">Brand:</td>
                            <td><?php echo $row["brand"]?></td>
                            <td class="tableHeader">Model:</td>
                            <td><?php echo $row["model"]?></td>
                        </tr>
                        <tr rowspan="2">
                            <td class="tableHeader">Description:</td>
                            <td colspan="3"><?php echo $row["description"]?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div id="updateDeviceForm">
                <h3>Update Device</h3>
                <form  action="UpdateDevice_PHP.php" method="post" style="margin-left: 190px;text-align: left;">
                    <label for="name">Name of Device </label><br>
                    <input type="text" name="name" id="name" value="<?php echo $row["name"]?>"><br><br>

                    <label for="type">Type of device</label><br>
                    <input type="text" name="type" id="type" value="<?php echo $row["type"]?>" disabled><br><br>

                    <label for="price">Price at which you want to sell: </label><br>
                    <input type="number" name="price" id="price" style="width: 15%; border:solid 1px;" required onblur="priceCheck()"  value="<?php echo $row["price"]?>"><br>
                    <label id="priceValidate" style="color: red"></label><br>

                    <label for="brand">Brand</label><br>
                    <input type="text" name="brand" id="brand" value="<?php echo $row["brand"]?>" required><br><br>

                    <label for="model">Model</label><br>
                    <input type="text" name="model" id="model" value="<?php echo $row["model"]?>" required><br><br>

                    <label for="files">Upload one image of your device:</label>
                    <input type="file" id="files" name="files" style="border:none;width: auto;" value="<?php echo $row["image"]?>"><br><br>

                    <label for="description">A short description about your product: </label><br>
                    <textarea name="description" id="description"  rows="5" cols="60"><?php echo $row["description"]?></textarea><br>

                    <input type="Submit" name="Submit" id="buttonStyle">
                    <div id="deleteDev"><a href="DeleteDevice.php"><i class="fa fa-trash"  style="font: 25px;color: black;margin-top: 10px;"></i></a></div>

                </form>
            </div>
            <div class="footer" style="margin-top: 1000px;">
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
<?php
        }
?>
    </body>
    <script>
        function del()
        {
            window.location.href = "DeleteDevice.php";
        }
        function priceCheck()
        {
            var deviceType="<?php echo $row["type"]?>";
            var devicePrice=document.getElementById("price").value
            if (deviceType==""||deviceType==null)
            {
                document.getElementById("priceValidate").innerHTML="Please select a device type first!"
            }
            if (deviceType=="Laptop"&&devicePrice>8000)
            {
                document.getElementById("priceValidate").innerHTML="Please ensure that the price is less than Rs. 8000!"
            }
            else if(deviceType=="Laptop"&&devicePrice<8000)
            {
                document.getElementById("priceValidate").innerHTML=""
            }
            if (deviceType=="Desktop"&&devicePrice>10000)
            {
                document.getElementById("priceValidate").innerHTML="Please ensure that the price is less than Rs.10000!"
            }
            else if(deviceType=="Desktop"&&devicePrice<10000)
            {
                document.getElementById("priceValidate").innerHTML=""
            }
            if (deviceType=="Mobile"&&devicePrice>2000)
            {
                document.getElementById("priceValidate").innerHTML="Please ensure that the price is less than Rs.2000!"
            }
            else if(deviceType=="Mobile"&&devicePrice<2000)
            {
                document.getElementById("priceValidate").innerHTML=""
            }
            if (deviceType=="Tablet"&&devicePrice>5000)
            {
                document.getElementById("priceValidate").innerHTML="Please ensure that the price is less than Rs.5000!"
            }
            else if(deviceType=="Tablet"&&devicePrice<5000)
            {
                document.getElementById("priceValidate").innerHTML=""
            }
        }
    </script>
</html>
