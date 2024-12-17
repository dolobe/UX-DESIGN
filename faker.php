<?php
require 'vendor/autoload.php';

$faker = Faker\Factory::create();

$pdo = new PDO('mysql:host=localhost;dbname=ecommerce', 'root', '');

for ($i = 0; $i < 1000; $i++) {
    $stmt = $pdo->prepare("INSERT INTO products (name, description, price, image_url) VALUES (?, ?, ?, ?)");
    $stmt->execute([
        $faker->word(),
        $faker->sentence(),
        $faker->randomFloat(2, 10, 1000),
        $faker->imageUrl(640, 480, 'products')
    ]);
}

echo "Données insérées avec succès !";
