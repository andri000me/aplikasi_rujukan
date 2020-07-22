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
        <h2>Pegawai List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nip</th>
		<th>Nama Lengkap</th>
		<th>Jenis Kelamin</th>
		<th>Tanggal Lahir</th>
		<th>Agama</th>
		<th>Alamat</th>
		<th>No Telp</th>
		<th>Jabatan</th>
		
            </tr><?php
            foreach ($pegawai_data as $pegawai)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pegawai->nip ?></td>
		      <td><?php echo $pegawai->nama_lengkap ?></td>
		      <td><?php echo $pegawai->jenis_kelamin ?></td>
		      <td><?php echo $pegawai->tanggal_lahir ?></td>
		      <td><?php echo $pegawai->agama ?></td>
		      <td><?php echo $pegawai->alamat ?></td>
		      <td><?php echo $pegawai->no_telp ?></td>
		      <td><?php echo $pegawai->jabatan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>