
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Rumah_sakit_rujukan 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Rumah_sakit_rujukan</li>
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
            <label class="col-sm-2 control-label" for="varchar">Kode Rumah Sakit <?php echo form_error('kode_rumah_sakit') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kode_rumah_sakit" id="kode_rumah_sakit" placeholder="Kode Rumah Sakit" value="<?php echo $kode; ?>" readonly/>
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
            <label class="col-sm-2 control-label" for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <div class="col-sm-6">
                <textarea class="ckeditor" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="enum">Terima Bpjs <?php echo form_error('terima_bpjs') ?></label>
            <div class="col-sm-6">
                <!-- <input type="text" class="form-control" name="terima_bpjs" id="terima_bpjs" placeholder="Terima Bpjs" value="<?php echo $terima_bpjs; ?>" /> -->
                <select name="terima_bpjs" id="terima_bpjs" class="form-control">
                    <option value="<?=$terima_bpjs?>"selected>Select an option</option>
                    <option value="YA">YA</option>
                    <option value="TIDAK">TIDAK</option>
                </select>
            </div>
        </div>
    </div>
	    
<div class="box-footer">
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('rumah_sakit_rujukan') ?>" class="btn btn-default">Cancel</a>
	
</div>
</form>
</div>
</div>
</div>
