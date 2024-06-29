<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM `products` WHERE product_category='watch' LIMIT 4");

$stmt->execute();

$watches = $stmt->get_result(); //array[]


?>