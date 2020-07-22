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
        <h2 style="margin-top:0px">Surat_bpjs Read</h2>
        <table class="table">
	    <tr><td>No Surat</td><td><?php echo $no_surat; ?></td></tr>
	    <tr><td>Tanggal Surat</td><td><?php echo $tanggal_surat; ?></td></tr>
	    <tr><td>Kode Pasien</td><td><?php echo $kode_pasien; ?></td></tr>
	    <tr><td>Nama Pasien</td><td><?php echo $nama_pasien; ?></td></tr>
	    <tr><td>Umur</td><td><?php echo $umur; ?></td></tr>
	    <tr><td>Jenis Kelamin</td><td><?php echo $jenis_kelamin; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>No Kartu</td><td><?php echo $no_kartu; ?></td></tr>
	    <tr><td>Kode Rumah Sakit</td><td><?php echo $kode_rumah_sakit; ?></td></tr>
	    <tr><td>Nama Rumah Sakit</td><td><?php echo $nama_rumah_sakit; ?></td></tr>
	    <tr><td>Poli</td><td><?php echo $poli; ?></td></tr>
	    <tr><td>Kode Pegawai</td><td><?php echo $kode_pegawai; ?></td></tr>
	    <tr><td>Nama Pegawai</td><td><?php echo $nama_pegawai; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('surat_bpjs') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>