<?php
require('C:/xampp/htdocs/PHP/QLKhachsan/vendor/setasign/fpdf/fpdf.php');

// Check if the ID parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Include your database connection logic here
    include('connect.php');

    // Fetch data based on the provided ID
    $query = "SELECT * FROM checked WHERE id = $id";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Fetch room details
        $room = $conn->query("SELECT * FROM rooms where id = " . $row['room_id'])->fetch_assoc();

        // Fetch room category details
        $cat = $conn->query("SELECT * FROM room_categories where id = " . $room['category_id'])->fetch_assoc();

        // Calculate amount based on the room category's price and the number of days
        $date_in_obj = new DateTime($row['date_in']);
        $date_out_obj = new DateTime($row['date_out']);
        $interval = $date_in_obj->diff($date_out_obj);
        $days = $interval->days;

        $amount = $cat['price'] * $days;

        // Create a new PDF instance
        $pdf = new FPDF();
        
        $pdf->SetAutoPageBreak(true, 10);

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('helvetica', '', 12);

        // Add content to the PDF
        $pdf->Cell(0, 10, 'Hoa Don', 0, 1, 'C');

        // Add a line break
        $pdf->Ln(5);

        // Add customer details
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(0, 10, 'Khach Hang', 0, 1);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(40, 10, 'Name:', 0);
        $pdf->Cell(0, 10, $row['name'], 0, 1);
        $pdf->Cell(40, 10, 'phone number:', 0);
        $pdf->Cell(0, 10, $row['contact_no'], 0, 1);

        // Add a line break
        $pdf->Ln(10);

        // Add booking details
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(0, 10, 'Chi tiet dat phong', 0, 1);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(40, 10, 'Phong:', 0);
        $pdf->Cell(0, 10, $room['room'], 0, 1);
        $pdf->Cell(40, 10, 'Ngay Dat:', 0);
        $pdf->Cell(0, 10, $row['date_in'], 0, 1);
        $pdf->Cell(40, 10, 'Ngay Tra:', 0);
        $pdf->Cell(0, 10, $row['date_out'], 0, 1);
        $pdf->Cell(40, 10, 'Trang thai:', 0);
        $pdf->Cell(0, 10, getStatusText($row['status']), 0, 1);

        // Add a line break
        $pdf->Ln(10);

        // Add billing details
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(0, 10, 'Thanh toan', 0, 1);
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(40, 10, 'Gia phong:', 0);
        $pdf->Cell(0, 10, '$' . number_format($cat['price'], 2), 0, 1);
        $pdf->Cell(40, 10, 'So ngay Dat:', 0);
        $pdf->Cell(0, 10, $days, 0, 1);
        $pdf->Cell(40, 10, 'Tong tien:', 0);
        $pdf->Cell(0, 10, '$' . number_format($amount, 2), 0, 1);

        // Output PDF as attachment
        $pdf->Output('CheckOutReceipt_' . $id . '.pdf', 'D');
    } else {
        echo 'Error: Unable to fetch data.';
    }
} else {
    echo 'Error: Invalid request.';
}

function getStatusText($status) {
    switch ($status) {
        case 1:
            return 'Checked-In';
        case 2:
            return 'Checked-Out';
        default:
            return 'Unknown';
    }
}
?>
