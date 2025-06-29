<?php
session_start();
include("includes/navbar.php");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edukasi UMKM</title>
  <link rel="icon" href="images/logo.ico">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>
    .video-thumb {
      position: relative;
      cursor: pointer;
      margin-bottom: 30px;
    }
    .video-thumb img { width: 100%; border-radius: 8px; }
    .video-thumb .play-overlay {
      position: absolute;
      top: 50%; left: 50%;
      transform: translate(-50%,-50%);
      font-size: 60px; color: white;
      opacity: .8;
    }
  </style>
</head>
<body>
<div class="container mt-5 mb-5">
  <h2 class="text-center mb-4">Pelatihan & Webinar UMKM</h2>
  <div class="row">
    <!-- Webinar 1 -->
    <div class="col-md-6">
      <div class="video-thumb" data-toggle="modal" data-target="#modal1">
        <img src="https://img.youtube.com/vi/f_fbsR7isP8/0.jpg" alt="Webinar Literasi Digital">
        <span class="play-overlay"><i class="fa fa-play-circle"></i></span>
      </div>
      <h5>Webinar Literasi Digital untuk UMKM</h5>
    </div>
    <!-- Webinar 2 -->
    <div class="col-md-6">
      <div class="video-thumb" data-toggle="modal" data-target="#modal2">
        <img src="https://img.youtube.com/vi/jSfAJAZRNlo/0.jpg" alt="Teaser Webinar Strategy">
        <span class="play-overlay"><i class="fa fa-play-circle"></i></span>
      </div>
      <h5>Cara Mudah Menjangkau Pelanggan (Teaser)</h5>
    </div>
  </div>
</div>

<!-- Modal 1 -->
<div class="modal fade" id="modal1" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/f_fbsR7isP8" allowfullscreen></iframe>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal 2 -->
<div class="modal fade" id="modal2" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/jSfAJAZRNlo" allowfullscreen></iframe>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<?php include("includes/footer.php"); ?>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>




 