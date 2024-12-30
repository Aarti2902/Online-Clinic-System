<?php
require_once("config.php");
$a=$_POST["uname"];
$b=$_POST["p"];
$f=0;
$res=mysqli_query($con,"select * from register ");
while($re=mysqli_fetch_array($res))
{
    echo $re[0];
    
    if(($re[4]==$a))
    {
        if($re[5]==$b)
        {
            session_start();
            $_SESSION['uid']=$re[0];
            $f=1;
            break;
        }

    }
    
}
if($f==1)
header("location:patientdashboard.php");
else
echo "<script>alert('Invalid username and password')</script>";
?>