
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Doctor</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
        body {
            background-image: url('image/vd.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-weight: bold; /* Make the font bold */
            
        }
        .update-btn,
    .delete-btn {
  display: inline-block;
  padding: 5px 10px;
  margin: 2px;
  text-decoration: none;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.update-btn {
  background-color: #007bff; /* Blue */
}

.delete-btn {
  background-color: #dc3545; /* Red */
}


    </style>
</head>
<body>

    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <div class="container-fluid">
           <a class="navbar-brand" href="#">
           <i class="fa-solid fa-house-medical-circle-exclamation">Shashi Clinic</i></a>
           <div class="d-flex justify-content-end">
           <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
               data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
               aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
           </button>
           
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                   <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle active" href="#" name="Dropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                           <i class="fa-regular fa-user"></i> Admin
                       </a>
                       <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                           
                         
                           <li>
                               <hr class="dropdown-divider">
                           </li>
                           <li><a class="dropdown-item" href="admin.php"><i class="fa-solid fa-right-from-bracket"></i>
                                   Logout</a></li>
                       </ul>
                   </li>
               </ul>
           </div>
        </div>
       </div>
   </nav>
   <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 bg-dark text-light vh-100">
                <hr class="dropdown-divider">
                <a class="nav-link active text-light p-2" aria-current="page" href="#"><i class="fa-regular fa-user"></i>
                    <b>Admin Dashboard</b></a>
                <a class="nav-link active text-light p-2" aria-current="page" href="viewapot.php"><i class="fa-solid fa-calendar-check"></i>
                    View Appointments</a>
                <hr class="dropdown-divider">
                <a class="nav-link active text-light p-2" aria-current="page" href="viewpat.php">
                <i class="fa-solid fa-hospital-user"></i>View Patient</a>
                <hr class="dropdown-divider">
                <a class="nav-link active text-light p-2" aria-current="page" href="viewdoc.php">
                <i class="fa-solid fa-user-doctor"></i>View Doctors</a>
                <hr class="dropdown-divider">
                <a class="nav-link active text-light p-2" aria-current="page" href="adddoctor.php">
                <i class="fa-solid fa-bars"></i>Add Doctors</a>
                <hr class="dropdown-divider">
                <a class="nav-link active text-light p-2" aria-current="page" href="addpatient.php">
                <i class="fa-solid fa-bars"></i>Add Pateint</a>
                <hr class="dropdown-divider">

                <hr class="dropdown-divider">
                <a class="nav-link active text-light p-2" aria-current="page" href="presearch.php">
                <i class="fa-solid fa-prescription"></i>Prescription</a>
                <hr class="dropdown-divider">

                <hr class="dropdown-divider">
                <a class="nav-link active text-light p-2" aria-current="page" href="viewprescription.php">
                <i class="fa-solid fa-prescription"></i>Viewprescription.php</a>
                <hr class="dropdown-divider">

                <hr class="dropdown-divider">
                <a class="nav-link active text-light p-2" aria-current="page" href="billsearch.php">
                <i class="fa-solid fa-money-check"></i>Generate Bill</a>
                <hr class="dropdown-divider">

                
                <hr class="dropdown-divider">
                <a class="nav-link active text-light p-2" aria-current="page" href="viewbill.php">
                <i class="fa-solid fa-money-check"></i>View Bills</a>
                <hr class="dropdown-divider">

                <hr class="dropdown-divider">
                <a class="nav-link active text-light p-2" aria-current="page" href="viewmsg.php">
                <i class="fa-regular fa-message"></i>View Message</a>
                <hr class="dropdown-divider">


            </div>
            <div class="col-md-10">
                <!-- Appointment List Section -->
                <div class="container mt-5">
                    <h1>Doctors</h1>
                    <table class="table table-bordered" border="5px">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Age</th>
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Experience</th>
                                <th>Specialization</th>
                                <th>Email</th>
                                <th>Visiting Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once("config.php");
                            $rs=mysqli_query($con,"select * from addoc");
                            while($a=mysqli_fetch_array($rs))
                            {
                                echo "<tr>";
                                echo "<td>".$a[0]."</td>";
                                echo "<td>".$a[1]."</td>";
                                echo "<td>".$a[2]."</td>";
                                echo "<td>".$a[3]."</td>";
                                echo "<td>".$a[4]."</td>";
                                echo "<td>".$a[5]."</td>";
                                echo "<td>".$a[6]."</td>";
                                echo "<td>".$a[7]."</td>";
                                echo "<td>".$a[8]."</td>";
                                echo "<td>".$a[9]."</td>";
                               
                               
                                echo "<td><a href='docupdate.php?id=".$a[0]."'class='update-btn'>Update</a>
                                <a href='docdelete.php?id=".$a[0]."'class='delete-btn'>Delete</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>
