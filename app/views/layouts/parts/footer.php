<?php
use RedBeanPHP\R;
$footer = R::getAll("
    SELECT p.*, pd.* 
    FROM pages AS p 
    JOIN pages_description AS pd ON p.id = pd.page_id
"); ?>


<!-- Footer Başlangıcı -->
<div class="container-fluid bg-dark text-secondary mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <h5 class="text-secondary text-uppercase mb-4">
                Əlaqə Saxlayın
            </h5>
            <p class="mb-4">
                Heç bir ağrı olmadan, heç bir acı olmadan. Eşidilməz düşüncə içində
                və ruhumda ağrı olmadan. Rebum vaxtında doğru bir şey yoxdur
            </p>
            <p class="mb-2">
                <i class="fa fa-map-marker-alt text-primary mr-3"></i>123 Küçə, Nyu-York, ABŞ
            </p>
            <p class="mb-2">
                <i class="fa fa-envelope text-primary mr-3"></i>info@example.com
            </p>
            <p class="mb-0">
                <i class="fa fa-phone-alt text-primary mr-3"></i>+012
                345 67890
            </p>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">
                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">
                        Tez Alış-Veriş
                    </h5>
                    <div class="d-flex flex-column justify-content-start">
                        <?php foreach ($footer as $item): ?>
                            <a class="text-secondary mb-2" href="<?php echo htmlspecialchars($item['url']); ?>">
                                <i class="fa fa-angle-right mr-2"></i><?php echo htmlspecialchars($item['title']); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>


                <div class="col-md-4 mb-5">
                    <h5 class="text-secondary text-uppercase mb-4">
                        Bülleten
                    </h5>
                    <p>
                        İki dəfə zamanla dolu olan zaman, mükəmməl zaman
                    </p>

                    <h6 class="text-secondary text-uppercase mt-4 mb-3">
                        Bizimlə İzləyin
                    </h6>
                    <div class="d-flex">
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, 0.1) !important">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-secondary">
                &copy; <a class="text-primary" href="#">Domen</a>. Bütün
                Hüquqlar Qorunur. Dizayn edən
                <a class="text-primary" href="https://htmlcodex.com">HTML Codex</a>
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="<?= PATH; ?>/uploads/images/payments.png" alt="" />
        </div>
    </div>
</div>
<!-- Footer Son -->

<!-- Yuxarı Qayıt -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>




<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>


<!-- Bootstrap 5 JS (Bundle includes Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- JavaScript Kitabxanaları -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="<?= PATH; ?>/assets/lib/easing/easing.min.js"></script>
<script src="<?= PATH; ?>/assets/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Əlaqə JavaScript Faylı -->
<script src="<?= PATH; ?>/assets/mail/jqBootstrapValidation.min.js"></script>
<script src="<?= PATH; ?>/assets/mail/contact.js"></script>

<!-- Şablon JavaScript -->
<script src="<?= PATH; ?>/assets/bootstrap/js/main.js"></script>

</body>