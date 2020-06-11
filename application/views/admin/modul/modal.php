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
				<form method="POST" action="<?= site_url('admin/kelas/insert') ?>" enctype="multipart/form-data">
					<div class="form-group row">
						<div class="col-sm-12">
							<input type="text" name="nama_kelas" required class="form-control" placeholder="Nama Kelas">
						</div>
					</div>
					<div class="form-group">
                      	<label>Guru</label>
                      	<select class="form-control" required name="id_guru">
                      		<option value="">-- Pilih Guru --</option>
                      		<?php foreach ($dguru as $g): ?>
                      			<option value="<?= $g->id_guru ?>"><?= $g->nama_guru ?></option>
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
                url  : "<?= site_url('admin/kelas/data') ?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('#loading').modal('hide');
                    $("#nama_kelas").val(data.nama_kelas);
                    $("#id_guru").val(data.id_guru);
                    $("#id_kelas").val(data.id_kelas);
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
				<form method="POST" action="<?= site_url('admin/kelas/update') ?>" enctype="multipart/form-data">
					<div class="form-group row">
						<div class="col-sm-12">
							<input type="text" id="nama_kelas" name="nama_kelas" required class="form-control" placeholder="Nama Kelas">
							<input type="hidden" id="id_kelas" name="id_kelas">
						</div>
					</div>
					<div class="form-group">
                      	<label>Guru</label>
                      	<select class="form-control" id="id_guru" required name="id_guru">
                      		<option value="">-- Pilih Guru --</option>
                      		<?php foreach ($dguru as $g): ?>
                      			<option value="<?= $g->id_guru ?>"><?= $g->nama_guru ?></option>
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
