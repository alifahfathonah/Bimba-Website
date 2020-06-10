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
				<form method="POST" action="<?= site_url('admin/info/insert') ?>" enctype="multipart/form-data">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Nama Website</label>
						<div class="col-sm-5">
							<input type="text" name="nama_website" required class="form-control" placeholder="Nama Website">
						</div>
						<div class="col-sm-5">
							<input type="text" name="nama_singkat_website" required class="form-control" placeholder="Nama Singkat Website">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Deskripsi Webiste</label>
						<div class="col-sm-10">
							<textarea name="deskripsi" required class="form-control" placeholder="Deskripsi Webiste"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Alamat Webiste</label>
						<div class="col-sm-10">
							<textarea name="alamat" required class="form-control" placeholder="Alamat Webiste"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Email Website</label>
						<div class="col-sm-10">
							<input type="email" name="email" required class="form-control" placeholder="Email Website">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Telepon Webiste</label>
						<div class="col-sm-10">
							<input type="text" name="no_telepon" required class="form-control" placeholder="Telepon Webiste">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Sosmed Website</label>
						<div class="col-sm-4">
							<div class="input-group mb-2">
		                        <div class="input-group-prepend">
		                          <div class="input-group-text"><i class="fab fa-facebook"></i></div>
		                        </div>
		                        <input type="text" name="facebook" class="form-control" required placeholder="Facebook">
		                    </div>
						</div>
						<div class="col-sm-3">
							<div class="input-group mb-2">
		                        <div class="input-group-prepend">
		                          <div class="input-group-text"><i class="fab fa-twitter"></i></div>
		                        </div>
		                        <input type="text" name="twitter" class="form-control" required placeholder="Twitter">
		                    </div>
						</div>
						<div class="col-sm-3">
							<div class="input-group mb-2">
		                        <div class="input-group-prepend">
		                          <div class="input-group-text"><i class="fab fa-instagram"></i></div>
		                        </div>
		                        <input type="text" name="instagram" class="form-control" required placeholder="Instagram">
		                    </div>
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
                url  : "<?= site_url('admin/info/data') ?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $('#loading').modal('hide');
                    $("#nama_website").val(data.nama_website);
                    $("#nama_singkat_website").val(data.nama_singkat_website);
                    $("#deskripsi").val(data.deskripsi);
                    $("#alamat").val(data.alamat);
                    $("#email").val(data.email);
                    $("#no_telepon").val(data.no_telepon);
                    $("#facebook").val(data.facebook);
                    $("#twitter").val(data.twitter);
                    $("#instagram").val(data.instagram);
                    $("#id_info").val(data.id_info);
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
				<form method="POST" action="<?= site_url('admin/info/update') ?>" enctype="multipart/form-data">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Nama Website</label>
						<div class="col-sm-5">
							<input type="text" id="nama_website" name="nama_website" required class="form-control" placeholder="Nama Website">
						</div>
						<div class="col-sm-5">
							<input type="text" id="nama_singkat_website" name="nama_singkat_website" required class="form-control" placeholder="Nama Singkat Website">
							<input type="hidden" name="id_info" id="id_info">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Deskripsi Webiste</label>
						<div class="col-sm-10">
							<textarea id="deskripsi" name="deskripsi" required class="form-control" placeholder="Deskripsi Webiste"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Alamat Webiste</label>
						<div class="col-sm-10">
							<textarea id="alamat" name="alamat" required class="form-control" placeholder="Alamat Webiste"></textarea>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Email Website</label>
						<div class="col-sm-10">
							<input type="email" id="email" name="email" required class="form-control" placeholder="Email Website">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Telepon Webiste</label>
						<div class="col-sm-10">
							<input type="text" id="no_telepon" name="no_telepon" required class="form-control" placeholder="Telepon Webiste">
						</div>
					</div>
					<div class="form-group row">
						<label class="col-sm-2 col-form-label">Sosmed Website</label>
						<div class="col-sm-4">
							<div class="input-group mb-2">
		                        <div class="input-group-prepend">
		                          <div class="input-group-text"><i class="fab fa-facebook"></i></div>
		                        </div>
		                        <input type="text" id="facebook" name="facebook" class="form-control" required placeholder="Facebook">
		                    </div>
						</div>
						<div class="col-sm-3">
							<div class="input-group mb-2">
		                        <div class="input-group-prepend">
		                          <div class="input-group-text"><i class="fab fa-twitter"></i></div>
		                        </div>
		                        <input type="text" id="twitter" name="twitter" class="form-control" required placeholder="Twitter">
		                    </div>
						</div>
						<div class="col-sm-3">
							<div class="input-group mb-2">
		                        <div class="input-group-prepend">
		                          <div class="input-group-text"><i class="fab fa-instagram"></i></div>
		                        </div>
		                        <input type="text" id="instagram" name="instagram" class="form-control" required placeholder="Instagram">
		                    </div>
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
