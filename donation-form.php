
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

<body class="index-page" data-aos-easing="ease-in-out" data-aos-duration="600" data-aos-delay="0">
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between"><a class="logo d-flex align-items-center me-auto me-xl-0" href="index.php"><img src="assets/img/AgapConnect%20(3).png" style="width: 150px;height: 50px;"></a>
            <nav class="navbar navbar-light navbar-expand-md text-center navmenu" id="navmenu">
                <div class="container-fluid"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                            <li class="nav-item d-flex align-items-lg-center dropdown"><a class="nav-link d-flex justify-content-between align-items-lg-center" href="#">About Us</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Our Team</a></li>
                            <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </nav><a class="order-last" href="#donations" style="padding: 15px;color: rgb(255,255,255);background: #018f42;text-decoration: none;border-radius: 4px;padding-right: 5px;padding-top: 10px;padding-bottom: 10px;padding-left: 5px;">Donate Now</a>
        </div>
    </header>
    <main class="main-index" id="main-index">
    <section class="section dashboard" style="margin-top: 60px;padding: 12px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                         <div class="card-header">
                             <h2>Help us to get to know you better. Please provide us with your contact information.</h2>
                         </div>
                         <div class="card-body">
                            <form class="row" method="POST" action="donation-form.php" enctype="multipart/form-data" style="padding: 12px;">
                                <div class="col-md-12" style="padding: 4px;">
                                    <h2>Donor Information</h2>
                                </div>
                                <div class="col-md-12" style="padding: 4px;">
                                    <label for="donor_first_name" class="form-label">First Name</label>
                                    <input type="text" name="donor_first_name" class="form-control" id="donor_first_name" required>
                                </div>
                                <div class="col-md-12" style="padding: 4px;">
                                    <label class="form-label">Middle Name:</label>
                                    <input class="form-control" type="text" name="donor_middle_name">
                                </div>
                                <div class="col-md-12" style="padding: 4px;">
                                    <label class="form-label">Last Name:</label>
                                    <input class="form-control" type="text" name="donor_last_name" required>
                                </div>
                                <div class="col-md-12" style="padding: 4px;">
                                    <label class="form-label">Address:</label>
                                    <input class="form-control" type="text" name="address" required>
                                </div>
                                <div class="col-md-12" style="padding: 4px;">
                                    <label class="form-label">Age:</label>
                                    <input class="form-control" type="number" name="age" required>
                                </div>
                                <div class="col-md-12" style="padding: 4px;">
                                    <label class="form-label">Sex:</label>
                                    <select class="form-select" name="sex" required>
                                        <option value="" selected="">Please select...</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-12" style="padding: 4px;">
                                    <label class="form-label">Contact Number:</label>
                                    <input class="form-control" type="text" name="contact_number" maxLength=11 required>
                                </div>
                                <div class="col-md-12" style="padding: 4px; text-align: center;">
                                    <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
                                </div>
                            </form>

                            <form class="row" method="POST" action="donation-form.php" enctype="multipart/form-data" style="padding: 12px; display: none;" id="donation-type-form">
                                <div class="col-md-12" style="padding: 4px;">
                                    <h2>Donation Type</h2>
                                </div>
                                <div class="col-md-12" style="padding: 4px;">
                                    <label class="form-label">Type of Donation:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="donation_type[]" value="healthcare">
                                        <label class="form-check-label">Healthcare</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="donation_type[]" value="cash">
                                        <label class="form-check-label">Cash</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="donation_type[]" value="supplies">
                                        <label class="form-check-label">Supplies</label>
                                    </div>
                                </div>
                                <div class="col-md-12" style="padding: 4px; text-align: center;">
                                    <button type="button" class="btn btn-primary" onclick="previousStep()">Previous</button>
                                    <button type="button" class="btn btn-primary" onclick="nextStep()">Next</button>
                                </div>
                            </form>

                            <form class="row" method="POST" action="donation-form.php" enctype="multipart/form-data" style="padding: 12px; display: none;" id="donation-payment-form">
                                <div class="col-md-12" style="padding: 4px;">
                                    <h2>Donation Payment</h2>
                                </div>
                                <div class="col-md-12" style="padding: 4px; text-align: center;">
                                    <h3>For cash donations:</h3>
                                    <img src="assets/img/scantopay.jpeg" style="width:150px; height: 150px;">
                                </div>
                                <div class="col-md-12" style="padding: 4px;text-align: center;">
                                    <h2>Proof of Donation</h2>
                                </div>
                                <div class="col-md-12" style="padding: 4px;">
                                    <label class="form-label">Proof of Donations:</label>
                                    <input type="file" name="proof_of_donation">
                                </div>
                                <div class="col-md-12" style="padding: 4px; text-align: center;">
                                    <button type="button" class="btn btn-primary" onclick="previousStep()">Previous</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                         </div>
                        
                    </div>
                </div>

                    
                       
            </div>
        </div>
    </section>
</main>

        <script>
            let currentForm = 0;
            let forms = document.querySelectorAll('form');

            function nextStep() {
                forms[currentForm].style.display = 'none';
                currentForm++;
                forms[currentForm].style.display = 'block';
            }

            function previousStep() {
                forms[currentForm].style.display = 'none';
                currentForm--;
                forms[currentForm].style.display = 'block';
            }
        </script>
</body>
</html>