
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Surat BPJS 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Surat BPJS </li>
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
                <?php echo anchor(site_url('surat_bpjs/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
               <!-- <form action="<?php echo site_url('surat_bpjs/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('surat_bpjs'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form> -->
            </div>
        </div>
        <div >
        <table id="example1" class="table table-bordered table-striped" style="overflow-x:auto;">
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
		<th>No Kartu</th>
		<!-- <th>Kode Rumah Sakit</th> -->
		<th>Nama Rumah Sakit</th>
		<th>Poli</th>
		<!-- <th>Kode Pegawai</th> -->
		<th>Nama Pegawai</th>
		<th>Action</th>
            </tr>
            </thead><?php
            foreach ($surat_bpjs_data as $surat_bpjs)
            {
                ?>
                <tbody>
                <tr>
			<td><?php echo ++$start ?></td>
			<td  width="150px;"><?php echo $surat_bpjs->no_surat ?></td>
			<td><?php echo tgl_indo($surat_bpjs->tanggal_surat) ?></td>
			<!-- <td><?php echo $surat_bpjs->kode_pasien ?></td> -->
			<td><?php echo $surat_bpjs->nama_pasien ?></td>
			<td><?php echo $surat_bpjs->umur ?></td>
			<td><?php echo $surat_bpjs->jenis_kelamin ?></td>
			<td><?php echo $surat_bpjs->alamat ?></td>
			<td><?php echo $surat_bpjs->no_kartu ?></td>
			<!-- <td><?php echo $surat_bpjs->kode_rumah_sakit ?></td> -->
			<td><?php echo $surat_bpjs->nama_rumah_sakit ?></td>
			<td><?php echo $surat_bpjs->poli ?></td>
			<!-- <td><?php echo $surat_bpjs->kode_pegawai ?></td> -->
			<td><?php echo $surat_bpjs->nama_pegawai ?></td>
			<td style="text-align:center"  width="150px;" >
				<?php 
				echo anchor(site_url('surat_bpjs/update/'.$surat_bpjs->id),'<i class="fa fa-pencil-square-o"></i> Edit',array('title'=>'edit','class'=>'btn btn-warning btn-sm btn-flat')); 
				echo '  '; 
        echo anchor(site_url('surat_bpjs/delete/'.$surat_bpjs->id),'<i class="fa fa-trash-o"></i> Hapus','title="delete" class="btn btn-danger btn-sm btn-flat" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
        echo '  '; 
				echo anchor(site_url('laporan_pdf/cetak_surat_bpjs/'.$surat_bpjs->no_surat),'<i class="fa fa-print"></i> Cetak Surat','title="print" target="_blank" class="btn bg-maroon btn-sm btn-flat" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
                <?php echo anchor(site_url('surat_bpjs/exportcsv'),'<i class="fa fa-file-excel-o"></i> Csv', 'class="btn btn-success btn-sm"'); ?>
	    </div>
            <div class="col-md-6 text-right">
               <!-- <?php echo $pagination ?> -->
            </div>
        </div>
    </section>
    <!-- /.content -->
