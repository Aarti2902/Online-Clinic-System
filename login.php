<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Login</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
      background-image: url('image/loginimg.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
     
    }

    

    .login-container {
      max-width: 400px;
      margin: 100px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      font-weight: bold;
    }

    .btn-login {
      width: 100%;
    }
  </style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
  <div class="login-container">
  <div class="text-center">
    <img src="image/adminlogo.jpg" alt="adminlogo" height="150px" width="200px"></img>
  </div>
    <h2>Patient Login</h2>
    <form action="next.php" method="POST">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" placeholder="Enter username" name="uname">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Enter password" name="p">
      </div>
      <button type="submit" class="btn btn-primary btn-login">Login</button>
     
    <br>
    <p style="text-align:center">Don't have an account? <a href="register.php">Register</a></p>
    </form>
  </div>
</div>
<?php include 'footer.php'; ?>
<!-- Bootstrap JS (optional, for some components to work) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
