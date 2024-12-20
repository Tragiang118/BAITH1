<?php
include 'db.php';
include './header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $image);

    $sql = "INSERT INTO flowers (name, description, image) VALUES ('$name', '$description', '$image')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Thêm hoa thành công!</div>";
        header("Location: admin.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Có lỗi xảy ra khi thêm hoa.</div>";
    }
}
?>
<div class="container mt-5">
    <h2>Thêm hoa mới</h2>
    <form action="add.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Tên hoa</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Ảnh</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <button type="submit" class="btn btn-success">Thêm hoa</button>
    </form>
</div>
