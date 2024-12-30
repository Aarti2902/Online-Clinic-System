<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View bill</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    /* Custom CSS styling */
body {
    background-image: linear-gradient(to right, #92fe9d 0%, #00c9ff 100%); /* Gradient background */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    font-size: 18px; /* Increased font size */
}

/* Navbar styling */
.navbar {
    background-color: #343a40; /* Dark grey */
}

.navbar-brand {
    font-size: 24px; /* Increased font size */
}

/* Button styling */
.btn-primary {
    background-color: #dc3545; /* Red */
    color: #fff;
    font-size: 20px; /* Increased font size */
}

.btn-primary:hover {
    background-color: #c82333; /* Darker red */
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
                           <i class="fa-regular fa-user"></i>Patient
                       </a>
                       <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                           
                           <li>
                               <hr class="dropdown-divider">
                           </li>
                           <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i>
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
                <a class="nav-link active text-light p-3" aria-current="page" href="#"><i class="fa-solid fa-gauge"></i>
                    Patient Dashboard</a>
                <hr class="dropdown-divider">
                <a class="nav-link active text-light p-3" aria-current="page" href="patviewapt.php"><i class="fa-solid fa-calendar-check"></i>
                    View Appointments</a>

                <hr class="dropdown-divider">
                <a class="nav-link active text-light p-3" aria-current="page" href="searchapt.php">
                <i class="fa-solid fa-list"></i>Book Appointemnt</a>
                
                <hr class="dropdown-divider">
                <a class="nav-link active text-light p-3" aria-current="page" href="patviewdoc.php">
                <i class="fa-solid fa-user-doctor"></i>View Doctors</a>
                <hr class="dropdown-divider">

                <a class="nav-link active text-light p-3" aria-current="page" href="patviewpre.php">
                <i class="fa-solid fa-prescription"></i>View Prescription</a>
                <hr class="dropdown-divider">

                <a class="nav-link active text-light p-3" aria-current="page" href="patviewbill.php">
                <i class="fa-solid fa-money-check"></i>View Bill</a>
                <hr class="dropdown-divider">

                <a class="nav-link active text-light p-3" aria-current="page" href="patviewreply.php">
                <i class="fa-regular fa-message"></i>View Qurey?</a>
                <hr class="dropdown-divider">

            </div>


            <div class="col-md-10">
                <div class="container mt-5">
            
                <form action="" method="post">
             <div class="mb-3">
                <label for="patientID" class="form-label">Patient ID</label>
                <input type="text" class="form-control" id="patientID" name="patientID" required>
            </div>
             <button type="submit" class="btn btn-primary">View Bill</button>
            </form>
            <div class="text-center"> <!-- Centering div -->
                    <?php
                  
                    // Check if the form is submitted
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Include database configuration
                        require_once("config.php");
                    
                        // Retrieve form data
                        $patient_id = $_POST["patientID"];
                    
                        // Retrieve bill data from the database based on the patient ID
                        $query_bill = "SELECT * FROM bills WHERE id = '$patient_id'";
                        $result_bill = mysqli_query($con, $query_bill);
                    
                        if ($result_bill) {
                            if (mysqli_num_rows($result_bill) > 0) {
                                // Start table
                                echo '<div class="container mt-5">';
                                echo '<h2>Bill Details</h2>';
                                echo '<table class="table">';
                                echo '<thead>';
                                echo '<tr>';
                                echo '<th scope="col">Bill no.</th>';
                                echo '<th scope="col">Id</th>';
                                echo '<th scope="col">First Name</th>';
                                echo '<th scope="col">Last Name</th>';
                                echo '<th scope="col">Date</th>';
                                echo '<th scope="col">Room Type Bill</th>';
                                echo '<th scope="col">Extra Expenditures</th>';
                                echo '<th scope="col">OPD Fees</th>';
                                echo '<th scope="col">Total Amount</th>';
                                echo '</tr>';
                                echo '</thead>';
                                echo '<tbody>';
                    
                                // Output bill data
                                while ($row_bill = mysqli_fetch_assoc($result_bill)) {
                                    echo '<tr>';
                                    echo '<td>' . $row_bill['bid'] . '</td>';
                                    echo '<td>' . $row_bill['id'] . '</td>';
                                    echo '<td>' . $row_bill['bfname'] . '</td>';
                                    echo '<td>' . $row_bill['blname'] . '</td>';
                                    echo '<td>' . $row_bill['date'] . '</td>';
                                    echo '<td>' . $row_bill['roomtypebill'] . '</td>';
                                    echo '<td>' . $row_bill['extraexpenditures'] . '</td>';
                                    echo '<td>' . $row_bill['opdfees'] . '</td>';
                                    echo '<td>' . $row_bill['totalamount'] . '</td>';
                                    echo '</tr>';
                                }
                    
                                // End table
                                echo '</tbody>';
                                echo '</table>';
                                echo '</div>';
                            } else {
                                echo "<p>No bill found for the given patient ID.</p>";
                            }
                        } else {
                            echo "<p>Error fetching bill data: " . mysqli_error($con) . "</p>";
                        }
                    
                        // Close database connection
                        mysqli_close($con);
                    }
                    ?>
                </div>
             </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>
</html>
