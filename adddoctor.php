<?php
require_once("config.php");

$fname = $lname = $age = $phone = $gender = $experience = $specialization = $email = $visitingtime = "";
$fnameErr = $lnameErr = $ageErr = $phoneErr = $genderErr = $expErr = $specializationErr = $emailErr = $visitingtimeErr = "";

if(isset($_POST['submit'])) {
   
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $experience = $_POST['experience']; // Changed from $exp to $experience
    $specialization = $_POST['specialization'];
    $email = $_POST['email'];
    $visitingtime = $_POST['visitingtime'];

    // Validation
    if (empty($fname)) {
        $fnameErr = "First name is required";
    }

    if (empty($lname)) {
        $lnameErr = "Last name is required";
    }

    if (empty($age)) {
        $ageErr = "Age is required";
    } elseif (!is_numeric($age) || $age <= 0) {
        $ageErr = "Age must be a positive number";
    }

    if (empty($phone)) {
        $phoneErr = "Phone number is required";
    }

    if (empty($gender)) {
        $genderErr = "Gender is required";
    }

    if (empty($experience)) {
        $expErr = "Experience is required";
    }

    if (empty($specialization)) {
        $specializationErr = "Specialization is required";
    }

    if (empty($email)) {
        $emailErr = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }

    if (empty($visitingtime)) {
        $visitingtimeErr = "Visiting time is required";
    }

    if (empty($fnameErr) && empty($lnameErr) && empty($ageErr) && empty($phoneErr) && empty($genderErr) && empty($expErr) && empty($specializationErr) && empty($emailErr) && empty($visitingtimeErr)) 
    {
        $result = mysqli_query($con, "INSERT INTO addoc VALUES('', '$fname', '$lname', '$age', '$phone','$gender','$experience','$specialization','$email','$visitingtime')");
        if($result) {
            echo "<script>alert('Doctor added successfully...')</script>";
            $fname = $lname = $age = $phone = $gender = $experience = $specialization = $email = $visitingtime = "";
        } else {
            echo "<script>alert('Something went wrong...')</script>";
            echo "Error: " . mysqli_error($con);
        }
    }
}

mysqli_close($con);
?>

<html>
<head>
<title>Add Doctor</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
 body {
            background-image: url('image/adddoc.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
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
                    <h3><b>Add Doctor</b></h3>
                    <div class="mb-3">
                        <label for="fname" class="form-label"><b>Doctor First Name</b></label>
                        <input type="text" class="form-control" name="fname" required value="<?php echo $fname; ?>">
                        <span class="text-danger"><?php echo $fnameErr; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label"><b>Doctor Last Name</b></label>
                        <input type="text" class="form-control" name="lname" required value="<?php echo $lname; ?>">
                        <span class="text-danger"><?php echo $lnameErr; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label"><b>Age</b></label>
                        <input type="number" class="form-control" name="age" required value="<?php echo $age; ?>">
                        <span class="text-danger"><?php echo $ageErr; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label"><b>Phone</b></label>
                        <input type="text" class="form-control" name="phone" required maxlength="10" value="<?php echo $phone; ?>">
                        <span class="text-danger"><?php echo $phoneErr; ?></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Gender</b></label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" required <?php if($gender === "male") echo "checked"; ?>>
                            <label class="form-check-label" for="male"><b>Male</b></label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female" required <?php if($gender === "female") echo "checked"; ?>>
                            <label class="form-check-label" for="female"><b>Female</b></label>
                        </div>
                        <span class="text-danger"><?php echo $genderErr; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="experience" class="form-label"><b>Experience</b></label>
                        <input type="text" class="form-control" name="experience" required value="<?php echo $experience; ?>">
                        <span class="text-danger"><?php echo $expErr; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="specialization" class="form-label"><b>Specialization</b></label>
                        <select class="form-control" name="specialization" required>
                            <option value="">Select Specialization</option>
                            <option value="General Physician" <?php if($specialization === "General Physician") echo "selected"; ?>><b>General Physician</b></option>
                            <option value="ENT Specialist" <?php if($specialization === "ENT Specialist") echo "selected"; ?>><b>ENT Specialist</b></option>
                            <option value="Gynecologist" <?php if($specialization === "Gynecologist") echo "selected"; ?>><b>Gynecologist</b></option>
                        </select>
                        <span class="text-danger"><?php echo $specializationErr; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"><b>Email</b></label>
                        <input type="email" class="form-control" name="email" required value="<?php echo $email; ?>">
                        <span class="text-danger"><?php echo $emailErr; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="visitingtime" class="form-label"><b>Visiting Time</b></label>
                        <select class="form-control" name="visitingtime" required value="<?php echo $time; ?>">
                        <option value="">Select Visiting Time</option>
                        <option value="9:00-2:00AM" <?php if($visitingtime === "9:00-2:00AM") echo "selected"; ?>><b>9:00-2:00AM</b></option>
                        <option value="5:00-9:00 AM" <?php if($visitingtime === "5:00-9:00 AM") echo "selected"; ?>><b>5:00-9:00AM</b></option>
                        </select>
                        <span class="text-danger"><?php echo $visitingtimeErr; ?></span>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit"><b>Add Doctor</b></button>
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
