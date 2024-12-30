<?php
require_once("config.php");

if(isset($_POST['submit'])) {
    $pid = $_POST['prescription_id'];
    $new_doc= mysqli_real_escape_string($con, $_POST['doctorName']);
    $new_medication= mysqli_real_escape_string($con, $_POST['medication']);
    $new_notes= mysqli_real_escape_string($con, $_POST['notes']);
    $update_query = "UPDATE prescriptions SET doctorName='$new_doc', medication='$new_medication', notes='$new_notes' WHERE prescription_id = $pid";
    $update_result = mysqli_query($con, $update_query);

    if($update_result) {
    echo "<script>alert('Details updated successfully.')</script>";
    echo "<script>setTimeout(function(){ window.location.href = 'admindashboard.php'; }, 1000);</script>"; // Redirect after 1 second
            exit();
     } else {
    echo "<script>alert('Error updating Details:')</script>" . mysqli_error($con);
    }

}
mysqli_close($con);
?>
