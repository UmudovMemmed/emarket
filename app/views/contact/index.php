<!-- Yönlendirme Başlangıç -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="<?= PATH ?>">Ana Səhifə</a>
                <span class="breadcrumb-item active">Ödəniş</span>
            </nav>
        </div>
    </div>
</div>
<!-- Yönlendirme Bitiş -->


<!-- Əlaqə Başlanğıcı -->
<div class="container-fluid">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">
            Ödəniş</span></h2>
    <?php if (!empty($_SESSION['user'])): ?>
        <div class="row px-xl-5">
            <div class="col-lg-7 mb-5">
                <div class="contact-form bg-light p-30">
                    <div id="success"></div>
                    <?php if (empty($_SESSION['cart'])): ?>
                        <p style="color: red;">Səbətinizdə məhsul yoxdur. Lütfən, məhsul əlavə edin.</p>
                        <!-- Form fields will be disabled -->
                        <form method="post">

                            <div class="control-group">
                                <input type="text" class="form-control" id="cardHolderName" name="cardHolderName"
                                    placeholder="Kart sahibinin adını daxil edin"
                                    data-validation-required-message="Zəhmət olmasa kart sahibinin adını daxil edin" disabled />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="text" class="form-control" id="cardNumber" name="cardNumber"
                                    placeholder="Kart nömrəsini daxil edin"
                                    data-validation-required-message="Zəhmət olmasa kart nömrəsini daxil edin" disabled />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <label for="expiryDate">Son istifadə tarixi</label>
                                <div style="display: flex; gap: 10px;">
                                    <!-- Ay seçimi -->
                                    <select class="form-control" id="expiryMonth" name="expiryMonth" disabled
                                        data-validation-required-message="Zəhmət olmasa ayı seçin">
                                        <option value="">Ay</option>
                                        <option value="01">01 - Yanvar</option>
                                        <option value="02">02 - Fevral</option>
                                        <option value="03">03 - Mart</option>
                                        <option value="04">04 - Aprel</option>
                                        <option value="05">05 - May</option>
                                        <option value="06">06 - İyun</option>
                                        <option value="07">07 - İyul</option>
                                        <option value="08">08 - Avqust</option>
                                        <option value="09">09 - Sentyabr</option>
                                        <option value="10">10 - Oktyabr</option>
                                        <option value="11">11 - Noyabr</option>
                                        <option value="12">12 - Dekabr</option>
                                    </select>

                                    <!-- İl seçimi -->
                                    <select class="form-control" id="expiryYear" name="expiryYear" disabled
                                        data-validation-required-message="Zəhmət olmasa ili seçin">
                                        <option value="">İl</option>
                                        <?php
                                        $currentYear = date("Y");
                                        for ($i = 0; $i <= 13; $i++) {
                                            echo "<option value='" . ($currentYear + $i) . "'>" . ($currentYear + $i) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="password" class="form-control" id="cvv" name="cvv" placeholder="CVV" disabled
                                    data-validation-required-message="Zəhmət olmasa CVV-ni daxil edin" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <button type="submit" class="btn btn-primary" disabled>
                                    Ödəniş Et
                                </button>
                            </div>
                        </form>
                    <?php else: ?>
                        <!-- Form fields are active and can be filled out if there is a cart -->
                        <form method="post">



                            <div class="control-group">
                                <input type="text" class="form-control" id="cardHolderName" name="cardHolderName"
                                    placeholder="Kart sahibinin adını daxil edin"
                                    data-validation-required-message="Zəhmət olmasa kart sahibinin adını daxil edin" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="text" class="form-control" id="cardNumber" name="cardNumber"
                                    placeholder="Kart nömrəsini daxil edin"
                                    data-validation-required-message="Zəhmət olmasa kart nömrəsini daxil edin" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <label for="expiryDate">Son istifadə tarixi</label>
                                <div style="display: flex; gap: 10px;">
                                    <!-- Ay seçimi -->
                                    <select class="form-control" id="expiryMonth" name="expiryMonth"
                                        data-validation-required-message="Zəhmət olmasa ayı seçin">
                                        <option value="">Ay</option>
                                        <option value="01">01 - Yanvar</option>
                                        <option value="02">02 - Fevral</option>
                                        <option value="03">03 - Mart</option>
                                        <option value="04">04 - Aprel</option>
                                        <option value="05">05 - May</option>
                                        <option value="06">06 - İyun</option>
                                        <option value="07">07 - İyul</option>
                                        <option value="08">08 - Avqust</option>
                                        <option value="09">09 - Sentyabr</option>
                                        <option value="10">10 - Oktyabr</option>
                                        <option value="11">11 - Noyabr</option>
                                        <option value="12">12 - Dekabr</option>
                                    </select>

                                    <!-- İl seçimi -->
                                    <select class="form-control" id="expiryYear" name="expiryYear"
                                        data-validation-required-message="Zəhmət olmasa ili seçin">
                                        <option value="">İl</option>
                                        <?php
                                        $currentYear = date("Y");
                                        for ($i = 0; $i <= 13; $i++) {
                                            echo "<option value='" . ($currentYear + $i) . "'>" . ($currentYear + $i) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <input type="password" class="form-control" id="cvv" name="cvv" placeholder="CVV"
                                    data-validation-required-message="Zəhmət olmasa CVV-ni daxil edin" />
                                <p class="help-block text-danger"></p>
                            </div>

                            <div class="control-group">
                                <button type="submit" class="btn btn-primary">
                                    Ödəniş Et
                                </button>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-5 mb-5">
                <div class="bg-light p-30 mb-30">
                    <h5 class="mb-4">Səbətdəki Məhsullar</h5>
                    <?php if (!empty($_SESSION['cart'])): // Səbət boş deyil ?>
                        <ul class="list-group">
                            <?php
                            $totalPrice = 0; // Ümumi qiymət üçün dəyişən
                            foreach ($_SESSION['cart'] as $product):
                                // Məhsulun ümumi qiymətini hesablayırıq
                                $totalPrice += $product['price'] * $product['qty'];
                                ?>
                                <li class="list-group-item d-flex align-items-center">
                                    <!-- Məhsul Şəkli -->
                                    <img src="<?= PATH . $product['img'] ?>" alt="<?= htmlspecialchars($product['title']) ?>"
                                        style="width: 50px; height: 50px; object-fit: cover; margin-right: 10px;">

                                    <!-- Məhsul Məlumatları -->
                                    <div style="flex-grow: 1;">
                                        <h6 class="mb-0"><a style="color:black;"
                                                href="<?= PATH . '/product/' . $product['slug'] ?>"><?= htmlspecialchars($product['title']) ?></a>
                                        </h6>
                                        <small class="text-muted">
                                            <?php if (!empty($product['old_price'])): ?>
                                                <del><?= number_format($product['old_price'], 2) ?> ₼</del>
                                            <?php endif; ?>
                                            <strong><?= number_format($product['price'], 2) ?> ₼</strong>
                                        </small>
                                    </div>

                                    <!-- Məhsul Miqdarı -->
                                    <span class="badge badge-primary badge-pill"><?= $product['qty'] ?> ədəd</span>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <!-- Ümumi Qiymət -->
                        <div class="mt-3">
                            <h6 class="text-right">Ümumi Qiymət: <strong><?= number_format($totalPrice, 2) ?> ₼</strong></h6>
                        </div>
                    <?php else: // Səbət boşdur ?>
                        <div class="alert alert-warning text-center">
                            <strong>Səbətdə məhsul yoxdur.</strong>
                        </div>
                    <?php endif; ?>
                </div>
            </div>




        </div>
    <?php else: ?>
        <!-- Oturum yoksa sadece bu kısmı göster -->
        <div class="col-12 text-center p-5 my-4"
            style="background-color: #f8f9fa; border: 1px solid #dee2e6; border-radius: 12px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
            <h5 style="color: red; font-weight: bold; margin-bottom: 20px;">Sistemə daxil olmamısınız</h5>
            <p class="mb-4" style="color: #6c757d; font-size: 1.1rem;">Davam etmək üçün qeydiyyat olun və ya daxil olun.</p>
            <div class="d-flex justify-content-center gap-4 mt-3">
                <a href="/login" class="btn btn-warning btn-lg px-4 py-2"
                    style="min-width: 160px; font-size: 1rem; font-weight: bold;">
                    <i class="fas fa-sign-in-alt"></i> Daxil Ol
                </a>
                <a href="/register" class="btn btn-warning btn-lg px-4 py-2"
                    style="min-width: 160px; font-size: 1rem; font-weight: bold;">
                    <i class="fas fa-user-plus"></i> Qeydiyyat
                </a>
            </div>
        </div>
    <?php endif; ?>



</div>
<!-- Əlaqə Bitdi -->