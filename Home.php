<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <!--Nav bar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <li class="nav-item">
      <a class="navbar-brand" href="#">
    <img src="image\logo.jpg" alt="logo" style="width:40px;">
  </a>
      </li>
  <a class="navbar-brand" href="#"><b>Shashi Clinic</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href=""><b>Home</b> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php"><b>About Us</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="service.php"><b>Services</b></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php"><b>Contact Us</b></a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link" href="register.php"><b>Register</b></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="login.php"><b>Patient Login</b></a>
      </li>
    
      <li class="nav-item">
        <a class="nav-link" href="admin.php"><b>Admin Login</b></a>
      </li>
    </ul>
   
  </div>
</nav>

  <!--carousel-->
  <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image\coro.jpg" alt="IMAGE1" width="1500" height="500">
    </div>
    <div class="carousel-item">
      <img src="image\c2.jpg" alt="IMAGE2" width="1500" height="500">
    </div>
    <div class="carousel-item">
      <img src="image\image1.jpg" alt="IMAGE3" width="1500" height="500">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
  <?php include 'footer.php'; ?>

  <!-- Bootstrap JS and jQuery (needed for the dropdown menu functionality) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
