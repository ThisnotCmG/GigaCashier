<?php
require 'db.php';

$data = json_decode(file_get_contents("php://input"), true);
if (!$data) {
    http_response_code(400);
    echo "Data tidak valid";
    exit;
}

// Simpan transaksi utama
$pdo->beginTransaction();

try {
    $stmt = $pdo->prepare("INSERT INTO transaksi (tanggal) VALUES (NOW())");
    $stmt->execute();
    $transaksi_id = $pdo->lastInsertId();

    $stmtDetail = $pdo->prepare("INSERT INTO transaksi_detail (transaksi_id, barang_id, qty, harga) VALUES (?, ?, ?, ?)");
    foreach ($data as $item) {
        $stmtDetail->execute([
            $transaksi_id,
            $item['id'],
            $item['qty'],
            $item['harga']
        ]);
    }

    $pdo->commit();
    echo "Transaksi berhasil disimpan.";
} catch (Exception $e) {
    $pdo->rollBack();
    http_response_code(500);
    echo "Gagal menyimpan transaksi: " . $e->getMessage();
}
