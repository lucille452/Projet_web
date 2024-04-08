<?php
// Example data
$totalItems = 15; // Total number of items
$itemsPerPage = 5; // Number of items per page
$totalPages = ceil($totalItems / $itemsPerPage); // Calculate total pages

// Get current page from query string, default is 1
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$current_page = max(1, min($totalPages, intval($current_page))); // Ensure current page is within valid range

// Calculate offset
$offset = ($current_page - 1) * $itemsPerPage;

// Example items for pagination
$items = range($offset + 1, min($totalItems, $offset + $itemsPerPage));

// Display items for the current page
echo "<ul>";
foreach ($items as $item) {
    echo "<li><a><img src='../Image/jeu". $item .".jpg'></a></li>";
}
echo "</ul>";

// Display pagination links
echo "<div class='pagination'>";
if ($current_page > 1) {
    echo "<a href='?page=1'>First</a>";
    $prev_page = $current_page - 1;
    echo "<a href='?page=$prev_page'>Previous</a>";
}

for ($i = max(1, $current_page - 2); $i <= min($current_page + 2, $totalPages); $i++) {
    $active = ($i == $current_page) ? "active" : "";
    echo "<a class='$active' href='?page=$i'>$i</a>";
}

if ($current_page < $totalPages) {
    $next_page = $current_page + 1;
    echo "<a href='?page=$next_page'>Next</a>";
    echo "<a href='?page=$totalPages'>Last</a>";
}
echo "</div>";
