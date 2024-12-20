<div class="container mt-0 bg-secondary" style="margin-left: 268px; padding: 20px; border-radius: 10px;">
    <h2 class="mb-4" style="font-weight: bold; color: white;">
        <i class="fas fa-sliders-h"></i> Sliders
    </h2>

    <hr style="border: 2px solid #dc3545;">

    <div class="row justify-content-start">
        <?php foreach ($sliders as $index => $slider): ?>
            <div class="col-md-4 mb-4 ">
                <div class="card position-relative bg-dark">
                    <img id="image<?= $index + 1 ?>" src="<?= PATH . $slider['img'] ?>" alt="Şəkil <?= $index + 1 ?>"
                        class="card-img-top" style="height: 200px; object-fit: cover; border-radius: 10px;">
                    <a href="/admin/slider/delete?id=<?= $slider['id'] ?>"
                        class="btn btn-danger btn-sm position-absolute top-0 end-0 m-2 delete-icon"
                        onclick="return confirm('Bu şəkili silmək istədiyinizə əminsiniz?');">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                    <form action="" method="POST" enctype="multipart/form-data" class="card-body d-flex flex-column">
                        <div class="input-group mb-3">
                            <input type="file" name="image[<?= $slider['id'] ?>]" class="form-control"
                                id="sliderFile<?= $slider['id'] ?>">
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm w-100"
                            name="update_image[<?= $slider['id'] ?>]">Yenilə</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>