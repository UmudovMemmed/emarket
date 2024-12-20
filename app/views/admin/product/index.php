<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10 w-100" style="margin-left: 250px; position: relative;">
            <div class="h-100 bg-secondary rounded p-4">
                <!-- New Product Button with Red Pyramid Icon -->
                <a href="<?= ADMIN . '/product/add'; ?>" class="btn btn-primary position-absolute top-0 end-0 mt-3 me-5"
                    style="font-size: 16px; padding: 10px 20px; border-radius: 5px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-plus-circle" style="font-size: 20px; color: white;"></i>
                    <span class="ms-2 text-white">Yeni Məhsul Əlavə Et</span>
                </a>

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h2 class="mb-0 text-white"><i class="fas fa-th"></i> Məhsullar</h2>



                </div>
                <hr style="border: 2px solid #dc3545;">

                <style>
                    .custom-bg-dark {
                        background-color: black;
                    }
                </style>
                <?php if (is_array($products) && !empty($products)): ?>
                    <div class="mb-4" style="margin-top: 20px;">
                        <div class="row">
                            <?php foreach ($products as $product): ?>
                                <div class="col-md-3 mb-4"> <!-- Adjusted column size to col-md-3 for smaller cards -->
                                    <div class="card custom-bg-dark text-white h-100"> <!-- Changed to black background -->
                                        <!-- Product Image -->
                                        <img src="<?= $product['img']; ?>" alt="<?= htmlspecialchars($product['title']); ?>"
                                            class="card-img-top img-fluid rounded"
                                            style="max-height: 250px; object-fit: cover;"> <!-- Reduced max-height for image -->

                                        <div class="card-body">
                                            <!-- Title with light text for visibility on dark background -->
                                            <h5 class="card-title text-center text-white">
                                                <?= htmlspecialchars($product['title']); ?>
                                            </h5>

                                            <div class="d-flex justify-content-center">
                                                <!-- The 'Edit' button with light text for contrast on dark background -->
                                                <a class="btn btn-primary text-white w-100 py-2"
                                                    href="<?= ADMIN . '/product/edit?id=' . $product['product_id'] ?>"
                                                    style="font-size: 16px; text-align: center;">
                                                    <i class="fas fa-edit" style="font-size: 20px;"></i> <br> Dəyişdir
                                                </a>
                                            </div>

                                            <div class="d-flex justify-content-center mt-2">
                                                <!-- The 'Delete' button with light text for contrast on dark background -->
                                                <a class="btn btn-primary text-white w-100 py-2"
                                                    href="<?= ADMIN . '/product/delete?id=' . $product['product_id'] ?>"
                                                    onclick="return confirm('Əminsiniz? Bu məhsul silinəcək!');">
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
                    <!-- Add an unordered list with custom styles for no products available -->
                    <div class="alert alert-warning text-dark">
                        <ul class="list-unstyled" style="margin-top: 10px; font-size: 16px;">
                            <li>Hal-hazırda heç bir məhsul mövcud deyil.</li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>