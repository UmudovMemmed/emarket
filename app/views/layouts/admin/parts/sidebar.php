<!-- Yan Panel Başlangıcı -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="<?= PATH ?>" class="navbar-brand mx-4 mb-3" target="_blank">
            <h3 class="text-primary"><i class="fa fa-home me-2"></i>
                Sayta keç</h3>
        </a>



        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="<?= PATH ?>/adminpan/img/user.jpg" alt=""
                    style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3" style="display: flex; flex-direction: column; align-items: flex-start;">
                <h6 class="mb-0"
                    style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                    <?= htmlspecialchars($_SESSION['user1']['fullname']) ?>
                    <a href="http://e-market.loc/admin/login/logout" class="btn btn-primary"
                        style="margin-left: 10px;">Çıxış</a>

                </h6>

            </div>


        </div>
        <div class="navbar-nav w-100">
            <a href="<?= ADMIN ?>"
                class="nav-item nav-link mb-3 <?= ($_SERVER['REQUEST_URI'] === '/admin') ? 'active' : '' ?>">
                <i class="fa fa-tachometer-alt me-2"></i>İdarə Paneli
            </a>
            <a href="<?= ADMIN . '/category' ?>"
                class="nav-item nav-link mb-3 <?= (strpos($_SERVER['REQUEST_URI'], '/category') !== false) ? 'active' : '' ?>">
                <i class="fa fa-table me-2"></i>Kateqoriyalar
            </a>
            <a href="<?= ADMIN . '/product' ?>"
                class="nav-item nav-link mb-3 <?= (strpos($_SERVER['REQUEST_URI'], '/product') !== false) ? 'active' : '' ?>">
                <i class="fa fa-th me-2"></i>Məhsullar
            </a>
            <a href="<?= ADMIN . '/user' ?>"
                class="nav-item nav-link mb-3 <?= (strpos($_SERVER['REQUEST_URI'], '/user') !== false) ? 'active' : '' ?>">
                <i class="fa fa-user me-2"></i>İstifadəçilər
            </a>
            <a href="<?= ADMIN . '/order' ?>"
                class="nav-item nav-link mb-3 <?= (strpos($_SERVER['REQUEST_URI'], '/order') !== false) ? 'active' : '' ?>">
                <i class="fa fa-shopping-cart me-2"></i>Sifarişlər
            </a>
            <a href="<?= ADMIN . '/slider' ?>"
                class="nav-item nav-link mb-3 <?= (strpos($_SERVER['REQUEST_URI'], '/slider') !== false) ? 'active' : '' ?>">
                <i class="fa fa-sliders-h me-2"></i>Sliders
            </a>

            <a href="<?= ADMIN . '/footer' ?>"
                class="nav-item nav-link mb-3 <?= (strpos($_SERVER['REQUEST_URI'], '/footer') !== false) ? 'active' : '' ?>">
                <i class="fa fa-info-circle me-2"></i>Footer
            </a>
        </div>



    </nav>
</div>
<!-- Yan Panel Sonu -->