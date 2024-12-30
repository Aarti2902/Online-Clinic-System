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
        $doctor_name = $_POST["doctorName"] ?? '';
        $medication = $_POST["medication"] ?? '';
        $notes = $_POST["notes"] ?? '';

        // Insert prescription into prescriptions table
        $insertSql = "INSERT INTO prescriptions (pfname, plname, doctorname, medication, notes, id) 
                      VALUES ('$patient_first_name', '$patient_last_name', '$doctor_name', '$medication', '$notes', '$patientId')";

        if (mysqli_query($con, $insertSql)) {
            echo "<script>alert('Prescription generated successfully')</script>";
            echo "<script>setTimeout(function(){ window.location.href = 'presearch.php'; }, 1000);</script>"; // Redirect after 1 second
            exit();
        } else {
            echo "Error generating prescription: " . mysqli_error($con);
        }

        // Unset session data after use
        unset($_SESSION['patient_details']);
    }
} else {
    // Redirect back to search.php if session data is not available
    header("Location: presearch.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Prescription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-image: url('image/ps.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh; /* Ensure the background covers the entire viewport height */
        }
        label {
            font-size: 20px; /* Adjust the font size as needed */
            font-weight: bold; /* Make the font bold */
        }
        
        /* Style for form input fields */
        input[type="text"],
        textarea,
        select {
            font-size: 18px; 
            font-weight: bold; 
        }
        
        /* Style for form buttons */
        .btn-primary {
            font-size: 20px; 
            font-weight: bold; 
        }
            
            .container {
            max-width: 600px; 
            }

        label {
            font-size: 20px; 
            font-weight: bold; 
        }

        /* Style for form input fields */
        input[type="text"],
        textarea,
        select {
            font-size: 18px; 
            font-weight: bold; 
        }

        /* Style for form buttons */
        .btn-primary {
            font-size: 20px; 
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1>Generate Prescription</h1>
    <form id="generatePrescriptionForm" method="post" action="">
        <input type="hidden" name="patientId" value="<?php echo isset($patientId) ? $patientId : ''; ?>">
        <div class="mb-3">
            <label for="pfname" class="form-label">Patient First Name</label>
            <input type="text" class="form-control" id="pfname" name="pfname" value="<?php echo isset($patient_first_name) ? $patient_first_name : ''; ?>" required>
        </div>
        <div class="mb-3">
            <label for="plname" class="form-label">Patient Last Name</label>
            <input type="text" class="form-control" id="plname" name="plname" value="<?php echo isset($patient_last_name) ? $patient_last_name : ''; ?>" required>
        </div>
        <div class="mb-3">
            <label for="Doctor" class="form-label"><b>Select Docter</b></label>
            <select class="form-control" name="doctorName" required=""value="<?php echo $doctor; ?>">
            <option value=""><b>Select Doctor</b></option>
            <option value="Dr.poornima Khatte"><b>Dr.poornima Khatte</b></option>
            <option value="Dr.Sunil khatte"><b>Dr. Sunil khatte</b></option>
            <option value="Dr.xyz"><b>Dr.xyz</b></option>
           </select><br><br>
                        
        <div class="mb-3">
            <label for="medication" class="form-label">Medicine</label>
            <input type="text" class="form-control" id="medication" name="medication" required>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">Notes</label>
            <textarea class="form-control" id="notes" name="notes" rows="3" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Generate Prescription</button>
    </form>
</div>
</body>
</html>