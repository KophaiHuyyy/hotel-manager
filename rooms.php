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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="./vendor/themify-icons/themify-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
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

		.card {
			margin-bottom: 20px;
			background-color: #F3F8FF;
		}

        .card.form-patern {
            border: none;
        }

        .card-body-form-patern {
            margin: 10px 20px;
            border-bottom: 1px solid #ccc;
        }

		.card-header {
			background-color: #007bff;
			color: #fff;
			text-align: center;
			padding: 10px;
		}

		.card-body {
			margin: 20px;
            padding: 0;
            /* border: 1px solid #E2DFD0; */
		}

		.card-footer {
			background-color: #f8f9fa;
			padding: 10px;
            border: none;
		}

        .form-group.select {
            margin: 10px 0;
        }

        .btn.btn-sm.btn-default.col-sm-3 {
            background: #EEEEEE;
        }

        .btn.btn-sm.btn-default.col-sm-3:hover {
            background: #E2DFD0;
            /* color: #fff; */
        }

		table {
			width: 100%;
			border-collapse: collapse;
		}

        .table.table-bordered.table-hover {
            margin: 0;
        }

		th,
		td {
			padding: 10px;
			text-align: center;
		}

		th {
			background-color: #007bff;
			color: #fff;
		}

		.btn {
			margin-right: 5px;
		}

		.badge {
			padding: 5px 10px;
		}

		.bg-success {
			background-color: #28a745;
			color: #fff;
		}

		.bg-secondary {
			background-color: #6c757d;
			color: #fff;
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
            border-top: none;
        }

		.row-list-room {
			display: flex;
			justify-content: center;
			align-items: center;
		}

        .col-md-4 {
            width: 100%;
        }

	</style>
	</head>

	<body>
		<?php include('connect.php'); ?>
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

		<div class="box-container">

		
		<div class="container-fluid">

			<div class="col-lg-12">
				<div class="row-list-room">
					
					<!-- Table Panel -->
					<div class="col-md-8">
						<div class="card">
							<!-- FORM Panel -->
					<div class="col-md-4">
						<form action="" id="manage-room">
							<div class="card form-patern">
								<div class="card-header">
									Mẫu Phòng
								</div>
								<div class="card-body-form-patern">
									<input type="hidden" name="id">
									<div class="form-group">
										<label class="control-label">Phòng</label>
										<input type="text" class="form-control" name="room">
									</div>
									<div class="form-group select">
										<label class="control-label">Loại</label>
										<select class="custom-select browser-default" name="category_id">
											<?php
											$cat = $conn->query("SELECT * FROM room_categories order by name asc ");
											while ($row = $cat->fetch_assoc()) {
												$cat_name[$row['id']] = $row['name'];
											?>
												<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
											<?php
											}
											?>
										</select>
									</div>
									<div class="form-group select status">
										<label for="" class="control-label">Tình trạng</label>
										<select class="custom-select browser-default" name="status">
											<option value="0">Có sẵn</option>
											<option value="1">Không có săn</option>

										</select>
									</div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Lưu</button>
                                                <button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#manage-room').get(0).reset()"> Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</div>
						</form>
					</div>
					<!-- FORM Panel -->
							<div class="card-body">
								<table class="table table-bordered table-hover">
									<thead>
										<tr>
											<th class="text-center">#</th>
											<th class="text-center">Loại</th>
											<th class="text-center">Phòng</th>
											<th class="text-center">Trạng Thái</th>
											<th class="text-center">Hoạt Động</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i = 1;
										$rooms = $conn->query("SELECT * FROM rooms order by id asc");
										while ($row = $rooms->fetch_assoc()) :
										?>
											<tr>
												<td class="text-center"><?php echo $i++ ?></td>

												<td class="text-center"><?php echo $cat_name[$row['category_id']] ?></td>
												<td class=""><?php echo $row['room'] ?></td>
												<?php if ($row['status'] == 0) : ?>
													<td class="text-center"><span class="badge bg-success">Có Sẵn</span></td>
												<?php else : ?>
													<td class="text-center"><span class="badge bg-secondary">Không có sẵn</span></td>
												<?php endif; ?>

												<td class="text-center">
													<button class="btn btn-sm btn-primary edit_cat" type="button" data-id="<?php echo $row['id'] ?>" data-room="<?php echo $row['room'] ?>" data-category_id="<?php echo $row['category_id'] ?>" data-status="<?php echo $row['status'] ?>"><i class='bx bxs-edit'></i></button>
													<button class="btn btn-sm btn-danger delete_cat" type="button" data-id="<?php echo $row['id'] ?>"><i class='bx bxs-trash'></i></button>
												</td>
											</tr>
										<?php endwhile; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- Table Panel -->
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
 </body>

</html>
<!-- Add this at the end of your HTML file -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
	$(document).ready(function() {
		// Handle form submission
		$('#manage-room').submit(function(e) {
			e.preventDefault(); // Prevent the default form submission

			// Get form data
			var formData = $(this).serialize();

			// Perform AJAX request to save data
			$.ajax({
				url: 'save_room.php', // Replace with the actual URL to handle form submission
				type: 'POST',
				data: formData,
				success: function(response) {
					// Handle the response from the server
					console.log(response);
					// You can update the UI or perform other actions based on the response

					// Nếu xóa lưu, làm mới trang
					if (response.status === 'success') {
						location.reload();
					}
				},
				error: function(error) {
					// Handle errors
					console.error('Error:', error);
				}
			});
		});
	});

	// xóa

	$(document).ready(function() {
		// Xử lý sự kiện click vào nút Delete
		$('.delete_cat').click(function() {
			
            var roomId = $(this).data('id');
            var confirmDelete = confirm('bạn có muốn xóa phòng này không?');

            if (confirmDelete) {
                $.ajax({
                    url: 'Delete_rooms.php',
                    type: 'POST',
                    data: {
                        id: roomId
                    },
                    dataType: 'json', // Parse the response as JSON
                    success: function(response) {
                        console.log(response);
                        if (response.status === 'success') {
                            location.reload();
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', xhr.responseText);
                        alert('An error occurred while processing the request.');
                    }
                });
            }
        });
	});

	// edit

	$(document).ready(function() {
		// Xử lý sự kiện click vào nút Edit
		$('.edit_cat').click(function() {
			// Lấy thông tin từ thuộc tính data của nút Edit
			var roomId = $(this).data('id');
			var roomName = $(this).data('room');
			var categoryId = $(this).data('category_id');
			var status = $(this).data('status');

			// Đưa thông tin vào biểu mẫu chỉnh sửa
			$('#manage-room input[name="id"]').val(roomId);
			$('#manage-room input[name="room"]').val(roomName);
			$('#manage-room select[name="category_id"]').val(categoryId);
			$('#manage-room select[name="status"]').val(status);
		});
	});
</script>