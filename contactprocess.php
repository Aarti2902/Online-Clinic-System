<?php
require_once('config.php');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name']; 
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Insert message into database
    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";
    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Your message has been submitted successfully.'); window.location.href = 'contact.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

// Close connection
$con->close();
?>
