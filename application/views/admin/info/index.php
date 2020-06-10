<?php $this->load->view('admin/_partial/top'); ?>
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Data Info</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Info</a></div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <a href="" class="btn btn-success"  data-toggle="modal" data-target="#exampleModal" title="Tambah data"><i class="fa fa-plus"></i> Tambah</a>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-hover" id="table-1">
                        <thead>
                           <tr>
                              <th class="text-center">
                                 #
                              </th>
                              <th>Nama Website</th>
                              <th>Deskripsi</th>
                              <th>Alamat</th>
                              <th>Sosmed</th>
                              <th>Status</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($data as $x) { ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              <td>
                                 <?= x($x->nama_website) ?><br>
                                 (<?= x($x->nama_singkat_website) ?>)
                              <td><?= x($x->deskripsi) ?></td>
                              <td>
                                 <?= x($x->alamat) ?><br>
                                 <?= x($x->email)." ".x($x->no_telepon) ?>
                              </td>
                              <td>
                                 <div class="btn-group">
                                    <a data-toggle="tooltip" title="@<?= x($x->facebook) ?>" class="btn btn-sm btn-primary" href=""><i class="fab fa-facebook"></i></a>
                                    <a data-toggle="tooltip" title="@<?= x($x->twitter) ?>" class="btn btn-sm btn-info" href=""><i class="fab fa-twitter"></i></a>
                                    <a data-toggle="tooltip" title="@<?= x($x->instagram) ?>" class="btn btn-sm btn-danger" href=""><i class="fab fa-instagram"></i></a>
                                 </div>
                              </td>
                              <td>
                                 <?php if ($x->aktif == 0){ ?>
                                    <div class="badge badge-danger">Nonaktif</div>
                                 <?php }else{ ?>
                                    <div class="badge badge-success">Aktif</div>
                                 <?php } ?>
                              </td>
                              <td>
                                 <div class="btn-group">
                                    <a style="color: white" data-toggle="tooltip" title="Lihat/Edit Data" class="btn btn-sm btn-info btn-edit" data-id="<?= $x->id_info ?>"><i class="fa fa-eye"></i></a>

                                    <?php if ($x->aktif == 0){ ?>
                                       <a data-toggle="tooltip" title="Aktifkan Data" href="#" class="btn btn-sm btn-warning" data-confirm="Aktifkan data|Apakah anda yakin akan mengaktifkan <b><?= x($x->nama_website) ?></b>?" data-confirm-yes="window.location = '<?= site_url('admin/info/aktifkan/'.$x->id_info) ?>'"><i class="fa fa-check"></i></a>
                                       <a data-toggle="tooltip" title="Hapus Data" href="#" class="btn btn-sm btn-danger" data-confirm="Hapus data|Apakah anda yakin akan menghapus <b><?= x($x->nama_website) ?></b>?" data-confirm-yes="window.location = '<?= site_url('admin/info/delete/'.$x->id_info) ?>'"><i class="fa fa-trash"></i></a>
                                    <?php } ?>
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
<?php $this->load->view('admin/info/modal') ?>
<?php $this->load->view('admin/_partial/bottom'); ?>