</div>
<!-- <script src="/scripts/ajax.js"></script> -->
<?php
if ($currentPage === 'animals') {
    echo '<script src="/scripts/animals.js"></script>';
} elseif ($currentPage === 'owners') {
    echo '<script src="/scripts/owners.js"></script>';
} elseif ($currentPage === 'stays') {
    echo '<script src="/scripts/stays.js"></script>';
}
?>
</body>
</html>
