<div class="container bg-secondary text-white" style="margin-left: 260px; padding: 20px; border-radius: 8px;">
    <h2>Footer Yenilə</h2>
    <hr style="border: 2px solid #dc3545;">

    <!-- Edit Page Form -->
    <form action="" method="POST">
        <div class="form-group mb-3">
            <label for="title">Başlıq</label>
            <input type="text" class="form-control" id="title" name="title"
                value="<?php echo htmlspecialchars($page[0]['title']); ?>" required>
        </div>
        <div class="form-group mb-3">
            <label for="content">Məzmun</label>
            <textarea class="form-control" id="content" name="content" rows="5"
                required><?php echo htmlspecialchars($page[0]['content']); ?></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="keywords">Açar sözlər</label>
            <input type="text" class="form-control" id="keywords" name="keywords"
                value="<?php echo htmlspecialchars($page[0]['keywords']); ?>" required>
        </div>
        <div class="form-group mb-3">
            <label for="description">Təsvir</label>
            <textarea class="form-control" id="description" name="description" rows="3"
                required><?php echo htmlspecialchars($page[0]['description']); ?></textarea>
        </div>
        <!-- Moved slug and URL fields to the end -->
        <div class="form-group mb-3">
            <label for="slug">slug</label>
            <textarea class="form-control" id="slug" name="slug" rows="3"
                required><?php echo htmlspecialchars($page[0]['slug']); ?></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="url">URL</label>
            <input type="text" class="form-control" id="url" name="url"
                value="<?php echo htmlspecialchars($page[0]['url']); ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Yenilə</button>
        <a href="/admin/footer" class="btn btn-secondary">Geri Qayıt</a>
    </form>
</div>