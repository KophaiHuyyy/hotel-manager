<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include Bootstrap CSS (assuming you're using Bootstrap) -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <!-- Your HTML content goes here -->

    <?php
// check_out.php

include('connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "SELECT * FROM checked WHERE id = $id";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Extract the relevant information
        $room_id = $row['room_id'];
        $name = $row['name'];
        $contact_no = $row['contact_no'];
        $date_in = $row['date_in'];
        $date_out = $row['date_out'];
        $status = $row['status'];

        $date_in_obj = new DateTime($date_in);
        $date_out_obj = new DateTime($date_out);
        $interval = $date_in_obj->diff($date_out_obj);
        $days = $interval->days;

        $room = $conn->query("SELECT * FROM rooms where id = $room_id")->fetch_assoc();

        // Fetch Room Category Information
        $cat = $conn->query("SELECT * FROM room_categories where id = " . $room['category_id'])->fetch_assoc();
        $amount = $cat['price'] * $days;

        // Display the information in the modal
    
        echo "<p><strong>Tên phòng:</strong> {$room['room']}</p>";
        echo "<p><strong>Tên khách hàng:</strong> $name</p>";
        echo "<p><strong>Số điện thoại:</strong> $contact_no</p>";
        echo "<p><strong>Ngày vào:</strong> $date_in</p>";
        echo "<p><strong>Ngày trả:</strong> $date_out</p>";
        if ($status == 1) {
            echo "<p><strong>Tình trạng:</strong>Đã nhận phòng</p>";
                } elseif ($status == 2) {
            echo "<p><strong>Tình trạng:</strong> Đã trả phòng</p>";
                } else {
            echo "<p><strong>Tình trạng:</strong>Không xác định!</p>";
            }  
        
        echo "<p><strong>Thời gian thuê:</strong> $days</p>";

        echo "<p><strong>Thanh toán :</strong> $" . number_format($amount, 2) . "</p>";


        echo '<div class="modal-footer">';
        echo '<button type="button" class="btn btn-primary" id="checkout" data-id="' . $row['id'] . '" onclick="checkoutRoom(' . $row['id'] . ')">Trả Phòng</button>';
        echo '<button type="button" class="btn btn-success" id="editButton" onclick="editCheckin(' . $row['id'] . ')">Thay đổi</button>';
        echo '<button type="button" class="btn btn-info" id="generatePdf" onclick="generatePdf(' . $row['id'] . ')">Xuất file</button>';

        echo '<button type="button" class="btn btn-secondary" onclick="closeModal()">Đóng</button>';
        echo '</div>';
        
        

    } else {
        echo "Error: Unable to fetch data.";
    }
} else {
    echo "Error: Invalid request.";
}
?>
    

    <!-- Include Bootstrap JS (assuming you're using Bootstrap) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    

    <!-- Include your JavaScript code -->
    <script>
        function editCheckin(id) {
        // You can add your edit logic here
        // For example, you might want to redirect to an edit page with the room ID
        window.location.href = "edit_checkin.php?id=" + id;
    }
      function checkoutRoom(id) {
    if (confirm) {
        $.ajax({
            type: "POST",
            url: "check_out_update.php",
            data: {id: id},
            success: function(response) {
                // Xử lý kết quả từ máy chủ (nếu cần)
                console.log("Server response: " + response);

                // Chuyển đến trang chủ (thay thế đường dẫn "home.php" bằng đường dẫn thích hợp)
                window.location.href = "FcheckOut.php";
            },
            error: function(xhr, status, error) {
                console.error("Error: Unable to process check-out. " + error);
                alert("Error: Unable to process check-out.");
            }
            
        });
    }
}
function closeModal() {
        // Reload the current page
        window.location.reload();
    }

    function generatePdf(id) {
        // Assuming you have a PHP script that generates the PDF (replace "generate_pdf.php" with your actual script)
        var pdfUrl = 'PDF.php?id=' + id;

        // Open the PDF in a new window or tab
        window.open(pdfUrl, '_blank');
    }
</script>


    </script>

</body>
</html>
