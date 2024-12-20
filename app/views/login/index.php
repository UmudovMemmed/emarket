<div class="container d-flex justify-content-center align-items-center vh-80">
    <div class="card bg-secondary text-white" style="width: 40rem; border: 3px solid #ffc107; padding: 1rem;">
        <div class="card-body">
            <h3 class="card-title text-center mb-3 text-warning">Daxil Ol</h3>
            <form method="POST">
                <!-- İstifadəçi Adı -->
                <div class="mb-3 input-group">
                    <span class="input-group-text bg-warning text-dark" style="font-size: 1.2rem;">
                        <i class="fas fa-user"></i>
                    </span>
                    <input type="text" value="<?= get_field_value('email'); ?>" name="email"
                        class="form-control form-control-md" placeholder="E-mail" aria-label="İstifadəçi Adı">
                </div>
                <!-- Şifrə -->
                <div class="mb-3 input-group">
                    <span class="input-group-text bg-warning text-dark" style="font-size: 1.2rem;">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" name="password" class="form-control form-control-md" placeholder="Şifrə"
                        aria-label="Şifrə">
                </div>
                <!-- Giriş Düyməsi -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-warning text-dark fw-bold btn-md">
                        <i class="fas fa-sign-in-alt me-2"></i> Giriş
                    </button>
                </div>
            </form>

            <?php
            if (isset($_SESSION['form_data'])) {
                unset($_SESSION['form_data']);
            }
            ?>
            <!-- Qeydiyyat Keçidi -->
            <div class="text-center mt-3">
                <a href="<?= PATH . '/register' ?>" class="text-warning fw-bold" style="text-decoration: none;">
                    <i class="fas fa-user-plus me-1"></i> Qeydiyyatdan Keç
                </a>
            </div>
        </div>
    </div>
</div>