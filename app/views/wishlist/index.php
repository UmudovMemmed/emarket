<!-- Shop Product Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="<?= PATH ?>">Home</a>

                <span class="breadcrumb-item active">Sevimliler</span>
            </nav>
        </div>
    </div>
</div>


<div class="text-center">
    <h3 class="section-title">Sevimliler</h3>
    <hr class="my-4 mx-auto" style="width: 80%;">
</div>



<?php if (!empty($products)): ?>
    <?php $this->getPart('layouts/parts/products_loops', compact('products')); ?>
<?php else: ?>
    <div class="d-flex flex-column align-items-center justify-content-center" style="height: 100%;">
        <h3 class="mb-3" style="color: crimson; font-size: 24px; font-weight: bold;">
            Sevimlilər yoxdur
        </h3>
        <p class="text-muted mb-3" style="font-size: 18px;">
            Hələ heç bir məhsulu sevimlilər siyahınıza əlavə etməmisiniz.
        </p>
        <a href="/" class="btn"
            style="background-color: #ffc107; color: #212529; font-size: 16px; width: 120px; height: 40px; display: flex; align-items: center; justify-content: center; border: 1px solid #ffc107;">
            Ana Səhifə
        </a>
    </div>
<?php endif; ?>





<!-- Shop Product End -->
</div>
</div>