
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Penyakit 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Penyakit</li>
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
            <label class="col-sm-2 control-label" for="varchar">Kode Penyakit <?php echo form_error('kode_penyakit') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="kode_penyakit" id="kode_penyakit" placeholder="Kode Penyakit" value="<?php echo $kode; ?>" readonly/>
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Penyakit <?php echo form_error('penyakit') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="penyakit" id="penyakit" placeholder="Penyakit" value="<?php echo $penyakit; ?>" />
            </div>
        </div>
    </div>
	    
<div class="box-footer">
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('penyakit') ?>" class="btn btn-default">Cancel</a>
	
</div>
</form>
</div>
</div>
</div>
