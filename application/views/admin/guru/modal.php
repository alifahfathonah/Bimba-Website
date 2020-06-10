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
				<form method="POST" action="<?= site_url('admin/guru/insert') ?>" enctype="multipart/form-data">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Foto Guru</label>
						<div class="col-sm-10">
							<input type="file" name="foto" required class="form-control" placeholder="Foto Guru">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Nama Guru</label>
						<div class="col-sm-10">
							<input type="text" name="nama_guru" required class="form-control" placeholder="Nama Guru">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Email Guru</label>
						<div class="col-sm-10">
							<input type="email" name="email_guru" required class="form-control" placeholder="Email Guru">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Telepon Guru</label>
						<div class="col-sm-10">
							<input type="text" name="telepon_guru" required class="form-control" placeholder="Telepon Guru">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Alamat Guru</label>
						<div class="col-sm-10">
							<textarea name="alamat_guru" required class="form-control" placeholder="Alamat Guru"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-10">
							<input type="password" name="password_guru" required class="form-control" placeholder="Password">
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
                url  : "<?= site_url('admin/guru/data') ?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('#loading').modal('hide');
                    $("#nama_guru").val(data.nama_guru);
                    $("#email_guru").val(data.email_guru);
                    $("#telepon_guru").val(data.telepon_guru);
                    $("#alamat_guru").val(data.alamat_guru);
                    $("#username").val(data.username);
                    $("#id_guru").val(data.id_guru);
                    $("#foto").attr("src", data.thumb_guru);
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
				<form method="POST" action="<?= site_url('admin/guru/update') ?>" enctype="multipart/form-data">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Foto Guru</label>
						<div class="col-sm-10">
                            <img src="" id="foto"><br>
                            <input type="file" name="foto" class="form-control" placeholder="Foto Guru">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Nama Guru</label>
						<div class="col-sm-10">
							<input type="text" id="nama_guru" name="nama_guru" required class="form-control" placeholder="Nama Guru">
							<input type="hidden" id="id_guru" name="id_guru" required class="form-control" placeholder="Id Guru">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Email Guru</label>
						<div class="col-sm-10">
							<input type="email" id="email_guru"  name="email_guru" required class="form-control" placeholder="Email Guru">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Telepon Guru</label>
						<div class="col-sm-10">
							<input type="text" id="telepon_guru" name="telepon_guru" required class="form-control" placeholder="Telepon Guru">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Alamat Guru</label>
						<div class="col-sm-10">
							<textarea id="alamat_guru" name="alamat_guru" required class="form-control" placeholder="Alamat Guru"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-10">
							<input type="password" name="password_guru" class="form-control" placeholder="Password">
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
