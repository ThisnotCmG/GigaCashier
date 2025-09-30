<?php
require 'db.php';

$stmt = $pdo->query("SELECT id, nama, harga FROM barang");
$items = $stmt->fetchAll();
echo json_encode($items);
