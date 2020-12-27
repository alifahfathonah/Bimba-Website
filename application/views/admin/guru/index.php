<?php $this->load->view('admin/_partial/top'); ?>
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Data Guru</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Guru</a></div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <a href="" class="btn btn-success"  data-toggle="modal" data-target="#exampleModal" title="Tambah data"><i class="fa fa-plus"></i> Tambah</a> &nbsp;
                  <a href="<?= site_url('admin/guru/laporan') ?>" class="btn btn-primary" target="_blank" data-toggle="tooltip" title="Cetak data"><i class="fa fa-print"></i> Cetak</a>
               </div>
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-striped table-hover" id="table-1">
                        <thead>
                           <tr>
                              <th class="text-center">
                                 #
                              </th>
                              <th>Nama Guru</th>
                              <th>Alamat</th>
                              <th>Email/No Telepon</th>
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
                                 <img alt="image" src="<?= base_url('files/guru/thumb/'.$x->thumb_guru) ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="<?= x($x->nama_guru) ?>"> &nbsp;
                                 <?= x($x->nama_guru) ?></td>
                              <td><?= x($x->alamat_guru) ?></td>
                              <td>
                                 <?= x($x->email_guru) ?><br>
                                 <?= x($x->telepon_guru) ?>
                              </td>
                              <td>
                                 <?php if ($x->aktif == 0){ ?>
                                    <div class="badge badge-danger">Nonaktif</div>
                                 <?php }else{ ?>
                                    <div class="badge badge-success">Aktif</div>
                                 <?php } ?>
                              </td>
                              <td class="text-center"><?= x($x->login == null ? "Belum pernah login":$x->login) ?></td>
                              <td>
                                 <div class="btn-group">
                                    <a style="color: white" data-toggle="tooltip" title="Lihat/Edit Data" class="btn btn-sm btn-info btn-edit" data-id="<?= $x->id_guru ?>"><i class="fa fa-eye"></i></a>

                                    <?php if ($x->aktif == 0){ ?>
                                       <a data-toggle="tooltip" title="Aktifkan Data" href="<?= site_url('admin/guru/aktifkan/'.$x->id_guru) ?>" class="btn btn-sm btn-warning" onclick="return confirm('Apakah anda yakin akan mengaktifkan <?= x($x->nama_guru) ?>?')"><i class="fa fa-unlock"></i></a>
                                    <?php }else{ ?>
                                       <a data-toggle="tooltip" title="Nonaktifkan Data" href="<?= site_url('admin/guru/non-aktifkan/'.$x->id_guru) ?>" class="btn btn-sm btn-warning" onclick=" return confirm('Apakah anda yakin akan menonaktifkan <?= x($x->nama_guru) ?>?')" data-confirm-yes="window.location = ''"><i class="fa fa-lock"></i></a>
                                    <?php } ?>

                                    <a data-toggle="tooltip" title="Hapus Data" href="<?= site_url('admin/guru/delete/'.$x->id_guru) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus <?= x($x->nama_guru) ?>?')"><i class="fa fa-trash"></i></a>
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
<?php $this->load->view('admin/guru/modal') ?>
<?php $this->load->view('admin/_partial/bottom'); ?>