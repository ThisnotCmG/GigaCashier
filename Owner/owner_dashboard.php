<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - GigaCashier</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="d-flex">

  <div class="sidebar d-flex flex-column p-3">
    <div class="brand mb-4">
      GigaCashier
    </div>
    <ul class="nav flex-column mb-auto">
      <li class="nav-item mb-2">
        <a href="owner_dashboard.php" class="nav-link active">
          <i class="bi bi-house-door me-2"></i> Dashboard
        </a>
      </li>
      <li class="nav-item mb-2">
        <a href="owner_stok.php" class="nav-link">
          <i class="bi bi-box me-2"></i> Stok
        </a>
      </li>
      <li class="nav-item mb-2">
        <a href="owner_transaksi.php" class="nav-link">
          <i class="bi bi-credit-card me-2"></i> Transaksi
        </a>
      </li>
      <li class="nav-item mb-2">
        <a href="owner_laporan.php" class="nav-link">
          <i class="bi bi-file-earmark-text me-2"></i> Laporan
        </a>
      </li>
    </ul>
    <div class="mt-auto">
      <a href="../logout.php" class="btn btn-danger w-100" onclick="return confirmLogout();">
        <i class="bi bi-box-arrow-left me-1"></i> Log Out
      </a>
    </div>

  </div>


  <!-- Main Content -->
  <div class="content flex-grow-1 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3>Dashboard</h3>
      <div class="d-flex align-items-center gap-3">
        <button class="btn btn-light btn-icon"><i class="bi bi-bell"></i></button>
        <button class="btn btn-light btn-icon"><i class="bi bi-person-circle"></i></button>
      </div>
    </div>  

    <!-- Statistik Cards -->
    <div class="row g-3 mb-4">
      <div class="col-md-4">
        <div class="card stat-card">
          <div class="card-body">
            <h6>Total Item Terjual</h6>
            <h3>Rp. 999.999,00</h3>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card stat-card">
          <div class="card-body">
            <h6>Total Transaksi</h6>
            <h3>Rp. 999.999,00</h3>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card stat-card">
          <div class="card-body">
            <h6>Total Income</h6>
            <h3>Rp. 999.999,00</h3>
          </div>
        </div>
      </div>
    </div>

    <!-- Grafik -->
    <div class="row g-3 mb-4">
      <div class="col-md-8">
        <div class="card chart-card">
          <div class="card-body">
            <h6>Penjualan Perbulan</h6>
            <canvas id="chartBulanan"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card chart-card">
          <div class="card-body">
            <h6>Penjualan Pertahun</h6>
            <canvas id="chartTahunan"></canvas>
          </div>
        </div>
      </div>
    </div>

    <!-- Tabel Stok Barang -->
    <div class="card table-card">
      <div class="card-body">
        <h6>Stok Barang</h6>
        <table class="table table-borderless align-middle mt-3">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Barang</th>
              <th>Stok Min.</th>
              <th>Stok</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Beras 5kg</td>
              <td>10</td>
              <td>25</td>
              <td><button class="btn btn-sm btn-outline-dark">Detail</button></td>
            </tr>
            <tr>
              <td>2</td>
              <td>Gula 1kg</td>
              <td>15</td>
              <td>8</td>
              <td><button class="btn btn-sm btn-outline-danger">Perlu Restock</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
</body>

<!-- Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
function confirmLogout() {
  return confirm("Apakah Anda yakin ingin logout?");
}

  const ctx1 = document.getElementById('chartBulanan');
  new Chart(ctx1, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
      datasets: [{
        label: 'Penjualan',
        data: [5, 9, 7, 10, 12, 15],
        borderColor: '#ffffff',
        borderWidth: 2,
        tension: 0.3
      }]
    },
    options: { scales: { x: { display: false }, y: { display: false } }, plugins: { legend: { display: false } } }
  });

  const ctx2 = document.getElementById('chartTahunan');
  new Chart(ctx2, {
    type: 'bar',
    data: {
      labels: ['2023', '2024'],
      datasets: [{
        label: 'Penjualan',
        data: [200, 350],
        backgroundColor: '#1f3b2f'
      }]
    },
    options: { plugins: { legend: { display: false } } }
  });
</script>

</html>
