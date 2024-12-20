<!DOCTYPE html>
<html lang="en">

<?php
use RedBeanPHP\R;

function getAllCategoriesWithDescription(): array
{
    return R::getAll("SELECT c.*, cd.* FROM  categories c
        JOIN  category_description cd ON c.id = cd. category_id ");
}
$categories = getAllCategoriesWithDescription();




?>


<head>
    <meta charset="utf-8" />

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <?= $this->getMeta(); ?>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="<?= PATH; ?>/assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= PATH; ?>/assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= PATH; ?>/assets/bootstrap/css/style.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">



</head>
<style>
    .dropdown-menu .dropdown-item:hover {
        background-color: #f1c40f;
        /* Dark Yellow background */
        color: white;
        /* White text color */
    }
</style>

<body>

    <!-- Topbar Start -->
    <div class="container-fluid">

        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">E-Mar</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">ket</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form id="searchForm">
                    <div class="input-group">
                        <input type="text" class="form-control" name="query" placeholder="Məhsulları axtarın" />
                        <div class="input-group-append">
                            <button type="button" class="search input-group-text bg-transparent text-primary"
                                onclick="submitSearch()">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">Müştəri Xidməti</p>
                <h5 class="m-0">+012 345 6789</h5>
            </div>
        </div>
    </div>

    <!-- Topbar End -->

    <!-- Navbar Start -->
    <div class="container-fluid bg-dark mb-30">
        <div class="row px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse"
                    href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                    <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light"
                    id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                    <div class="navbar-nav w-100">
                        <?php
                        // Ana kategorileri (parent_id == 0) filtrele
                        foreach ($categories as $category):
                            if ($category['parent_id'] == 0):
                                // Alt kategori olup olmadığını kontrol et
                                $has_subcategories = false;
                                foreach ($categories as $subcategory):
                                    if ($subcategory['parent_id'] == $category['id']):
                                        $has_subcategories = true;
                                        break;
                                    endif;
                                endforeach;
                                ?>
                                <div class="nav-item dropdown dropright">
                                    <a href="/category/<?php echo $category['slug']; ?>"
                                        class="nav-link <?= $has_subcategories ? 'dropdown-toggle' : '' ?>"
                                        data-toggle="<?= $has_subcategories ? 'dropdown' : '' ?>" aria-haspopup="true"
                                        aria-expanded="false">
                                        <!-- Kategori başlığını tıklanabilir yap -->
                                        <span class="category-title"><?= $category['title'] ?></span>
                                        <?php if ($has_subcategories): ?>
                                            <i class="fa fa-angle-right float-right mt-1"></i>
                                        <?php endif; ?>
                                    </a>
                                    <?php if ($has_subcategories): ?>
                                        <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                            <?php
                                            // Alt kategorileri listele
                                            foreach ($categories as $subcategory):
                                                if ($subcategory['parent_id'] == $category['id']):
                                                    ?>
                                                    <a href="/category/<?php echo $subcategory['slug']; ?>"
                                                        class="dropdown-item"><?= $subcategory['title'] ?></a>
                                                    <?php
                                                endif;
                                            endforeach;
                                            ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php
                            endif;
                        endforeach;
                        ?>
                    </div>
                </nav>
            </div>


            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                        <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="<?= PATH ?>" class="nav-item nav-link ">Ana Səhifə</a>


                        </div>
                        <div class="navbar-nav ml-auto py-0 d-none d-lg-flex align-items-center">
                            <!-- User Icon and Dropdown -->
                            <div class="dropdown">
                                <a href="#" class="btn px-0" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <?php if (isset($_SESSION['user'])): ?>
                                        <!-- Display the full name if the user is logged in -->
                                        <?= $_SESSION['user1']['fullname']; ?>&nbsp;&nbsp;&nbsp;<i
                                            class="fas fa-user text-primary"></i>
                                    <?php else: ?>
                                        &nbsp;&nbsp;&nbsp;<i class="fas fa-user text-primary"></i>
                                    <?php endif; ?>


                                    <i class="fas fa-chevron-down text-primary fa-sm"></i>

                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <?php if (isset($_SESSION['user'])): ?>

                                        <a href="<?= PATH . '/login/profile' ?>" class="dropdown-item">Profil</a>
                                        <a href="<?= PATH . '/login/logout' ?>" class="dropdown-item">Çıxış</a>
                                    <?php else: ?>

                                        <a href="<?= PATH . '/login' ?>" class="dropdown-item">Giriş</a>
                                        <a href="<?= PATH . '/register' ?>" class="dropdown-item">Qeydiyyat</a>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <!-- Wishlist Link -->
                            <a href="<?= PATH . '/wishlist' ?>" class="btn px-0 ml-3">
                                <i class="fas fa-heart text-primary"></i> <!-- Heart icon stays the same size -->
                            </a>

                            <!-- Cart Link -->
                            <a href="<?= PATH . '/cart' ?>" class="btn px-0 ml-3">
                                <i class="fas fa-shopping-cart text-primary"></i> <!-- Cart icon stays the same size -->
                                <span id="cart-quantity"
                                    class="badge text-secondary border border-secondary rounded-circle"
                                    style="padding-bottom: 2px" data-quantity="<?= $_SESSION['sum.qty'] ?? 0 ?>">
                                    <?= $_SESSION['sum.qty'] ?? 0 ?>
                                </span>
                            </a>
                        </div>


                    </div>
                </nav>
            </div>
        </div>
    </div>