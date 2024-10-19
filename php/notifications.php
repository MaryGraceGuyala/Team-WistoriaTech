<?php
include 'dbconnect.php';

$sql = "SELECT * FROM assistance_requests ORDER BY id DESC LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>New assistance application from " . $row['fname'] . " " . $row['lname'] . "</p>";
    }
}

$sql = "SELECT * FROM donations ORDER BY id DESC LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>New donations from " . $row['fname'] . " " . $row['lname'] . "</p>";
    }
}

?>