<?php include('connect.php'); ?>
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <!-- Bootstrap CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            margin-top: 130px;
        }
        
        .container{
            background: rgba(255, 255, 255, 0.5); /* Màu trắng trong suốt */
            width: 900px;
            height: 600px;
            border-radius: 10px;
            padding: 0;
        }
        
        .card-body {
            background-color: #FAF6F0;
        }
        .from-label{
            color: #fff;
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
            color: #0D99FF; /* Màu xanh */
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
            color: #5DEBD7 !important; /* Màu chữ xanh khi di chuột qua hoặc focus */
            transform: translateY(-2px); /* Di chuyển lên khi hover */
        }
        
        /* Đăng xuất */
        .navbar-nav.ml-auto a.nav-link {
            background-color: #1C1678; /*Màu nền xanh */
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
        
        .title {
            font-size: 20px;
            font-weight: bold;
            /* background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(39, 55, 102, 1) 35%, rgba(67, 67, 115, 1) 100%); */
            color: #002379;
            background: rgba(255, 255, 225, 0.5);
            border-radius: 10px 10px 0 0;
            height: 42px;
            display: flex;
            align-items: center;
            padding-left: 20px;
            letter-spacing: 2px;
        }
        
        .title .title-hottel {
            margin-right: 8px;
            padding-bottom: 4px;
            font-weight: bold;
        }

        .row {
            width: 50%;
            float: right;
        }
        
        .row .col-md-4 {
            float: right;
        }
        
        .col-12.search {
            display: flex;
            justify-content: end;
            margin-top: 10px;
        }
        
        
        .btn {
            background: #615EFC;
            font-weight: bold;
            border: none;
        }
        
        .btn.check-in {
            margin-top: 20px;
            width: 100%;
        }
        
        .Datphong {
            width: 35%;
        }
        .form-label {
            margin: 8px 0;
            color: #002379;
        }
        
        .card {
            top: -398px;
            float: right;
            width: 60%;
            height: 326px;
            overflow: auto;
            overflow-y: scroll
        }
        
        .form-select.catelory {
            width: 200px;
            margin-left: -62px;
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

<div class="container">
    
    <p class="title"> <i class="title-hottel ti-home"></i>Đặt phòng khách sạn</p>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!--<div class="card">
                    <div class="card-body">
                        <div class="container">
                            <div class="row"> -->
                                <div class="col-md-4">
                                    <form id="filter" class="filer g-2">
                                        <div class="col-12">
                                            <label for="category" class="form-label">Phân loại phòng</label>
                                            <select class="form-select catelory" name="category_id">
                                                <option value="all" <?php echo isset($_GET['category_id']) && $_GET['category_id'] == 'all' ? 'selected' : '' ?>>All</option>
                                                <?php
                                                $cat = $conn->query("SELECT * FROM room_categories ORDER BY name ASC ");
                                                while ($row = $cat->fetch_assoc()) {
                                                    $cat_name[$row['id']] = $row['name'];
                                                    ?>
                                                    <option value="<?php echo $row['id'] ?>" <?php echo isset($_GET['category_id']) && $_GET['category_id'] == $row['id'] ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-12 search">
                                            <button class="btn btn-primary">Lọc</button>
                                        </div>
                                    </form>
                                </div>
                                
                                <!-- </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            
            
            
            <div class="Datphong">
                
                <form id="infoForm" method="post" action="Datphong.php" onsubmit="return validateDates()">
                    
                    <div class="form-group">
                        
                        <label for="name" class="form-label">Họ và tên:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên của bạn..." required>
                    </div>
                    
                    <div class="form-group">
                        <label for="contact_no" class="form-label">Số điện thoại:</label>
                        <input type="text" class="form-control" id="contact_no" placeholder="Nhập số điện thoại..." name="contact_no" required>
                    </div>
                    
                    <div class="form-group">
                        
                        <label for="room_id" class="form-label">Chọn Phòng:</label>
                        <select class="form-select" id="room_id" name="room_id" required>
                            <option value="">Chọn phòng</option>
                            <?php
                    $query = "SELECT id,room FROM rooms WHERE status = 0";
                    $result = $conn->query($query);
                    
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["id"] . "'>" . $row["room"] . "</option>";
                        }
                    } else {
                        echo "<option value='' disabled>No available rooms</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <div class="col">
                    <label for="date_in" class="form-label">Ngày nhận phòng:</label>
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
                    <option value="1">Nhận phòng</option>
                    <option value="2">Trả phòng</option>
                </select>
            </div>
            
        </fieldset>
        <button type="submit" class="btn check-in btn-primary">Đặt phòng </button>
    </form>
</div>

<!-- <div class="container mt-3" id="availableRooms"> -->
    <!-- Kết quả về phòng đang trống sẽ được hiển thị ở đây -->
    <!-- </div> -->
    <div class="box mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p style="color: #002379;">Danh sách phòng trống:</p>    
                    <table class="table table-bordered">
                        <thead>
                            <th>#</th>
                            <th>Loại</th>
                            <th>Phòng</th>
                            <th>Trạng Thái</th>
                            
                        </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $where = '';
                                if (isset($_GET['category_id']) && !empty($_GET['category_id']) && $_GET['category_id'] != 'all') {
                                    $where .= " where category_id = '" . $_GET['category_id'] . "' ";
                                }
                                if (empty($where))
                                $where .= " where status = '0' ";
                            else
                            $where .= " and status = '0' ";
                        $rooms = $conn->query("SELECT * FROM rooms " . $where . " ORDER BY id ASC");
                        
                        while ($row = $rooms->fetch_assoc()) :
                            ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i++ ?></td>
                                        <td class="text-center"><?php echo $cat_name[$row['category_id']] ?></td>
                                        <td><?php echo $row['room'] ?></td>
                                        <?php if ($row['status'] == 0) : ?>
                                            <td class="text-center"><span class="badge bg-success">Có Sẵn</span></td>
                                            <?php else : ?>
                                                <td class="text-center"><span class="badge bg-secondary">Không có sẵn</span></td>
                                                <?php endif; ?>
                                                
                                            </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        function goBack() {
            window.history.back();
        }

        function validateDates() {
        const dateIn = document.getElementById('date_in').value;
        const dateOut = document.getElementById('date_out').value;
        const currentDate = new Date().toISOString().split('T')[0]; 
        
        if (new Date(dateIn) < new Date(currentDate)) {
            alert("Ngày đặt phòng không được bé hơn thời gian hiện tại");
            return false;
        }
        
        if (new Date(dateOut) < new Date(dateIn)) {
            alert("Ngày trả phòng không thể bé hơn ngày đặt phòng");
            return false;
        }
        
        return true;
    }
    </script>

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

    <!-- Bootstrap JS Link (Optional: Only if you need Bootstrap JavaScript features) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>