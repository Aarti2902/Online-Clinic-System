<?php
require_once("config.php");

$fname = $lname = $age = $phone = $address = $gender = $bloodgroup = $dob = $email =$room = "";
$fnameErr = $lnameErr = $ageErr = $phoneErr = $addressErr = $genderErr = $bgErr = $dobErr = $emailErr = $roomErr= "";

// Form submission handling
if(isset($_POST['submit'])) {
    // Sanitize and validate input
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age=$_POST['age'];
    $phone = $_POST['phone'];
    $address=$_POST['address'];
    $gender = $_POST['gender'];
    $bg=$_POST['bloodgroup'];
    $dob = $_POST['dob'];
    $email=$_POST['email'];
    $room=$_POST['room'];

     // Validation
     if (empty($fname)) {
        $fnameErr = "First name is required";
    }

    if (empty($lname)) {
        $lnameErr = "Last name is required";
    }

    if (!is_numeric($age) || $age <= 0) {
        $ageErr = "Age must be a positive number";
    }

    if (empty($phone)) {
        $phoneErr = "Phone number is required";
    }

    if (empty($address)) {
        $addressErr = "Address is required";
    }

    if (empty($gender)) {
        $genderErr = "Gender is required";
    }

    if (empty($bg)) {
        $bgErr = "Date is required";
    }

    if (empty($dob)) {
        $dobErr = "Date Of Birth selection is required";
    }

    if (empty($email)) {
        $emailErr = "Email is required";
    }
    if (empty($room)) {
        $roomErr = "Please Select Room ";
    }

    // If all fields are valid, proceed with inserting into database
    if (empty($fnameErr) && empty($lnameErr) && empty($ageErr) && empty($phoneErr) && empty($addressErr) && empty($genderErr) && empty($bgErr) && empty($dobErr) && empty($emailErr) && empty($roomErr)) 
    {
    $result = mysqli_query($con, "INSERT INTO adpat VALUES('', '$fname', '$lname', '$age', '$phone','$address', '$gender','$bg','$dob','$email','$room')");
    if($result) {
        echo "<script>alert('Patient added successfully...')</script>";
        $fname = $lname = $age = $phone =$address= $gender = $bloodgroup = $dob = $email =$room= "";
    } else {

        echo "<script>alert('Something wents wrong...')</script>";
    }
}
}

// Close database connection
mysqli_close($con)
?>

<html>
<head>
<title>Add Patient</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
 body {
            background-image: url('image/p.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-weight: bold;  
            font-size: 20px;
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
                        <div class="row">
                        <h3>Add Patient</h3>
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="fname" required=""value="<?php echo $fname; ?>">
                        </div>
                        <div class="row">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lname" required=""value="<?php echo $lname; ?>">
                        </div>
                        <div class="row">
                            <label for="age" class="form-label">Age</label>
                            <input type="text" class="form-control" name="age" required=""value="<?php echo $age; ?>">
                            <span class="text-danger"><?php echo $ageErr; ?></span>
                        </div>
                        <div class="row">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="phone" class="form-control" name="phone" required="" maxlength="10"value="<?php echo $phone; ?>">
                        </div>
                        <div class="row">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" required=""value="<?php echo $address; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" required value="<?php echo $gender; ?>">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female" required value="<?php echo $gender; ?>">
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>
                        <div class="row">
                           <label for="bloodgroup" class="form-label">Select BloodGroup</label>
                            <select class="form-control" name="bloodgroup" required="" value="<?php echo $bloodgroup; ?>">
                            <option value="">Select Blood Group</option>
                            <option value="A+">A+</option>
                           <option value="A-">A-</option>
                           <option value="B+">B+</option>
                           <option value="B-">B-</option>
                           <option value="O+">O+</option>
                           <option value="O-">O-</option>
                           <option value="AB+">AB+</option>
                           <option value="AB-">AB-</option>
                        </select><br><br>
                        </div>

                        <div class="row">
                            <label for="dob" class="form-label">DOB</label>
                            <input type="date" class="form-control" name="dob" required="" value="<?php echo $dob; ?>">
                        </div><br>
                        
                        
                        <div class="row">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required="" value="<?php echo $email; ?>">
                        </div><br>
        
                        <div class="row">
                           <label for="room type" class="form-label">Select Room</label>
                            <select class="form-control" name="room" required=""value="<?php echo $room; ?>">
                            <option value="">Select Room</option>
                            <option value="ICU">ICU</option>
                           <option value="General Ward">General Ward</option>
                           <option value="Special Room">Special Room</option>
                        </select><br><br>
                        </div>

                       <button type="submit" class="btn btn-primary" name="submit">Add Patient </button>
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
