<?php
include 'connect.php';

function redirect_with_message($page, $message) {
    header("Location: $page?message=$message");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect variables from $_POST array
    $id = isset($_POST["id"]) && $_POST["id"] != '' ? $_POST["id"] : null;
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $type = $_POST["type"];

    // Initialize SQL variable
    $sql = '';

    // Determine the SQL statement to use based on whether we're adding or updating
    if ($id !== null) {
        // Update existing user
        $sql = "UPDATE users SET name=?, username=?, password=?, type=? WHERE id=?";
    } else {
        // Add new user
        $sql = "INSERT INTO users (name, username, password, type) VALUES (?, ?, ?, ?)";
    }

    // Prepare and bind the statement to avoid SQL injection
    if ($stmt = $conn->prepare($sql)) {
        if ($id !== null) {
            $stmt->bind_param("ssssi", $name, $username, $password, $type, $id);
        } else {
            $stmt->bind_param("sssi", $name, $username, $password, $type);
        }

        if ($stmt->execute()) {
            // Redirect to the management page with a success message
            redirect_with_message("Fquanly.php", "success");
        } else {
            // Redirect to the management page with an error message if query fails
            redirect_with_message("Fquanly.php", "error");
        }

        $stmt->close();
    } else {
        // Handle error if statement could not be prepared
        redirect_with_message("Fquanly.php", "prepare_error");
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["action"]) && $_GET["action"] == "delete") {
    // Handle delete action
    $id = $_GET["id"];
    $sql = "DELETE FROM users WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Redirect to the management page with a deleted message
            redirect_with_message("Fquanly.php", "deleted");
        } else {
            // Redirect with an error message if query fails
            redirect_with_message("Fquanly.php", "delete_error");
        }

        $stmt->close();
    } else {
        // Handle error if statement could not be prepared
        redirect_with_message("Fquanly.php", "delete_prepare_error");
    }
}

// Close the database connection
$conn->close();
?>