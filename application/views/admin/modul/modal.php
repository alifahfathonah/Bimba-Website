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
				<form method="POST" action="<?= site_url('admin/modul/insert') ?>" enctype="multipart/form-data">
					<div class="form-group">
                      	<label>Tipe Modul</label>
                      	<select class="form-control" required name="tipe_modul">
                      		<option value="">-- Pilih Tipe Modul --</option>
                      		<option value="BACA">BACA</option>
                      		<option value="HURUF">HURUF</option>
                      	</select>
                    </div>
					<div class="form-group row">
						<div class="col-sm-12">
							<input type="text" name="nama_modul" required class="form-control" placeholder="Nama Kelas">
						</div>
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
                url  : "<?= site_url('admin/modul/data') ?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('#loading').modal('hide');
                    $("#nama_modul").val(data.nama_modul);
                    $("#id_modul").val(data.id_modul);
                    $("#tipe_modul").val(data.tipe_modul);
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
				<form method="POST" action="<?= site_url('admin/modul/update') ?>" enctype="multipart/form-data">
					<div class="form-group">
                      	<label>Tipe Modul</label>
                      	<select class="form-control" required name="tipe_modul" id="tipe_modul">
                      		<option value="">-- Pilih Tipe Modul --</option>
                      		<option value="BACA">BACA</option>
                      		<option value="HURUF">HURUF</option>
                      	</select>
                    </div>
					<div class="form-group row">
						<div class="col-sm-12">
							<input type="text" id="nama_modul" name="nama_modul" required class="form-control" placeholder="Nama Kelas">
							<input type="hidden" id="id_modul" name="id_modul">
						</div>
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
