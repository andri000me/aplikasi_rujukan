<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Pasien_umum Read</h2>
        <table class="table">
	    <tr><td>Kode Pasien</td><td><?php echo $kode_pasien; ?></td></tr>
	    <tr><td>No Identitas</td><td><?php echo $no_identitas; ?></td></tr>
	    <tr><td>Nama Pasien</td><td><?php echo $nama_pasien; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
	    <tr><td>Usia</td><td><?php echo $usia; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>No Hp</td><td><?php echo $no_hp; ?></td></tr>
	    <tr><td>Tanggal Daftar</td><td><?php echo $tanggal_daftar; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pasien_umum') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>