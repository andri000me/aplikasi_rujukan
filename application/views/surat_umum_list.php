
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Surat Umum 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Surat Umum </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        

          <div class="box">
            <div class="box-header">
             
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('surat_umum/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
               <form action="<?php echo site_url('surat_umum/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('surat_umum'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>No</th>
		<th>No Surat</th>
		<th>Tanggal Surat</th>
		<!-- <th>Kode Pasien</th> -->
		<th>Nama Pasien</th>
		<th>Umur</th>
		<th>Jenis Kelamin</th>
		<th>Alamat</th>
		<!-- <th>Kode Rumah Sakit</th> -->
		<th>Nama Rumah Sakit</th>
		<th>Poli</th>
		<!-- <th>Kode Pegawai</th> -->
		<th>Nama Pegawai</th>
		<th>Action</th>
            </tr>
            </thead><?php
            foreach ($surat_umum_data as $surat_umum)
            {
                ?>
                <tbody>
                <tr>
			<td width="20px"><?php echo ++$start ?></td>
			<td><?php echo $surat_umum->no_surat ?></td>
			<td><?php echo tgl_indo($surat_umum->tanggal_surat) ?></td>
			<!-- <td><?php echo $surat_umum->kode_pasien ?></td> -->
			<td><?php echo $surat_umum->nama_pasien ?></td>
			<td><?php echo $surat_umum->umur ?></td>
			<td><?php echo $surat_umum->jenis_kelamin ?></td>
			<td><?php echo $surat_umum->alamat ?></td>
			<!-- <td><?php echo $surat_umum->kode_rumah_sakit ?></td> -->
			<td><?php echo $surat_umum->nama_rumah_sakit ?></td>
			<td><?php echo $surat_umum->poli ?></td>
			<!-- <td><?php echo $surat_umum->kode_pegawai ?></td> -->
			<td><?php echo $surat_umum->nama_pegawai ?></td>
			<td style="text-align:center" width="150px">
				<?php
				echo anchor(site_url('surat_umum/update/'.$surat_umum->id),'<i class="fa fa-pencil-square-o"></i> Edit',array('title'=>'edit','class'=>'btn btn-warning btn-sm btn-flat')); 
				echo '  '; 
				echo anchor(site_url('surat_umum/delete/'.$surat_umum->id),'<i class="fa fa-trash-o"></i> Hapus','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				echo '  '; 
				echo anchor(site_url('laporan_pdf/cetak_surat_umum/'.$surat_umum->no_surat),'<i class="fa fa-print"></i> Print','title="cetak" target="_blank" class="btn bg-maroon btn-sm btn-flat" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
			</td>
		</tr></tbody>
                <?php
            }
            ?>
            <tfoot>
                
                </tfoot>
        </table>
            
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
                <?php echo anchor(site_url('surat_umum/exportcsv'),'<i class="fa fa-file-excel-o"></i> Csv', 'class="btn btn-success btn-sm"'); ?>
	    </div>
            <div class="col-md-6 text-right">
               <!-- <?php echo $pagination ?> -->
            </div>
        </div>
    </section>
    <!-- /.content -->
