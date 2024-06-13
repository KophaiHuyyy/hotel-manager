<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Information</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./vendor/themify-icons/themify-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        body {
            font-family: Arial, sans-serif;
            /* background-color: #f4f4f4; */
            background-image: url(pngtree-luxury-hotel-interior-picture-image_2682371.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin-top: 150px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container,
        .info-container {
            background-color: #FAF6F0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            padding: 20px;
            margin: 20px;
        }

        /* Tinh chỉnh chung cho navbar */
        nav.navbar {
            background-color: #333; /* Màu nền đen nhạt */
            box-shadow: 0 4px 12px rgba(0,0,0,0.1); /* Thêm bóng đổ để tạo chiều sâu */
            padding: 10px 0; /* Tăng khoảng cách trong thanh điều hướng */
        }

        /* Logo và thương hiệu */
        nav.navbar a.navbar-brand {
            color: #5DEBD7; /* Màu xanh */
            font-weight: bold; /* Chữ đậm */
            font-size: 24px; /* Size chữ lớn */
            text-transform: uppercase; /* Chữ in hoa */
            letter-spacing: 2px; /* Khoảng cách chữ */
        }

        /* Thiết kế item cho navbar */
        nav.navbar a.nav-link {
            color: #ffffff !important; /* Màu chữ trắng */
            margin-left: 20px; /* Khoảng cách giữa các mục */
            font-size: 18px; /* Kích thước chữ */
            transition: color 0.3s, transform 0.3s; /* Hiệu ứng chuyển đổi màu sắc và phóng to */
        }

        nav.navbar a.nav-link.task:hover,
        nav.navbar a.nav-link.task:focus {
            color: #5DEBD7 !important; /* Màu chữ vàng kim khi di chuột qua hoặc focus */
            transform: translateY(-2px); /* Di chuyển lên khi hover */
        }

        /* Đăng xuất */
        .navbar-nav.ml-auto a.nav-link {
            background-color: #1C1678; /*Màu nền đỏ */
            color: #ffffff; /* Màu chữ trắng */
            padding: 8px 20px; /* Đệm xung quanh liên kết */
            border-radius: 25px; /* Bo tròn đường viền */
            transition: background-color 0.3s, transform 0.3s; /* Hiệu ứng chuyển đổi màu sắc và phóng to */
        }

        .navbar-nav.ml-auto a.nav-link.task.log-out:hover,
        .navbar-nav.ml-auto a.nav-link.task.logout:focus {
            background-color: #074173; /* Màu nền khi di chuột qua */
            transform: scale(1.1); /* Phóng to khi hover */
        }

        /* Thích ứng với thiết bị di động */
        @media (max-width: 992px) {
            .navbar-collapse {
                background-color: #333; /* Màu nền cho navbar khi thu gọn */
            }
            .navbar-nav {
                text-align: center; /* Canh giữa các mục khi thu gọn */
            }
        }

        /* Hiệu ứng di chuột qua thương hiệu */
        .navbar-brand:hover {
            text-decoration: none; /* Loại bỏ gạch chân */
            transform: scale(1.1); /* Phóng to nhẹ khi di chuột qua */
        }
        /* Tối ưu hóa tổng quan thanh navigation */
        nav.navbar {
            background-color: #27496d; /* Màu nền tối hợp thời trang */
            /* Thêm gradient hoặc hình ảnh nền */
            background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(39,55,102,1) 35%, rgba(67,67,115,1) 100%);
            font-family: 'Open Sans', sans-serif; /* Font dễ đọc, hiện đại */
        }

        /* Màu sắc, đệm và hiệu ứng đặc biệt cho các liên kết */
        nav.navbar a.nav-link {
            color: rgba(255, 255, 255, 0.8); /* Màu chữ sáng, nhưng không quá chói */
            padding: 0.75em 1.5em; /* Đệm rộng rãi hơn một chút */
            border-bottom: 3px solid transparent; /* Chuẩn bị cho hiệu ứng hover */
            transition: color 0.2s ease, border-color 0.2s ease; /* Hiệu ứng chuyển đổi mượt mà */
        }

        /* Hiệu ứng khi di chuột qua */
        nav.navbar a.nav-link.task:hover,
        nav.navbar a.nav-link.task:focus {
            color: #fff; /* Chuyển màu chữ sang trắng khi di chuột qua */
            border-bottom-color: #5DEBD7; /* Thêm đường viền màu khi di chuột qua */
        }

        /* Liên kết đặc biệt hơn (ví dụ: Đăng nhập, Đăng xuất, ...) */
        .navbar-nav.ml-auto a.special-link {
            background-color: #FFD700; /* Màu nền đặc biệt */
            border-radius: 20px; /* Bo góc mềm mại */
            color: #27496d; /* Màu chữ tối */
            margin-left: 20px; /* Khoảng cách từ liên kết trước */
        }

        .navbar-nav.ml-auto a.special-link:hover {
            background-color: #ffc107; /* Sáng hơn một chút khi di chuột qua */
            color: #fff;
            transform: translateY(-3px); /* Nhấc lên một chút khi hover */
        }

        /* Phong cách cho mobile navbar */
        @media (max-width: 992px) {
            .navbar-toggler { /* Điều chỉnh màu sắc cho nút burger */
                border-color: rgba(255,255,255,0.5);
            }
            
            .navbar-collapse {
                background-color: #27496d; /* Màu nền cho menu di động */
            }
            
            nav.navbar a.nav-link { /* Điều chỉnh cho màn hình nhỏ */
                padding: 0.5em 1em;
            }
        }
            
        .navbar {
            display: flex;
            justify-content: flex-end; /* Căn các mục nav-item về phía cuối navigation bar (góc phải) */
            list-style: none;
        
        }

        footer {
            width: 100%;
            height: 340px;
            background: #0F172A;
            margin-top: 150px;
            color: #fff;
            position: relative;
        }
        
        .boxFooter {
            margin: 0 0 25px 30px;
            padding-top: 25px;
        }
        
        .titleFooter {
            font-size: 30px;
            font-weight: bold;
            text-transform: uppercase;
            color: #0D99FF;
            margin: 0;
        }
        
        .contentFooter {
            max-width: 400px;
            margin-left: 30px;
        }

        .iconFooter {
            margin-left: 30px;
            font-size: 21px;
            display: flex;
        }

        .facebookFooter {
            background: #2563EB;
            width: 30px;
            height: 30px;
            padding-left: 4px;
            padding-top: 1px;
            border-radius: 15px;
            margin-right: 10px;
        }

        .twitterFooter {
            background: rgba(255, 255, 255, 0.1);
            width: 30px;
            height: 30px;
            padding-left: 5px;
            padding-top: 1px;
            border-radius: 15px;
            margin-right: 10px;
        }
        
        .instaFooter {
            background: rgba(255, 255, 255, 0.1);
            width: 30px;
            height: 30px;
            padding-left: 4px;
            padding-top: 1px;
            border-radius: 15px;
            margin-right: 10px;
        }

        .githubFooter {
            background: rgba(255, 255, 255, 0.1);
            width: 30px;
            height: 30px;
            padding-left: 5px;
            padding-top: 1px;
            border-radius: 15px;
            
        }

        .listFooter > li {
            display: inline-block;
            font-weight: bold;
        }

        .rightFooter {
            width: 40%;
            position: absolute;
        }

        .leftFooter {
            width: 60%;
            float: right;
            position: absolute;
            right: 80px;
            margin-top: 95px;
        }

        .listFooter li {
            padding: 0px 160px 0px 0px;
        }

        .content-list-footer {
            display: flex;
        }

        .productFooter {
            list-style-type: none;
            padding-right: 113px;
        }

        .featureFooter {
            list-style-type: none;
            padding-right: 113px;
        }

        .contactFooter {
            list-style-type: none;
            padding-left: 43px  ;
        }

        .last-content-footer {
            position: absolute;
            bottom: 0;
            display: flex;
            width: 100%;
            justify-content: center;
            align-items: center;
        }

        .line-footer {
            position: absolute;
            bottom: 43px;
            width: 100%;       
        }
    </style>
</head>

<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">HotelBooking</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link task" href="FcheckIn.php">Đặt Phòng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link task" href="FcheckOut.php">Trả Phòng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link task" href="rooms.php">Danh sách phòng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link task" href="Loairooms.php">Loại phòng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link task" href="Fquanly.php">Quản Lý</a>
                </li>
            </ul>
            
            <!-- Nút Đăng xuất -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <?php
                        if(isset($_SESSION['name'])) {
                        echo 'Xin chào, '.$_SESSION['name'];
                        } else {
                        echo 'Xin chào, Khách';
                        }
                        ?>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link task log-out" href="logout.php">
                        <i class='ti-power-off'></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <div class="container" style="height: auto;">

        <div class="form-container">
            <form action="save_Loairoom.php" method="post" enctype="multipart/form-data">


                <div class="mb-3">
                    <label for="name" class="form-label">Tên phòng:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Giá phòng:</label>
                    <input type="number" id="price" name="price" step="0.01" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="cover_img" class="form-label">Ảnh phòng:</label>
                    <input type="file" id="cover_img" name="cover_img" accept="image/*" class="form-control" required>
                </div>

                <input type="submit" value="Lưu" class="btn btn-success">
            </form>
        </div>

        <div class="info-container">
            <?php
            // Kết nối đến cơ sở dữ liệu (thay thế thông tin của bạn ở đây)
            require 'connect.php';



            // Thực hiện truy vấn SQL để lấy dữ liệu
            $sql = "SELECT id, name, price, cover_img FROM room_categories";
            $result = $conn->query($sql);

            // Kiểm tra xem có dữ liệu trả về không
            if ($result->num_rows > 0) {
                // Hiển thị dữ liệu trong bảng Bootstrap
                echo '<table class="table table-bordered mt-3">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>Tên phòng</th>';
                echo '<th>Giá phòng</th>';
                echo '<th>Ảnh phòng</th>';
                echo '<th>Thao tác</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                // Output dữ liệu mỗi hàng
                $counter = 1; // Initialize a counter variable
                while ($row = $result->fetch_assoc()) {
                    $formattedPrice = number_format($row['price'], 2); // Format price with 2 decimal places
                    echo "<tr>
                        <td>{$counter}</td>
                        <td>{$row['name']}</td>
                        <td>\${$formattedPrice}</td> <!-- Include the dollar sign and formatted price -->
                        <td><img src='{$row['cover_img']}' alt='Room Image' width='100'></td>
                        <td>
                            <button class='btn btn-primary' onclick='editRoom({$row['id']})'><i class='ti-pencil-alt'></i></button>
                            <button class='btn btn-danger' onclick='deleteRoom({$row['id']})'><i class='ti-trash'></i></button>
                        </td>
                      </tr>";
                    $counter++; // Increment the counter for the next iteration
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>No results found.</p>';
            }

            $conn->close();
            ?>
        </div>
    </div>
    
    <footer>
    <div class="rightFooter">

        <div class="boxFooter">
            <p class="titleFooter">hottelbooking</p>
        </div>
        <div class="contentFooter">
            <p>Hottelbooking giúp bạn đặt phòng khách sạn dễ dàng với thông tin chi tiết, đánh giá khách hàng và khuyến mãi hấp dẫn. Hỗ trợ 24/7, Hottelbooking đảm bảo trải nghiệm du lịch tuyệt vời. Truy cập Hottelbooking ngay!</p>
        </div>
        <div class="iconFooter">
            <div class="twitterFooter"><i class='bx bxl-twitter'></i></div>
            <div class="facebookFooter"><i class='bx bxl-facebook' ></i></div>
            <div class="instaFooter"><i class='bx bxl-instagram'></i></div>
            <div class="githubFooter"><i class='bx bxl-github'></i></div>
        </div>
    </div>

    <div class="leftFooter">
        <ul class="listFooter">
            <li class="product">Sản phẩm</li>
            <li class="feature">Tính năng</li>
            <li class="contact">Liên hệ</li>
        </ul>
        <div class="content-list-footer"> 
            <ul class="productFooter">
                <li>Single Room</li>
                <li>Duluxe Room</li>
                <li>Family Room</li>
            </ul>
            
            <ul class="featureFooter">
                <li>Đặt phòng</li>
                <li>Trả phòng</li>
                <li>Xem phòng</li>
            </ul>
            <ul class="contactFooter">
                <li>ADMIN: 0856361408</li>
                <li>Facebook: https://www.facebook.com/</li>
                <li>Google: https://www.google.com/</li>
            </ul>
        </div>
    </div>

    <div class="line-footer">
        <hr>
    </div>
    <div class="last-content-footer">
        <p>Hottelbooking - Đặt Phòng Khách Sạn Nhanh Chóng</p>
    </div>
</footer>

    <!-- Your existing JavaScript functions -->
    <!-- Inside your existing <script> tag -->
    <script>
        function editRoom(roomId) {
            // Assuming you want to redirect to an edit page with the room ID
            window.location.href = 'edit_Loairoom.php?id=' + roomId;
        }

        function deleteRoom(roomId) {
            if (confirm('Are you sure you want to delete this room?')) {
                // User confirmed the deletion, send an AJAX request to delete the room
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Reload the page to reflect the changes after deletion
                        location.reload();
                    }
                };
                xhr.open('GET', 'delete_Loairoom.php?id=' + roomId, true);
                xhr.send();
            }
        }
    </script>


    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>