<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 w-100" style="margin-left: 250px; position: relative;">
            <div class="h-100 bg-secondary rounded p-4">
                <!-- Yeni Kategori Ekle Butonu -->
                <a href="<?= ADMIN . '/category/add'; ?>"
                    class="btn btn-primary position-absolute top-0 end-0 mt-3 me-5"
                    style="font-size: 16px; padding: 10px 20px; border-radius: 5px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-plus-circle" style="font-size: 20px; color: white;"></i>
                    <span class="ms-2 text-white">Yeni Kateqoriya Əlavə Et</span>
                </a>

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="mb-0 text-white"><i class="fas fa-th-list"></i> Kateqoriyalar</h2>

                </div>
                <hr style="border: 2px solid #dc3545;">

                <style>
                    .custom-bg-dark {
                        background-color: black;
                    }
                </style>
                <?php if (is_array($categories) && !empty($categories)): ?>
                    <div class="mb-4" style="margin-top: 20px;">
                        <div class="row">
                            <?php foreach ($categories as $category): ?>
                                <div class="col-md-3 mb-4"> <!-- Her kategori için kart -->
                                    <div class="card custom-bg-dark text-white h-100"> <!-- Koyu arka planlı kart -->
                                        <!-- Kategori Resmi -->
                                        <img src="<?= $category['image']; ?>" alt="<?= htmlspecialchars($category['title']); ?>"
                                            class="card-img-top img-fluid rounded"
                                            style="max-height: 250px; object-fit: cover;"> <!-- Resim ekleme -->

                                        <div class="card-body">
                                            <!-- Kategori Başlığı -->
                                            <h5 class="card-title text-center text-white">
                                                <?= htmlspecialchars($category['title']); ?>
                                            </h5>

                                            <div class="d-flex justify-content-center">
                                                <!-- Düzenle Butonu -->
                                                <a class="btn btn-primary text-white w-100 py-2"
                                                    href="<?= ADMIN . '/category/edit?id=' . $category['id'] ?>"
                                                    style="font-size: 16px; text-align: center;">
                                                    <i class="fas fa-edit" style="font-size: 20px;"></i> <br> Dəyişdir
                                                </a>
                                            </div>

                                            <div class="d-flex justify-content-center mt-2">
                                                <!-- Sil Butonu -->
                                                <a class="btn btn-primary text-white w-100 py-2"
                                                    href="<?= ADMIN . '/category/delete?id=' . $category['id'] ?>"
                                                    onclick="return confirm('Əminsiniz? Bu kateqoriya silinəcək!');">
                                                    <i class="fas fa-trash-alt" style="font-size: 20px;"></i> <br> Sil
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Kateqoriya mövcud olmadığında gösterilecek mesaj -->
                    <div class="alert alert-warning text-dark">
                        <ul class="list-unstyled" style="margin-top: 10px; font-size: 16px;">
                            <li>Hal-hazırda heç bir kateqoriya mövcud deyil.</li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>