<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">

                <span class="breadcrumb-item active">Axtarılan Kelime:&nbsp;<b><?= $query; ?></b></span>

            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <!-- Məhsul Mağazası Başlayır -->
        <div class="col-lg-12 col-md-12">
            <div class="row pb-3">

                <!-- Məhsullar Siyahısı -->
                <div class="row">
                    <?php if (!empty($products)): ?>
                        <?php $this->getPart('layouts/parts/products_loops', compact('products')); ?>
                        <div class="col-12">
                            <nav>
                                <ul class="pagination justify-content-center">
                                    <?php if ($page > 1): ?>
                                        <li class="page-item">
                                            <a class="page-link"
                                                href="?query=<?= urlencode($query) ?>&page=<?= $page - 1 ?>">Öncəki</a>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item disabled"><a class="page-link">Öncəki</a></li>
                                    <?php endif; ?>

                                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                        <?php if ($i == $page): ?>
                                            <li class="page-item active"><a class="page-link"><?= $i ?></a></li>
                                        <?php else: ?>
                                            <li class="page-item"><a class="page-link"
                                                    href="?query=<?= urlencode($query) ?>&page=<?= $i ?>"><?= $i ?></a></li>
                                        <?php endif; ?>
                                    <?php endfor; ?>

                                    <?php if ($page < $total_pages): ?>
                                        <li class="page-item">
                                            <a class="page-link"
                                                href="?query=<?= urlencode($query) ?>&page=<?= $page + 1 ?>">Sonraki</a>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item disabled"><a class="page-link">Sonraki</a></li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    <?php else: ?>
                        <div class="d-flex justify-content-center align-items-center" style="height: 40vh;">
                            <div class="text-center p-4 bg-light shadow-sm rounded" style="max-width: 600px; width: 100%;">
                                <h3 class="text-warning font-weight-bold" style="font-size: 24px; color: #e6a900;">Heç bir
                                    məhsul tapılmadı</h3>
                                <p class="text-muted" style="font-size: 14px;">Üzr istəyirik, axtardığınız kriterlərə uyğun
                                    heç bir məhsul tapılmadı. Zəhmət olmasa, fərqli filtrelər sınayın və ya ana səhifəyə
                                    qayıdın.</p>
                                <a href="/" class="btn btn-warning btn-sm">Ana səhifəyə dön</a>
                            </div>
                        </div>
                    <?php endif; ?>





                    <!-- Digər Məhsullar da Bu Strukturda Davam Edir -->



                </div>
                <!-- Məhsul Mağazası Bitir -->
            </div>
        </div>
    </div>
</div>



<!-- Shop End -->