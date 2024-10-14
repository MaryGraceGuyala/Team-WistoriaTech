<?php
include 'php/dbconnect.php';

$app_id = $_POST['app_id'];
$new_status = $_POST['new_status'];

$sql = "UPDATE assistance_requests SET status = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt-> bind_param("si", $new_status, $app_id);
$stmt->execute();
if ($stmt->affected_rows > 0) {
    echo "Status updated successfully.";
} else {
    echo "Error updating status.";
}
?>