<h1 class="mb-4">Book List</h1>

<div class="d-flex justify-content-between align-items-center mb-3">
    <form method="GET" class="d-flex" style="gap: 0.5rem;">
        <input type="hidden" name="page" value="books/list">
        <input type="text" name="q" class="form-control form-control-sm" placeholder="Search title or author..." value="<?= htmlspecialchars(strval($keyword ?? '')) ?>" style="width: 240px;">
        <button class="btn btn-sm btn-outline-primary" type="submit">Search</button>
    </form>

    <a href="?page=books/create" class="btn btn-sm btn-success">
        <i class="bi bi-plus-lg"></i> Add Book
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <table class="table table-sm table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 50px;">#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th style="width: 160px;" class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $index => $book): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <?php if ($book->cover_filename): ?>
                                    <img src="/book-rental/public/uploads/<?= htmlspecialchars($book->cover_filename) ?>" width="48" height="48" class="rounded" style="object-fit: cover;">
                                <?php else: ?>
                                    <div class="text-muted small"><em>No Cover</em></div>
                                <?php endif; ?>
                                <div>
                                    <div class="fw-semibold"><?= htmlspecialchars($book->title) ?></div>
                                </div>
                            </div>
                        </td>
                        <td><?= htmlspecialchars($book->author) ?></td>
                        <td class="text-end">
                            <a href="?page=books/detail&id=<?= $book->id ?>" class="btn btn-sm btn-outline-info" title="Detail">
                                <i class="bi bi-folder2-open"></i>
                            </a>
                            <a href="?page=books/edit&id=<?= $book->id ?>" class="btn btn-sm btn-outline-warning" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?= $book->id ?>" data-title="<?= htmlspecialchars($book->title) ?>" title="Delete">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-sm">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="GET" action="index.php">
                <input type="hidden" name="page" value="books/delete">
                <input type="hidden" name="id" id="deleteBookId">
                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to delete <strong id="deleteBookTitle">this book</strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>