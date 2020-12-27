<?php $this->load->view('admin/_partial/top'); ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/admin/modules/summernote/summernote-bs4.css">
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Laporan Penilaian</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Laporan Penilaian</a></div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <a style="color: white" onclick="history.back()" class="btn btn-info"><i class="fas fa-arrow-left"></i> Kembali</a>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-12">
                        <form method="POST" action="<?= site_url('admin/laporan/penilaian') ?>">
                           <div class="form-group">
                              <label>Periode (Bulan)</label>
                              <select class="form-control" name="bulan">
                                <option value="">-- Semua Periode --</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                              </select>
                           </div>
                           <div class="form-group">
                              <label>Siswa</label>
                              <select class="form-control" name="id_siswa">
                                <option value="">-- Semua Siswa --</option>
                                <?php foreach ($dsiswa as $key): ?>
                                <option value="<?= $key->id_siswa ?>"><?= $key->nama_siswa ?></option>
                                <?php endforeach ?>
                              </select>
                           </div>
                           <div class="form-group">
                             <button onclick="history.back()" class="btn btn-danger">Batal</button>
                             <button type="submit" class="btn btn-info">Cetak</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
</div>
<?php $this->load->view('admin/_partial/bottom'); ?>