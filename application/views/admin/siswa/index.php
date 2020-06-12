<?php $this->load->view('admin/_partial/top'); ?>
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Data Siswa</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Siswa</a></div>
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
                              <th>Nama Siswa</th>
                              <th>Orang Tua</th>
                              <th>Agama</th>
                              <th>Tgl. Lahir</th>
                              <th>Alamat</th>
                              <th>Email/No Telepon</th>
                              <th>Guru/Motivator</th>
                              <th>Status</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($data as $x) { ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              <td>
                                 <img alt="image" src="<?= base_url('files/siswa/thumb/'.$x->thumb_siswa) ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="<?= x($x->nama_siswa) ?>"> &nbsp;
                                 <?= x($x->nama_siswa) ?></td>
                              <td>
                                 Ayah : <?= x($x->nama_ayah) ?><br>
                                 Ibu : <?= x($x->nama_ibu) ?>
                              </td>
                              <td><?= x($x->agama) ?></td>
                              <td><?= tgl(x($x->tgl_lahir_siswa)) ?></td>
                              <td><?= x($x->alamat_siswa) ?></td>
                              <td>
                                 <?= x($x->email_siswa) ?><br>
                                 <?= x($x->telepon_siswa) ?>
                              </td>
                              <td class="text-center"><?= x($x->nama_guru) ?></td>
                              <td>
                                 <?php if ($x->aktif == 0){ ?>
                                    <div class="badge badge-danger">Nonaktif</div>
                                 <?php }else{ ?>
                                    <div class="badge badge-success">Aktif</div>
                                 <?php } ?>
                              </td>
                              <td>
                                 <div class="btn-group">
                                    <a style="color: white" data-toggle="tooltip" title="Lihat/Edit Data" class="btn btn-sm btn-info btn-edit" data-id="<?= $x->id_siswa ?>"><i class="fa fa-eye"></i></a>

                                    <?php if ($x->aktif == 0){ ?>
                                       <a data-toggle="tooltip" title="Aktifkan Data" href="#" class="btn btn-sm btn-warning" data-confirm="Aktifkan data|Apakah anda yakin akan mengaktifkan <b><?= x($x->nama_siswa) ?></b>?" data-confirm-yes="window.location = '<?= site_url('admin/siswa/aktifkan/'.$x->id_siswa) ?>'"><i class="fa fa-unlock"></i></a>
                                    <?php }else{ ?>
                                       <a data-toggle="tooltip" title="Nonaktifkan Data" href="#" class="btn btn-sm btn-warning" data-confirm="Non aktifkan data|Apakah anda yakin akan menonaktifkan <b><?= x($x->nama_siswa) ?></b>?" data-confirm-yes="window.location = '<?= site_url('admin/siswa/non-aktifkan/'.$x->id_siswa) ?>'"><i class="fa fa-lock"></i></a>
                                    <?php } ?>

                                    <a data-toggle="tooltip" title="Hapus Data" href="#" class="btn btn-sm btn-danger" data-confirm="Hapus data|Apakah anda yakin akan menghapus <b><?= x($x->nama_siswa) ?></b>?" data-confirm-yes="window.location = '<?= site_url('admin/siswa/delete/'.$x->id_siswa) ?>'"><i class="fa fa-trash"></i></a>
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
<?php $this->load->view('admin/siswa/modal') ?>
<?php $this->load->view('admin/_partial/bottom'); ?>