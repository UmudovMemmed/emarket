<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="<?= PATH ?>">Ana Sayfa</a>
                <?php
                foreach ($categor as $categories) {
                    // Corrected the href and used echo for the categories
                    if ($categories['id'] == $categories_id[0]['parent_id']) {
                        echo '<a class="breadcrumb-item text-dark" href="/category/' . htmlspecialchars($categories['slug']) . '">' . htmlspecialchars($categories['title']) . '</a>';
                    }
                }
                ?>
                <a class="breadcrumb-item text-dark"
                    href="/category/<?= htmlspecialchars($categories_id[0]['slug']) ?>">
                    <?= htmlspecialchars($categories_id[0]['title']) ?>
                </a>

                <span class="breadcrumb-item active"><?= htmlspecialchars($product['title']) ?></span>
            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->




<!-- Shop Detail Start -->
<div class="container-fluid pb-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner bg-light">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="<?= PATH . $product['img'] ?>"
                            alt="<?= $product['title'] ?> şəkli">
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30">
                <h3><?= $product['title'] ?></h3>

                <h3 class="font-weight-semi-bold mb-4">
                    <span class="text-muted"
                        style="text-decoration: line-through; font-size: 0.85em;">$<?= $product['old_price'] ?></span>
                    $<?= $product['price'] ?>
                </h3>


                <p class="mb-4"><?= $product['description'] ?></p>



                <?php
                $colorTranslations = [
                    'Black' => 'Qara',
                    'White' => 'Ağ',
                    'Red' => 'Qırmızı',
                    'Blue' => 'Mavi',
                    'Green' => 'Yaşıl',
                ];
                ?>

                <div class="d-flex mb-4">
                    <strong class="text-dark mr-3">Rənglər:</strong>
                    <?php
                    $selectedColor = $product['color'] ?? null; // Seçilen rengi al
                    foreach ($colorTranslations as $english => $azerbaijani):
                        $isChecked = $selectedColor === $english; // Seçili olup olmadığını kontrol et
                        ?>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="color-<?= $english ?>" name="color"
                                value="<?= $english ?>" <?= $isChecked ? 'checked' : 'disabled' ?>>
                            <label class="custom-control-label" for="color-<?= $english ?>"><?= $azerbaijani ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-3" style="width: 130px;">
                        <button class="btn btn-primary btn-minus">
                            <i class="fa fa-minus"></i>
                        </button>
                        <input id="input_qty" type="text" class="form-control bg-secondary border-0 text-center"
                            value="1">
                        <button class="btn btn-primary btn-plus">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>

                    <a class="btn btn-warning btn-lg w-auto add-to-cart" href="cart/add?id=<?= $product['id']; ?>"
                        data-id="<?= $product['id']; ?>"><i class="fa fa-shopping-cart mr-1"></i> Səbətə əlavə et</a>



                </div>
            </div>
        </div>
    </div>

    <div class="row px-xl-5">
        <div class="col">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Təsvir</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Məhsul Təsviri</h4>
                        <p><?= $product['excerpt'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>