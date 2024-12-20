<div class="container d-flex justify-content-center align-items-center vh-80">
    <div class="card bg-secondary text-white" style="width: 40rem; border: 3px solid #ffc107; padding: 1rem;">
        <div class="card-body">
            <h3 class="card-title text-center mb-3 text-warning">Qeydiyyatdan Keç</h3>
            <form method="POST">
                <!-- Ad -->
                <div class="mb-3 input-group">
                    <span class="input-group-text bg-warning text-dark" style="font-size: 1.2rem;">
                        <i class="fas fa-user"></i>
                    </span>
                    <input type="text" class="form-control form-control-md" value="<?= get_field_value('fullname'); ?>"
                        name="fullname" placeholder="Ad Soyad" aria-label="Ad">
                </div>

                <!-- Email -->
                <div class="mb-3 input-group">
                    <span class="input-group-text bg-warning text-dark" style="font-size: 1.2rem;">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input type="email" value="<?= get_field_value('email'); ?>" class="form-control form-control-md"
                        name="email" placeholder="Email" aria-label="Email">
                </div>

                <!-- Ünvan -->
                <div class="mb-3 input-group">
                    <span class="input-group-text bg-warning text-dark" style="font-size: 1.2rem;">
                        <i class="fas fa-map-marker-alt"></i>
                    </span>
                    <input type="text" value="<?= get_field_value('address'); ?>" class="form-control form-control-md"
                        name="address" placeholder="Ünvan" aria-label="Ünvan">
                </div>

                <!-- Şifrə -->
                <div class="mb-3 input-group">
                    <span class="input-group-text bg-warning text-dark" style="font-size: 1.2rem;">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input type="password" class="form-control form-control-md" name="password" placeholder="Parol"
                        aria-label="Parol">
                </div>

                <!-- Qeydiyyat Düyməsi -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-warning text-dark fw-bold btn-md">
                        <i class="fas fa-user-plus me-2"></i> Qeydiyyatdan Keç
                    </button>
                </div>
            </form>

            <?php
            if (isset($_SESSION['form_data'])) {
                unset($_SESSION['form_data']);
            }
            ?>

            <!-- Daxil Ol Linki -->
            <div class="text-center mt-3">
                <a href="<?= PATH . '/login' ?>" class="text-warning" style="text-decoration: none; font-size: 1rem;">
                    <i class="fas fa-sign-in-alt me-1"></i> Daxil Ol
                </a>
            </div>
        </div>
    </div>
</div>