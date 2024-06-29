<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_category='phone' LIMIT 4");

$stmt->execute();

$phones = $stmt->get_result();

?>