<?php
include '../php/dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (!isset($_POST['application_id']) || !isset($_POST['decision'])) {
        echo "Error: Both application_id and decision are required.";
        exit;
    }

    $application_id = intval($_POST['application_id']);
    $decision = $_POST['decision']; 

    $query = "";
    if ($decision === 'accept') {
        $query = "UPDATE membership_requests SET status = 'accepted' WHERE members_id = ?";
    } elseif ($decision === 'decline') {
        $query = "UPDATE membership_requests SET status = 'declined' WHERE members_id = ?";
    } else {
        echo "Error: Invalid decision value.";
        exit;
    }
    
 
    $stmt = $conn->prepare($query);
 
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
  
  
    if ($stmt->bind_param("i", $application_id) === false) {
        die('Bind failed: ' . htmlspecialchars($stmt->error));
    }

 
    if ($stmt->execute()) {

        if ($decision === 'accept') {
           
            $memberQuery = "SELECT * FROM membership_requests WHERE members_id = ?";
            $memberStmt = $conn->prepare($memberQuery);
            if ($memberStmt === false) {
                die('Prepare failed: ' . htmlspecialchars($conn->error));
            }
            
            $memberStmt->bind_param("i", $application_id);
            $memberStmt->execute();
            $result = $memberStmt->get_result();
            if ($result->num_rows > 0) {
                $memberDetails = $result->fetch_assoc();
                header("Location: members_info.php?id={$memberDetails['members_id']}&message=Application accepted successfully");
                exit; 
            } else {
                echo "Error: Member not found.";
            }
            
            $memberStmt->close();
        } else {
            header("Location: membership_request.php?message=Application declined successfully");
            exit;
        }
    } else {
        echo "Error processing request: " . htmlspecialchars($stmt->error);
    }

    $stmt->close();
}

$conn->close();
?>