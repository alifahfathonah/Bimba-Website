<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Siswa</title>
</head>
<body>
	<img src="<?= base_url('files/bimba.jpg') ?>" width="80px">
	<p>Bimba AIUEO Jaticempaka<br>
		Jl. Kemang Raya Curug. No.12, RT 006 / RW 002 <br>
		Kel. Jati Cempaka Kec. Pondok Gede. Kota Bekasi. Jawa Barat 17411<br>
		Phone : 0856-92693720
	</p>
	<center>
		<h3>Laporan Data Siswa</h3>
	</center>
	<table border="1" style="border-collapse: collapse; width: 100%" cellpadding="5">
		<thead>
     <tr>
        <th class="text-center">
           #
        </th>
        <th>Nama Siswa</th>
        <th>Orang Tua</th>
        <th>Agama</th>
        <th>Tgl. Lahir</th>
        <th>Alamat</th>
        <th>Email/No Telepon</th>
        <th>Guru/Motivator</th>
        <th>Status</th>
     </tr>
  </thead>
  <tbody>
  <?php $no = 1; foreach ($data as $x) { ?>
     <tr>
        <td><?= $no++ ?></td>
        <td>
           <img alt="image" src="<?= base_url('files/siswa/thumb/'.$x->thumb_siswa) ?>" width="35"> &nbsp;
           <?= x($x->nama_siswa) ?></td>
        <td>
           Ayah : <?= x($x->nama_ayah) ?><br>
           Ibu : <?= x($x->nama_ibu) ?>
        </td>
        <td><?= x($x->agama) ?></td>
        <td><?= tgl(x($x->tgl_lahir_siswa)) ?></td>
        <td><?= x($x->alamat_siswa) ?></td>
        <td>
           <?= x($x->email_siswa) ?><br>
           <?= x($x->telepon_siswa) ?>
        </td>
        <td class="text-center"><?= x($x->nama_guru) ?></td>
        <td>
           <?php if ($x->aktif == 0){ ?>
              <div class="badge badge-danger">Nonaktif</div>
           <?php }else{ ?>
              <div class="badge badge-success">Aktif</div>
           <?php } ?>
        </td>
     </tr>
  <?php } ?>
  </tbody>
	</table>
</body>
<script type="text/javascript">
	window.print();
</script>
</html>