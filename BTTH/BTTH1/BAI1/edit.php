<?php
include 'db.php';
include './header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM flowers WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    if ($image) {
        move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $image);
        $sql = "UPDATE flowers SET name = '$name', description = '$description', image = '$image' WHERE id = $id";
    } else {
        $sql = "UPDATE flowers SET name = '$name', description = '$description' WHERE id = $id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Cập nhật thành công!</div>";
        header("Location: admin.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Có lỗi xảy ra khi cập nhật.</div>";
    }
}
?>
<div class="container mt-5">
    <h2>Sửa thông tin hoa</h2>
    <form action="edit.php?id=<?php echo $row['id']; ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Tên hoa</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Mô tả</label>
            <textarea class="form-control" id="description" name="description" required><?php echo $row['description']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Ảnh</label>
            <input type="file" class="form-control" id="image" name="image">
            <img src="images/<?php echo $row['image']; ?>" width="100" class="mt-2">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
