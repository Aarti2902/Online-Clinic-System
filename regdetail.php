<?php
require_once("config.php");

$sql = "SELECT * FROM register ORDER BY id DESC LIMIT 1"; 
$result = mysqli_query($con, $sql);

mysqli_close($con);
?>

<html>
<head>
<title>Registered Patient Details</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
/* Custom CSS styling */
body {
    background-image: url('image/image13.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
.table td {
    font-size: 19px; 
    font-weight: bold;
}

</style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="text-center"><b>Registered Patient Details</b></h3><br><br>
            <?php
          
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
            ?>
            <div class="table-responsive">
                <table class="table mx-auto"> 
                    <tbody>
                        <tr>
                            <td>Patient Id:</td>
                            <td><?php echo $row['id']; ?></td>
                        </tr>
                        <tr>
                            <td>First Name:</td>
                            <td><?php echo $row['fname']; ?></td>
                        </tr>
                        <tr>
                            <td>Last Name:</td>
                            <td><?php echo $row['lname']; ?></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><?php echo $row['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Username:</td>
                            <td><?php echo $row['username']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php
            } else {
                echo "<p class='text-center'>No registered patients found.</p>";
            }
            ?>
            <br><br>
            <h4 class="text-center"><b>Note: Please remember your ID</b></h4><br>
            <div class="text-center"> 
                <a href="login.php"><b>Login Here</b></a>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
