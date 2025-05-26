<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'My App' ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/book-rental/public/assets/css/bootstrap.min.css" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="flex-grow-1 ps-4 pt-4" style="margin-left: 220px;">
        <?php include __DIR__ . '/components/breadcrumb.php'; ?>
    </div>
    <div class="d-flex">
        <?php include __DIR__ . '/components/sidebar.php'; ?>
        <div class="flex-grow-1 p-4" style="margin-left: 220px;">
            <?= $content ?>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const bookId = button.getAttribute('data-id');
                const bookTitle = button.getAttribute('data-title');

                deleteModal.querySelector('#deleteBookId').value = bookId;
                deleteModal.querySelector('#deleteBookTitle').textContent = bookTitle;
            });
        });
    </script>
    <!-- Bootstrap JS -->
    <script src="/book-rental/public/assets/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>