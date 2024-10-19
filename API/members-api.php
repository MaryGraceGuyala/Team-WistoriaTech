<?php
header("Content-Type: application/json");
include '../php/dbconnect.php';

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method) {
    case 'GET':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $sql = "SELECT * FROM agap_members WHERE members_id = $id";
            $result = $conn->query($sql);
            $response = $result->fetch_assoc();
            echo json_encode($response);
        } else {
            $sql = "SELECT * FROM agap_members";
            $result = $conn->query($sql);
            $response = [];
            while($row = $result->fetch_assoc()) {
                $response[] = $row;
            }
            echo json_encode($response);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $sql = "INSERT INTO agap_members (members_name, members_address, members_birthdate, members_age, members_civil_status, members_gender, members_contact_number, members_work, members_household_income) VALUES ('".$data['members_name']."', '".$data['members_address']."', '".$data['members_birthdate']."', '".$data['members_age']."', '".$data['members_civil_status']."', '".$data['members_gender']."', '".$data['members_contact_number']."', '".$data['members_work']."', '".$data['members_household_income']."')";
        if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "Member created successfully."]);
        } else {
            echo json_encode(["error" => "Error creating member."]);
        }
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        $sql = "UPDATE agap_members SET members_name='".$data['members_name']."', members_address='".$data['members_address']."', members_birthdate='".$data['members_birthdate']."', members_age='".$data['members_age']."', members_civil_status='".$data['members_civil_status']."', members_gender='".$data['members_gender']."', members_contact_number='".$data['members_contact_number']."', members_work='".$data['members_work']."', members_household_income='".$data['members_household_income']."' WHERE members_id=".$data['members_id'];
        if ($conn->query($sql) === TRUE) {
            echo json_encode(["message" => "Member updated successfully."]);
        } else {
            echo json_encode(["error" => "Error updating member."]);
        }
        break;

    case 'DELETE':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $sql = "DELETE FROM agap_members WHERE members_id = $id";
            if ($conn->query($sql) === TRUE) {
                echo json_encode(["message" => "Member deleted successfully."]);
            } else {
                echo json_encode(["error" => "Error deleting member."]);
            }
        }
        break;

    default:
        echo json_encode(["error" => "Invalid request method."]);
        break;
}

$conn->close();
?>
