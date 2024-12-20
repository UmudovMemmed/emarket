<div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Başlangıcı -->
    <div id="spinner"
        class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Yüklənir...</span>
        </div>
    </div>
    <!-- Spinner Sonu -->


    <!-- Giriş Başlangıcı -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Admin Panel</h3>
                        </a>
                        <h3>Giriş</h3>
                    </div>

                    <!-- Form Başlangıcı -->
                    <form action="" method="POST">
                        <div class="form-floating mb-3">
                            <input type="email" value="<?= get_field_value('email'); ?>" class="form-control"
                                id="floatingInput" name="email" placeholder="adınız@örnek.com" required>
                            <label for="floatingInput">Email ünvanı</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" name="password"
                                placeholder="Şifrə" required>
                            <label for="floatingPassword">Şifrə</label>
                        </div>

                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Giriş</button>
                    </form>
                    <!-- Form Sonu -->

                </div>
            </div>
        </div>
    </div>


    <?php
    if (isset($_SESSION['form_data'])) {
        unset($_SESSION['form_data']);
    }
    ?>
    <!-- Giriş Sonu -->