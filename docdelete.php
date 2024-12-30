<?php
require_once("config.php");

if(isset($_GET['id'])) {
    $appointment_id = $_GET['id'];

    // Delete appointment from the database
    $delete_query = "DELETE FROM addoc WHERE id = $appointment_id";
    $delete_result = mysqli_query($con, $delete_query);
    
    if($delete_result) {
        echo "<script>alert('Doctor deleted successfully.')</script>";
        echo "<script>setTimeout(function(){ window.location.href = 'admindashboard.php'; }, 1000);</script>"; // Redirect after 1 second
            exit();
    } else {
        echo "<script>alert('Error deleting appointment:')</script>" . mysqli_error($con);
    }
}

mysqli_close($con);
?>
