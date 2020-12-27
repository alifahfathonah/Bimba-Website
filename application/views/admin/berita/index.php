<?php $this->load->view('admin/_partial/top'); ?>
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Data Berita</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Berita</a></div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <a href="<?= site_url('admin/berita/tambah') ?>" class="btn btn-success"><i class="fas fa-pen"></i> Tulis Berita</a>
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
                                 <img alt="image" src="<?= base_url('files/berita/thumb/'.$x->thumb_berita) ?>" class="img" width="35" data-toggle="tooltip" title="<?= x($x->judul_berita) ?>"> &nbsp;
                                 <?= x($x->judul_berita) ?>
                              </td>
                              <td><?= x($x->slug_berita) ?></td>
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
                                    <a href="<?= site_url('admin/berita/edit/'.$x->id_berita) ?>" style="color: white" data-toggle="tooltip" title="Edit Data" class="btn btn-sm btn-info btn-edit"><i class="fas fa-pen"></i></a>

                                    <?php if ($x->publish == 0){ ?>
                                       <a data-toggle="tooltip" title="Aktifkan Data" href="<?= site_url('admin/berita/publish/'.$x->id_berita) ?>" class="btn btn-sm btn-warning" onclick="return confirm('Apakah anda yakin akan publish <?= x($x->judul_berita) ?>?')"><i class="fa fa-eye"></i></a>
                                    <?php }else{ ?>
                                       <a data-toggle="tooltip" title="Nonaktifkan Data" href="<?= site_url('admin/berita/unpublish/'.$x->id_berita) ?>" class="btn btn-sm btn-warning" onclick=" return confirm('Apakah anda yakin akan unpublish <?= x($x->judul_berita) ?>?')" data-confirm-yes="window.location = ''"><i class="fa fa-eye-slash"></i></a>
                                    <?php } ?>

                                    <a data-toggle="tooltip" title="Hapus Data" href="<?= site_url('admin/berita/delete/'.$x->id_berita) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus <?= x($x->judul_berita) ?>?')"><i class="fa fa-trash"></i></a>
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