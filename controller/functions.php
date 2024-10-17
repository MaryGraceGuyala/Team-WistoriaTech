<?php

$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'agapconnect';


$conn = new mysqli($db_host, $db_username, $db_password, $db_name);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


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


function emailExists($email) {
    global $conn; 
    $query = "SELECT * FROM agap_admin WHERE email = '$email'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}

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

?>