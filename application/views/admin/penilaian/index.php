<?php $this->load->view('admin/_partial/top'); ?>
<div class="main-content">
   <section class="section">
      <div class="section-header">
         <h1>Data Penilaian</h1> &nbsp;&nbsp;&nbsp;&nbsp;
            <select style="width: 500px" class="form-control" id="id_penilaianx" name="id_siswa" onchange="penilaian()">
               <option value="">-- Pilih Siswa --</option>
               <?php foreach ($dsiswa as $k): ?>
               <option value="<?= x($k->id_siswa) ?>" <?= $this->input->get('id-siswa') == x($k->id_siswa) ? "selected":"" ?>><?= x($k->nama_siswa) ?></option>
               <?php endforeach ?>
            </select>
            <script type="text/javascript">
               function penilaian(){
                  var id = document.getElementById('id_penilaianx').value;
                  window.location = '<?= site_url('admin/penilaian?id-siswa=') ?>'+id;
               }
            </script>
         <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Penilaian</a></div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-header">
                  <a href="" class="btn btn-success"  data-toggle="modal" data-target="#exampleModal" title="Tambah data"><i class="fa fa-plus"></i> Tambah</a> &nbsp; &nbsp; &nbsp;
                  <?php if (!empty($this->input->get_post('id-siswa'))) { ?>
                     <a id="btn-sertifikat" style="color: white" class="btn btn-info"  data-toggle="tooltip" data-id="<?= $this->input->get('id-siswa') ?>" title="sertifikat"><i class="fa fa-image"></i> Foto Hasil Pembelajaran</a>
                  <?php } ?>
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
                              <th>Tipe Modul</th>
                              <th>Modul</th>
                              <th>Minggu Ke-</th>
                              <th>Bulan</th>
                              <th>Nilai</th>
                              <th>Komentar</th>
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
                              </td>
                              <td><?= x($x->tipe_modul) ?></td>
                              <td><?= x($x->nama_modul) ?></td>
                              <td><?= x($x->minggu) ?></td>
                              <td><?= bulan(x($x->bulan)) ?></td>
                              <td><?= x($x->nilai) ?></td>
                              <td><?= x($x->komentar) ?></td>
                              <td>
                                 <div class="btn-group">
                                    <a style="color: white" data-toggle="tooltip" title="Lihat/Edit Data" class="btn btn-sm btn-info btn-edit" data-id="<?= $x->id_penilaian ?>"><i class="fa fa-eye"></i></a>
                                    <a data-toggle="tooltip" title="Hapus Data" href="#" class="btn btn-sm btn-danger" data-confirm="Hapus data|Apakah anda yakin akan menghapus <b><?= x($x->nama_siswa.' Modul: '.$x->nama_modul.' Minggu: '.$x->minggu.' Bulan: '.$x->bulan) ?></b>?" data-confirm-yes="window.location = '<?= site_url('admin/penilaian/delete/'.$x->id_penilaian) ?>'"><i class="fa fa-trash"></i></a>
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
<?php $this->load->view('admin/penilaian/modal') ?>
<?php $this->load->view('admin/_partial/bottom'); ?>