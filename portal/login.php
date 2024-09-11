<?php 
session_start();
include __DIR__ . '/db.php';
include __DIR__ . '/src/Controllers/Authentication.php';
use Controllers\Authentication\Authentication;
$AuthController = new Authentication();
if (isset($_POST['log-in'])) {
    $AuthController->login();
 }
 if (isset($_GET['logout'])) {
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> CHYFLEY SCHOOLS - Poised to Making Giant Strides | Login </title>
    <meta name="Description" content="Poised to Making Giant Strides">
    <meta name="Author" content="CHYFLEY SCHOOLS">
	<meta name="keywords" content="CHYFLEY SCHOOLS - Poised to Making Giant Strides">
        <link rel="shortcut icon" href="images/chyf_logo.png">
    <style>
        body {
            height: 100vh;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            max-width: 900px;
            width: 100%;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
             padding-top: 50px; /* Padding for top */
            padding-bottom: 50px; /* Padding for bottom */
            background-color: #e6f7ff;
           
        }
        .login-logo {
            
            background-image: url('images/chyf_logo.png');
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            padding: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
           
           
            
        }
        .login-form {
            padding: 30px;
            background-color: #fff;
        }
        .form-control {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container login-container">
    <div class="row no-gutters">
        <div class="col-md-6 login-logo" >
            <!-- Blurred logo section -->
        </div>
        <div class="col-md-6">
            <div class="login-form">
                <h2 class="text-center">LOG IN</h2>
                <center style="color: red;"> <?php if (isset($_GET['e'])) {
                            echo "<p>Incorrect username or password</p>";
                        }?></center>
                <form  method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="matric">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <button type="submit" name="log-in" class="btn btn-primary btn-block">Sign In</button>
                    <div class="text-right mt-2">
                        <a href="#">Forgot Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
