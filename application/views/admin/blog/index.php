<?php $this->load->view('admin/_partial/top'); ?>
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Data Blog</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Blog</a></div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <a href="<?= site_url('admin/blog/tambah') ?>" class="btn btn-success"><i class="fas fa-pen"></i> Tulis Blog</a>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-hover" id="table-1">
                        <thead>
                           <tr>
                              <th class="text-center">
                                 #
                              </th>
                              <th>Judul</th>
                              <th>Slug</th>
                              <th>Author</th>
                              <th>Publish</th>
                              <th>Tanggal</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($data as $x) { ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              <td>
                                 <img alt="image" src="<?= base_url('files/blog/thumb/'.$x->thumb_blog) ?>" class="img" width="35" data-toggle="tooltip" title="<?= x($x->judul_blog) ?>"> &nbsp;
                                 <?= x($x->judul_blog) ?> &nbsp; &nbsp;
                                 <i class="fas fa-eye"> <?= $x->counter ?></i>
                              </td>
                              <td><?= x($x->slug_blog) ?></td>
                              <td>
                                 <img alt="image" src="<?= base_url('files/admin/thumb/'.$x->thumb_admin) ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="<?= x($x->nama_admin) ?>"> &nbsp;
                                 <?= x($x->nama_admin) ?>
                              </td>
                              <td>
                                 <?php if ($x->publish == 0){ ?>
                                    <div class="badge badge-danger">Unpublished</div>
                                 <?php }else{ ?>
                                    <div class="badge badge-success">Published</div>
                                 <?php } ?>
                              </td>
                              <td class="text-center"><?= x($x->dibuat) ?></td>
                              <td>
                                 <div class="btn-group">
                                    <a href="<?= site_url('admin/blog/edit/'.$x->id_blog) ?>" style="color: white" data-toggle="tooltip" title="Edit Data" class="btn btn-sm btn-info btn-edit"><i class="fas fa-pen"></i></a>

                                    <?php if ($x->publish == 0){ ?>
                                       <a data-toggle="tooltip" title="Publish Blog" href="#" class="btn btn-sm btn-warning" data-confirm="Publish Blog|Apakah anda yakin akan publish <b><?= x($x->judul_blog) ?></b>?" data-confirm-yes="window.location = '<?= site_url('admin/blog/publish/'.$x->id_blog) ?>'"><i class="fas fa-eye"></i></a>
                                    <?php }else{ ?>
                                       <a data-toggle="tooltip" title="Unpublished Blog" href="#" class="btn btn-sm btn-warning" data-confirm="Unpublished Blog|Apakah anda yakin akan unpublish <b><?= x($x->judul_blog) ?></b>?" data-confirm-yes="window.location = '<?= site_url('admin/blog/unpublish/'.$x->id_blog) ?>'"><i class="fas fa-eye-slash"></i></a>
                                    <?php } ?>

                                    <a data-toggle="tooltip" title="Hapus Data" href="#" class="btn btn-sm btn-danger" data-confirm="Hapus data|Apakah anda yakin akan menghapus <b><?= x($x->judul_blog) ?></b>?" data-confirm-yes="window.location = '<?= site_url('admin/blog/delete/'.$x->id_blog) ?>'"><i class="fa fa-trash"></i></a>
                                 </div>
                              </td>
                           </tr>
                        <?php } ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
</div>
<?php $this->load->view('admin/_partial/bottom'); ?>