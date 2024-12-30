<?php
// Start session
session_start();

// Include config file
require_once("config.php");

// Check if session data exists for patient details
if (isset($_SESSION['patient_details'])) {
    // Retrieve patient details from session
    $patientId = $_SESSION['patient_details']['id'];
    $patient_first_name = $_SESSION['patient_details']['fname'];
    $patient_last_name = $_SESSION['patient_details']['lname'];

    // Check if form data is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $fname = $_POST["fname"] ?? '';
        $lname = $_POST["lname"] ?? '';
        $age = $_POST["age"] ?? '';
        $phone = $_POST["phone"] ?? '';
        $gender = $_POST["gender"] ?? '';
        $date = $_POST["date"] ?? '';
        $doctor = $_POST["doctor"] ?? '';
        $time = $_POST["time"] ?? '';

        // Insert prescription into prescriptions table
        $insertSql = "INSERT INTO bkapt (fname, lname, age, phone, gender, date, doctor, time, id) 
              VALUES ('$fname', '$lname', '$age', '$phone', '$gender', '$date', '$doctor', '$time', '$patientId')";

        if (mysqli_query($con, $insertSql)) {
            echo "<script>alert('Appointment Book successfully')</script>";
            echo "<script>setTimeout(function(){ window.location.href = 'searchapt.php'; }, 1000);</script>"; // Redirect after 1 second
            exit();
        } else {
            echo "Error generating appointment: " . mysqli_error($con);
        }

        // Unset session data after use
        unset($_SESSION['patient_details']);
    }
} else {
    // Redirect back to addsearch.php if session data is not available
    header("Location: searchapt.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('image/apt1.jpg');
            background-size: cover; /* Optional: adjust based on your preference */
            background-repeat: no-repeat; /* Optional: adjust based on your preference */
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="regi_form">
                <form action="" method="POST">
                    <input type="hidden" name="patientId" value="<?php echo isset($patientId) ? $patientId : ''; ?>">
                    <div class="row">
                        <h3><b>Book Appointment</b></h3>
                        <label for="fname" class="form-label"><b>First Name</b></label>
                        <input type="text" class="form-control" name="fname" required="" value="<?php echo isset($patient_first_name) ? $patient_first_name : ''; ?>">
                    </div>
                    <div class="row">
                        <label for="lname" class="form-label"><b>Last Name</b></label>
                        <input type="text" class="form-control" name="lname" required="" value="<?php echo isset($patient_last_name) ? $patient_last_name : ''; ?>">
                    </div>
                    <!-- Remaining form fields -->
                    <!-- Ensure that other 
                form fields are correctly populated -->
                    <!-- Add remaining form fields here -->
                    <div class="row">
                            <label for="age" class="form-label"><b>Age</b></label>
                            <input type="text" class="form-control" name="age" required="">
              
                        </div>
                        <div class="row">
                            <label for="phone" class="form-label"><b>Phone</b></label>
                            <input type="phone" class="form-control" name="phone" required="" maxlength="10">
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><b>Gender</b></label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" required=""value="<?php echo $gender; ?>">
                                <label class="form-check-label" for="male"><b>Male</b></label>
                            </div>
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female" required=""value="<?php echo $gender; ?>">
                                <label class="form-check-label" for="female"><b>Female</b></label>
                            </div>
                        </div>
                        <div class="row">
                            <label for="password" class="form-label"><b>Date</b></label>
                            <input type="date" class="form-control" name="date" required=""value="<?php echo $date; ?>">
                        </div><br>
                        <div class="row">
                           <label for="Doctor" class="form-label"><b>Select Docter</b></label>
                            <select class="form-control" name="doctor" required=""value="<?php echo $doctor; ?>">
                            <option value=""><b>Select Doctor</b></option>
                            <option value="Dr.poornima Khatte"><b>Dr.poornima Khatte</b></option>
                           <option value="Dr.khatte"><b>Dr.khatte</b></option>
                           <option value="Dr.xyz"><b>Dr.xyz</b></option>
                        </select><br><br>
                        
                        <div class="row">
                        <label for="time" class="form-label"><b>Select Time</b></label>
                        <select class="form-control" name="time" required=""value="<?php echo $time; ?>">
                        <option value=""><b>Select Time</b></option>
                        <option value="9:00-2:00AM"><b>9:00-2:00AM</b></option>
                       <option value="5:00-9:00AM"><b>5:00-9:00 AM</b></option>
                      
        
                       </select>
                       </div><br>
                    <button type="submit" class="btn btn-primary" name="submit"><b>Book Appointment</b></button>
                </form>
            </div>
    </div>
        <div class="col-sm-4"></div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>