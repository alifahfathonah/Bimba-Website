<!-- Modal Tambah-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?= site_url('admin/materi/insert') ?>" enctype="multipart/form-data">
					<div class="form-group row">
						<div class="col-sm-12">
							<input type="text" name="nama_materi" required class="form-control" placeholder="Nama Materi">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">
							<textarea name="deskripsi_materi" required class="form-control" placeholder="Deskripsi Materi" rows="6"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">
							<input type="text" name="link_materi" required class="form-control" placeholder="Link Materi">
						</div>
					</div>
					<div class="form-group">
                      	<label>Tipe Materi</label>
                      	<select class="form-control" name="tipe_materi">
                      		<option value="VIDEO">VIDEO</option>
                      		<option value="PDF">PDF</option>
                      	</select>
                    </div>
					<div class="form-group">
                      	<label>Kelas</label>
                      	<select class="form-control" required name="id_kelas">
                      		<option value="">-- Pilih Kelas --</option>
                      		<?php foreach ($kls as $k): ?>
                      		<option value="<?= x($k->id_kelas) ?>" <?= $this->input->get('id-kelas') == x($k->id_kelas) ? "selected":"" ?>><?= x($k->nama_kelas.' - '.$k->nama_guru) ?></option>
                      		<?php endforeach ?>
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
                url  : "<?= site_url('admin/materi/data') ?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('#loading').modal('hide');
                    $("#id_materi").val(data.id_materi);
                    $("#id_kelas").val(data.id_kelas);
                    $("#nama_materi").val(data.nama_materi);
                    $("#deskripsi_materi").val(data.deskripsi_materi);
                    $("#link_materi").val(data.link_materi);
                    $("#tipe_materi").val(data.tipe_materi);
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
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?= site_url('admin/materi/update') ?>" enctype="multipart/form-data">
					<div class="form-group row">
						<div class="col-sm-12">
							<input type="text" id="nama_materi" name="nama_materi" required class="form-control" placeholder="Nama Materi">
							<input type="hidden" name="id_materi" id="id_materi">
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">
							<textarea id="deskripsi_materi" name="deskripsi_materi" required class="form-control" placeholder="Deskripsi Materi" rows="6"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">
							<input type="text" id="link_materi" name="link_materi" required class="form-control" placeholder="Link Materi">
						</div>
					</div>
					<div class="form-group">
                      	<label>Tipe Materi</label>
                      	<select class="form-control" name="tipe_materi" id="tipe_materi">
                      		<option value="VIDEO">VIDEO</option>
                      		<option value="PDF">PDF</option>
                      	</select>
                    </div>
					<div class="form-group">
                      	<label>Kelas</label>
                      	<select class="form-control" required name="id_kelas" id="id_kelas">
                      		<option value="">-- Pilih Kelas --</option>
                      		<?php foreach ($kls as $k): ?>
                      		<option value="<?= x($k->id_kelas) ?>" <?= $this->input->get('id-kelas') == x($k->id_kelas) ? "selected":"" ?>><?= x($k->nama_kelas.' - '.$k->nama_guru) ?></option>
                      		<?php endforeach ?>
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
