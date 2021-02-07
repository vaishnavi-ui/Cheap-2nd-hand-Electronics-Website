<?php
unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['typeOfUser']);
unset($_SESSION['type']);
unset($_SESSION['price']);
unset($_SESSION['noOfItems']);
unset($_SESSION['type']);
session_destroy();
header("location: HomePage_Common.php");
?>