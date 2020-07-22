
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pasien_bpjs 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pasien_bpjs</li>
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
            <label class="col-sm-2 control-label" for="varchar">Kode Pasien <?php echo form_error('kode_pasien') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kode_pasien" id="kode_pasien" placeholder="Kode Pasien" value="<?php echo $kode_pasien; ?>" />
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">No Identitas <?php echo form_error('no_identitas') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="no_identitas" id="no_identitas" placeholder="No Identitas" value="<?php echo $no_identitas; ?>" />
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">No Bpjs <?php echo form_error('no_bpjs') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="no_bpjs" id="no_bpjs" placeholder="No Bpjs" value="<?php echo $no_bpjs; ?>" />
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
            <label class="col-sm-2 control-label" for="varchar">Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>" />
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="double">Usia <?php echo form_error('usia') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="usia" id="usia" placeholder="Usia" value="<?php echo $usia; ?>" />
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
            <label class="col-sm-2 control-label" for="varchar">No Hp <?php echo form_error('no_hp') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" />
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="date">Tanggal Daftar <?php echo form_error('tanggal_daftar') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="tanggal_daftar" id="tanggal_daftar" placeholder="Tanggal Daftar" value="<?php echo $tanggal_daftar; ?>" />
            </div>
        </div>
    </div>
	    
<div class="box-footer">
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pasien_bpjs') ?>" class="btn btn-default">Cancel</a>
	
</div>
</form>
</div>
</div>
</div>
