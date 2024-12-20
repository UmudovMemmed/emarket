<div class="container mt-0 bg-secondary p-4 rounded"
    style="margin-left: 270px; background-color: #2a2a2a; color: white;">
    <h2><i class="fas fa-users"></i> İstifadəçilər</h2>
    <hr style="border: 2px solid #dc3545;">

    <!-- Arama Formu -->
    <form action="" method="get" class="mb-3">
        <div class="input-group">
            <!-- Tam beyaz arka plan ve siyah placeholder -->
            <input type="text" class="form-control" name="search" placeholder="Ad Soyad ilə Axtar"
                value="<?php echo htmlspecialchars($search ?? '', ENT_QUOTES); ?>"
                style="background-color: white; color: black;" placeholder="Axtar..." onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Ad Soyad ilə Axtar'">
            <button class="btn btn-primary" type="submit">Axtar</button>
        </div>
    </form>

    <div style="overflow-x: auto;">
        <table class="table table-bordered bg-secondary text-white">
            <thead class="table-primary text-dark">
                <tr>
                    <th>ID</th>
                    <th>Ad Soyad</th>
                    <th>Email</th>
                    <th>Rolu</th> <!-- Yeni Sütun -->
                    <th>Əməliyyatlar</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($users)): ?>
                    <tr>
                        <td colspan="5" style="text-align:center; color:red;">İstifadəçi tapılmadı</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['id']); ?></td>
                            <td><?php echo htmlspecialchars($user['fullname']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>

                            <!-- Rol Sütunu -->
                            <td>
                                <?php
                                if ($user['role'] == 'admin') {
                                    echo 'Admin';
                                } else {
                                    echo 'İstifadəçi';
                                }
                                ?>
                            </td>

                            <td>
                                <a href="/admin/user/edit?id=<?php echo htmlspecialchars($user['id']); ?>"
                                    class="btn btn-sm btn-warning">Düzəliş et</a>
                                <a href="/admin/user/delete?id=<?php echo htmlspecialchars($user['id']); ?>"
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