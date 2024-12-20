<div class="container mt-5">
    <h2 class="text-center">Profilinizi Dəyişdirin</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Kullanıcı Bilgilerini Gösterme ve Güncelleme Formu -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Məlumatlarım</h5>

                    <!-- Kullanıcı Bilgileri -->
                    <form action="<?= PATH . '/login/uptade' ?>" method="POST">

                        <div class="mb-3">
                            <label for="email" class="form-label">E-poçt</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?= $_SESSION['user']['email'] ?>" required disabled>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Ad Soyad</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ad Soyad">
                        </div>


                        <div class="mb-3">
                            <label for="address" class="form-label">Unvan</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Unvan">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Şifrə</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Yeni şifrə">
                        </div>

                        <!-- Bilgileri Güncelleme Butonu -->
                        <button type="submit" class="btn btn-warning w-100 mt-3">Dəyişdir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>