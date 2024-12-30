<?php
require_once("config.php");

$error = [];

if(isset($_POST['Register'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validation for first name
    if(strlen($fname) < 3) {
        $error[] = 'Please enter at least 3 characters in first name';
    } elseif(strlen($fname) > 20) {
        $error[] = 'Please enter less than 20 characters in first name';
    }

    // Validation for last name
    if(strlen($lname) < 3) {
        $error[] = 'Please enter at least 3 characters in last name';
    } elseif(strlen($lname) > 20) {
        $error[] = 'Please enter less than 20 characters in last name';
    }

    // Validation for email
    if(strlen($email) < 3) {
        $error[] = 'Please enter proper email id';
    }

    // Validation for username
    if(strlen($username) < 3) {
        $error[] = 'Username must be greater than 3 characters';
    } elseif(strlen($username) > 10) {
        $error[] = 'Please enter less than 10 characters in username';
    } elseif(!preg_match("/^[a-z][a-z0-9_-]{2,}$/", $username)) {
        $error[] = 'Invalid entry for username. Enter lowercase letters without any space and no number at the start';
    }

    // Validation for password
    if(strlen($password) < 5) {
        $error[] = 'The password is 5 characters long';
    }

    // Check if username already exists
    $sql = "SELECT * FROM register WHERE username='$username'";
    $res = mysqli_query($con, $sql);
    if(mysqli_num_rows($res) > 0) {
        $error[] = 'Username already exists';
    }

    // If no errors, insert into database
    if(empty($error)) {
        $result = mysqli_query($con, "INSERT INTO register VALUES('', '$fname', '$lname', '$email', '$username', '$password')");
        if($result) {
            echo '<script>alert("You have registered successfully"); window.location.href = "regdetail.php";</script>';
            exit; // Stop further execution
        } else {
            $error[] = 'Failed: something went wrong';
        }
    }
}
?>

<html>
<head>
<title>login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    background-image: url('image/reg.jpg'); 
    background-size: cover;
}

.container {
    margin-top: 50px; /* Adjust margin top as needed */
 }

 .regi_form {
     background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
     padding: 20px;
     border-radius: 10px;
 }

.regi_form h3 {
     text-align: center;
 }

 .regi_form label {
     font-weight: bold;
 }

.regi_form input {
     margin-bottom: 10px;
 }

 .btn-primary {
     width: 100%; /* Make button full width */
 }

.errormesg {
     color: red;
 }

.successmsg {
    color: green;
}

p {
    text-align: center;
 }

</style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
           
        </div>
        <div class="col-sm-4">
        <?php if(!empty($error)) {
                foreach($error as $er) {
                    echo '<p class="errormesg">&#x26A0;'.$er.'</p>';
                }
            } ?>
            <div class="regi_form">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="row">
                    <h3>Patient Registration</h3>
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="fname" required="">
                    </div>
                    <div class="row">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lname" required="">
                    </div>
                    <div class="row">
                        <label for="email" class="form-label">Email Id</label>
                        <input type="email" class="form-control" name="email" required="">
                    </div>
                    <div class="row">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text" class="form-control" name="username" required="">
                    </div>
                    <div class="row">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required="">
                    </div><br>
                    <button type="submit" class="btn btn-primary" name="Register">Register</button><br><br>
                    <p style="text-align:center">Have an account? <a href="login.php">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
