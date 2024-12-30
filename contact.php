<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Shashi Clinic</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
        }
        h2 {
            color: black;
        }
        .hospital-info {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .hospital-info p {
            margin-bottom: 10px;
        }
        .contact-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .contact-form label {
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Contact Us</h2>
                <form class="contact-form" action="contactprocess.php" method="POST">
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 col-form-label">Name:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email:</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message" class="col-sm-3 col-form-label">Message:</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <h2>Shashi Clinic</h2>
                <p><img src="image\address.jpg" alt="add" header="30px" width="30px"><strong>Address:</strong> Near girija mangal karayalaya, jagdamba nagar, Jule Solapur.</p>
                <p><img src="image\phone.png" alt="phone" header="25px" width="25px"><strong>Phone:</strong> 7387764302</p>
                <p><img src="image\email.jpg" alt="email" header="30px" width="30px"><strong>Email:</strong> poornimakhatte1003@gmail.com</p>
                
            </div>
            
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
