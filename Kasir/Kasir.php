<?php
// Pastikan user sudah login
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Transaksi Kasir</h2>

    <form id="kasir-form">
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="item_id" class="form-label">Pilih Barang</label>
                <select id="item_id" name="item_id" class="form-select" required>
                    <!-- JS akan isi -->
                </select>
            </div>
            <div class="col-md-2">
                <label for="qty" class="form-label">Qty</label>
                <input type="number" id="qty" name="qty" class="form-control" value="1" min="1" required>
            </div>
            <div class="col-md-2 align-self-end">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered" id="cart-table">
        <thead>
            <tr>
                <th>Barang</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody id="cart-body">
            <!-- Isi cart -->
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="text-end"><strong>Total</strong></td>
                <td id="total">0</td>
            </tr>
        </tfoot>
    </table>

    <button class="btn btn-success" id="btn-simpan">Simpan Transaksi</button>
</div>

<script>
let cart = [];

function loadItems() {
    fetch('fetch_items.php')
        .then(res => res.json())
        .then(data => {
            const select = document.getElementById('item_id');
            data.forEach(item => {
                const option = document.createElement('option');
                option.value = item.id;
                option.text = item.nama + " - Rp" + item.harga;
                option.dataset.harga = item.harga;
                select.add(option);
            });
        });
}

function renderCart() {
    const body = document.getElementById('cart-body');
    body.innerHTML = '';
    let total = 0;
    cart.forEach(item => {
        const row = document.createElement('tr');
        const subtotal = item.qty * item.harga;
        total += subtotal;
        row.innerHTML = `
            <td>${item.nama}</td>
            <td>Rp${item.harga}</td>
            <td>${item.qty}</td>
            <td>Rp${subtotal}</td>
        `;
        body.appendChild(row);
    });
    document.getElementById('total').innerText = "Rp" + total;
}

document.getElementById('kasir-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const select = document.getElementById('item_id');
    const qty = parseInt(document.getElementById('qty').value);

    const selectedOption = select.options[select.selectedIndex];
    const item = {
        id: select.value,
        nama: selectedOption.text.split(' - ')[0],
        harga: parseInt(selectedOption.dataset.harga),
        qty: qty
    };

    // Cek apakah sudah ada di cart
    const existing = cart.find(i => i.id === item.id);
    if (existing) {
        existing.qty += qty;
    } else {
        cart.push(item);
    }

    renderCart();
    this.reset();
});

document.getElementById('btn-simpan').addEventListener('click', () => {
    fetch('save_transaction.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(cart)
    })
    .then(res => res.text())
    .then(response => {
        alert(response);
        cart = [];
        renderCart();
    });
});

loadItems();
</script>
</body>
</html>
