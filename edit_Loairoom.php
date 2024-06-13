<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            background-image: url("pngtree-luxury-hotel-interior-picture-image_2682371.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            
        }

        .container {
            max-width: 600px;
            margin: auto;
            margin-top: 50px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            padding: 20px;
        }
        
        nav {
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(39, 55, 102, 1) 35%, rgba(67, 67, 115, 1) 100%);
            font-weight: bold;
        }

        nav.navbar a.nav-link:hover {
			color: #dcdcdc !important;
		}
  
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 36px;">
        <div class="container-fluid">
            <a class="navbar-brand">Sửa thông tin!</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <!-- Bỏ đi chữ "Check-In" ở đây -->
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="FcheckIn.php" style="color: #fff;">Trang Chủ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="container">
    <?php
    // Include necessary files and initialize the database connection
    require 'connect.php';

    // Check if an ID is provided in the URL
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $roomId = $_GET['id'];

        // Fetch room details based on the provided ID
        $sql = "SELECT id, name, price, cover_img FROM room_categories WHERE id = $roomId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $room = $result->fetch_assoc();
            ?>
            <h2>Sửa thông tin phòng</h2>
            <form action="update_Loairoom.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $room['id']; ?>">
                
                <div class="mb-3">
                    <label for="name" class="form-label">Tên phòng:</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo $room['name']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Giá phòng:</label>
                    <input type="number" id="price" name="price" step="0.01" class="form-control" value="<?php echo $room['price']; ?>" required>
                </div>

                <div class="mb-3">
                    <label for="cover_img" class="form-label">Ảnh phòng:</label>
                    <input type="file" id="cover_img" name="cover_img" accept="image/*" class="form-control">
                    <img src="<?php echo $room['cover_img']; ?>" alt="Current Image" width="100">
                </div>

                <input type="submit" value="Cập nhật" class="btn btn-primary">
            </form>
            <?php
        } else {
            echo '<p>No room found with the provided ID.</p>';
        }

    } else {
        echo '<p>Invalid room ID.</p>';
    }

    // Close the database connection
    $conn->close();
    ?>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
