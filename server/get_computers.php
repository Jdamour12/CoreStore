<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM `products` WHERE product_category='computer' LIMIT 4");

$stmt->execute();

$computers = $stmt->get_result(); //array[]


?>