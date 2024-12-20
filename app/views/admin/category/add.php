<div class="container mt-1  d-flex justify-content-center align-items-center"
    style="min-height: 100vh; margin-top: -55px; margin-right:50px;">
    <form method="POST" enctype="multipart/form-data" class="col-lg-8 col-md-12 bg-secondary p-4 rounded shadow-sm">
        <h2 class="mb-0 text-white">Yeni Kateqoriya Əlavə Et</h2>
        <hr style="border: 2px solid #dc3545;  width: 100%;">
        <!-- Category Name -->
        <div class="form-group">
            <label for="category_name">Kateqoriya adı</label>
            <input type="text" class="form-control" id="category_name" name="category_name"
                placeholder="Kateqoriyanızın adını daxil edin">

        </div>



        <div class="form-group mt-3">
            <label for="parent_category">Ana Kateqoriya</label>
            <select class="form-control" id="parent_category" name="parent_category">
                <option value="0">Ana kateqoriya olaraq seç</option>
                <?php foreach ($categor as $category): ?>
                    <option value="<?= htmlspecialchars($category['id']); ?>">
                        <?= htmlspecialchars($category['title']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>


        <!-- Category Image -->
        <div class="form-group mt-3">
            <label for="category_image">Kateqoriya şəkli</label>
            <input type="file" class="form-control" id="category_image" name="category_image" accept="image/*">
        </div>

        <!-- Excerpt -->
        <div class="form-group mt-3">
            <label for="excerpt">Excerpt</label>
            <input type="text" class="form-control" id="excerpt" name="excerpt" placeholder="Qısa məlumat daxil edin">
        </div>

        <!-- Keywords -->
        <div class="form-group mt-3">
            <label for="keywords">Açar sözlər</label>
            <input type="text" class="form-control" id="keywords" name="keywords"
                placeholder="Açar sözləri vergüllə ayrılmış şəkildə daxil edin">
        </div>

        <!-- Slug -->
        <div class="form-group mt-3">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug"
                placeholder="Kateqoriyanıza uyğun URL hissəsi daxil edin">
        </div>

        <!-- Description -->
        <div class="form-group mt-3">
            <label for="description">Təsvir</label>
            <textarea class="form-control" id="description" name="description" rows="4"
                placeholder="Kateqoriya haqqında ətraflı məlumat verin"></textarea>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary">Əlavə et</button>
            <a href="/admin/category" class="btn btn-secondary">Geri Qayıt</a>
        </div>
    </form>
</div>