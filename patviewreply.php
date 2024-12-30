<?php
require_once('config.php');

// Retrieve messages and their admin replies
$sql = "SELECT * FROM messages";
$result = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Reply</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
        /* Custom CSS styling */
body {
    background-image: url('image/query.jpg');
    background-size: cover; /* Optional: adjust based on your preference */
    background-repeat: no-repeat; 
}

.navbar {
    background-color: #343a40 !important;
}

.navbar-brand {
    font-size: 24px;
    font-weight: bold;
}

.nav-link {
    color: #fff !important;
}

.nav-link:hover {
    color: #f8f9fa !important;
}

.messages {
    margin-top: 20px;
}

.message {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-bottom: 20px;
}

.message p {
    margin-bottom: 10px;
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
            <h2>View Replies</h2>
        <div class="messages">
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<div class='message'>";
                    echo "<p><strong>Message:</strong> " . $row["message"] . "</p>";
                    echo "<p><strong>Admin Reply:</strong> " . $row["admin_reply"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "No messages found.";
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
<?php
// Close connection
$con->close();
?>