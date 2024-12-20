<?php $this->getPart('layouts/admin/parts/header'); ?>
<?php if (!empty($_SESSION['success'])): ?>
    <div class="container mt-3" style="margin-left:440px; width: 54%;">
        <div class="alert alert-success alert-dismissible fade show text-dark" role="alert"
            style="background-color: #28a745; border: 1px solid #218838;">
            <strong>Uğurla tamamlandı!</strong>
            <ul>
                <li><?= htmlspecialchars($_SESSION['success']); ?></li> <!-- htmlspecialchars to prevent XSS -->
            </ul>
            <?php unset($_SESSION['success']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>

<?php if (!empty($_SESSION['errors'])): ?>
    <div class="container mt-3" style="margin-left:440px; width: 54%;">
        <div class="alert alert-danger alert-dismissible fade show text-dark" role="alert"
            style="background-color: #dc3545; border: 1px solid #c82333;">
            <strong>Diqqət!</strong>
            <ul>
                <?php foreach ($_SESSION['errors'] as $field => $messages): ?>
                    <?php foreach ($messages as $message): ?>
                        <li><?= htmlspecialchars($message) ?></li> <!-- Display each error message -->
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </ul>
            <?php unset($_SESSION['errors']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>


<?php if (!empty($_SESSION['error'])): ?>
    <div class="container mt-3" style="margin-left:440px; width: 54%;">
        <div class="alert alert-warning alert-dismissible fade show text-dark" role="alert"
            style="background-color: #FFC107; border: 1px solid #FFA000;">
            <strong>Diqqət!</strong> Aşağıdakı xəta var:
            <ul class="mb-0" style="list-style: none; padding-left: 0;">
                <li>- <?= $_SESSION['error']; ?></li>
            </ul>
            <?php unset($_SESSION['error']); ?>
            <!-- Kapanma butonu -->
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>

<?php $this->getPart('layouts/admin/parts/sidebar'); ?>


<?= $this->content; ?>


<?php $this->getPart('layouts/admin/parts/footer'); ?>