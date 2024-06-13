<?php
require 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm thông tin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("pngtree-luxury-hotel-interior-picture-image_2682371.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #fff;
        }

        #infoForm {
            max-width: 600px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            color: #000;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .navbar {
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(39, 55, 102, 1) 35%, rgba(67, 67, 115, 1) 100%);            padding: 10px 0;
            color: #fff;
            text-transform: uppercase;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
        }

        .navbar-nav {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 20px;
        }

        .nav-link {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #f8f9fa;
        }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 36px;">
        <div class="container-fluid">
            <a class="navbar-brand">Đặt phòng</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <!-- Bỏ đi chữ "Check-In" ở đây -->
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="UserMain.php" style="color: #fff;">Trang Chủ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">

        <form id="infoForm" method="post" action="Datphong_user.php">

            <div class="form-group">

                <label for="name" class="form-label">Họ và tên:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
<label for="contact_no" class="form-label">Số điện thoại:</label>
                <input type="text" class="form-control" id="contact_no" name="contact_no" required>
            </div>

            <div class="form-group">

                <label for="room_id" class="form-label">Chọn Phòng:</label>
                <select class="form-select" id="room_id" name="room_id" required>
                    <option value="">Chọn phòng</option>
                    <?php
                    $query = "SELECT id FROM rooms WHERE status = 0";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["id"] . "'>" . $row["id"] . "</option>";
                        }
                    } else {
                        echo "<option value='' disabled>No available rooms</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="row g-3">
                <div class="col">
                    <label for="date_in" class="form-label">Ngày thuê phòng:</label>
                    <input type="date" class="form-control" id="date_in" name="date_in" required>
                </div>

                <div class="col">
                    <label for="date_out" class="form-label">Ngày trả phòng:</label>
                    <input type="date" class="form-control" id="date_out" name="date_out" required>
                </div>
            </div>

            <div class="form-group">

                <label for="status" class="form-label">Trạng thái:</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="1">Đặt phòng</option>
                    <option value="2">Trả phòng</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Thêm </button>
            </fieldset>

        </form>
    </div>
    <div class="container mt-3" id="availableRooms">
        <!-- Kết quả về phòng đang trống sẽ được hiển thị ở đây -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>

</html>