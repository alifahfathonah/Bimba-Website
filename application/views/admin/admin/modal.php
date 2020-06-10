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
				<form method="POST" action="<?= site_url('admin/admin/insert') ?>" enctype="multipart/form-data">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Foto Admin</label>
						<div class="col-sm-10">
							<input type="file" name="foto" required class="form-control" placeholder="Foto Admin">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Nama Admin</label>
						<div class="col-sm-10">
							<input type="text" name="nama_admin" required class="form-control" placeholder="Nama Admin">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Email Admin</label>
						<div class="col-sm-10">
							<input type="email" name="email_admin" required class="form-control" placeholder="Email Admin">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Telepon Admin</label>
						<div class="col-sm-10">
							<input type="text" name="telp_admin" required class="form-control" placeholder="Telepon Admin">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Alamat Admin</label>
						<div class="col-sm-10">
							<textarea name="alamat_admin" required class="form-control" placeholder="Alamat Admin"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Username</label>
						<div class="col-sm-10">
							<input type="text" name="username" required class="form-control" placeholder="Username">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-10">
							<input type="password" name="password" required class="form-control" placeholder="Password">
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
                url  : "<?= site_url('admin/admin/data') ?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('#loading').modal('hide');
                    $("#nama_admin").val(data.nama_admin);
                    $("#email_admin").val(data.email_admin);
                    $("#telp_admin").val(data.telp_admin);
                    $("#alamat_admin").val(data.alamat_admin);
                    $("#username").val(data.username);
                    $("#id_admin").val(data.id_admin);
                    $("#foto").attr("src", data.thumb_admin);
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
				<form method="POST" action="<?= site_url('admin/admin/update') ?>" enctype="multipart/form-data">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Foto Admin</label>
						<div class="col-sm-10">
                            <img src="" id="foto"><br>
                            <input type="file" name="foto" class="form-control" placeholder="Foto Admin">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Nama Admin</label>
						<div class="col-sm-10">
							<input type="text" id="nama_admin" name="nama_admin" required class="form-control" placeholder="Nama Admin">
							<input type="hidden" id="id_admin" name="id_admin" required class="form-control" placeholder="Id Admin">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Email Admin</label>
						<div class="col-sm-10">
							<input type="email" id="email_admin"  name="email_admin" required class="form-control" placeholder="Email Admin">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Telepon Admin</label>
						<div class="col-sm-10">
							<input type="text" id="telp_admin" name="telp_admin" required class="form-control" placeholder="Telepon Admin">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Alamat Admin</label>
						<div class="col-sm-10">
							<textarea id="alamat_admin" name="alamat_admin" required class="form-control" placeholder="Alamat Admin"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Username</label>
						<div class="col-sm-10">
							<input type="text" id="username" name="username" required class="form-control" placeholder="Username">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Password</label>
						<div class="col-sm-10">
							<input type="password" name="password" class="form-control" placeholder="Password">
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
