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
        <a href="owner_dashboard.php" class="nav-link">
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
        <a href="owner_laporan.php" class="nav-link active">
          <i class="bi bi-file-earmark-text me-2"></i> Laporan
        </a>
      </li>
    </ul>
    <div class="mt-auto">
      <a href="logout.php" class="btn btn-danger w-100">
        <i class="bi bi-box-arrow-left me-1"></i> Log Out
      </a>
    </div>
  </div>


  <div class="content flex-grow-1 p-4">
    <h3>Dashboard</h3>
    <p>Halaman Laporan default.</p>
  </div>
</div>
</body>
</html>
