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
        <h2 style="margin-top:0px">Rumah_sakit_rujukan Read</h2>
        <table class="table">
	    <tr><td>Kode Rumah Sakit</td><td><?php echo $kode_rumah_sakit; ?></td></tr>
	    <tr><td>Nama Rumah Sakit</td><td><?php echo $nama_rumah_sakit; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Terima Bpjs</td><td><?php echo $terima_bpjs; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('rumah_sakit_rujukan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>