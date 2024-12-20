<div class="container mt-4" style="margin-left: 280px;">


    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">
            <h4 class="m-0">Sifariş Detalları</h4>
        </div>
        <div class="card-body bg-light">
            <table class="table table-bordered table-striped table-dark">
                <tr>
                    <th>İstifadəçi adı</th>
                    <td><?php echo htmlspecialchars($order[0]['username']); ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo htmlspecialchars($order[0]['email']); ?></td>
                </tr>
                <tr>
                    <th>Ünvan</th>
                    <td><?php echo htmlspecialchars($order[0]['address']); ?></td>
                </tr>
                <tr>
                    <th>Məhsul adı</th>
                    <td><?php echo htmlspecialchars($order[0]['product_title']); ?></td>
                </tr>
                <tr>
                    <th>Miqdar</th>
                    <td><?php echo htmlspecialchars($order[0]['qty']); ?></td>
                </tr>
                <tr>
                    <th>Qiymət (AZN)</th>
                    <td><?php echo number_format($order[0]['price'] * $order[0]['qty'], 2); ?> AZN</td>
                </tr>

                <tr>
                    <th>Yaradılma tarixi</th>
                    <td><?php echo htmlspecialchars($order[0]['created_at']); ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><?php echo ($order[0]['status'] == 0) ? 'Təsdiq etmək üçün gözlənilir' : 'Təsdiqləndi'; ?></td>
                </tr>
            </table>

            <div class="d-flex flex-column align-items-center">
                <?php if (!empty($order[0]['status']) && $order[0]['status'] == 1): ?>
                    <!-- Sifariş təsdiqlənmişsə, disabled yaşıl düymə -->
                    <button class="btn btn-sm btn-success w-50 mb-2" disabled>
                        Təsdiqləndi
                    </button>
                <?php else: ?>
                    <!-- Sifariş təsdiqlənməmişsə, təsdiqlə düyməsi -->
                    <a class="btn btn-primary w-50 mb-2"
                        href="/admin/order/edit?id=<?= htmlspecialchars($order[0]['id']); ?>&confirm=1"
                        onclick="return confirm('Sifarişi təsdiqləmək istəyirsiniz?')">
                        Sifarişi Təsdiq Et
                    </a>

                <?php endif; ?>
                <a href="/admin/order" class="btn btn-secondary w-50">Geri Qayıt</a>
            </div>






        </div>
    </div>
</div>