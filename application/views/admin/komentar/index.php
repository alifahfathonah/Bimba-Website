<?php $this->load->view('admin/_partial/top'); ?>
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Data Kelas</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Kelas</a></div>
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
                              <th>Nama Kelas</th>
                              <th>Kode Kelas</th>
                              <th>Guru</th>
                              <th>Materi</th>
                              <th>Tanggal</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($data as $x) { ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              <td><?= x($x->nama_kelas) ?></td>
                              <td><?= x($x->kode_kelas) ?></td>
                              <td>
                                 <img alt="image" src="<?= base_url('files/guru/thumb/'.$x->thumb_guru) ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="<?= x($x->nama_guru) ?>"> &nbsp;
                                 <?= x($x->nama_guru) ?></td>
                              </td>
                              <td><?= x($x->materi) ?></td>
                              <td><?= tgl($x->dibuat) ?></td>
                              <td>
                                 <div class="btn-group">
                                    <a style="color: white" data-toggle="tooltip" title="Lihat/Edit Data" class="btn btn-sm btn-info btn-edit" data-id="<?= $x->id_kelas ?>"><i class="fa fa-eye"></i></a>
                                    <a data-toggle="tooltip" title="Hapus Data" href="#" class="btn btn-sm btn-danger" data-confirm="Hapus data|Apakah anda yakin akan menghapus <b><?= x($x->nama_kelas) ?></b>?" data-confirm-yes="window.location = '<?= site_url('admin/kelas/delete/'.$x->id_kelas) ?>'"><i class="fa fa-trash"></i></a>
                                    <a data-toggle="tooltip" title="Data Materi" class="btn btn-sm btn-warning" href="<?= site_url('admin/materi?id-kelas='.x($x->id_kelas)) ?>"><i class="fas fa-book"></i></a>
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
<?php $this->load->view('admin/kelas/modal') ?>
<?php $this->load->view('admin/_partial/bottom'); ?>