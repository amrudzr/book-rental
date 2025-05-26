<h1 class="mb-4">Book Details</h1>

<div class="card shadow-sm border-0">
    <div class="row g-0">
        <!-- Cover Image -->
        <div class="col-md-4 text-center p-4">
            <?php if ($book->cover_filename): ?>
                <img src="/book-rental/public/uploads/<?= htmlspecialchars($book->cover_filename) ?>" class="img-fluid rounded shadow-sm" style="max-height: 280px; object-fit: contain;">
            <?php else: ?>
                <div class="text-muted pt-5"><em>Cover Not Found</em></div>
            <?php endif; ?>
        </div>

        <!-- Book Info -->
        <div class="col-md-8">
            <div class="card-body">
                <table class="table table-borderless table-sm table-striped">
                    <tr>
                        <th style="width: 150px;">Book Code</th>
                        <td><?= htmlspecialchars($book->code) ?></td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td><?= htmlspecialchars($book->title) ?></td>
                    </tr>
                    <tr>
                        <th>Author</th>
                        <td><?= htmlspecialchars($book->author) ?></td>
                    </tr>
                    <tr>
                        <th>Publisher</th>
                        <td><?= htmlspecialchars($book->publisher) ?></td>
                    </tr>
                    <tr>
                        <th>Stock</th>
                        <td><?= $book->stock ?></td>
                    </tr>
                </table>

                <a href="?page=books/list" class="btn btn-outline-secondary mt-3">
                    <i class="bi bi-arrow-left-circle"></i> Back to List
                </a>
            </div>
        </div>
    </div>
</div>