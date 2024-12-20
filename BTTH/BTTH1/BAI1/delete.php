<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM flowers WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Hoa đã được xóa!</div>";
    } else {
        echo "<div class='alert alert-danger'>Có lỗi xảy ra khi xóa hoa.</div>";
    }
}
header("Location: admin.php");
exit;
?>
