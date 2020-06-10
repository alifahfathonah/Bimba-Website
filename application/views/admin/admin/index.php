<?php $this->load->view('admin/_partial/top'); ?>
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Data Admin</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Admin</a></div>
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
                              <th>Nama Admin</th>
                              <th>Alamat</th>
                              <th>Email/No Telepon</th>
                              <th>Username</th>
                              <th>Status</th>
                              <th>Login</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($data as $x) { ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              <td>
                                 <img alt="image" src="<?= base_url('files/admin/thumb/'.$x->thumb_admin) ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="<?= x($x->nama_admin) ?>"> &nbsp;
                                 <?= x($x->nama_admin) ?></td>
                              <td><?= x($x->alamat_admin) ?></td>
                              <td>
                                 <?= x($x->email_admin) ?><br>
                                 <?= x($x->telp_admin) ?>
                              </td>
                              <td><?= x($x->username) ?></td>
                              <td>
                                 <?php if ($x->status == 0){ ?>
                                    <div class="badge badge-danger">Nonaktif</div>
                                 <?php }else{ ?>
                                    <div class="badge badge-success">Aktif</div>
                                 <?php } ?>
                              </td>
                              <td class="text-center"><?= x($x->login == null ? "Belum pernah login":ago($x->login)) ?></td>
                              <td>
                                 <div class="btn-group">
                                    <a style="color: white" data-toggle="tooltip" title="Lihat/Edit Data" class="btn btn-sm btn-info btn-edit" data-id="<?= $x->id_admin ?>"><i class="fa fa-eye"></i></a>

                                    <?php if ($x->status == 0){ ?>
                                       <a data-toggle="tooltip" title="Aktifkan Data" href="#" class="btn btn-sm btn-warning" data-confirm="Aktifkan data|Apakah anda yakin akan mengaktifkan <b><?= x($x->nama_admin) ?></b>?" data-confirm-yes="window.location = '<?= site_url('admin/admin/aktifkan/'.$x->id_admin) ?>'"><i class="fa fa-unlock"></i></a>
                                    <?php }else{ ?>
                                       <a data-toggle="tooltip" title="Nonaktifkan Data" href="#" class="btn btn-sm btn-warning" data-confirm="Non aktifkan data|Apakah anda yakin akan menonaktifkan <b><?= x($x->nama_admin) ?></b>?" data-confirm-yes="window.location = '<?= site_url('admin/admin/non-aktifkan/'.$x->id_admin) ?>'"><i class="fa fa-lock"></i></a>
                                    <?php } ?>

                                    <a data-toggle="tooltip" title="Hapus Data" href="#" class="btn btn-sm btn-danger" data-confirm="Hapus data|Apakah anda yakin akan menghapus <b><?= x($x->nama_admin) ?></b>?" data-confirm-yes="window.location = '<?= site_url('admin/admin/delete/'.$x->id_admin) ?>'"><i class="fa fa-trash"></i></a>
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
<?php $this->load->view('admin/admin/modal') ?>
<?php $this->load->view('admin/_partial/bottom'); ?>