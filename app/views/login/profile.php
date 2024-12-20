<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <h2>Sifarişlərim</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Məhsul Adı</th>
                            <th>Tarix</th>
                            <th>Ədəd</th>
                            <th>Cəm</th>
                            <th>Ünvan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= htmlspecialchars($order['product_title']); ?></td>
                                <td><?= htmlspecialchars($order['created_at']); ?></td>
                                <td><?= htmlspecialchars($order['qty']); ?></td>
                                <td><?= number_format($order['price'] * $order['qty'], 2) . '$'; ?></td>
                                <td>
                                    <?= $order['address'] ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Sayfalama Linkleri -->
            <nav>
                <ul class="pagination">
                    <li class="page-item <?= $page <= 1 ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=1" aria-label="Birinci">
                            <span aria-hidden="true">&laquo;&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item <?= $page <= 1 ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?= $page - 1; ?>" aria-label="Önceki">
                            <span aria-hidden="true">&lsaquo;</span>
                        </a>
                    </li>

                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= $i == $page ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                        </li>
                    <?php endfor; ?>

                    <li class="page-item <?= $page >= $totalPages ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?= $page + 1; ?>" aria-label="Sonraki">
                            <span aria-hidden="true">&rsaquo;</span>
                        </a>
                    </li>
                    <li class="page-item <?= $page >= $totalPages ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?= $totalPages; ?>" aria-label="Son">
                            <span aria-hidden="true">&raquo;&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Sağ Taraf - Məlumatlarım ve Çıxış -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="color: darkorange;">Məlumatlarım</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Ad Soyad: <?= $_SESSION['user1']['fullname'] ?></li>
                        <li class="list-group-item">Ünvan: <?= $_SESSION['user1']['address'] ?></li>
                        <li class="list-group-item">E-poçt: <?= $_SESSION['user']['email'] ?></li>
                    </ul>
                    <a href="<?= PATH . '/login/uptade' ?>" class="btn btn-warning w-100 mt-3">Dəyişdir</a>
                    <a href="<?= PATH . '/login/logout' ?>" class="btn btn-primary mt-3 w-100">Çıxış</a>
                </div>
            </div>
        </div>
    </div>
</div>