<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
  body {
    background-image: url('image/pd.jpg');
    background-size: cover; 
    background-position: center;
    background-repeat: no-repeat; 
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





    <?php
    include'patsidebar.php';
    ?>

     

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>