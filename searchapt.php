<?php
// Start session
session_start();

// Include config file
require_once("config.php");

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $patientId = $_POST["patientId"] ?? '';

    // Fetch patient details from the register table
    if (!empty($patientId)) {
        $patient_query = "SELECT fname, lname FROM register WHERE id = '$patientId'";
        $patient_result = mysqli_query($con, $patient_query);

        if ($patient_result) {
            // Check if any row is returned
            if (mysqli_num_rows($patient_result) > 0) {
                // Fetch patient data
                $patient_data = mysqli_fetch_assoc($patient_result);
                $patient_first_name = $patient_data['fname'];
                $patient_last_name = $patient_data['lname'];

                // Store patient details in session for use in prescription.php
                $_SESSION['patient_details'] = [
                    'id' => $patientId,
                    'fname' => $patient_first_name,
                    'lname' => $patient_last_name
                ];

                // Redirect to prescription.php
                header("Location: addappointment.php");
                exit();
            } else {
                // Handle case where patient details are not found
                echo "<p>No patient found with the provided ID.</p>";
            }
        } else {
            // Handle database query error
            echo "Error: " . mysqli_error($con);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Patient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    body{
    background-image: url('image/apt1.jpg');
    background-size: cover; 
    background-repeat: no-repeat; 
    }
    .container {
        margin-top: 50px;
        padding: 20px;
        border-radius: 10px;
        background-color: rgba(255, 255, 255, 0.8);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    .form-control {
        margin-bottom: 15px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
        margin-right: 10px; /* Added margin to separate the buttons */
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }
</style>
</head>
<body>
<div class="container mt-5">
    <h1>Search Patient</h1>
    <form id="searchPatientForm" method="post" action="">
        <div class="mb-3">
            <label for="patientId" class="form-label">Search Patient ID</label>
            <input type="text" class="form-control" id="patientId" name="patientId" style="max-width: 250px;"required>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
        <a href="patientdashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </form>
    </form>
</div>
</body>
</html>