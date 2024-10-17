<?php
header("Content-Type: application/json");
include '../php/dbconnect.php'; 

$request_method = $_SERVER['REQUEST_METHOD'];

switch ($request_method) {
    case 'GET':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            get_member($id);
        } else {
            get_members();
        }
        break;

    case 'POST':
        add_member();
        break;

    case 'PUT':
        $id = intval($_GET["id"]);
        update_member($id);
        break;

    case 'DELETE':
        $id = intval($_GET["id"]);
        delete_member($id);
        break;

    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}


function get_members() {
    global $conn;
    $sql = "SELECT * FROM agap_members";
    $result = $conn->query($sql);
    $members = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $members[] = $row;
        }
    }
    
    echo json_encode($members);
}


function get_member($id) {
    global $conn;
    $sql = "SELECT * FROM agap_members WHERE members_id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(["message" => "Member not found"]);
    }
}


function add_member() {
    global $conn;
    $data = json_decode(file_get_contents("php://input"), true);
    
    $name = $conn->real_escape_string($data['members_name']);
    $address = $conn->real_escape_string($data['members_address']);
    $birthdate = $data['members_birthdate'];
    $age = $conn->real_escape_string($data['members_age']);
    $civil_status = $conn->real_escape_string($data['members_civil_status']);
    $gender = $conn->real_escape_string($data['members_gender']);
    $contact_number = $conn->real_escape_string($data['members_contact_number']);
    $work = $conn->real_escape_string($data['members_work']);
    $household_income = $conn->real_escape_string($data['members_household_income']);
    
    $sql = "INSERT INTO agap_members (members_name, members_address, members_birthdate, members_age, members_civil_status, members_gender, members_contact_number, members_work, members_household_income) VALUES ('$name', '$address', '$birthdate', '$age', '$civil_status', '$gender', '$contact_number', '$work', '$household_income')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Member added successfully"]);
    } else {
        echo json_encode(["message" => "Error adding member: " . $conn->error]);
    }
}


function update_member($id) {
    global $conn;
    $data = json_decode(file_get_contents("php://input"), true);
    
    $name = $conn->real_escape_string($data['members_name']);
    $address = $conn->real_escape_string($data['members_address']);
    $birthdate = $data['members_birthdate'];
    $age = $conn->real_escape_string($data['members_age']);
    $civil_status = $conn->real_escape_string($data['members_civil_status']);
    $gender = $conn->real_escape_string($data['members_gender']);
    $contact_number = $conn->real_escape_string($data['members_contact_number']);
    $work = $conn->real_escape_string($data['members_work']);
    $household_income = $conn->real_escape_string($data['members_household_income']);
    
    $sql = "UPDATE agap_members SET members_name='$name', members_address='$address', members_birthdate='$birthdate', members_age='$age', members_civil_status='$civil_status', members_gender='$gender', members_contact_number='$contact_number', members_work='$work', members_household_income='$household_income' WHERE members_id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Member updated successfully"]);
    } else {
        echo json_encode(["message" => "Error updating member: " . $conn->error]);
    }
}


function delete_member($id) {
    global $conn;
    $sql = "DELETE FROM agap_members WHERE members_id = $id";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Member deleted successfully"]);
    } else {
        echo json_encode(["message" => "Error deleting member: " . $conn->error]);
    }
}

$conn->close();
?>
