<?php
include 'php/dbconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['m_email'];
    $password = $_POST['mpassword'];

    $sql = "SELECT * FROM agap_members WHERE m_email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['mpassword'])) {
            echo "<script>alert('LOGIN successful!');</script>";
                header('Location: members_dashboard.php');
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Create your Account</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Acme&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/Hero-Clean-Reverse.css">
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background: url(&quot;assets/img/agapbuhay.jpg&quot;) center / cover no-repeat;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100&quot;">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card" style="background: rgba(255,255,255,0.57);">
                    <div class="card-body text-center" style="border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;box-shadow: 0px 0px 7px rgb(135,232,89);background: rgba(10,11,10,0.63);border-style: none;">
                        <div class="mb-md-5 mt-md-4" style="padding-bottom: 15px;">
                            <h1 style="font-family: Aclonica, sans-serif;color: rgb(255,255,255);">Welcome!</h1>
                            <p style="font-size: 19px;color: rgb(255,255,255);">Please enter your login details.</p>
                        </div>
                        <form method="POST" action="login.php" style="padding: 12px;">
                            <div class="d-flex input-fields" style="margin-top: 5px;margin-bottom: 5px;">
                            <input class="form-control" type="email" name="m_email" placeholder="Email Address" required style="border-top-left-radius: 0px;border-bottom-left-radius: 0px;border-style: solid;">
                            </div>
                            <div class="d-flex input-fields" style="margin-top: 5px;margin-bottom: 5px;">
                            <input class="form-control" type="password" name="mpassword" placeholder="Password" required style="border-top-left-radius: 0px;border-bottom-left-radius: 0px;">
                            </div>
                            <button class="btn btn-primary" type="submit" style="margin-top: 10px;font-family: Aclonica, sans-serif;background: rgb(11,103,15);margin-bottom: 5PX;">LOG IN</button>
                            <div>
                                <span style="color: rgb(255,255,255);">Don't have an account?&nbsp;</span>
                                <a class="signup-nav" href="create-account.php">LOGIN&nbsp;</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
         