<?php
$pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$perPage = 30;
$start = ($page - 1) * $perPage;

$stmt = $pdo->prepare("SELECT * FROM products LIMIT :start, :perPage");
$stmt->bindValue(':start', $start, PDO::PARAM_INT);
$stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);
$stmt->execute();

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($products);
