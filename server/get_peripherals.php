<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM `products` WHERE product_category='peripheral' LIMIT 4");

$stmt->execute();

$peripherals = $stmt->get_result(); //array[]


?>