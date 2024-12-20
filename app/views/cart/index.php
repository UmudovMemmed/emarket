<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="<?= PATH ?>">Ana səhifə</a>
                <span class="breadcrumb-item active">Səbət</span>
            </nav>
        </div>
    </div>
</div>
<!-- Səbət Başlanğıcı -->

<div id="cart-modal" class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-light table-borderless table-hover text-center mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Məhsul</th>
                        <th>Qiymət</th>
                        <th>Miqdar</th>
                        <th>Ümumi</th>
                        <th>Sil</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php if (!empty($_SESSION['cart'])): ?>
                        <?php foreach ($_SESSION['cart'] as $item): ?>
                            <tr>
                                <td class="align-middle">
                                    <div style="display: flex; align-items: center;">
                                        <img src="<?= PATH . $item['img']; ?>" alt="" style="width: 50px;">
                                        <span><?= htmlspecialchars($item['title']) ?></span>
                                    </div>
                                </td>

                                <td class="align-middle">$<?= number_format($item['price'], 2) ?></td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">
                                            <a href="cart/subtractqty?id=<?= $item['id']; ?>"
                                                class="btn btn-sm btn-primary btn-minus" data-id="<?= $item['id']; ?>">
                                                <i class="fa fa-minus"></i>
                                            </a>

                                        </div>
                                        <input type="text"
                                            class="form-control form-control-sm bg-secondary border-0 text-center"
                                            value="<?= htmlspecialchars($item['qty']) ?>" data-product-id="<?= $item['id']; ?>">
                                        <!-- Ürün ID'sini input'a da ekledik -->
                                        <div class="input-group-btn">
                                            <a href="cart/addqty?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary btn-plus"
                                                data-id="<?= $item['id']; ?>">
                                                <i class="fa fa-plus"></i>
                                            </a>

                                        </div>
                                    </div>
                                </td>

                                <td class="align-middle">$<?= number_format($item['price'] * $item['qty'], 2) ?></td>
                                <td class="align-middle">
                                    <a href="cart/delete?id=<?= $item['id']; ?>" class="btn btn-danger del-item"
                                        data-id="<?= $item['id']; ?>">
                                        <i class='fas fa-trash-alt'></i>
                                    </a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Səbətiniz boşdur.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Səbət
                    Xülasəsi</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom pb-2">
                    <div class="d-flex justify-content-between mb-3">
                        <h6>Cəmi</h6>
                        <h6>$<?= number_format($_SESSION['sum.price'] ?? 0, 2) ?></h6>
                    </div>

                    <div class="d-flex justify-content-between">
                        <h6 class="font-weight-medium">Çatdırılma</h6>
                        <h6 class="font-weight-medium">
                            <?= !empty($_SESSION['cart']) ? '$10' : '$0'; ?>
                        </h6>
                    </div>

                </div>
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Ümumi Cəmi</h5>
                        <h5>
                            $<?= number_format((isset($_SESSION['sum.price']) ? $_SESSION['sum.price'] : 0) + (empty($_SESSION['cart']) ? 0 : 10), 2) ?>
                        </h5>

                    </div>
                    <a href="<?= !empty($_SESSION['cart']) ? PATH . '/contact' : '#' ?>"
                        class="btn btn-block btn-primary font-weight-bold my-3 py-3 <?= empty($_SESSION['cart']) ? 'disabled' : '' ?>">
                        Alış-verişi Tamamla
                    </a>

                </div>
            </div>
        </div>

    </div>
</div>