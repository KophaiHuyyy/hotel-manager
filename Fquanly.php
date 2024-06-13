<?php
require 'connect.php';
?>
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm thông tin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vendor/themify-icons/themify-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("pngtree-luxury-hotel-interior-picture-image_2682371.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #fff;
            margin-top: 123px;
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

        

       

h1 {
    color: #002379;
    text-align: left;
    font-size: 1.5rem;
    margin-bottom: 10px;
    font-weight: bold;
}

.list-manager {
    width: 60%;
    margin-right: 30px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.add-member {
    width: 40%;
}

.list-manager h1 {
    padding: 20px 0 20px 20px;
    background: #fff;
    margin: 0;
}

.add-member h1 {
    padding: 20px 0 20px 20px;
    background: #fff;
    margin: 0;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

table {
    width: 100%;
    /* margin: 0 auto; */
    border-collapse: collapse;
    background-color: #fff;
    border: none;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    color: #002379;
    /* margin-left: 50px; */
}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ccc;
}

th {
    /* color: #1e1e2d; */
    font-size: 1rem;
}

tr > th {
    background-color: rgba(0, 0, 0, 0.1);
}

.content-table {
    max-height: 385px;
    overflow: auto;
    overflow-y: scroll;
}
/* tr:hover {
    background-color: #272643;
} */

a {
    color: #ff4757;
    text-decoration: none;
}

a:hover {
    color: #ffbcbc;
}

form {
    width: 100%;
    /* background-color: #252440; */
    padding: 0 2rem;
    /* border: 1px solid #ccc; */
    /* margin: 30px auto; */
    box-shadow: 0 5px 20px rgba(0,0,0,0.2);
    background-color: #fff;
}

label {
    display: block;
    padding: 15px 0;
    font-size: 0.9rem;
    color: #002379;
}

input[type="text"],
input[type="password"],
textarea {
    width: calc(100% - 12px);
    padding: 6px;
    /* margin-top: 10px; */
    border-radius: 5px;
    border: 1px solid #303050;
    background-color: rgba(255, 255, 255, 0.1);
    color: #000;
    transition: border 0.3s;
}

input[type="text"]:focus,
input[type="password"]:focus,
textarea:focus {
    outline: none;
    border: 1px solid #ff4757;
}

input[type="submit"] {
    font-size: 0.95rem;
    font-weight: bold;
    color: #fff;
    background-color: #0D99FF;
    border: none;
    border-radius: 5px;
    padding: 10px 15px;
    /* margin-top: 20px; */
    cursor: pointer;
    transition: background-color 0.25s, color 0.25s;
}

input[type="submit"]:hover {
    background-color: #008DDA;
    color: #fff;
}

nav.navbar {
            background-color: #343a40;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        nav.navbar a.navbar-brand, nav.navbar a.nav-link {
            color: #ffffff !important;
        }

        nav.navbar a.navbar-brand:hover, nav.navbar a.nav-link:hover {
            color: #dcdcdc !important;
        }

        /* Align the navbar to the right */
        /* .navbar-nav {
            margin-left: auto;
        } */
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
    color: #5DEBD7 !important; /* Màu xanh */
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

        .container {
            display: flex;
            background: #F6F5F2;
            border-radius: 15px;
            padding: 40px;
        }


</style>

    <?php
include 'connect.php';

$id = $name = $username = $type = "";
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $username = $row["username"];
        $password = $row["password"];
        $type = $row["type"];
    }
}
?>
<?php
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quản lý người dùng</title>
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
    
    <div class="container">

        <!-- Danh sách người dùng -->
        <div class="list-manager">
            <h1>Danh sách người dùng</h1>
            <div class="content-table">
                <table border="1">
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Tên đăng nhập</th>
                        <th>Mật khẩu</th>
                        <th>Loại</th>
                        <th>Hành động</th>
                    </tr>
                    <?php
                    if ($result->num_rows > 0) {
                        $stt = 1; // Đặt biến đếm STT ban đầu là 1
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $stt . "</td>"; // Hiển thị số thứ tự
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["username"] . "</td>";
                            echo "<td>" . $row["password"] . "</td>";
                            echo "<td>" . ($row["type"] == 1 ? 'Admin' : 'User') . "</td>";
                            echo "<td>
                                  <a href='Fquanly.php?id=" . $row["id"] . "'>Sửa</a>
                                  <a href='Quanly.php?action=delete&id=" . $row["id"] . "'>Xóa</a>
                                </td>";
                            echo "</tr>";
                            $stt++; // Tăng STT với mỗi hàng
                        }
                    } else {
                        echo "<tr><td colspan='6'>Không có người dùng</td></tr>"; // Đảm bảo colspan được đặt thành 6
                    }
                    ?>
                </table>
            </div>
        </div>
    
        <!-- Thêm người dùng -->
        <div class="add-member">
            <h1><?php echo $id ? "Sửa" : "Thêm"; ?> người dùng</h1>
            <form action="Quanly.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <label for="name">Tên:</label>
                <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
                <label for="username">Tên đăng nhập:</label>
                <input type="text" id="username" name="username" value="<?php echo $username; ?>" required>
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" value = "<?php echo $password; ?>" required>
                <div style="padding-bottom: 40px; position:relative;">
                    <label style="width: 50%;" for="type">Loại:</label>
                    <select id="type" name="type">
                        <option value="1" <?php echo $type == 1 ? "selected" : ""; ?>>Admin</option>
                        <option value="2" <?php echo $type == 2 ? "selected" : ""; ?>>User</option>
                    </select>
                    <input style="position:absolute;top:28px;right:10px;" type="submit" value="Lưu">
                </div>
            </form>
        </div>
        </div>

    <!-- Footer -->

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
</body>
</html>

<?php

$conn->close();
?>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>

</html>