<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;  margin-right:50px;">
    <form method="POST" enctype="multipart/form-data" class="col-lg-8 col-md-12 bg-secondary p-4 rounded shadow-sm"
        id="product_form">

        <h2 class="mb-0 text-white">Məhsul Düzəlişi</h2>
        <hr style="border: 2px solid #dc3545; width: 100%;">

        <!-- Category, Color, Status, Hit (Moved to top) -->
        <div class="form-group mt-3">
            <label for="category">Kateqoriya seçin</label>
            <select class="form-control" id="category" name="category">
                <option value="">Kateqoriya seçin</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['id']; ?>" <?php echo ($category['id'] == $product[0]['category_id']) ? 'selected disabled' : ''; ?>>
                        <?php echo $category['title']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>


        <div class="form-group mt-3">
            <label for="color">Rəng Seçin</label>
            <select class="form-control" id="color" name="color">
                <option value="Red" <?php echo ($product[0]['color'] == 'Red') ? 'selected' : ''; ?>>Red</option>
                <option value="Blue" <?php echo ($product[0]['color'] == 'Blue') ? 'selected' : ''; ?>>Blue</option>
                <option value="Green" <?php echo ($product[0]['color'] == 'Green') ? 'selected' : ''; ?>>Green</option>
                <option value="Black" <?php echo ($product[0]['color'] == 'Black') ? 'selected' : ''; ?>>Black</option>
                <option value="White" <?php echo ($product[0]['color'] == 'White') ? 'selected' : ''; ?>>White</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="1" <?php echo ($product[0]['status'] == 1) ? 'selected' : ''; ?>>Saytda göstər</option>
                <option value="0" <?php echo ($product[0]['status'] == 0) ? 'selected' : ''; ?>>Saytda göstərme</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="hit">Hit</label>
            <select class="form-control" id="hit" name="hit">
                <option value="0" <?php echo ($product[0]['hit'] == 0) ? 'selected' : ''; ?>>No</option>
                <option value="1" <?php echo ($product[0]['hit'] == 1) ? 'selected' : ''; ?>>Yes</option>
            </select>
        </div>

        <!-- Other fields below (Product Name, Image, etc.) -->
        <div class="form-group mt-3">
            <label for="product_name">Məhsul adı</label>
            <input type="text" class="form-control" id="product_name" name="product_name"
                value="<?php echo $product[0]['title']; ?>" placeholder="Məhsulun adını daxil edin">
        </div>

        <div class="form-group mt-3">
            <label for="product_image">Məhsul şəkli</label>

            <input type="file" class="form-control" id="product_image" name="product_image" accept="image/* ">

        </div>

        <div class="form-group mt-3">
            <label for="excerpt">Qısa məlumat</label>
            <input type="text" class="form-control" id="excerpt" name="excerpt"
                value="<?php echo $product[0]['excerpt']; ?>" placeholder="Məhsul haqqında qısa məlumat">
        </div>

        <div class="form-group mt-3">
            <label for="content">Content</label>
            <input type="text" class="form-control" id="content" name="content"
                value="<?php echo $product[0]['content']; ?>" placeholder="Məhsul haqqında qısa məlumat">
        </div>

        <div class="form-group mt-3">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" value="<?php echo $product[0]['slug']; ?>"
                placeholder="Məhsul haqqında url məlumat">
        </div>

        <div class="form-group mt-3">
            <label for="keywords">Açar sözlər</label>
            <input type="text" class="form-control" id="keywords" name="keywords"
                value="<?php echo $product[0]['keywords']; ?>"
                placeholder="Açar sözləri vergüllə ayrılmış şəkildə daxil edin">
        </div>

        <div class="form-group mt-3">
            <label for="description">Təsvir</label>
            <textarea class="form-control" id="description" name="description" rows="4"
                placeholder="Məhsul haqqında ətraflı məlumat verin"><?php echo $product[0]['description']; ?></textarea>
        </div>

        <div class="form-group mt-3">
            <label for="price">Qiymət</label>
            <input type="number" class="form-control" id="price" name="price"
                value="<?php echo $product[0]['price']; ?>" placeholder="Məhsulun qiymətini daxil edin">
        </div>

        <div class="form-group mt-3">
            <label for="old_price">Köhnə Qiymət</label>
            <input type="number" class="form-control" id="old_price" name="old_price"
                value="<?php echo $product[0]['old_price']; ?>" placeholder="Məhsulun əvvəlki qiymətini daxil edin">
        </div>

        <div class="form-group mt-3">
            <label for="qty">Miqdar</label>
            <input type="number" class="form-control" id="qty" name="qty" value="<?php echo $product[0]['qty']; ?>"
                placeholder="Məhsul miqdarını daxil edin">
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary">Dəyişiklikləri Saxla</button>
            <a href="/admin/product" class="btn btn-secondary">Geri Qayıt</a>
        </div>
    </form>
</div>