<html>
<head>
<title>Doctor Update</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
        body {
            background-image: url('image/docup.jpg'); /* Replace 'background-image.jpg' with your image file path */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .container {
            margin-top: 50px;
        }
        .regi_form {
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 10px;
        }
        .form-label {
            color: #333;
        }
    </style>
</head>
<body>
      
<?php
require_once("config.php");
if(isset($_GET['id']))
{
  $doctor_id=$_GET['id'];

  $query="SELECT * FROM addoc WHERE id=$doctor_id";
  $result=mysqli_query($con,$query);
  $doctor=mysqli_fetch_assoc($result);
  if(!$doctor){
    echo"Doctor not found.";
    exit;
  }
}
else{
    echo "Doctor ID Not provided.";
    exit;
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <div class="regi_form">
            <form action="docupprocess.php" method="POST">
                <h3>Update Details</h3>
                <input type="hidden" name="id" value="<?php echo $doctor['id']; ?>">
                <div class="row">
                    <label for="experience" class="form-label">Experience</label>
                    <input type="text" class="form-control" name="experience" required="" value="<?php echo $doctor['experience']; ?>">
                </div>

                <div class="row">
                    <label for="specialization" class="form-label">Specialization</label>
                    <select class="form-control" name="specialization" required="">
                        <option value="">Select Specialization</option>
                        <option value="General Physician" <?php if($doctor['specialization'] == 'General Physician') echo 'selected'; ?>>General Physician</option>
                        <option value="ENT Specialist" <?php if($doctor['specialization'] == 'ENT Specialist') echo 'selected'; ?>>ENT Specialist</option>
                        <option value="Gynecologist" <?php if($doctor['specialization'] == 'Gynecologist') echo 'selected'; ?>>Gynecologist</option>
                    </select>
                </div><br>
        
                <div class="row">
                    <label for="visitingtime" class="form-label">Visiting Time</label>
                    <select class="form-control" name="visitingtime" required="">
                        <option value="">Select Visiting Time</option>
                        <option value="9:00-2:00AM" <?php if($doctor['visitingtime'] == '9:00-2:00AM') echo 'selected'; ?>>9:00-2:00AM</option>
                        <option value="5:00-9:00 AM" <?php if($doctor['visitingtime'] == '5:00-9:00 AM') echo 'selected'; ?>>5:00-9:00 AM</option>
                    </select>
                </div><br>
                        
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
