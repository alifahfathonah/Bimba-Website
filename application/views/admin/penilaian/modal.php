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
                      		<option value="JANUARI">JANUARI</option>
                      		<option value="FEBRUARI">FEBRUARI</option>
                      		<option value="MARET">MARET</option>
                      		<option value="APRIL">APRIL</option>
                      		<option value="MEI">MEI</option>
                      		<option value="JUNI">JUNI</option>
                      		<option value="JULI">JULI</option>
                      		<option value="AGUSTUS">AGUSTUS</option>
                      		<option value="SEPTEMBER">SEPTEMBER</option>
                      		<option value="OKTOBER">OKTOBER</option>
                      		<option value="NOVEMBER">NOVEMBER</option>
                      		<option value="DESEMBER">DESEMBER</option>
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
                    $('#modal-edit').modal({backdrop: 'static', keyboard: false});
                    $('#modal-edit').modal('show');
                }
            });
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
                      		<option value="JANUARI">JANUARI</option>
                      		<option value="FEBRUARI">FEBRUARI</option>
                      		<option value="MARET">MARET</option>
                      		<option value="APRIL">APRIL</option>
                      		<option value="MEI">MEI</option>
                      		<option value="JUNI">JUNI</option>
                      		<option value="JULI">JULI</option>
                      		<option value="AGUSTUS">AGUSTUS</option>
                      		<option value="SEPTEMBER">SEPTEMBER</option>
                      		<option value="OKTOBER">OKTOBER</option>
                      		<option value="NOVEMBER">NOVEMBER</option>
                      		<option value="DESEMBER">DESEMBER</option>
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
