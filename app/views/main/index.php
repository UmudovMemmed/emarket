<!-- Carousel Start -->
<div class="container-fluid mb-3">
    <div class="row px-xl-5">
        <div class="col-lg-12">
            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php foreach ($sliders as $index => $slider): ?>
                        <li data-target="#header-carousel" data-slide-to="<?= $index; ?>"
                            class="<?= $index === 1 ? 'active' : ''; ?>"></li>
                    <?php endforeach; ?>
                </ol>
                <div class="carousel-inner">
                    <?php foreach ($sliders as $index => $slider): ?>
                        <div class="carousel-item position-relative <?= $index === 1 ? 'active' : ''; ?>"
                            style="height: 430px">
                            <img class="position-absolute w-100 h-auto" src="<?= PATH . $slider['img']; ?>"
                                style="object-fit: cover" alt="Slide <?= $slider['id']; ?>" />
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<!-- Categories Start -->
<div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">Kateqoriyalar
        </span>
    </h2>
    <div class="row px-xl-5 pb-3">
        <?php foreach ($categories as $category): ?>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none" href="category/<?php echo $category['slug']; ?>">
                    <div class="cat-item img-zoom d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="<?= PATH ?><?= $category['image'] ?>"
                                alt="<?= htmlspecialchars($category['title']) ?>">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6><?php echo $category['title']; ?></h6>
                            <!-- Removed product count -->
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>





<!-- Categories End -->

<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">Seçilmiş Məhsullar</span>
    </h2>
    <div class="row px-xl-5">

        <?php if (!empty($products)): ?>
            <?php $this->getPart('layouts/parts/products_loops', compact('products')); ?>
        <?php else: ?>
            <h3>Heç bir məhsul tapılmadı</h3>
        <?php endif; ?>

    </div>
</div>


<!-- Products End -->

<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">
                    Keyfiyyətli Məhsul
                </h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Pulsuz Göndərmə</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">14 Günlük Geri Qaytarma</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">24/7 Dəstək</h5>
            </div>
        </div>
    </div>
</div>

<!-- Featured End -->