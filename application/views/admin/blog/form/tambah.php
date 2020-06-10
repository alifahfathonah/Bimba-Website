<?php $this->load->view('admin/_partial/top'); ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/admin/modules/summernote/summernote-bs4.css">
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Tulis Blog</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?= site_url('admin/blog/data') ?>">Blog</a></div>
            <div class="breadcrumb-item active"><a href="#">Tulis Blog</a></div>
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
                        <form method="POST" action="<?= site_url('admin/blog/insert') ?>" enctype="multipart/form-data">
                           <div class="form-group">
                              <label>Judul</label>
                              <input type="text" name="judul_blog" required class="form-control" placeholder="Ketikkan judul blog">
                           </div>
                           <div class="form-group">
                              <label>Header Blog</label>
                              <input type="file" name="foto" required class="form-control" placeholder="Ketikkan judul blog">
                           </div>
                           <div class="form-group">
                              <label>Isi Blog</label>
                              <textarea id="ckeditor" name="isi_blog"></textarea>
                           </div>
                           <div class="form-group">
                              <label>Meta Blog</label>
                              <textarea class="form-control" name="meta_blog" required></textarea>
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
              // filebrowserImageBrowseUrl : '<?php echo base_url("assets/ckfinder/ckfinder.html") ?>',
              height: '400px'
          });
      });
</script>