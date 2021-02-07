<?php
if(isset($_POST['Submit']))
{
    session_start();
    $typeOfUser=$_POST["typeOfUser"];
    if($typeOfUser=="seller")
    {
        $_SESSION['typeOfUser']=$typeOfUser;
       header("location: RegistrationForm.php");
    }

    else if($typeOfUser=="buyer")
    {
        $_SESSION['typeOfUser']=$typeOfUser;
        $_SESSION['income']=$_POST["income"];
        $_SESSION['proof']=$_POST["proof"];
        header("location: RegistrationForm.php");
    }

}

?>