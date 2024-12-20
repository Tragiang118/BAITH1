<?php
include 'db.php'; // Kết nối CSDL
include 'header.php';

// Lấy thông tin hoa từ CSDL
$sql = "SELECT * FROM flowers";
$result = $conn->query($sql);

echo '<div class="container mt-5">';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="card mb-3">';
        echo '<div class="row g-0">';
        echo '<div class="col-md-4">';
        echo '<img src="images/' . $row['image'] . '" class="img-fluid rounded-start" alt="...">';
        echo '</div>';
        echo '<div class="col-md-8">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row['name'] . '</h5>';
        echo '<p class="card-text">' . $row['description'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "Không có hoa nào để hiển thị.";
}
echo '</div>';

include 'footer.php';
?>
