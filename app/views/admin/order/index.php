<div class="container mt-0 bg-secondary" style="margin-left: 270px; padding: 20px;">


    <div style="overflow-x: auto;">

        <h2><i class="fas fa-box"></i> Sifarişlər</h2>

        <hr style="border: 2px solid #dc3545;">

        <!-- Arama Formu -->
        <form action="" method="get" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Ad Soyad ilə Axtar"
                    value="<?php echo htmlspecialchars($search ?? '', ENT_QUOTES); ?>"
                    style="background-color: white; color: black;" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Ad Soyad ilə Axtar'">
                <button class="btn btn-primary" type="submit">Axtar</button>
            </div>
        </form>
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
                    <th>Əməliyyatlar</th>
                </tr>
            </thead>

            <tbody>
                <?php if (empty($orders)): ?>
                    <tr>
                        <td colspan="8" style="text-align: center; color: red;">Sifariş tapılmadı</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($orders as $order): ?>
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

                            <td>
                                <a href="/admin/order/edit?id=<?php echo htmlspecialchars($order['id']); ?>"
                                    class="btn btn-sm btn-success">Əlavə məlumat</a>
                                <a href="/admin/order/delete?id=<?php echo htmlspecialchars($order['id']); ?>"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Silmek istədiyinizə əminsiniz?')">Sil</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Sayfalama -->
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li class="page-item <?php echo ($page == 1) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?page=1<?php echo isset($search) ? '&search=' . urlencode($search) : ''; ?>"
                    aria-label="Əvvəl">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                    <a class="page-link"
                        href="?page=<?php echo $i; ?><?php echo isset($search) ? '&search=' . urlencode($search) : ''; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <li class="page-item <?php echo ($page == $totalPages) ? 'disabled' : ''; ?>">
                <a class="page-link"
                    href="?page=<?php echo $totalPages; ?><?php echo isset($search) ? '&search=' . urlencode($search) : ''; ?>"
                    aria-label="Son">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>