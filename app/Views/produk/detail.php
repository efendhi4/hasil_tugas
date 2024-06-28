<?= $this->include('templates/header'); ?>

<div class="container my-4">
    <div class="row">
        <div class="col-lg-6">
            <div id="productCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php foreach ($product->images as $index => $image): ?>
                        <li data-target="#productCarousel" data-slide-to="<?= $index; ?>" class="<?= ($index == 0) ? 'active' : ''; ?>"></li>
                    <?php endforeach; ?>
                </ol>
                <div class="carousel-inner">
                    <?php foreach ($product->images as $index => $image): ?>
                        <div class="carousel-item <?= ($index == 0) ? 'active' : ''; ?>">
                            <img src="<?= $image; ?>" class="d-block w-100" alt="Product Image">
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            <h1 class="mb-3"><?= $product->title; ?></h1>
            <p class="lead"><strong>Description:</strong> <?= $product->description; ?></p>
            <p><strong>Tags:</strong> <?= implode(', ', $product->tags); ?></p>
            <h2 class="mt-4">$<?= $product->price; ?></h2>

            <h3 class="mt-4">Reviews</h3>
            <div class="list-group">
                <?php foreach ($product->reviews as $review): ?>
                    <div class="list-group-item">
                        <p><strong><?= isset($review->reviewerName) ? $review->reviewerName : 'Anonymous'; ?>:</strong> <?= isset($review->comment) ? $review->comment : 'No review body available'; ?></p>
                        <p><strong>Rating:</strong> <?= isset($review->rating) ? $review->rating : 'No rating'; ?>/5</p>
                    </div>
                <?php endforeach; ?>
            </div>

            <a href="<?= base_url(); ?>" class="btn btn-secondary mt-3">Back to Products</a>
        </div>
    </div>
</div>

<?= $this->include('templates/footer'); ?>
