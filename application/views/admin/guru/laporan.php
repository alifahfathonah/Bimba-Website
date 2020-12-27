<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Guru</title>
</head>
<body>
	<img src="<?= base_url('files/bimba.jpg') ?>" width="80px">
	<p>Bimba AIUEO Jaticempaka<br>
		Jl. Kemang Raya Curug. No.12, RT 006 / RW 002 <br>
		Kel. Jati Cempaka Kec. Pondok Gede. Kota Bekasi. Jawa Barat 17411<br>
		Phone : 0856-92693720
	</p>
	<center>
		<h3>Laporan Data Guru</h3>
	</center>
	<table border="1" style="border-collapse: collapse; width: 100%" cellpadding="5">
		<thead>
           <tr>
              <th class="text-center">
                 #
              </th>
              <th>Nama Guru</th>
              <th>Alamat</th>
              <th>Email/No Telepon</th>
              <th>Status</th>
              <th>Login</th>
           </tr>
        </thead>
        <tbody>
        <?php $no = 1; foreach ($data as $x) { ?>
           <tr>
              <td><?= $no++ ?></td>
              <td>
                 <img alt="image" src="<?= base_url('files/guru/thumb/'.$x->thumb_guru) ?>" width="35"> &nbsp;
                 <?= x($x->nama_guru) ?></td>
              <td><?= x($x->alamat_guru) ?></td>
              <td>
                 <?= x($x->email_guru) ?><br>
                 <?= x($x->telepon_guru) ?>
              </td>
              <td>
                 <?php if ($x->aktif == 0){ ?>
                    <div class="badge badge-danger">Nonaktif</div>
                 <?php }else{ ?>
                    <div class="badge badge-success">Aktif</div>
                 <?php } ?>
              </td>
              <td class="text-center"><?= x($x->login == null ? "Belum pernah login":$x->login) ?></td>
           </tr>
        <?php } ?>
        </tbody>
	</table>
</body>
<script type="text/javascript">
	window.print();
</script>
</html>