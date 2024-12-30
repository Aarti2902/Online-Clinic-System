<?php
require_once("config.php");

if(isset($_POST['submit'])) {
    $appointment_id = $_POST['aid'];
    $new_date = mysqli_real_escape_string($con, $_POST['date']);
    $new_doctor = mysqli_real_escape_string($con, $_POST['doctor']);
    $new_time = mysqli_real_escape_string($con, $_POST['time']);

    $update_query = "UPDATE bkapt SET date = '$new_date', doctor = '$new_doctor', time = '$new_time' WHERE aid = $appointment_id";
    $update_result = mysqli_query($con, $update_query);
    
    if($update_result) {
        echo "<script>alert('Appointment updated successfully.')</script>";
        echo "<script>setTimeout(function(){ window.location.href = 'admindashboard.php'; }, 1000);</script>"; // Redirect after 1 second
            exit();
      
    } else {
        echo "<script>alert('Error updating appointment:')</script>" . mysqli_error($con);
    }
}

mysqli_close($con);
?>
