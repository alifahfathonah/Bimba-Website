<?php $this->load->view('admin/_partial/top'); ?>
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Data Modul</h1>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Modul</a></div>
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
                              <th>Tipe Modul</th>
                              <th>Nama Modul</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($data as $x) { ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              <td><?= x($x->tipe_modul) ?></td>
                              <td><?= x($x->nama_modul) ?></td>
                              <td>
                                 <div class="btn-group">
                                    <a style="color: white" data-toggle="tooltip" title="Lihat/Edit Data" class="btn btn-sm btn-info btn-edit" data-id="<?= $x->id_modul ?>"><i class="fa fa-eye"></i></a>
                                    <a data-toggle="tooltip" title="Hapus Data" href="#" class="btn btn-sm btn-danger" data-confirm="Hapus data|Apakah anda yakin akan menghapus <b><?= x($x->nama_modul) ?></b>?" data-confirm-yes="window.location = '<?= site_url('admin/modul/delete/'.$x->id_modul) ?>'"><i class="fa fa-trash"></i></a>
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
<?php $this->load->view('admin/modul/modal') ?>
<?php $this->load->view('admin/_partial/bottom'); ?>