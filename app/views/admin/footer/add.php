<div class="container bg-secondary text-white" style="margin-left: 260px; padding: 20px; border-radius: 8px;">
    <h2>Yeni Footer Əlavə Et</h2>
    <hr style="border: 2px solid #dc3545;">

    <!-- Add New Footer Form -->
    <form action="" method="POST">
        <div class="form-group mb-3">
            <label for="title">Başlıq</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Başlıq daxil edin">
        </div>
        <div class="form-group mb-3">
            <label for="content">Məzmun</label>
            <textarea class="form-control" id="content" name="content" rows="5"
                placeholder="Məzmun daxil edin"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="keywords">Açar sözlər</label>
            <input type="text" class="form-control" id="keywords" name="keywords" placeholder="Açar sözlər daxil edin">
        </div>
        <div class="form-group mb-3">
            <label for="description">Təsvir</label>
            <textarea class="form-control" id="description" name="description" rows="3"
                placeholder="Təsvir daxil edin"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="slug">Slug</label>
            <textarea class="form-control" id="slug" name="slug" rows="3" placeholder="Slug daxil edin"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="url">URL</label>
            <input type="text" class="form-control" id="url" name="url" placeholder="URL daxil edin">
        </div>
        <button type="submit" class="btn btn-primary">Əlavə Et</button>
        <a href="/admin/footer" class="btn btn-secondary">Geri Qayıt</a>
    </form>
</div>