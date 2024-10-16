<?php
    include '../php/dbconnect.php';
    require_once '../controller/functions.php';

    if (isset($_POST['admin_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (loginAdmin($conn, $email, $password)) {
        echo "Login successful!";
        header('Location: admin_dashboard.php');
        exit;
    } else {
        echo "Invalid email or password!";
    }
}

$conn->close();
?>

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/css/Hero-Clean-Reverse.css">
    <link rel="stylesheet" href="../assets/css/Navbar-Right-Links.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body style="background: url(&quot;../assets/img/agapbuhay.jpg&quot;) center / cover no-repeat;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100&quot;">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card" style="background: rgba(255,255,255,0.57);">
                    <div class="card-body text-center" style="border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;box-shadow: 0px 0px 7px rgb(135,232,89);background: rgba(10,11,10,0.63);border-style: none;">
                        <div class="mb-md-5 mt-md-4" style="padding-bottom: 15px;">
                            <h1 style="font-family: Aclonica, sans-serif;color: rgb(255,255,255);">Welcome back!</h1>
                            <p style="font-size: 19px;color: rgb(255,255,255);">Please enter your login details.</p>
                        </div>
                        <form method="post" action="admin-login.php" style="padding: 12px;">
                            <div class="d-flex input-fields" style="margin-top: 5px;margin-bottom: 5px;">
                                <label for="email">Email:</label>
                                <input class="form-control" type="text" id="email" name="email" required style="border-top-left-radius: 0px;border-bottom-left-radius: 0px;border-style: solid;">
                            </div>
                            <div class="d-flex input-fields" style="margin-top: 5px;margin-bottom: 5px;">
                                <label for="password">Create Password:</label>
                                <input class="form-control" type="password" id="password" name="password" required style="border-top-left-radius: 0px;border-bottom-left-radius: 0px;">
                            </div>
                            <div class="justify-content-between d-flex align-items-start" style="padding: 0px;color: rgb(255,255,255);">
                                <div class="remember">
                                    <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Remember me</label></div>
                                </div><a id="forgot" href="#">Forgot Password?</a>
                            </div><button class="btn btn-primary" type="submit" name="admin_login" style="margin-top: 10px;font-family: Aclonica, sans-serif;background: rgb(11,103,15);margin-bottom: 5PX;">LOG IN</button>
                            <div><span style="color: rgb(255,255,255);">Don't have an account?&nbsp;</span><a class="signup-nav" href="create-account.php">SIGN UP</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/script.js"></script>
</body>

</html>