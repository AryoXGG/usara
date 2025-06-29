<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if (empty($_SESSION['user_id'])) {
    header('location:login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesanan Saya</title>
    <link rel="icon" type="image/x-icon" href="images/logo.ico">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .page-wrapper {
            flex: 1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        th {
            background-color: #28a745;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .btn-statistik {
            padding: 5px 10px;
            font-size: 13px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }

        .btn-statistik:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            td {
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            td::before {
                position: absolute;
                top: 10px;
                left: 10px;
                width: 45%;
                white-space: nowrap;
                font-weight: bold;
                color: #333;
            }

            td[data-column]:before {
                content: attr(data-column);
            }
        }
    </style>
</head>

<body>

<?php include("includes/navbar.php"); ?>

<div class="page-wrapper">
    <div class="inner-page-hero bg-image" data-image-src="images/bgresto.jpg">
        <div class="container"></div>
    </div>

    <div class="container mt-5 mb-5">
        <h2 class="text-center mb-4">Riwayat Pesanan Anda</h2>
        <table>
            <thead>
                <tr>
                    <th>Paket</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Statistik</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query_res = mysqli_query($db, "SELECT * FROM order_user WHERE u_id='" . $_SESSION['user_id'] . "' ORDER BY date DESC");
                if (mysqli_num_rows($query_res) == 0) {
                    echo '<tr><td colspan="7" class="text-center">Belum ada pesanan.</td></tr>';
                } else {
                    while ($row = mysqli_fetch_array($query_res)) {
                        echo '
                        <tr>
                            <td data-column="Paket">' . htmlspecialchars($row['nama_paket']) . '</td>
                            <td data-column="Jumlah">' . $row['quantity'] . '</td>
                            <td data-column="Harga">Rp ' . number_format($row['harga'], 0, ',', '.') . '</td>
                            <td data-column="Metode">' . htmlspecialchars($row['payment_method']) . '</td>
                            <td data-column="Status">' . ($row['status'] ? htmlspecialchars($row['status']) : '-') . '</td>
                            <td data-column="Tanggal">' . date("d-m-Y H:i", strtotime($row['date'])) . '</td>
                            <td data-column="Statistik"><a href="statistik_toko.php" class="btn-statistik">Lihat</a></td>
                        </tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("includes/footer.php"); ?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
