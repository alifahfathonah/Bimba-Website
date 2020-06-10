<?php $this->load->view('admin/_partial/top'); ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/admin/modules/summernote/summernote-bs4.css">
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Edit Blog</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="<?= site_url('admin/blog/data') ?>">Blog</a></div>
            <div class="breadcrumb-item active"><a href="#">Edit Blog</a></div>
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
                        <form method="POST" action="<?= site_url('admin/blog/update') ?>" enctype="multipart/form-data">
                           <div class="form-group">
                              <label>Judul</label>
                              <input type="text" value="<?= $data->judul_blog ?>" name="judul_blog" required class="form-control" placeholder="Ketikkan judul blog">
                           </div>
                           <div class="form-group">
                              <label>Header Blog</label><br>
                              <img src="<?= base_url('files/blog/thumb/'.$data->thumb_blog) ?>" width="300px"><br>
                              <input type="file" name="foto" class="form-control" placeholder="Ketikkan judul blog">
                           </div>
                           <div class="form-group">
                              <label>Isi Blog</label>
                              <textarea id="ckeditor" name="isi_blog"><?= $data->isi_blog ?></textarea>
                           </div>
                           <div class="form-group">
                              <label>Meta Blog</label>
                              <textarea class="form-control" name="meta_blog" required><?= $data->meta_blog ?></textarea>
                              <input type="hidden" name="id_blog" value="<?= $data->id_blog ?>">
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