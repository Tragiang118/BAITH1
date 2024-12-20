<?php
include 'db.php';
include 'header.php';

echo '<div class="container mt-5">';
echo '<h2>Danh sách hoa</h2>';
echo '<table class="table table-bordered">';
echo '<thead><tr><th>ID</th><th>Tên hoa</th><th>Mô tả</th><th>Ảnh</th><th>Hành động</th></tr></thead>';
echo '<tbody>';

$sql = "SELECT * FROM flowers";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['description'] . '</td>';
        echo '<td><img src="images/' . $row['image'] . '" width="100"></td>';
        echo '<td><a href="edit.php?id=' . $row['id'] . '" class="btn btn-primary">Sửa</a> 
                  <a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger mt-3">Xóa</a>
              </td>';
        echo '</tr>';
    }
} else {
    echo "<tr><td colspan='5'>Không có hoa nào trong danh sách.</td></tr>";
}

echo '</tbody>';
echo '</table>';
echo '<a href="add.php" class="btn btn-success mb-3">Thêm hoa mới</a>';
echo '</div>';

include 'footer.php';
?>
