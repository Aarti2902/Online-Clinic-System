<html>
<head>
<title>Update Patient</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
        body {
            background-image: url('image/patup.jpg'); /* Replace 'your-background-image.jpg' with the path to your background image */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .container {
            margin-top: 50px;
        }
        .regi_form {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
            padding: 20px;
            border-radius: 10px;
        }
        .form-label {
            color: #000;
        }
    </style>
</head>
<body>
      
<?php
require_once("config.php");
if(isset($_GET['id']))
{
  $patient_id=$_GET['id'];

  $query="SELECT * FROM adpat WHERE id=$patient_id";
  $result=mysqli_query($con,$query);
  $patient=mysqli_fetch_assoc($result);
  if(!$patient){
    echo"Patient not found.";
    exit;
  }
}
else{
    echo "Patient ID Not provided.";
    exit;
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <div class="regi_form">
            <form action="patupprocess.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $patient['id']; ?>">
                <div class="row">
                    <h3>Update Patient Details:</h3>
                    <br><br>
                </div>
                <div class="row">
                    <label for="room type" class="form-label">Select Room</label>
                    <select class="form-control" name="room" required="">
                        <option value="">Select Room</option>
                        <option value="ICU" <?php if($patient['room'] == 'ICU') echo 'selected'; ?>>ICU</option>
                        <option value="General Ward" <?php if($patient['room'] == 'General Ward') echo 'selected'; ?>>General Ward</option>
                        <option value="Special Room" <?php if($patient['room'] == 'Special Room') echo 'selected'; ?>>Special Room</option>
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
