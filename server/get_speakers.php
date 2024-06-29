<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM `products` WHERE product_category='speaker' LIMIT 4");

$stmt->execute();

$speakers = $stmt->get_result(); //array[]


?>