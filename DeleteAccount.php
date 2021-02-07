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
    $username=$_SESSION["username"];
    //$username="topaz";
    $sql1 = "DELETE from buyer where username='$username'";
    $result1 = $conn->query($sql1);
    $sql2="DELETE from seller where username='$username'";
    $result2 = $conn->query($sql2);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Delete Account</title>
    <!-- font awesome link to add different icons -->
    <script src="https://kit.fontawesome.com/f681854d4a.js" crossorigin="anonymous"></script>
    <link rel="icon" href="icon.jpg" type="image/gif" sizes="16x16">
    <style>
    h1{
        text-align: center;
        color: #41aea9;
        font-size: xx-large;
        font-family: 'Gill Sans', 'Gill Sans MT',
        ' Calibri', 'Trebuchet MS', 'sans-serif';
    }
    li{
      font-size: 120%;
    }
    ul{
      list-style-type:none;
    }
    .sidebar {
    height: 100%;
    width: 220px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #41aea9;
    overflow-x: hidden;
    padding-top: 16px;
  }

  .sidebar a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 20px;
    color: white;
    display: block;
  }

  .sidebar a:hover {
    color: black;
  }

  .main {
    margin-left: 230px; /* Same as the width of the sidenav */
    padding: 0px 10px;
  }

  @media screen and (max-height: 450px) {
    .sidebar {padding-top: 15px;}
    .sidebar a {font-size: 18px;}
  }
  #card {
                position: relative;
                width: 320px;
                display: block;
                margin: 40px auto;
                text-align: center;

                font-family: 'Source Sans Pro', sans-serif;
              }
              #upper-side {
                padding: 2em;
                background-color: #66cccc;
                display: block;
                color: #fff;
                border-top-right-radius: 8px;
                border-top-left-radius: 8px;
              }

              #status {
                font-weight: lighter;
                text-transform: uppercase;
                letter-spacing: 2px;
                font-size: 1em;
                margin-top: -.2em;
                margin-bottom: 0;
              }
              #lower-side {
                padding: 2em 2em 5em 2em;
                background: #fff;
                display: block;
                border-bottom-right-radius: 8px;
                border-bottom-left-radius: 8px;
                border: solid #66cccc;
              }

               #message {
                margin-top: -.5em;
                color: #757575;
                letter-spacing: 1px;
              }
              #contBtn {
                position: relative;
                top: 1.5em;
                text-decoration: none;
                background: #66cccc;
                color: #fff;
                margin: auto;
                padding: .8em 3em;
                box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.21);
                border-radius: 25px;
                transition: all .4s ease;
              }
              #contBtn:hover {

                box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.41);

                  transition: all .4s ease;
              }
              body
              {
                  text-align: center;
              }
    </style>
  </head>
  <body>
    <div class="sidebar"> <br>
    <a href="ChangePassword_main.php"><i class="fas fa-key"></i></i> Change Password</a>
    <a href="UpdateUsername.php"><i class="fa fa-fw fa-user"></i> Change Username</a>
    <a href="DeleteAccount.php"><i class="fas fa-trash"></i></i> Delete Account</a>
  </div>
    <div class="main">
      <h1><?php echo $_SESSION["username"]; ?> , your account is deleted !</h1>
      <h2>Deleting your account means:</h2>
      <ul>
        <li>All of your stored data is now lost forever.</li>
        <li>Next time you try to make an account, your username might not be available.</li>
        <li>You won't be able to conduct any business with us.</li>
      </ul>
      <?php
      if($result1==true || $result2==true){ ?>
      <?php if($_SESSION["typeOfUser"]=="buyer"){?>
        <div id='card'>
            <div id='upper-side'>
                <h3 id='status'>Success</h3>
              </div>
        <div id='lower-side'>
              <p id='message'>Your account is deleted successfully.</p>
                <a href="Logout.php" id="contBtn">Continue</a>
         </div>
         </div>
      <?php }
      else if($_SESSION["typeOfUser"]=="seller"){?>
        <div id='card'>
            <div id='upper-side'>
                <h3 id='status'>Success</h3>
              </div>
        <div id='lower-side'>
              <p id='message'>Your account is deleted successfully.</p>
                <a href="HomePage_Seller.php" id="contBtn">Continue</a>
         </div>
         </div>
      <?php }
      else{?>
        <div id='card'>
            <div id='upper-side'>
                <h3 id='status'>Success</h3>
              </div>
        <div id='lower-side'>
              <p id='message'>Your account is deleted successfully.</p>
                <a href="HomePage_Normal.php" id="contBtn">Continue</a>
         </div>
         </div>
      <?php }
     }
      else{ ?>
        <div id='card'>
            <div id='upper-side'>
                <h3 id='status'>Error</h3>
              </div>
        <div id='lower-side'>
              <p id='message'>Error while deleting your account</p>
                <a href="ChangePassword_main.php" id="contBtn">Go back</a>
         </div>
         </div>
    <?php } CloseCon($conn); ?>
    </div>
  </body>
</html>
