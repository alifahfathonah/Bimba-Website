<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Penilaian</title>
</head>
<body>
	<img src="<?= base_url('files/bimba.jpg') ?>" width="80px">
	<p>Bimba AIUEO Jaticempaka<br>
		Jl. Kemang Raya Curug. No.12, RT 006 / RW 002 <br>
		Kel. Jati Cempaka Kec. Pondok Gede. Kota Bekasi. Jawa Barat 17411<br>
		Phone : 0856-92693720
	</p>
	<center>
		<h3>Laporan Data Penilaian</h3>
		<h3><?= $bulan ?></h3>
	</center>
	<table border="1" style="border-collapse: collapse; width: 100%" cellpadding="5">
		<thead>
           <tr>
              <th class="text-center">
                 #
              </th>
              <th>Nama Siswa</th>
              <th>Tipe Modul</th>
              <th>Modul</th>
              <th>Minggu Ke-</th>
              <th>Bulan</th>
              <th>Nilai</th>
              <th>Komentar</th>
           </tr>
        </thead>
        <tbody>
        <?php $no = 1; foreach ($data as $x) { ?>
           <tr>
              <td><?= $no++ ?></td>
              <td>
                 <img alt="image" src="<?= base_url('files/siswa/thumb/'.$x->thumb_siswa) ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="<?= x($x->nama_siswa) ?>"> &nbsp;
                 <?= x($x->nama_siswa) ?></td>
              </td>
              <td><?= x($x->tipe_modul) ?></td>
              <td><?= x($x->nama_modul) ?></td>
              <td><?= x($x->minggu) ?></td>
              <td><?= bulan(x($x->bulan)) ?></td>
              <td><?= x($x->nilai) ?></td>
              <td><?= x($x->komentar) ?></td>
           </tr>
        <?php } ?>
        </tbody>
	</table>
</body>
<script type="text/javascript">
	window.print();
</script>
</html>