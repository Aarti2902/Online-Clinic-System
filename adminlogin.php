<?php
require_once("config.php");
$a=$_POST["uname"];
$b=$_POST["p"];
$f=0;
$res=mysqli_query($con,"select * from admin ");
while($re=mysqli_fetch_array($res))
{
    if(($re[1]==$a))
    {
        if($re[2]==$b)
        {
            $f=1;
            break;
        }

    }
    
}
if($f==1)
header("location:admindashboard.php");
else
echo "<script>alert('Invalid username and password')</script>";
?>