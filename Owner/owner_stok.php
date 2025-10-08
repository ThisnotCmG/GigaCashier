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
        <a href="owner_stok.php" class="nav-link active">
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

  <div class="content flex-grow-1 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h3>Stok Barang</h3>
      <div class="d-flex align-items-center gap-3">
        <button class="btn btn-light btn-icon"><i class="bi bi-bell"></i></button>
        <button class="btn btn-light btn-icon"><i class="bi bi-person-circle"></i></button>
      </div>
    </div>

  <div class="content flex-grow-1 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <a href="add_stok.php" class="btn btn-success">
        <i class="bi bi-plus-circle me-1"></i> Tambah Barang
      </a>
    </div>

    <div class="card table-card">
      <div class="card-body">
        <table class="table table-borderless align-middle mt-3">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Barang</th>
              <th>Stok Min.</th>
              <th>Stok</th>
              <th>Tanggal Kadaluarsa</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>
                  <td>{$no}</td>
                  <td>{$row['nama_barang']}</td>
                  <td>{$row['stok_min']}</td>
                  <td>{$row['stok']}</td>
                  <td>{$row['tgl_kadaluarsa']}</td>
                  <td>
                    <a href='edit_stok.php?id={$row['id_barang']}' class='btn btn-sm btn-warning me-1'><i class='bi bi-pencil'></i></a>
                    <a href='delete_stok.php?id={$row['id_barang']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin hapus data ini?')\"><i class='bi bi-trash'></i></a>
                  </td>
                </tr>";
                $no++;
              }
            } else {
              echo "<tr><td colspan='6' class='text-center'>Belum ada data stok</td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</body>

<script>
function confirmLogout() {
  return confirm("Apakah Anda yakin ingin logout?");
}
</script>

</html>
