<?php
$currentPage = $_GET['page'] ?? 'books/list';
?>

<nav class="bg-white border-end position-fixed top-0 start-0 shadow-sm" style="width: 220px; height: 100vh; overflow-y: auto;">
    <div class="d-flex flex-column h-100 p-3">
        <!-- Logo / Brand -->
        <div class="mb-4">
            <h4 class="text-primary fw-bold mb-0">MyRent</h4>
            <small class="text-muted">Inventory System</small>
        </div>

        <!-- Navigation -->
        <ul class="nav nav-pills flex-column gap-2">
            <li class="nav-item">
                <a href="?page=books/list"
                    class="nav-link d-flex align-items-center <?= $currentPage === 'books/list' ? 'active' : 'text-dark' ?>">
                    <i class="bi bi-journals me-2"></i> Books
                </a>
            </li>
            <!-- Add other menu here -->
             
        </ul>

        <!-- Footer / Copyright -->
        <div class="mt-auto text-muted small pt-5 text-center">
            &copy; <?= date('Y') ?> MyRent
        </div>
    </div>
</nav>