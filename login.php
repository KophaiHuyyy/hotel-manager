<?php
session_start();
require 'connect.php'; // Đảm bảo rằng tập tin 'connect.php' chứa thông tin kết nối đến CSDL.

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Sử dụng Prepared Statements để tránh SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Lấy thông tin người dùng
        $user = $result->fetch_assoc();

        // Lưu tên người dùng vào phiên làm việc
        $_SESSION['name'] = $user['name'];
        $_SESSION['user_id'] = $user['id']; // Lưu id người dùng để sử dụng sau này.

        // Kiểm tra loại người dùng hoặc quyền hạn
        if ($user['type'] == '1') {
            // Đăng nhập thành công cho admin, chuyển hướng sang trang admin
            header("Location: FcheckIn.php");
            exit();
        } elseif ($user['type'] == '2') {
            // Đăng nhập thành công cho user, chuyển hướng sang trang user
            header("Location: FcheckIn_user.php");
            exit();
        } else {
            // Đối với các quyền hạn khác, có thể xử lý tương ứng
            $_SESSION['error'] = "Đăng nhập không thành công, vui lòng kiểm tra thông tin đăng nhập.";
    header("Location: Flogin.php"); // Chuyển hướng trở lại trang đăng nhập
    exit();
        }
        
    } 
    else {
        // Đăng nhập không thành công
        $_SESSION['error'] = "Đăng nhập không thành công, vui lòng kiểm tra thông tin đăng nhập.";
    header("Location: Flogin.php"); // Chuyển hướng trở lại trang đăng nhập
    exit();
}
   $stmt->close();
}

$conn->close();
?>
