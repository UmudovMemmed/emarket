<!-- İçerik Başlangıcı -->
<div class="content">
    <!-- Navbar Başlangıcı -->
    <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
        <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
        </a>


        <div class="navbar-nav align-items-center ms-auto">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="<?= PATH ?>/adminpan/img/user.jpg" alt=""
                        style="width: 40px; height: 40px;">
                    <span class="d-none d-lg-inline-flex"><?= $_SESSION['user1']['fullname'] ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">

                    <a href="<?= ADMIN . '/login/logout' ?>" class="dropdown-item">Çıxış</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar Sonu -->

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex flex-column align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3 text-center">
                        <p class="mb-2">Yeni Sifarişlər</p>
                        <h3 class="mb-0"><?= $orders ?></h3>
                    </div>
                    <a href="admin/order" class="btn btn-primary mt-3 w-100">Ətraflı Məlumat</a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex flex-column align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3 text-center">
                        <p class="mb-2">Sifarişlər</p>
                        <h3 class="mb-0"><?= $orders ?></h3>
                    </div>
                    <a href="admin/order" class="btn btn-primary mt-3 w-100">Ətraflı Məlumat</a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex flex-column align-items-center justify-content-between p-4">
                    <i class="fa fa-user fa-3x text-primary"></i>
                    <div class="ms-3 text-center">
                        <p class="mb-2">İstifadəçilər</p>
                        <h3 class="mb-0"><?= $users ?></h3>
                    </div>
                    <a href="admin/user" class="btn btn-primary mt-3 w-100">Ətraflı Məlumat</a>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex flex-column align-items-center justify-content-between p-4">
                    <i class="fa fa-shopping-cart fa-3x text-primary"></i>
                    <div class="ms-3 text-center">
                        <p class="mb-2">Məhsullar</p>
                        <h3 class="mb-0"><?= $products ?></h3>
                    </div>
                    <a href="admin/product" class="btn btn-primary mt-3 w-100">Ətraflı Məlumat</a>
                </div>
            </div>
        </div>
    </div>






</div>


<div class="container bg-secondary"
    style="width: 81%; margin-left: 275px; margin-top: -435px; padding: 20px; border-radius: 10px;">
    <div style="overflow-x: auto;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2><i class="fas fa-box"></i> Sifarişlər</h2>

            <a href="/admin/order" class="btn btn-primary">
                <i class="fas fa-eye"></i> Hamsına Bax
            </a>
        </div>
        <hr style="border: 2px solid #dc3545;">

        <table class="table table-bordered bg-secondary text-white">
            <thead class="table-primary text-dark">
                <tr>
                    <th>ID</th>
                    <th>İstifadəçi adı</th>
                    <th>Məhsul adı</th>
                    <th>Miqdar</th>
                    <th>Qiymət (AZN)</th>
                    <th>Yaradılma tarixi</th>
                    <th>Durum</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($orders)): ?>
                    <tr>
                        <td colspan="8" style="text-align: center; color: red;">Sifariş tapılmadı</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($orderss as $order): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($order['id']); ?></td>
                            <td><?php echo htmlspecialchars($order['username']); ?></td>
                            <td><?php echo htmlspecialchars($order['product_title']); ?></td>
                            <td><?php echo htmlspecialchars($order['qty']); ?></td>
                            <td><?php echo htmlspecialchars($order['price']) * $order['qty']; ?></td>
                            <td><?php echo htmlspecialchars($order['created_at']); ?></td>
                            <td>
                                <?php if ($order['status'] == 0): ?>
                                    <span class="text-warning">Təsdiq etmək üçün gözlənilir</span>
                                <?php else: ?>
                                    <span class="text-success">Təsdiqləndi</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container bg-secondary"
    style="width: 81%; margin-left: 275px; margin-top: 25px; padding: 20px; border-radius: 10px;">
    <div style="overflow-x: auto;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2><i class="fas fa-users"></i> İstifadəçilər</h2>

            <a href="/admin/user" class="btn btn-primary">
                <i class="fas fa-eye"></i> Hamsına Bax
            </a>
        </div>
        <hr style="border: 2px solid #dc3545;">

        <table class="table table-bordered bg-secondary text-white">
            <thead class="table-primary text-dark">
                <tr>
                    <th>ID</th>
                    <th>İstifadəçi adı</th>
                    <th>Email</th>
                    <th>Rolu</th>

                </tr>
            </thead>
            <tbody>
                <?php if (empty($userss)): ?>
                    <tr>
                        <td colspan="8" style="text-align: center; color: red;">Sifariş tapılmadı</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($userss as $order): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($order['id']); ?></td>
                            <td><?php echo htmlspecialchars($order['fullname']); ?></td>
                            <td><?php echo htmlspecialchars($order['email']); ?></td>
                            <td><?php echo htmlspecialchars($order['role']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>







<!-- Satış və Gəlir Sonu -->
</div>