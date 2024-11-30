<?php
// Kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "root"; // Thay đổi nếu cần
$password = ""; // Thay đổi nếu cần
$dbname = "QuanLySV"; // Thay đổi tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Đọc dữ liệu từ file CSV
$filename = "students.csv";

// Mở file CSV
if (($handle = fopen($filename, "r")) !== FALSE) {
    // Bỏ qua dòng tiêu đề
    fgetcsv($handle, 1000, ",");

    // Đọc từng dòng dữ liệu và lưu vào MySQL
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $id = $data[0];
        $name = $data[1];
        $dob = $data[2];
        $class = $data[3];
        $gpa = $data[4];

        // Lệnh INSERT
        $sql = "INSERT INTO students ( `name`, `birthdate`, `class`, `gpa`)
                VALUES ('$name', '$dob', '$class', '$gpa')";

        if ($conn->query($sql) !== TRUE) {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }

    fclose($handle);
}

// Đóng kết nối
$conn->close();
?>
