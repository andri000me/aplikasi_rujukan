<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Rumah_sakit_rujukan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode Rumah Sakit</th>
		<th>Nama Rumah Sakit</th>
		<th>Alamat</th>
		<th>Terima Bpjs</th>
		
            </tr><?php
            foreach ($rumah_sakit_rujukan_data as $rumah_sakit_rujukan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $rumah_sakit_rujukan->kode_rumah_sakit ?></td>
		      <td><?php echo $rumah_sakit_rujukan->nama_rumah_sakit ?></td>
		      <td><?php echo $rumah_sakit_rujukan->alamat ?></td>
		      <td><?php echo $rumah_sakit_rujukan->terima_bpjs ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>