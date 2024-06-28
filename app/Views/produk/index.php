<?= $this->include('templates/header'); ?>

<div class="container my-4">
    <h1 class="mb-4">Semua Produk</h1>
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="<?= $product->thumbnail; ?>" class="card-img-top" alt="<?= $product->title; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product->title; ?></h5>
                        <p class="card-text"><strong>Merek:</strong> <?= isset($product->brand) ? $product->brand : 'Merek Tidak Diketahui'; ?></p>
                        <p class="card-text"><strong>Tags:</strong> <?= implode(', ', $product->tags); ?></p>
                        <h6 class="card-subtitle mb-2 text-muted">$<?= $product->price; ?></h6>
                        <a href="<?= base_url('produk/' . $product->id); ?>" class="btn btn-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <nav aria-label="Navigasi halaman">
        <ul class="pagination justify-content-center">
            <li class="page-item <?= ($currentPage <= 1) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?page=<?= $currentPage - 1; ?>" tabindex="-1">Sebelumnya <i class="fas fa-chevron-left"></i></a>
            </li>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= ($i == $currentPage) ? 'active' : ''; ?>"><a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a></li>
            <?php endfor; ?>
            <li class="page-item <?= ($currentPage >= $totalPages) ? 'disabled' : ''; ?>">
                <a class="page-link" href="?page=<?= $currentPage + 1; ?>">Selanjutnya <i class="fas fa-chevron-right"></i></a>
            </li>
        </ul>
    </nav>
</div>

<?= $this->include('templates/footer'); ?>
