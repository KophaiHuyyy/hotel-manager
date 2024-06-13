
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý khách sạn</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./vendor/themify-icons/themify-icons.css">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-top: 56px;
        }

        nav.navbar {
            background-color: #343a40;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        nav.navbar a.navbar-brand, nav.navbar a.nav-link {
            color: #ffffff !important;
        }

        /* Align the navbar to the right */
        .navbar-nav {
            margin-left: auto;
        }
        .image-slider {
            max-width: 100%;
            overflow: hidden;
        }
        
        
        

        .carousel-inner {
            display: flex;
            flex-direction: row;
            transition: transform 0.5s ease-in-out;
        }

        .carousel-item {
            flex: 0 0 auto;
            width: 100%;
        }


        /* Tinh chỉnh chung cho navbar */
nav.navbar {
    background-color: #333; /* Màu nền đen nhạt */
    box-shadow: 0 4px 12px rgba(0,0,0,0.1); /* Thêm bóng đổ để tạo chiều sâu */
    padding: 10px 0; /* Tăng khoảng cách trong thanh điều hướng */
}

/* Logo và thương hiệu */
nav.navbar a.navbar-brand {
    color: #FFD700; /* Màu vàng kim */
    font-weight: bold; /* Chữ đậm */
    font-size: 24px; /* Size chữ lớn */
    text-transform: uppercase; /* Chữ in hoa */
    letter-spacing: 2px; /* Khoảng cách chữ */
}

/* Thiết kế item cho navbar */
nav.navbar a.nav-link {
    color: #ffffff; /* Màu chữ trắng */
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


<div id="imageSlider" class="carousel slide image-slider" data-bs-ride="carousel">
    <div class="carousel-inner">
<!-- Thêm hình ảnh phòng của bạn như các mục thanh trượt -->
        <div class="carousel-item active">
            <img src="1600480260_4.jpg" class="d-block w-100" alt="Phòng 4">
        </div>
        <div class="carousel-item">
            <img src="1600480680_2.jpg" class="d-block w-100" alt="Phòng 2">
        </div>
        <div class="carousel-item">
            <img src="1600480680_room-1.jpg" class="d-block w-100" alt="Phòng 1">
        </div>
        <div class="carousel-item">
            <img src="1600480740_3.jpg" class="d-block w-100" alt="Phòng 3">
        </div>
        <!-- Thêm nhiều mục thanh trượt hình ảnh khác nếu cần -->
    </div>
</div>

<!-- Bootstrap JS và Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<!-- JavaScript tùy chỉnh cho thanh trượt hình ảnh -->
<script>
    // Kích hoạt thanh trượt
    var myCarousel = new bootstrap.Carousel(document.getElementById('imageSlider'), {
        interval: 2000, // Đặt khoảng thời gian giữa các chuyển đổi hình ảnh (tính bằng mili giây)
        ride: 'carousel',
        wrap: true
    });
</script>

</body>
</html>