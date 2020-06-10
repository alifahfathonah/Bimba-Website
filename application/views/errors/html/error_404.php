<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>404 Tidak ditemukan</title>
  <link rel="icon" type="image/png" href="<?= base_url() ?>files/info/favicon.png" />

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>404</h1>
            <div class="page-description">
              Oops! Sepertinya anda bepergian terlalu jauh
            </div>
            <div class="page-search">
              <div class="mt-3">
                <button class="btn btn-primary btn-lg" onclick="history.back()">Kembali</button>
              </div>
            </div>
          </div>
        </div><!-- 
        <div class="simple-footer mt-5">
          Copyright &copy; Stisla 2018
        </div> -->
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url() ?>assets/admin/modules/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/modules/popper.js"></script>
  <script src="<?= base_url() ?>assets/admin/modules/tooltip.js"></script>
  <script src="<?= base_url() ?>assets/admin/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/modules/moment.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="<?= base_url() ?>assets/admin/js/scripts.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/custom.js"></script>
</body>
</html>