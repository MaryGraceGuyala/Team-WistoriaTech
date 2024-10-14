<?php
include '../php/dbconnect.php'

$families_assisted = $conn->query("SELECT COUNT(*) FROM families_assisted");
$members = $conn->query("SELECT COUNT(*) FROM members");
$donations = $conn->query("SELECT SUM(amount) FROM donations");
$medicines = $conn->query("SELECT COUNT(*) FROM medicines");
$visitations = $conn->query("SELECT * FROM visitations");


$conn->close();


$families_assisted_count = $families_assisted->fetch_assoc()['COUNT(*)'];
$members_count = $members->fetch_assoc()['COUNT(*)'];
$donations_amount = $donations->fetch_assoc()['SUM(amount)'];
$medicines_count = $medicines->fetch_assoc()['COUNT(*)'];
$visitations_data = $visitations->fetch_all(MYSQLI_ASSOC);


echo json_encode([
    'families_assisted' => $families_assisted_count,
    'members' => $members_count,
    'donations' => $donations_amount,
    'medicines' => $medicines_count,
    'visitations' => $visitations_data
]);
?>