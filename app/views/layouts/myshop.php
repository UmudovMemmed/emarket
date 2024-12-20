<?php
use core\View;

/** @var $this View */

?>

<?php $this->getPart('layouts/parts/header'); ?>
<?php if (!empty($_SESSION['success'])): ?>
    <div class="container mt-3">
        <div class="alert alert-success alert-dismissible fade show text-dark" role="alert"
            style="background-color: #28a745; border: 1px solid #218838;">
            <strong>Uğurla tamamlandı!</strong>
            <p><?= $_SESSION['success']; ?></p>
            <?php unset($_SESSION['success']); ?>
            <!-- Kapanma butonu -->
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>


<?php if (!empty($_SESSION['errors'])): ?>
    <div class="container mt-3">
        <div class="alert alert-warning alert-dismissible fade show text-dark" role="alert"
            style="background-color: #FFC107; border: 1px solid #FFA000;">
            <strong>Diqqət!</strong> Aşağıdakı xəta var:
            <ul class="mb-0" style="list-style: none; padding-left: 0;">
                <?php
                if (isset($_SESSION['errors']) && is_array($_SESSION['errors'])):
                    foreach ($_SESSION['errors'] as $error):
                        // Check if the error is an array, and if so, implode it into a string
                        if (is_array($error)) {
                            $error = implode(', ', $error);  // Join array elements with a comma
                        }
                        ?>
                        <li>- <?= htmlspecialchars($error); ?></li>
                    <?php endforeach; endif; ?>
            </ul>

            <?php unset($_SESSION['errors']); ?>
            <!-- Kapanma butonu -->
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
<?php endif; ?>


<?php if (!empty($_SESSION['error'])): ?>
    <div class="container mt-3">
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





<?= $this->content; ?>

<?php $this->getPart('layouts/parts/footer'); ?>