<?php
include '../php/dbconnect.php';
require 'vendor/autoload.php';

$app = new \Slim\App();

$app->post('/api/agap_members', 'createMember');
$app->get('/api/agap_members', 'getMembers');
$app->get('/api/agap_members/:id', 'getMember');
$app->put('/api/agap_members/:id', 'updateMember');
$app->delete('/api/agap_members/:id', 'deleteMember');

function createMember() {
    $m_fname = $_POST['m_fname'];
    $m_mname = $_POST['m_mname'];
    $m_lname = $_POST['m_lname'];
    $m_address = $_POST['m_address'];
    $m_birthdate = $_POST['m_birthdate'];
    $m_email = $_POST['m_email'];
    $m_age = $_POST['m_age'];
    $civil_status = $_POST['civil_status'];
    $gender = $_POST['gender'];
    $contact_number = $_POST['contact_number'];
    $work = $_POST['work'];
    $household_monthly_income = $_POST['household_monthly_income'];
    $mpassword = $_POST['mpassword'];

    $query = "INSERT INTO agap_members (m_fname, m_mname, m_lname, m_address, m_birthdate, m_email, m_age, civil_status, gender, contact_number, work, household_monthly_income, mpassword) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssssissssss", $m_fname, $m_mname, $m_lname, $m_address, $m_birthdate, $m_email, $m_age, $civil_status, $gender, $contact_number, $work, $household_monthly_income, $mpassword);
    $stmt->execute();

    echo json_encode(array("message" => "Member created successfully"));
}


function getMembers() {
    $query = "SELECT * FROM members";
    $result = $conn->query($query);

    $members = array();
    while ($row = $result->fetch_assoc()) {
        $members[] = $row;
    }

    echo json_encode($members);
}


function getMember($id) {
    $query = "SELECT * FROM members WHERE members_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $member = $result->fetch_assoc();

    echo json_encode($member);
}


function updateMember($id) {
    $m_fname = $_POST['m_fname'];
    $m_mname = $_POST['m_mname'];
    $m_lname = $_POST['m_lname'];
    $m_address = $_POST['m_address'];
    $m_birthdate = $_POST['m_birthdate'];
    $m_email = $_POST['m_email'];
    $m_age = $_POST['m_age'];
    $civil_status = $_POST['civil_status'];
    $gender = $_POST['gender'];
    $contact_number = $_POST['contact_number'];
    $work = $_POST['work'];
    $household_monthly_income = $_POST['household_monthly_income'];
    $mpassword = $_POST['mpassword'];

    $query = "UPDATE members SET m_fname = ?, m_mname = ?, m_lname = ?, m_address = ?, m_birthdate = ?, m_email = ?, m_age = ?, civil_status = ?, gender = ?, contact_number = ?, work = ?, household_monthly_income = ?, mpassword = ? WHERE members_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssssisssssi", $m_fname, $m_mname, $m_lname, $m_address, $m_birthdate, $m_email, $m_age, $civil_status, $gender, $contact_number, $work, $household_monthly_income, $mpassword, $id);
    $stmt->execute();

    echo json_encode(array("message" => "Member updated successfully"));
}


function deleteMember($id) {
    $query = "DELETE FROM members WHERE members_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    echo json_encode(array("message" => "Member deleted successfully"));
}

$conn->close();
?>