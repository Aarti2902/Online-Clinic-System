<?php
require_once("config.php");

if(isset($_POST['submit'])) {
    $appointment_id = $_POST['id'];
    $new_room = mysqli_real_escape_string($con, $_POST['room']);

    $update_query = "UPDATE adpat SET room = '$new_room' WHERE id = $appointment_id";
    $update_result = mysqli_query($con, $update_query);
    
    if($update_result) {
        echo "<script>alert('Deatils updated successfully.')</script>";
        echo "<script>setTimeout(function(){ window.location.href = 'admindashboard.php'; }, 1000);</script>"; // Redirect after 1 second
            exit();
      
    } else {
        echo "<script>alert('Error updating Details:')</script>" . mysqli_error($con);
    }
}

mysqli_close($con);
?>
