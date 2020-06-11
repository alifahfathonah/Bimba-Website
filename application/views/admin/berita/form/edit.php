<?php $this->load->view('admin/_partial/top'); ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/admin/modules/summernote/summernote-bs4.css">
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Edit Berita</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?= site_url('admin/berita/data') ?>">Berita</a></div>
            <div class="breadcrumb-item active"><a href="#">Edit Berita</a></div>
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
                        <form method="POST" action="<?= site_url('admin/berita/update') ?>" enctype="multipart/form-data">
                           <div class="form-group">
                              <label>Judul</label>
                              <input type="text" value="<?= $data->judul_berita ?>" name="judul_berita" required class="form-control" placeholder="Ketikkan judul berita">
                           </div>
                           <div class="form-group">
                              <label>Header Berita</label><br>
                              <img src="<?= base_url('files/berita/thumb/'.$data->thumb_berita) ?>" width="300px"><br>
                              <input type="file" name="foto" class="form-control" placeholder="Ketikkan judul berita">
                           </div>
                           <div class="form-group">
                              <label>Isi Berita</label>
                              <textarea id="ckeditor" name="isi_berita"><?= $data->isi_berita ?></textarea>
                           </div>
                           <div class="form-group">
                              <label>Meta Berita</label>
                              <textarea class="form-control" name="meta_berita" required><?= $data->meta_berita ?></textarea>
                              <input type="hidden" name="id_berita" value="<?= $data->id_berita ?>">
                           </div>
                           <div class="form-group">
                             <button onclick="history.back()" class="btn btn-danger">Batal</button>
                             <button type="submit" class="btn btn-info">Simpan</button>
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
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js');?>"></script>
<script type="text/javascript">
  $(function () {
          CKEDITOR.replace('ckeditor',{
              filebrowserImageBrowseUrl : '<?php echo base_url('assets/kcfinder/browse.php');?>',
              height: '400px'             
          });
      });
</script>