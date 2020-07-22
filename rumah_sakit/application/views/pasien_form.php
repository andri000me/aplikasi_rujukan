<body onload="cek_kategori();">
    
</body>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pasien 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pasien</li>
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
                <input type="text" class="form-control" name="kode_pasien" id="kode_pasien" placeholder="Kode Pasien" value="<?php echo $kode; ?>" readonly/>
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">No Identitas <?php echo form_error('no_identitas') ?></label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="no_identitas" id="no_identitas" placeholder="No Identitas" value="<?php echo $no_identitas; ?>" />
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="double">Kategori Pasien <?php echo form_error('kategori_pasien') ?></label>
            <div class="col-sm-6">
                <select name="kategori_pasien" id="kategori_pasien" class="form-control">
                <?php $kate="";
                    if($kategori_pasien==""){
                        $kate="Select an option";
                    }elseif($kategori_pasien=="BPJS"){
                        $kate="BPJS";
                    }elseif($kategori_pasien=="UMUM"){
                        $kate="UMUM";
                    }
                ?>
                    <option value="<?=$kate;?>"selected><?php echo $kate;?></option>
                    <option value="UMUM">Umum</option>
                    <option value="BPJS">BPJS</option>
                </select>
            </div>
        </div>
    </div>
	   
    <div class="box-body" id="ket"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar" >No Bpjs <?php echo form_error('no_bpjs') ?></label>
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
               <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
               <option value="<?=$jenis_kelamin;?>" selected>Select an option</option>
               <option value="Pria">Pria</option>
               <option value="Wanita">Wanita</option>
               </select>
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="double">Usia <?php echo form_error('usia') ?></label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="usia" id="usia" placeholder="Usia" value="<?php echo $usia; ?>" />
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
                <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" />
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="date">Tanggal Daftar <?php echo form_error('tanggal_daftar') ?></label>
            <div class="col-sm-6">
                <input type="date" class="form-control" name="tanggal_daftar" id="tanggal_daftar" placeholder="Tanggal Daftar" value="<?php echo $tanggal_daftar; ?>" />
            </div>
        </div>
    </div>
	    
<div class="box-footer">
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pasien') ?>" class="btn btn-default">Cancel</a>
	
</div>
</form>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script type="text/javascript">
// ambil nama karyawan,jabatan dan juga gaji pokok
$(document).ready(function(){

$('#kategori_pasien').change(function(){  
  
var kategori = $('#kategori_pasien').val();
if(kategori=="UMUM"){
  $('#ket').hide();
  $('#no_bpjs').hide();
}else if(kategori_pasien==""){
    $('#ket').show();
    $('#no_bpjs').show();
}else {
    $('#ket').show();
    $('#no_bpjs').show();
}
 
 });
});
</script>

<script>
function cek_kategori(){
    var kategori=$('#kategori_pasien').val();
    if(kategori=="UMUM"){
  $('#ket').hide();
  $('#no_bpjs').hide();
}else if(kategori_pasien==""){
    $('#ket').show();
    $('#no_bpjs').show();
}else {
    $('#ket').show();
    $('#no_bpjs').show();
}
}
</script>