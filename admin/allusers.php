<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
?>

<head>
  <meta charset="utf-8">
  <title>Dashboard Admin - Data Pengguna</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="../images/logo.ico">
  <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="css/helper.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>

<body class="fix-header fix-sidebar">
  <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
  </div>

  <div id="main-wrapper">
    <?php include("includes/header.php"); ?>
    <?php include("includes/sidebar.php"); ?>

    <div class="page-wrapper">
      <div class="row page-titles">
        <div class="col-md-5 align-self-center">
          <h3 class="text-primary">Data Pengguna</h3>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Tabel Pengguna</h4>
                <div class="table-responsive m-t-20">
                  <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Username</th>
                        <th>Nama Toko</th>
                        <th>Telepon</th>
                        <th>Deskripsi Toko</th>
                        <th>Tanggal Daftar</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "SELECT * FROM users ORDER BY u_id DESC";
                      $query = mysqli_query($db, $sql);

                      if (mysqli_num_rows($query) == 0) {
                        echo '<tr><td colspan="6" class="text-center">Belum ada data pengguna.</td></tr>';
                      } else {
                        while ($row = mysqli_fetch_assoc($query)) {
                          echo '<tr>
                            <td>' . htmlspecialchars($row['username']) . '</td>
                            <td>' . htmlspecialchars($row['nama_toko']) . '</td>
                            <td>' . htmlspecialchars($row['phone']) . '</td>
                            <td>' . nl2br(htmlspecialchars($row['deskripsi'])) . '</td>
                            <td>' . htmlspecialchars($row['date']) . '</td>
                            <td>
                              <a href="statistik_user.php?u_id=' . $row['u_id'] . '" class="btn btn-success btn-sm mb-1">
                                <i class="fa fa-bar-chart"></i> Statistik
                              </a><br>
                              <a href="includes/delete/delete_users.php?user_del=' . $row['u_id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus?\')">
                                <i class="fa fa-trash"></i> Hapus
                              </a>
                            </td>
                          </tr>';
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- Scripts -->
  <script src="js/lib/jquery/jquery.min.js"></script>
  <script src="js/lib/bootstrap/js/popper.min.js"></script>
  <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="js/jquery.slimscroll.js"></script>
  <script src="js/sidebarmenu.js"></script>
  <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
  <script src="js/custom.min.js"></script>
  <script src="js/lib/datatables/datatables.min.js"></script>
  <script src="js/lib/datatables/datatables-init.js"></script>
</body>
</html>
