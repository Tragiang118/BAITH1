<?php include './header.php';?>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách sinh viên</h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>Lớp</th>
                    <th>Điểm trung bình</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "quanlysv";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Kết nối thất bại: " . $conn->connect_error);
                }

                $sql = "SELECT DISTINCT id, name, birthdate, class, gpa FROM students"; // Thêm DISTINCT để loại bỏ trùng lặp
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['birthdate']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['class']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['gpa']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center'>Không có dữ liệu</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
<?php 
include './footer.php';
?>
