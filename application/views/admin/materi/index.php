<?php $this->load->view('admin/_partial/top'); ?>
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Data Materi</h1> &nbsp;&nbsp;&nbsp;&nbsp;
            <select style="width: 500px" class="form-control" id="id_kelasx" name="id_kelas" onchange="materi()">
               <option value="">-- Semua Kelas --</option>
               <?php foreach ($kls as $k): ?>
               <option value="<?= x($k->id_kelas) ?>" <?= $this->input->get('id-kelas') == x($k->id_kelas) ? "selected":"" ?>><?= x($k->nama_kelas.' - '.$k->nama_guru) ?></option>
               <?php endforeach ?>
            </select>
            <script type="text/javascript">
               function materi(){
                  var id = document.getElementById('id_kelasx').value;
                  window.location = '<?= site_url('admin/materi?id-kelas=') ?>'+id;
               }
            </script>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Materi</a></div>
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
                              <th>Nama Materi</th>
                              <th>Deskripsi</th>
                              <th>Link</th>
                              <th>Tipe</th>
                              <th>Aksi</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; foreach ($data as $x) { ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              <td><?= x($x->nama_materi) ?></td>
                              <td><?= strlen(x($x->deskripsi_materi)) < 100 ? x($x->deskripsi_materi):x(substr($x->deskripsi_materi, 0, 100)." ...") ?></td>
                              <td><?= x($x->link_materi) ?></td>
                              <td><?= x($x->tipe_materi) ?></td>
                              <td>
                                 <div class="btn-group">
                                    <a style="color: white" data-toggle="tooltip" title="Lihat/Edit Data" class="btn btn-sm btn-info btn-edit" data-id="<?= $x->id_materi ?>"><i class="fa fa-eye"></i></a>
                                    <a data-toggle="tooltip" title="Hapus Data" href="#" class="btn btn-sm btn-danger" data-confirm="Hapus data|Apakah anda yakin akan menghapus <b><?= x($x->nama_materi) ?></b>?" data-confirm-yes="window.location = '<?= site_url('admin/materi/delete/'.$x->id_materi) ?>'"><i class="fa fa-trash"></i></a>
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
<?php $this->load->view('admin/materi/modal') ?>
<?php $this->load->view('admin/_partial/bottom'); ?>