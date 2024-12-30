<?php
require_once('config.php');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Admin reply handling
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reply'])) {
    $message_id = $_POST['message_id'];
    $reply = $_POST['reply'];

    // Update message with admin reply
    $sql = "UPDATE messages SET admin_reply='$reply' WHERE id=$message_id";
    if ($con->query($sql) === TRUE) {
        echo "<script>alert('Reply sent successfully.'); window.location.href = 'viewmsg.php';</script>";
    } else {
        echo "Error updating record: " . $con->error;
    }
}

// Close connection
$con->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Reply</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Admin Reply</h2>
        <form action="viewmsg.php" method="post">
            <div class="form-group">
                <label for="reply">Reply:</label>
                <textarea class="form-control" id="reply" name="reply" rows="5" required></textarea>
            </div>
            <input type="hidden" name="message_id" value="<?php echo $_POST['message_id']; ?>">
            <button type="submit" class="btn btn-primary">Send Reply</button>
        </form>
    </div>
</body>
</html>
