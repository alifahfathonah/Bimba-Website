<!-- Modal Tambah-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?= site_url('admin/penilaian/insert') ?>" enctype="multipart/form-data">
					<div class="form-group">
                      	<label>Siswa</label>
                      	<select class="form-control" required name="id_siswa">
                      		<option value="">-- Pilih Siswa --</option>
                      		<?php foreach ($dsiswa as $s): ?>
                      			<option <?= $this->input->get_post('id-siswa') == $s->id_siswa ? "selected":"" ?> value="<?= $s->id_siswa ?>"><?= $s->nama_siswa ?></option>
                      		<?php endforeach ?>
                      	</select>
                    </div>
					<div class="form-group">
                      	<label>Modul</label>
                      	<select class="form-control" required name="id_modul">
                      		<option value="">-- Pilih Modul --</option>
                      		<?php foreach ($dmodul as $s): ?>
                      			<option value="<?= $s->id_modul ?>"><?= $s->nama_modul."(".$s->tipe_modul.")" ?></option>
                      		<?php endforeach ?>
                      	</select>
                    </div>
					<div class="form-group">
                      	<label>Minggu ke</label>
                      	<select class="form-control" required name="minggu">
                      		<option value="">-- Pilih Minggu --</option>
                      		<option value="1">1</option>
                      		<option value="2">2</option>
                      		<option value="3">3</option>
                      		<option value="4">4</option>
                      		<option value="5">5</option>
                      	</select>
                    </div>
					<div class="form-group">
                      	<label>Bulan</label>
                      	<select class="form-control" required name="bulan">
                      		<option value="">-- Pilih Bulan --</option>
                      		<option value="1">JANUARI</option>
                      		<option value="2">FEBRUARI</option>
                      		<option value="3">MARET</option>
                      		<option value="4">APRIL</option>
                      		<option value="5">MEI</option>
                      		<option value="6">JUNI</option>
                      		<option value="7">JULI</option>
                      		<option value="8">AGUSTUS</option>
                      		<option value="9">SEPTEMBER</option>
                      		<option value="10">OKTOBER</option>
                      		<option value="11">NOVEMBER</option>
                      		<option value="12">DESEMBER</option>
                      	</select>
                    </div>
					<div class="form-group">
                      	<label>Nilai</label>
                      	<select class="form-control" required name="nilai">
                      		<option value="">-- Pilih Nilai --</option>
                      		<option value="BB">BB (Belum Berkembang)</option>
                      		<option value="MB">MB (Masih Berkembang)</option>
                      		<option value="BSH">BSH (Berkembang Sesuai Harapan)</option>
                      		<option value="BSB">BSB (Berkembang Sangat Baik)</option>
                      	</select>
                    </div>
					<div class="form-group">
                      	<label>Komentar</label>
                      	<textarea class="form-control" name="komentar" placeholder="Ketikkan komentar" required></textarea>
                    </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
				<button type="submit" class="btn btn-primary">SIMPAN</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- End modal tambah -->

<script type="text/javascript">
    $(document).ready(function(){
        $(".btn-edit").on("click", function(){
            var id = $(this).attr('data-id');
            $('#loading').modal({backdrop: 'static', keyboard: false});
            $('#loading').modal('show');
            $.ajax({
                type : "POST",
                url  : "<?= site_url('admin/penilaian/data') ?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('#loading').modal('hide');
                    $("#id_penilaian").val(data.id_penilaian);
                    $("#id_siswa").val(data.id_siswa);
                    $("#id_modul").val(data.id_modul);
                    $("#minggu").val(data.minggu);
                    $("#bulan").val(data.bulan);
                    $("#nilai").val(data.nilai);
                    $("#komentar").val(data.komentar);
                    $('#modal-edit').modal({backdrop: 'static', keyboard: false});
                    $('#modal-edit').modal('show');
                }
            });
        });

        $("#btn-sertifikat").on("click", function(){
            var id = $(this).attr('data-id');
            $('#loading').modal({backdrop: 'static', keyboard: false});
            $('#loading').modal('show');
            $("#id_siswau").val(id);
            get_foto(id);
        });

        $("#formfoto").on("submit", function(e){
            e.preventDefault();
            $('#loading').modal({backdrop: 'static', keyboard: false});
            $('#loading').modal('show');
            var formData = new FormData(this);
            console.log(formData);
            $.ajax({
                url: '<?= site_url('admin/sertifikat/insert') ?>',
                data: formData,
                cache: false,
                type: "POST",
                cache: false,
                contentType: false,
                processData: false,
                success: function(data){
                    $('#loading').modal('hide');
                    $("#datafoto").html("");
                    $("#keterangan").val("");
                    $("#foto").val("");
                    get_foto($('#id_siswa').val());
                },
                error: function(data){
                    $('#loading').modal('hide');
                    console.log(data);
                }
            });
        });

        function get_foto(id_siswa){
          $.ajax({
              type : "POST",
              url  : "<?= site_url('admin/sertifikat/data') ?>",
              dataType : "JSON",
              data : {id: id_siswa},
              success: function(data){
                  $('#loading').modal('hide');
                  $('#modalsertifikat').modal({backdrop: 'static', keyboard: false});
                  $('#modalsertifikat').modal('show');
                  var html = "";
                  var url_foto = '<?= base_url() ?>files/sertifikat/';
                  for (var i = 0; i < data.length; i++) {
                      //console.log(data[i].nama_bulan);
                      html += "<tr style='text-align: center; vertical-align: middle'>";
                      html += "<td><img width='100%' alt='"+data[i].keterangan+"' src='"+url_foto+data[i].sertifikat+"'></td>";
                      html += "<td>"+data[i].keterangan+"</td>";
                      html += "<td><a href='#' foto='"+data[i].sertifikat+"' keterangan='"+data[i].keterangan+"' data='"+data[i].id_sertifikat+"' class='btn btn-xs btn-danger hapusfoto'><i class='fa fa-trash'></i></a></td>";
                      html += "</tr>";
                  }
                  $('#datafoto').html(html);
              }
        });
      }

      $(document).on("click", '.hapusfoto', function(event) { 
          var id = $(this).attr("data");
          var ket = $(this).attr("keterangan");
          var foto = $(this).attr("foto");
          var r = confirm("Apakah anda yakin akan menghapus "+ket+"?");

          if (r) {
              $.ajax({
                  type : "POST",
                  url  : "<?= site_url('admin/sertifikat/delete') ?>",
                  dataType : "JSON",
                  data : {id: id, foto: foto},
                  success: function(data){
                      $("#datafotokegiatan").html("");
                      $("#keterangan_kegiatan").val("");
                      $("#foto_kegiatan").val("");
                      get_foto($('#id_siswa').val());
                  },
                  error: function(data){
                      console.log(data);
                  }
              })
          }
      });
    });
</script>

<!-- Modal Edit-->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?= site_url('admin/penilaian/update') ?>" enctype="multipart/form-data">
					<div class="form-group">
                      	<label>Siswa</label>
                      	<input type="hidden" name="id_penilaian" id="id_penilaian">
                      	<select class="form-control" required name="id_siswa" id="id_siswa">
                      		<option value="">-- Pilih Siswa --</option>
                      		<?php foreach ($dsiswa as $s): ?>
                      			<option <?= $this->input->get_post('id-siswa') == $s->id_siswa ? "selected":"" ?> value="<?= $s->id_siswa ?>"><?= $s->nama_siswa ?></option>
                      		<?php endforeach ?>
                      	</select>
                    </div>
					<div class="form-group">
                      	<label>Modul</label>
                      	<select class="form-control" required name="id_modul" id="id_modul">
                      		<option value="">-- Pilih Modul --</option>
                      		<?php foreach ($dmodul as $s): ?>
                      			<option value="<?= $s->id_modul ?>"><?= $s->nama_modul."(".$s->tipe_modul.")" ?></option>
                      		<?php endforeach ?>
                      	</select>
                    </div>
					<div class="form-group">
                      	<label>Minggu ke</label>
                      	<select class="form-control" required name="minggu" id="minggu">
                      		<option value="">-- Pilih Minggu --</option>
                      		<option value="1">1</option>
                      		<option value="2">2</option>
                      		<option value="3">3</option>
                      		<option value="4">4</option>
                      		<option value="5">5</option>
                      	</select>
                    </div>
					<div class="form-group">
                      	<label>Bulan</label>
                      	<select class="form-control" required name="bulan" id="bulan">
                      		<option value="">-- Pilih Bulan --</option>
                      		<option value="1">JANUARI</option>
                      		<option value="2">FEBRUARI</option>
                      		<option value="3">MARET</option>
                      		<option value="4">APRIL</option>
                      		<option value="5">MEI</option>
                      		<option value="6">JUNI</option>
                      		<option value="7">JULI</option>
                      		<option value="8">AGUSTUS</option>
                      		<option value="9">SEPTEMBER</option>
                      		<option value="10">OKTOBER</option>
                      		<option value="11">NOVEMBER</option>
                      		<option value="12">DESEMBER</option>
                      	</select>
                    </div>
					<div class="form-group">
                      	<label>Nilai</label>
                      	<select class="form-control" required name="nilai" id="nilai">
                      		<option value="">-- Pilih Nilai --</option>
                      		<option value="BB">BB (Belum Berkembang)</option>
                      		<option value="MB">MB (Masih Berkembang)</option>
                      		<option value="BSH">BSH (Berkembang Sesuai Harapan)</option>
                      		<option value="BSB">BSB (Berkembang Sangat Baik)</option>
                      	</select>
                    </div>
					<div class="form-group">
                      	<label>Komentar</label>
                      	<textarea class="form-control" name="komentar" id="komentar" placeholder="Ketikkan komentar" required></textarea>
                    </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
				<button type="submit" class="btn btn-primary">SIMPAN</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- End modal edit -->

<!-- Modal Tambah-->
<div class="modal fade" id="modalsertifikat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Upload Foto Hasil Pembelajaran</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
      <div class="modal-body table-responsive">
        <table class="table table-bordered table-condensed table-striped table-hover">
          <thead>
            <tr>
              <th width="30%" style="text-align: center;">FOTO</th>
              <th style="text-align: center;">KETERANGAN</th>
              <th width="5%" style="text-align: center;">AKSI</th>
            </tr>
          </thead>
          <tbody id="datafoto">
          </tbody>
        </table>
        <form id="formfoto" enctype='multipart/form-data'>
          <label>UNGGAH FOTO</label>
          <input type="hidden" name="id_siswa" id="id_siswau">
          <input required type="file" id="foto" name="foto" class="form-control" accept="image/*">
          <p style="color: blue">Foto maksimal 3MB dengan resolusi maksimal 5000x5000 pixel (JPG, PNG, JPEG)</p>
          <textarea id="keterangan" required name="keterangan" style="margin-top: 5px" class="form-control" placeholder="Tuliskan keterangan"></textarea>
          <button style="margin-top: 10px" type="submit" class="btn btn-sm btn-success">Unggah</button>
        </form>
      </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
				<button type="submit" class="btn btn-primary">SIMPAN</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- End modal tambah -->
