<h1 class="mb-4"><?= isset($book) ? 'Edit Book' : 'Add New Book' ?></h1>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data" class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Book Code</label>
                <input type="text" name="code" class="form-control" value="<?= $book->code ?? '' ?>" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="<?= $book->title ?? '' ?>" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Author</label>
                <input type="text" name="author" class="form-control" value="<?= $book->author ?? '' ?>" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Publisher</label>
                <input type="text" name="publisher" class="form-control" value="<?= $book->publisher ?? '' ?>" required>
            </div>

            <div class="col-md-3">
                <label class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" value="<?= $book->stock ?? '' ?>" min="0" required>
            </div>

            <div class="col-md-9">
                <label class="form-label">Book Cover</label>
                <input type="file" name="cover" class="form-control">

                <?php if (!empty($book->cover_filename)): ?>
                    <div class="mt-2">
                        <img src="/book-rental/public/uploads/<?= htmlspecialchars($book->cover_filename) ?>" width="100" class="img-thumbnail shadow-sm">
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Save
                </button>
                <a href="?page=books/list" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Back
                </a>
            </div>
        </form>
    </div>
</div>