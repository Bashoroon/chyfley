<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>TSIS REGISTRATION PORTAL</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../images/log.jpg">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="#">
                                        <span><img src="../images/log.jpg" alt="" height="90"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Don't have an account? Create your free account now.</p>
                                </div>

                                <h5 class="auth-title">Create Account</h5>

                                <form action="submitRegister.php" method="post">

                                    <div class="form-group">
                                        <label for="fullname">Full Name</label>
                                        <input class="form-control" type="text" name="name" placeholder="Enter your name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" name="email" required placeholder="Enter your email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required name="password" placeholder="Enter your password">
                                    </div>
                                     <div class="form-group">
                                        <label for="password">Password</label>
                                        <select class="form-control" type="" required name="role" placeholder="Enter your password">
                                            <option value="Admin">Admin</option>
                                            <option value="Sub Admin">Sub Admin</option>
                                            <option value="Teacher">Teacher</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-danger btn-block" type="submit"> Sign Up </button>
                                    </div>

                                </form>

                              
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Already have account?  <a href="login.php" class="text-muted ml-1"><b class="font-weight-semibold">Sign In</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            2019 &copy; TSIS theme by <a href="" class="text-muted">Dtapalce IT Solution</a> 
        </footer>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>