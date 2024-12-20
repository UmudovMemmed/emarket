<div class="container bg-secondary text-white" style="margin-left: 268px;  padding: 20px; border-radius: 8px;">
    <h2 class="mb-4"><i class="fas fa-cogs"></i> Footer</h2>

    <hr style="border: 2px solid #dc3545;">

    <!-- Əlavə Et Düyməsi -->
    <div class="d-flex justify-content-between mb-3">
        <a href="/admin/footer/add" class="btn btn-primary">
            <i class="fas fa-plus"></i> Yeni Footer Əlavə Et
        </a>
    </div>


    <!-- Footer Siyahısı -->
    <table class="table table-bordered bg-secondary text-white">
        <thead class="table-primary text-dark">
            <tr>
                <th>id</th>
                <th>Bağlantı Adı</th>
                <th>slug</th>
                <th>Bağlantı Ünvanı</th>
                <th>Əməliyyatlar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pages as $page): ?>
                <tr>
                    <td><?= $page['id'] ?></td>
                    <td><?= $page['title'] ?></td>
                    <td><?= $page['slug'] ?></td>
                    <td><a href="<?= $page['url'] ?>" target="_blank" class="text-white"><?= $page['url'] ?></a></td>
                    <td>
                        <a href="/admin/footer/edit?id=<?= $page['id'] ?>" class="btn btn-warning btn-sm">Redaktə et</a>
                        <a href="/admin/footer/delete?id=<?= $page['id'] ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Əminsiniz?');">Sil</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>