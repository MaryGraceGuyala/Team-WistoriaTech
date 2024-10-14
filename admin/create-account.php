<?php
include '../php/dbconnect.php';

function adminSignup($firstName, $lastName, $email, $password) {
    global $conn;

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO agap_admin (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "New admin registered successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    adminSignup($firstName, $lastName, $email, $password);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>LOGIN FOR ADMIN</title>
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
                        <form style="padding: 12px;">
                            <div class="d-flex input-fields" style="margin-top: 5px;margin-bottom: 5px;">
                                <label for="first_name">First Name:</label>
                                <input class="form-control" type="text" id="first_name" name="first_name" required style="border-top-left-radius: 0px;border-bottom-left-radius: 0px;border-style: solid;">
                            </div>
                            <div class="d-flex input-fields" style="margin-top: 5px;margin-bottom: 5px;">
                                <label for="last_name">Last Name:</label>
                                <input class="form-control" type="text" id="last_name" name="last_name" required style="border-top-left-radius: 0px;border-bottom-left-radius: 0px;border-style: solid;">
                            </div>
                            <div class="d-flex input-fields" style="margin-top: 5px;margin-bottom: 5px;">
                                <label for="email">Email:</label>
                                <input class="form-control" type="text" id="email" name="email" required style="border-top-left-radius: 0px;border-bottom-left-radius: 0px;border-style: solid;">
                            </div>
                            <div class="d-flex input-fields" style="margin-top: 5px;margin-bottom: 5px;">
                                <label for="password">Create Password:</label>
                                <input class="form-control" type="password" id="password" name="password" required style="border-top-left-radius: 0px;border-bottom-left-radius: 0px;">
                            </div>
                            <div class="d-flex input-fields" style="margin-top: 5px;margin-bottom: 5px;">
                                <label for="password">Confirm Password:</label>
                                <input class="form-control" type="password" id="password" name="password" required style="border-top-left-radius: 0px;border-bottom-left-radius: 0px;">
                            </div>
                            <button class="btn btn-primary" type="button" style="margin-top: 10px;font-family: Aclonica, sans-serif;background: rgb(11,103,15);margin-bottom: 5PX;">SIGN UP</button>
                            <div>
                                <span style="color: rgb(255,255,255);">Already have an account?&nbsp;</span>
                                <a class="signup-nav" href="#">LOGIN&nbsp;</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>