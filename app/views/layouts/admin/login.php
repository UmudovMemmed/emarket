<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin :: Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= PATH ?>/adminpan/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= PATH ?>/adminpan/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= PATH ?>/adminpan/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= PATH ?>/adminpan/css/style.css" rel="stylesheet">
</head>

<body>



    <?php if (!empty($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert"
            style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); max-width: 500px; width: 100%; z-index: 1050; text-align: center;">
            <i class="fa fa-exclamation-circle me-2"></i><?= $_SESSION['error']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>





    <?= $this->content ?>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= PATH ?>/adminpan/lib/chart/chart.min.js"></script>
    <script src="<?= PATH ?>/adminpan/lib/easing/easing.min.js"></script>
    <script src="<?= PATH ?>/adminpan/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= PATH ?>/adminpan/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= PATH ?>/adminpan/lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?= PATH ?>/adminpan/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="<?= PATH ?>/adminpan/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= PATH ?>/adminpan/js/main.js"></script>
</body>

</html>