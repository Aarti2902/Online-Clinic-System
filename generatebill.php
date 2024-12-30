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
        $date = $_POST["date"] ?? '';
        $roomtypebill = $_POST["roomtypebill"] ?? '';
        $exp = $_POST["extraexpenditures"] ?? '';
        $opdfees = $_POST["opdfees"] ?? '';
        $totalamount = $_POST["totalamount"] ?? '';

        // Insert prescription into prescriptions table
        $insertSql = "INSERT INTO bills (bfname, blname, date, roomtypebill, extraexpenditures,opdfees,totalamount, id) 
                      VALUES ('$patient_first_name', '$patient_last_name', '$date', '$roomtypebill', '$exp',$opdfees,$totalamount, '$patientId')";

        if (mysqli_query($con, $insertSql)) {
            echo "<script>alert('Bill generated successfully')</script>";
            echo "<script>setTimeout(function(){ window.location.href = 'billsearch.php'; }, 1000);</script>"; // Redirect after 1 second
            exit();
        } else {
            echo "Error generating bill: " . mysqli_error($con);
        }

        // Unset session data after use
        unset($_SESSION['patient_details']);
    }
} else {
    // Redirect back to search.php if session data is not available
    header("Location: billsearch.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Bill</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
        body {
            background-image: url('image/bill.jpg'); /* Replace 'background_image.jpg' with the path to your image */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh; /* Adjust based on your image size */
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Adjust opacity as needed */
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Optional: Add a shadow effect */
            max-width: 500px; /* Set the maximum width of the container */
            margin-left: auto;
            margin-right: auto;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-primary {
            background-color: #007bff; /* Blue color for primary button */
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker shade of blue on hover */
            border-color: #0056b3;
        }
    </style>

</head>
<body>
<div class="container mt-5">
    <h1>Generate Bill</h1>

    <form id="generateBillForm" method="post" action="">
    <input type="hidden" name="uid" value="<?php echo isset($patientId) ? $patientId : ''; ?>">
        <div class="mb-3">
            <label for="bfname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="bfname" name="bfname" value="<?php echo isset($patient_first_name) ? $patient_first_name : ''; ?>" required>
        </div>

        <div class="mb-3">
            <label for="blname" class="form-label">Last Name</label>
            <input type="text" class="form-control bill-calculation" id="blname" name="blname" value="<?php echo isset($patient_last_name) ? $patient_last_name : ''; ?>" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3">
            <label for="roomtypebill" class="form-label">Room Type Bill</label>
            <input type="number" class="form-control bill-calculation" id="roomtypebill" name="roomtypebill" required>
        </div>
        <div class="mb-3">
            <label for="extraexpenditures" class="form-label">Extra Expenditures</label>
            <input type="number" class="form-control bill-calculation" id="extraexpenditures" name="extraexpenditures" required>
        </div>
        <div class="mb-3">
            <label for="opdfees" class="form-label">OPD Fees</label>
            <input type="number" class="form-control bill-calculation" id="opdfees" name="opdfees" required>
        </div>
        <div class="mb-3">
            <label for="totalamount" class="form-label">Total Amount</label>
            <input type="number" class="form-control" id="totalamount" name="totalamount" readonly>
        </div>
      
        <button type="submit" class="btn btn-primary">Generate Bill</button>
    </form>

</div>


<script>
    // Calculate total amount when inputs change
    document.querySelectorAll('.bill-calculation').forEach(function (input) {
        input.addEventListener('change', function () {
            var roomTypeBill = parseFloat(document.getElementById('roomtypebill').value) || 0;
            var extraExpenditures = parseFloat(document.getElementById('extraexpenditures').value) || 0;
            var opdFees = parseFloat(document.getElementById('opdfees').value) || 0;

            var totalAmount = roomTypeBill + extraExpenditures + opdFees;
            document.getElementById('totalamount').value = totalAmount;
        });
    });
</script>




</body>
</html>
