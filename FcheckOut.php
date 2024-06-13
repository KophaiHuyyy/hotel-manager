<?php
include('connect.php');
function fetchRoomCategories($conn) {
    $cat = $conn->query("SELECT * FROM room_categories");
    $cat_arr = array();
    while ($row = $cat->fetch_assoc()) {
        $cat_arr[$row['id']] = $row;
    }
    return $cat_arr;
}

function fetchRooms($conn) {
    $room = $conn->query("SELECT * FROM rooms");
    $room_arr = array();
    while ($row = $room->fetch_assoc()) {
        $room_arr[$row['id']] = $row;
    }
    return $room_arr;
}

function fetchCheckedData($conn) {
    $checked = $conn->query("SELECT * FROM checked where status != 0 order by status desc, id asc ");
    $checked_arr = array();
    while ($row = $checked->fetch_assoc()) {
        $checked_arr[] = $row;
    }
    return $checked_arr;
}
?>
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./vendor/themify-icons/themify-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        .table-container {
            max-height: 400px;
            overflow-y: auto;
        }

        .table-container table thead th {
            position: sticky;
            top: 0;
            background-color: #f8f9fa;
        }
        body {
            font-family: Arial, sans-serif;
            /* background-color: #f4f4f4; */
            background-image: url(pngtree-luxury-hotel-interior-picture-image_2682371.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            margin-top: 150px;
        }

        .card-body {
            background-color: #F3F8FF;
            display: flex;
            border-radius: 15px;
        }
        div.table-content {
            width: 100%;
            max-height: 340px;
            overflow: auto;
            overflow-y: scroll;
        }
        .table.table-bordered {
            box-shadow: 0px 0px 10px 2px rgba(0, 0, 0, 0.1);
            margin: 10px;
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

        table {
            border-collapse: collapse;
        }

        td, th {
            border: none;
        }

        tr {
            border-bottom: none;
        }
        table {
            overflow: auto;
            overflow-y: scroll;
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


<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-content">
                            <table class="table table-bordered">
                                <thead>
                                <th>#</th>
                                <th>Loại</th>
                                <th>Phòng</th>
                                <th>Trạng Thái</th>
                                <th>Hoạt Động</th>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                $cat_arr = fetchRoomCategories($conn);
                                $room_arr = fetchRooms($conn);
    $checked_arr = fetchCheckedData($conn);

                                foreach ($checked_arr as $row):
                                    ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $cat_arr[$room_arr[$row['room_id']]['category_id']]['name'] ?></td>
                                        <td><?php echo $room_arr[$row['room_id']]['room'] ?></td>

                                        <?php if ($row['status'] == 1) : ?>
                                        <td class="status-room"><span class="badge bg-success">Đang Thuê</span></td>
                                    <?php else: ?>
                                        <td class="status-room"><span class="badge bg-secondary">Đã Trả Phòng</span></td>
                                    <?php endif; ?>

                                        <td>
                                            <button class="btn btn-primary check_out" type="button"
                                                    data-id="<?php echo $row['id'] ?>" data-bs-toggle="modal"
                                                    data-bs-target="#checkOutModal">
                                                    <i class='bx bxs-show' ></i>
                                            </button>
                                            <button class="btn btn-danger delete_row" type="button"
                                                data-id="<?php echo $row['id'] ?>">
                                                <i class='bx bxs-trash'></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Check-Out Information -->
<div class="modal fade" id="checkOutModal" tabindex="-1" aria-labelledby="checkOutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="checkOutModalLabel">Thông tin hóa đơn</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="checkOutModalBody">
                <!-- Content loaded via AJAX will be displayed here -->
            </div>
        </div>
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $('.check_out').on('click', function () {
        // Fetch data using AJAX based on the clicked element's data-id
        $.ajax({
            url: 'check_out.php', // Change this URL to the correct endpoint
            type: 'POST',
            data: {id: $(this).data("id")},
            success: function (response) {
                $('#checkOutModalBody').html(response);
                $('#checkOutModal').modal('show'); // Show the modal after content is loaded
            }
        });
    });
    $('.delete_row').on('click', function () {
        // Fetch data using AJAX based on the clicked element's data-id for deletion
        if (confirm("Are you sure you want to delete this record?")) {
            $.ajax({
                url: 'delete_checkout.php', // Change this URL to the correct endpoint for deletion
                type: 'POST',
                data: {id: $(this).data("id")},
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data.success) {
                        // Reload the page after successful deletion
                        location.reload();
                    } else {
                        // Handle the case where deletion was not successful
                        alert("Error: " + data.message);
                    }
                }
            });
        }
    });
</script>

</body>
</html>