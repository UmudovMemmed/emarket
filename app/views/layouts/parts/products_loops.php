<div class="col-lg-12 col-md-8">
    <div class="row pb-3">
        <?php foreach ($products as $product): ?>
            <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-auto" src="<?= PATH . $product['img']; ?>" alt="<?= $product['title']; ?>">
                        <div class="product-action">

                            <a class="btn btn-outline-dark btn-square add-to-cart" href="cart/add?id=<?= $product['id']; ?>"
                                data-id="<?= $product['id']; ?>"><?= get_icon($product['id']); ?></a>


                            <?php if (in_array($product['id'], \app\models\Wishlist::get_wishlist_ids())): ?>
                                <a class="btn btn-outline-dark btn-square delete-from-wishlist"
                                    href="wishlist/delete?id=<?= $product['id']; ?>" data-id="<?= $product['id']; ?>"><i
                                        class="fa-solid fa-heart"></i></a>
                            <?php else: ?>
                                <a class="btn btn-outline-dark btn-square add-to-wishlist"
                                    href="wishlist/add?id=<?= $product['id']; ?>" data-id="<?= $product['id']; ?>"><i
                                        class="far fa-heart"></i></a>
                            <?php endif; ?>


                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate"
                            href="<?= PATH ?>/product/<?= $product['slug'] ?>"><?= $product['title']; ?></a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5><?= $product['price']; ?>₺</h5>
                            <?php if ($product['old_price'] > $product['price']): ?>
                                <h6 class="text-muted ml-2"><del><?= $product['old_price']; ?>₺</del></h6>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>