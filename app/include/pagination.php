
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="?page=1" aria-label="Previous">
                <span aria-hidden="true">First</span>
            </a>
        </li>
        <?php if ( $page > 1 ): ?>
            <li class="page-item"><a class="page-link" href="?page=<?= $page - 1 ?>">Prev</a></li>
        <?php endif; ?>
        <?php if( $page < $totalPages ): ?>
            <li class="page-item"><a class="page-link" href="?page=<?= $page + 1 ?>">Next</a></li>
        <?php endif; ?>
        <li class="page-item">
            <a class="page-link" href="?page=<?= $totalPages ?>" aria-label="Next">
                <span aria-hidden="true">Last</span>
            </a>
        </li>
    </ul>
</nav>


