<?php

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'agapconnect';


$conn = new mysqli($db_host, $db_username, $db_password, $db_name);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to register a new admin
function registerAdmin($firstName, $lastName, $email, $password) {
    global $conn; 
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO agap_admin (first_name, last_name, email, password) VALUES ('$firstName', '$lastName', '$email', '$passwordHash')";
    $result = $conn->query($query);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

// Function to check if email already exists
function emailExists($email) {
    global $conn; // Use the global connection variable
    $query = "SELECT * FROM agap_admin WHERE email = '$email'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

// Function to validate password
function validatePassword($password, $confirmPassword) {
    if ($password != $confirmPassword) {
        return false;
    } else {
        return true;
    }
}
function loginAdmin($conn, $email, $password) {
    $query = "SELECT * FROM agap_admin WHERE email = '$email'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
function isAdminLoggedIn() {
    if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
        return true;
    } else {
        return false;
    }
}
function setAdminLoginSession() {
    $_SESSION['admin_logged_in'] = true;
}
function unsetAdminLoginSession() {
    unset($_SESSION['admin_logged_in']);
}

function insert_donation($donor_first_name, $donor_middle_name, $donor_last_name, $address, $age, $sex, $contact_number, $donation_type, $donation_items, $amount, $proof_of_donation) {
    global $conn;
    $sql = "INSERT INTO donations (donor_first_name, donor_middle_name, donor_last_name, address, age, sex, contact_number, donation_type, donation_items, amount, proof_of_donation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssisssss", $donor_first_name, $donor_middle_name, $donor_last_name, $address, $age, $sex, $contact_number, $donation_type, $donation_items, $amount, $proof_of_donation);
    $stmt->execute();
    $stmt->close();
}
?>