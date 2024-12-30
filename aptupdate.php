<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Appointment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('image/upa.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .regi_form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        button[type="submit"] {
            width: 100%;
        }
    </style>
</head>
<body>
<?php
require_once("config.php");
if(isset($_GET['aid']))
{
  $appointment_id=$_GET['aid'];

  $query="SELECT * FROM bkapt WHERE aid=$appointment_id";
  $result=mysqli_query($con,$query);
  if($result) {
    $appointment=mysqli_fetch_assoc($result);
    if(!$appointment){
      echo"<script>alert('Appointment not found.')</script>";
      exit;
    }
  } else {
    echo "Error retrieving appointment: " . mysqli_error($con);
    exit;
  }
}
else{
    echo "<script>alert('Appointment ID Not provided.')</script>";
    exit;
}
?>

<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-md-6">
            <div class="regi_form d-flex justify-content-center">
                <form action="apotupdatepro.php" method="POST">
                    <input type="hidden" name="aid" value="<?php echo $appointment['aid'];?>">
                    <div class="row">
                        <h2>Update Appointment</h2>
                    </div>
                    <div class="row">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" name="date" required="" value="<?php echo $appointment['date']; ?>">
                    </div><br>
                    <div class="row">
                        <label for="doctor" class="form-label">Select Doctor</label>
                        <select class="form-control" name="doctor" required="">
                            <option value="">Select Doctor</option>
                            <option value="Dr.poornima Khatte" <?php if($appointment['doctor'] == 'Dr.poornima Khatte') echo 'selected'; ?>>Dr.poornima Khatte</option>
                            <option value="Dr.khatte" <?php if($appointment['doctor'] == 'Dr.khatte') echo 'selected'; ?>>Dr.khatte</option>
                            <option value="Dr.xyz" <?php if($appointment['doctor'] == 'Dr.xyz') echo 'selected'; ?>>Dr.xyz</option>
                        </select><br><br>
                    </div>
                    <div class="row">
                        <label for="time" class="form-label">Select Time</label>
                        <select class="form-control" name="time" required="">
                            <option value="">Select Time</option>
                            <option value="9:00-2:00AM" <?php if($appointment['time'] == '9:00-2:00AM') echo 'selected'; ?>>9:00-2:00AM</option>
                            <option value="5:00-9:00AM" <?php if($appointment['time'] == '5:00-9:00AM') echo 'selected'; ?>>5:00-9:00 AM</option>
                        </select>
                    </div><br>
                    <button type="submit" class="btn btn-primary" name="submit">Update</button>
                </form>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
