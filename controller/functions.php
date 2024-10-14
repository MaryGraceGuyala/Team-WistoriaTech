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

function create_member($first_name, $last_name, $email, $password, $confirm_password) {
    global $conn;
    

    $sql = "SELECT * FROM agap_members WHERE m_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        return "Email already exists";
    }

    if ($password != $confirm_password) {
        return "Passwords do not match";
    }
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO agap_members (m_fname, m_lname, m_email, mpassword) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $first_name, $last_name, $email, $hashed_password);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        return "Member account created successfully";
    } else {
        return "Error creating member account";
    }
}
function setSchedule() {
    $visitation_date = $_POST['visitation_date'];
    $visitation_time = $_POST['visitation_time'];
    $visitation_address = $_POST['visitation_address'];
    $visitation_purpose = $_POST['visitation_purpose'];
    $visitation_status = $_POST['visitation_status'];
 
    $query = "INSERT INTO visitations (visitation_date, visitation_time, visitation_address, visitation_purpose, visitation_status) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $visitation_date, $visitation_time, $visitation_address, $visitation_purpose, $visitation_status);
    $stmt->execute();

    echo json_encode(array("message" => "Schedule set successfully"));
  }
?>