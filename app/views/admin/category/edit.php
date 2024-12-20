<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh; margin-right: 40px;">
    <form method="POST" enctype="multipart/form-data" class="col-lg-8 col-md-12 bg-secondary p-4 rounded shadow-sm">
        <h2 class=" text-white mb-2" style="margin-top: 10px;">Kateqoriya Düzəlişi</h2>
        <hr class="mx-auto" style="border: 2px solid #dc3545; width: 100%; margin-left: 0;">
        <!-- Kateqoriya Seçimi -->
        <!-- Kateqoriya Seçimi -->
        <div class="form-group mb-3">
            <label for="category_select" class="text-white">Kateqoriya seç</label>
            <div class="input-group">
                <div class="input-group-prepend" style="margin-top: 5px; padding-right: 10px;">
                    <!-- İkonla input arasındaki mesafe -->
                    <span class="input-group-text text-white" style="background-color: red;">
                        <i class="fas fa-list"></i> <!-- İkon -->
                    </span>
                </div>
                <select class="form-control rounded-pill" id="category_select" name="category_select"
                    style="background-color: #f0f8ff;">
                    <option value="" disabled selected>Kateqoriya seçin</option>
                    <?php foreach ($categor as $category_option): ?>
                        <option value="<?= htmlspecialchars($category_option['id']) ?>" <?= (isset($categories) && is_array($categories) && in_array($category_option['title'], array_column($categories, 'title'))) ? 'disabled' : '' ?>     <?= (isset($_POST['category_select']) && $_POST['category_select'] == $category_option['id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($category_option['title']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>



        <!-- Kategorilerin tüm detayları -->
        <?php foreach ($categories as $category): ?>

            <!-- Kateqoriya adı -->
            <div class="form-group mb-3">
                <label for="category_name" class="text-white">Kateqoriya adı</label>
                <input type="text" class="form-control" id="category_name" name="category_name"
                    value="<?= htmlspecialchars($category['title']) ?>"
                    placeholder="<?= htmlspecialchars($category['title']) ?>">
            </div>

            <!-- Kateqoriya şəkli -->
            <div class="form-group mb-3">
                <label for="category_image" class="text-white">Kateqoriya şəkli</label>
                <?php if (!empty($category['image'])): ?>
                    <div class="mb-1">
                        <small
                            class="form-text text-white"><?= 'http://e-market.loc' . htmlspecialchars($category['image']) ?></small>
                    </div>
                <?php endif; ?>
                <input type="file" class="form-control" id="category_image" name="category_image" accept="image/*">
            </div>

            <!-- Qısa məlumat (Excerpt) -->
            <div class="form-group mb-3">
                <label for="excerpt" class="text-white">Qısa məlumat (Excerpt)</label>
                <input type="text" class="form-control" id="excerpt" name="excerpt"
                    value="<?= htmlspecialchars($category['excerpt']) ?>"
                    placeholder="<?= htmlspecialchars($category['excerpt']) ?>">
            </div>

            <!-- Açar sözlər -->
            <div class="form-group mb-3">
                <label for="keywords" class="text-white">Açar sözlər</label>
                <input type="text" class="form-control" id="keywords" name="keywords"
                    value="<?= htmlspecialchars($category['keywords']) ?>"
                    placeholder="<?= htmlspecialchars($category['keywords']) ?>">
            </div>

            <!-- Slug -->
            <div class="form-group mb-3">
                <label for="slug" class="text-white">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug"
                    value="<?= htmlspecialchars($category['slug']) ?>"
                    placeholder="<?= htmlspecialchars($category['slug']) ?>">
            </div>

            <!-- Təsvir -->
            <div class="form-group mb-3">
                <label for="description" class="text-white">Təsvir</label>
                <textarea class="form-control" id="description" name="description" rows="4"
                    placeholder="<?= htmlspecialchars($category['description']) ?>"><?= htmlspecialchars($category['description']) ?></textarea>
            </div>

        <?php endforeach; ?>

        <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-primary px-4 py-2">Əlavə et</button>
            <a href="/admin/category" class="btn btn-secondary">Geri Qayıt</a>
        </div>
    </form>
</div>