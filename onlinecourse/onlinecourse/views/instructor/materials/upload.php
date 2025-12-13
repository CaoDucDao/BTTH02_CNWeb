<div class="container">
    <h3>Upload tài liệu</h3>
    
    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <?php if(isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>

    <form action="index.php?controller=lesson&action=uploadMaterial&id=<?= $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
        
        <div class="form-group">
            <label>Tên hiển thị:</label>
            <input type="text" name="filename" class="form-control" placeholder="Tên tài liệu...">
        </div>
        
        <div class="form-group">
            <label>Chọn file:</label>
            <input type="file" name="file_upload" class="form-control" required>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Upload</button>
        <a href="index.php?controller=lesson&action=index" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
