<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="<?= PATH ?>">Home</a>

                <?php 
                    
                    $current_category_id = $category_id;
                    $breadcrumb = [];  
                    
                    while ($current_category_id != 0) {
                  
                        foreach ($categor as $category) {
                            if ($category['id'] == $current_category_id) {
                              
                                array_unshift($breadcrumb, $category['title']);
                      
                                $current_category_id = $category['parent_id'];
                                break;
                            }
                        }
                    }

               
                    foreach ($breadcrumb as $index => $title) {
                      
                        if ($index == count($breadcrumb) - 1) {
                            echo '<span class="breadcrumb-item active">' . $title . '</span>';
                        } else {
                            echo '<a class="breadcrumb-item text-dark" href="#">' . $title . '</a>';
                        }
                    }
                ?>

            </nav>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->







<!-- Shop Start -->
<div class="container-fluid">
    <div class="row px-xl-5">
        <div id="filterForm" class="col-lg-3 col-md-4">

            <h5 class="section-title position-relative text-uppercase mb-3">
                <span class="bg-secondary pr-3">Qiymətə görə filtrelə</span>
            </h5>
            <div class="bg-light p-4 mb-30">
                <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                    <input type="radio" class="custom-control-input" id="price-all" name="price" value="all" checked>
                    <label class="custom-control-label" for="price-all">Bütün Qiymətlər</label>
                </div>
                <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                    <input type="radio" class="custom-control-input" id="price-1" name="price" value="0-100"
                        <?= (isset($_GET['price']) && $_GET['price'] == '0-100') ? 'checked' : ''; ?>>
                    <label class="custom-control-label" for="price-1">0 ₼ - 100 ₼</label>
                </div>
                <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                    <input type="radio" class="custom-control-input" id="price-2" name="price" value="100-200"
                        <?= (isset($_GET['price']) && $_GET['price'] == '100-200') ? 'checked' : ''; ?>>
                    <label class="custom-control-label" for="price-2">100 ₼ - 200 ₼</label>
                </div>
                <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                    <input type="radio" class="custom-control-input" id="price-3" name="price" value="200-300"
                        <?= (isset($_GET['price']) && $_GET['price'] == '200-300') ? 'checked' : ''; ?>>
                    <label class="custom-control-label" for="price-3">200 ₼ - 300 ₼</label>
                </div>
                <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                    <input type="radio" class="custom-control-input" id="price-4" name="price" value="300-400"
                        <?= (isset($_GET['price']) && $_GET['price'] == '300-400') ? 'checked' : ''; ?>>
                    <label class="custom-control-label" for="price-4">300 ₼ - 400 ₼</label>
                </div>
                <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                    <input type="radio" class="custom-control-input" id="price-5" name="price" value="400-500"
                        <?= (isset($_GET['price']) && $_GET['price'] == '400-500') ? 'checked' : ''; ?>>
                    <label class="custom-control-label" for="price-5">400 ₼ - 500 ₼</label>
                </div>
            </div>

            <h5 class="section-title position-relative text-uppercase mb-3">
                <span class="bg-secondary pr-3">Rəngə görə filtrelə</span>
            </h5>
            <div class="bg-light p-4 mb-30">
                <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                    <input type="radio" class="custom-control-input" id="color-all" name="color" value="all"
                        checked>
                    <label class="custom-control-label" for="color-all">Bütün Rənglər</label>
                </div>
                <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                    <input type="radio" class="custom-control-input" id="color-1" name="color" value="black"
                        <?php echo (isset($_GET['color']) && $_GET['color'] == 'black') ? 'checked' : ''; ?>>
                    <label class="custom-control-label" for="color-1">Qara</label>
                </div>
                <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                    <input type="radio" class="custom-control-input" id="color-2" name="color" value="white"
                        <?php echo (isset($_GET['color']) && $_GET['color'] == 'white') ? 'checked' : ''; ?>>
                    <label class="custom-control-label" for="color-2">Ağ</label>
                </div>
                <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                    <input type="radio" class="custom-control-input" id="color-3" name="color" value="red"
                       <?php echo (isset($_GET['color']) && $_GET['color'] == 'red') ? 'checked' : ''; ?>>
                    <label class="custom-control-label" for="color-3">Qırmızı</label>
                </div>
                <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                    <input type="radio" class="custom-control-input" id="color-4" name="color" value="blue"
                         <?php echo (isset($_GET['color']) && $_GET['color'] == 'blue') ? 'checked' : ''; ?>>
                    <label class="custom-control-label" for="color-4">Mavi</label>
                </div>
                <div class="custom-control custom-radio d-flex align-items-center justify-content-between mb-3">
                    <input type="radio" class="custom-control-input" id="color-5" name="color" value="green"
                         <?php echo (isset($_GET['color']) && $_GET['color'] == 'green') ? 'checked' : ''; ?>>
                    <label class="custom-control-label" for="color-5">Yaşıl</label>
                </div>
            </div>


        </div>

        <!-- Ürün Listesi -->
        <div class="col-lg-9 col-md-8">
            <div class="row pb-3">
               
                    <?php if (!empty($products)): ?>
                        <?php $this->getPart('layouts/parts/products_loops', compact('products')); ?>
                        <div class="col-12">
    <nav>
        <ul class="pagination justify-content-center">
            <?php
           
            $query_string = $_GET;
            unset($query_string['page']); 
            $query_string = http_build_query($query_string); 
            $base_url = '?' . $query_string . '&'; 

            if ($page > 1): ?>
                <li class="page-item"><a class="page-link" href="<?= $base_url ?>page=<?= $page - 1 ?>">Öncəki</a></li>
            <?php else: ?>
                <li class="page-item disabled"><a class="page-link">Öncəki</a></li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <?php if ($i == $page): ?>
                    <li class="page-item active"><a class="page-link"><?= $i ?></a></li>
                <?php else: ?>
                    <li class="page-item"><a class="page-link" href="<?= $base_url ?>page=<?= $i ?>"><?= $i ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($page < $total_pages): ?>
                <li class="page-item"><a class="page-link" href="<?= $base_url ?>page=<?= $page + 1 ?>">Sonraki</a></li>
            <?php else: ?>
                <li class="page-item disabled"><a class="page-link">Sonraki</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
                    <?php else: ?>
                        <h3>Heç bir məhsul tapılmadı</h3>
                    <?php endif; ?>



               
            </div>
        </div>