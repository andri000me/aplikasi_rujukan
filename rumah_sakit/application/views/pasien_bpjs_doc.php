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
        <h2>Pasien_bpjs List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode Pasien</th>
		<th>No Identitas</th>
		<th>No Bpjs</th>
		<th>Nama Pasien</th>
		<th>Jenis Kelamin</th>
		<th>Usia</th>
		<th>Alamat</th>
		<th>No Hp</th>
		<th>Tanggal Daftar</th>
		
            </tr><?php
            foreach ($pasien_bpjs_data as $pasien_bpjs)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pasien_bpjs->kode_pasien ?></td>
		      <td><?php echo $pasien_bpjs->no_identitas ?></td>
		      <td><?php echo $pasien_bpjs->no_bpjs ?></td>
		      <td><?php echo $pasien_bpjs->nama_pasien ?></td>
		      <td><?php echo $pasien_bpjs->jenis_kelamin ?></td>
		      <td><?php echo $pasien_bpjs->usia ?></td>
		      <td><?php echo $pasien_bpjs->alamat ?></td>
		      <td><?php echo $pasien_bpjs->no_hp ?></td>
		      <td><?php echo $pasien_bpjs->tanggal_daftar ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>