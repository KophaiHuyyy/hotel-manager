<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have sanitized the input to prevent SQL injection
    $id = $_POST['id'];

    // Perform the deletion
    $updateRoomQuery = "UPDATE rooms SET status = '0' WHERE id = (SELECT room_id FROM checked WHERE id = $id)";
    if ($conn->query($updateRoomQuery) === TRUE) {
        // Log statement removed
    } else {
        // Log statement removed
    }
    $deleteQuery = $conn->prepare("DELETE FROM checked WHERE id = ?");
    $deleteQuery->bind_param("i", $id);

    if ($deleteQuery->execute()) {
        // Success
        echo json_encode(['success' => true, 'message' => 'Record deleted successfully.']);
    } else {
        // Failure
        echo json_encode(['success' => false, 'message' => 'Error deleting record.']);
    }
    

    $deleteQuery->close();
    $conn->close();
} else {
    // If the request is not a POST request, handle accordingly
    http_response_code(405); // Method Not Allowed
    echo json_encode(['success' => false, 'message' => 'Method Not Allowed.']);
}
?>
