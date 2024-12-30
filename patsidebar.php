<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Sidebar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

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
                
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">

</body>
</html>

