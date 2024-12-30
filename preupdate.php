<html>
<head>
<title>Update Prescription</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
        body {
            background-image: url('image/preup3.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding-top: 40px;
            padding-bottom: 40px;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .regi_form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
        }
        .form-label {
           
            font-size: 18px;
            color: #000;
        }
        .form-control {
            font-size: 16px;
        }
        textarea.form-control {
            resize: vertical;
        }
        .btn-primary {
            font-weight: bold;
            font-size: 18px;
        }
        
</style>


</head>
<body>
<?php
require_once("config.php");
if(isset($_GET['prescription_id']))
{
  $prescription_id=$_GET['prescription_id'];

  $query="SELECT * FROM prescriptions WHERE prescription_id=$prescription_id";
  $result=mysqli_query($con,$query);
  $prescription=mysqli_fetch_assoc($result);
  if(!$prescription){
    echo"<script>alert('Prescription not found.')</script>";
    exit;
  }
}
else{
    echo "<script>alert('ID Not provided.')</script>";
    exit;
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <div class="regi_form">
            <form action="preupdatepro.php" method="post">
                <input type="hidden" name="prescription_id" value="<?php echo $prescription['prescription_id']; ?>">
                <div class="row">
                    <h3>Update Prescription</h3>
                    <label for="Doctor" class="form-label">Select Doctor</label>
                    <select class="form-control" name="doctorName" required="">
                        <option value="">Select Doctor</option>
                        <option value="Dr.poornima Khatte" <?php if($prescription['doctorName'] == 'Dr.poornima Khatte') echo 'selected'; ?>>Dr.poornima Khatte</option>
                        <option value="Dr.khatte" <?php if($prescription['doctorName'] == 'Dr.khatte') echo 'selected'; ?>>Dr.khatte</option>
                        <option value="Dr.xyz" <?php if($prescription['doctorName'] == 'Dr.xyz') echo 'selected'; ?>>Dr.xyz</option>
                    </select><br><br>
                </div>
                <div class="form-group">
                    <label for="medication">Medicines</label>
                    <textarea class="form-control" id="medication" name="medication" rows="3" placeholder="Enter medication details"><?php echo $prescription['medication']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Enter additional notes"><?php echo $prescription['notes']; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
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
