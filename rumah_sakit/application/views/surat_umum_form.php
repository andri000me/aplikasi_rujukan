
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Surat_umum 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Surat_umum</li>
      </ol>
    </section>


<!-- column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="<?php echo $action; ?>" method="post" class="form-horizontal">
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">No Surat <?php echo form_error('no_surat') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="No Surat" value="<?php echo $no_surat; ?>" />
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="date">Tanggal Surat <?php echo form_error('tanggal_surat') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="tanggal_surat" id="tanggal_surat" placeholder="Tanggal Surat" value="<?php echo $tanggal_surat; ?>" />
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Kode Pasien <?php echo form_error('kode_pasien') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kode_pasien" id="kode_pasien" placeholder="Kode Pasien" value="<?php echo $kode_pasien; ?>" />
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Nama Pasien <?php echo form_error('nama_pasien') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" placeholder="Nama Pasien" value="<?php echo $nama_pasien; ?>" />
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="int">Umur <?php echo form_error('umur') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="umur" id="umur" placeholder="Umur" value="<?php echo $umur; ?>" />
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>" />
            </div>
        </div>
    </div>
	    
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label" for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <div class="col-sm-6">
                <textarea class="ckeditor" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Kode Rumah Sakit <?php echo form_error('kode_rumah_sakit') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kode_rumah_sakit" id="kode_rumah_sakit" placeholder="Kode Rumah Sakit" value="<?php echo $kode_rumah_sakit; ?>" />
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Nama Rumah Sakit <?php echo form_error('nama_rumah_sakit') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama_rumah_sakit" id="nama_rumah_sakit" placeholder="Nama Rumah Sakit" value="<?php echo $nama_rumah_sakit; ?>" />
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Poli <?php echo form_error('poli') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="poli" id="poli" placeholder="Poli" value="<?php echo $poli; ?>" />
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Kode Pegawai <?php echo form_error('kode_pegawai') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kode_pegawai" id="kode_pegawai" placeholder="Kode Pegawai" value="<?php echo $kode_pegawai; ?>" />
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Nama Pegawai <?php echo form_error('nama_pegawai') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai" value="<?php echo $nama_pegawai; ?>" />
            </div>
        </div>
    </div>
	    
<div class="box-footer">
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('surat_umum') ?>" class="btn btn-default">Cancel</a>
	
</div>
</form>
</div>
</div>
</div>
