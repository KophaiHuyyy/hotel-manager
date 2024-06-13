<?php
include('connect.php');

// Check if the ID parameter is set
if (isset($_POST['id'])) {
    $roomId = $_POST['id'];

    // Perform the deletion query
    $deleteQuery = $conn->prepare("DELETE FROM rooms WHERE id = ?");
    $deleteQuery->bind_param('i', $roomId);

    if ($deleteQuery->execute()) {
        $response = array('status' => 'success');
    } else {
        $response = array('status' => 'error', 'message' => 'Failed to delete the room.');
    }

    $deleteQuery->close();
} else {
    $response = array('status' => 'error', 'message' => 'Invalid request.');
}

// Return the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
