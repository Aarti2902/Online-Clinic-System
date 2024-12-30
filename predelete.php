<?php
require_once("config.php");

if(isset($_GET['prescription_id'])) {
    $pid = $_GET['prescription_id'];

    // Delete prescription from the database
    $delete_query = "DELETE FROM prescriptions WHERE prescription_id = $pid";
    $delete_result = mysqli_query($con, $delete_query);
    
    if($delete_result) {
        echo "<script>alert('Prescription deleted successfully.')</script>";
        echo "<script>setTimeout(function(){ window.location.href = 'admindashboard.php'; }, 1000);</script>"; // Redirect after 1 second
            exit();
    } else {
        echo "<script>alert('Error deleting prescription:')</script>" . mysqli_error($con);
    }
}

mysqli_close($con);
?>
