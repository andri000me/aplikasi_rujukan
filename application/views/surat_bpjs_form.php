
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Surat_bpjs 
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Surat_bpjs</li>
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
                <input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="No Surat" value="<?php echo $kode; ?>" readonly/>
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="date">Tanggal Surat <?php echo form_error('tanggal_surat') ?></label>
            <div class="col-sm-6">
                <input type="date" class="form-control" name="tanggal_surat" id="tanggal_surat" placeholder="Tanggal Surat" value="<?php echo $tanggal_surat; ?>" />
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Kode Pasien <?php echo form_error('kode_pasien') ?></label>
            <div class="col-sm-6">
            <select name="kode_pasien" id="kode_pasien" class="form-control">
                <option value="<?=$kode_pasien?>" selected>Select an option</option>
                <?php $ps=$this->db->query("SELECT * FROM pasien")->result();?>
                <?php foreach($ps as $pr):?>
                <option value="<?=$pr->kode_pasien?>"><?=$pr->kode_pasien?> | <?=$pr->nama_pasien?></option>
                <?php endforeach;?>
              </select>
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
                <input type="number" class="form-control" name="umur" id="umur" placeholder="Umur" value="<?php echo $umur; ?>" />
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
                <textarea class="alamat" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">No Kartu <?php echo form_error('no_kartu') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="no_kartu" id="no_kartu" placeholder="No Kartu" value="<?php echo $no_kartu; ?>" />
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Kode Rumah Sakit <?php echo form_error('kode_rumah_sakit') ?></label>
            <div class="col-sm-6">
            <select name="kode_rumah_sakit" id="kode_rumah_sakit" class="form-control">
                <option value="<?=$kode_rumah_sakit?>" selected>Select an option</option>
                <?php $rs=$this->db->query("SELECT * FROM rumah_sakit_rujukan")->result();?>
                <?php foreach($rs as $nr):?>
                <option value="<?=$nr->kode_rumah_sakit?>"><?=$nr->kode_rumah_sakit?> | <?=$nr->nama_rumah_sakit?></option>
                <?php endforeach;?>
              </select>
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Nama Rumah Sakit <?php echo form_error('nama_rumah_sakit') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama_rumah_sakit" id="nama_rumah_sakit" placeholder="Nama Rumah Sakit" value="<?php echo $nama_rumah_sakit; ?>" readonly />
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Poli <?php echo form_error('poli') ?></label>
            <div class="col-sm-6">
            <select name="poli" id="poli" class="form-control">
                <option value="<?=$poli?>" selected>Select an option</option>
                <?php $pol=$this->db->query("SELECT * FROM poli")->result();?>
                <?php foreach($pol as $pl):?>
                <option value="<?=$pl->nama_poli?>"><?=$pl->nama_poli?></option>
                <?php endforeach;?>
              </select>
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">NIK <?php echo form_error('kode_pegawai') ?></label>
            <div class="col-sm-6">
              <select name="kode_pegawai" id="kode_pegawai" class="form-control">
                <option value="<?=$kode_pegawai?>" selected>Select an option</option>
                <?php $ni=$this->db->query("SELECT * FROM pegawai")->result();?>
                <?php foreach($ni as $n):?>
                <option value="<?=$n->nip?>"><?=$n->nip?> | <?=$n->nama_lengkap?></option>
                <?php endforeach;?>
              </select>
            </div>
        </div>
    </div>
	   
    <div class="box-body"> 
        <div class="form-group">
            <label class="col-sm-2 control-label" for="varchar">Nama Pegawai <?php echo form_error('nama_pegawai') ?></label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai" value="<?php echo $nama_pegawai; ?>" readonly/>
            </div>
        </div>
    </div>
    <div class="box-body"> 
        <div class="form-group">
            <div class="col-md-12">
            <a class="btn btn-flat btn-danger btn-block" disabled>Pemeriksaan dan Diagnosa</a>

            </div>
        </div>
    </div>
    <div class="box-body"> 
        <div class="form-group">
           <div class="col-md-12">
            <div class="table-responsive">
                <table>
                    <tr>
                    <td width="300px;">
                        Penyakit
                            <select name="penyakit" id="penyakit" class="form-control">
                                <option value="">Select an option</option>
                                <?php $penyakit=$this->db->query("SELECT * FROM penyakit")->result();?>
                                    <?php foreach($penyakit as $p):?>
                                    <option value="<?=$p->penyakit?>"><?=$p->penyakit?></option>
                                    <?php endforeach;?>    
                            </select>
                        </td>
                        <td style="padding-left:3px;padding-right:3px;">
                        <br>
                            <a class="btn btn-primary btn-sm" title="tambah penyakit" onclick="add_penyakit();"><i class="fa fa-plus"></i></a>
                        </td>
                        <td width="300px;">
                            Diagnosa
                            <select name="diagnosa" id="diagnosa" class="form-control">
                                <option value="">Select an option</option>
                                <?php $diagnosa=$this->db->query("SELECT * FROM diagnosa")->result();?>
                                    <?php foreach($diagnosa as $d):?>
                                    <option value="<?=$d->diagnosa?>"><?=$d->diagnosa?></option>
                                    <?php endforeach;?>    
                            </select>
                        </td>
                        <td style="padding-left:3px;padding-right:3px;">
                        <br>
                            <a class="btn btn-primary btn-sm" title="tambah diagnosa" onclick="add_diagnosa();"><i class="fa fa-plus"></i></a>
                        </td>
                        <td width="300px;">
                            Pemeriksaan Fisik
                            <select name="pemeriksaan" id="pemeriksaan" class="form-control">
                                <option value="">Select an option</option>
                                <?php $pemeriksaan=$this->db->query("SELECT * FROM pemeriksaan_fisik")->result();?>
                                    <?php foreach($pemeriksaan as $ps):?>
                                    <option value="<?=$ps->pemeriksaan?>"><?=$ps->pemeriksaan?></option>
                                    <?php endforeach;?>    
                            </select>
                        </td>
                        <td style="padding-left:3px;padding-right:3px;">
                        <br>
                            <a class="btn btn-primary btn-sm" title="tambah pemeriksaan" onclick="add_pemeriksaan();"><i class="fa fa-plus"></i></a>
                        </td>
                        <td width="300px;">
                            Obat
                            <select name="obat" id="obat" class="form-control">
                                <option value="">Select an option</option>
                                <?php $obat=$this->db->query("SELECT * FROM obat")->result();?>
                                    <?php foreach($obat as $o):?>
                                    <option value="<?=$o->obat?>"><?=$o->obat?></option>
                                    <?php endforeach;?>    
                            </select>
                        </td>
                        <td style="padding-left:3px;padding-right:3px;">
                        <br>
                            <a class="btn btn-primary btn-sm" title="tambah obat" onclick="add_obat();"><i class="fa fa-plus"></i></a>
                        </td>
                    </tr>
                </table>
            </div>
           </div>
        </div>
    </div>
	    
    <div class="box-body"> 
        <div class="form-group">
            
            <div class="col-md-3">
            <div id="list_ku1" class="table-responsive"></div>
            </div>

            <div class="col-md-3">
            <div id="list_ku2" class="table-responsive"></div>
            </div>
            
            <div class="col-md-3">
            <div id="list_ku3" class="table-responsive"></div>
            </div>
            
            <div class="col-md-3">
            <div id="list_ku4" class="table-responsive"></div>
            </div>
        </div>
    </div>
    

<div class="box-footer">
    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('surat_bpjs') ?>" class="btn btn-default">Cancel</a>
	
</div>
</form>
</div>
</div>
</div>
<body onload="load_data_temp1();load_data_temp2();load_data_temp3();load_data_temp4();"></body>

</style>

<!-- Content Header (Page header) -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script type="text/javascript">
function load_data_temp1()
        {
            
            var no_surat  =  $("#no_surat").val();
            $.ajax({
                type:"GET",
                url:"<?php echo base_url('surat_bpjs/load_temp1')?>",
                data:"no_surat="+no_surat,
                success:function(penyakitnya){
                    $('#list_ku1').html(penyakitnya);
                    $("#penyakit").val('');
                }
            });
            
        }
function load_data_temp2()
        {
          
            var no_surat  =  $("#no_surat").val();
            $.ajax({
                type:"GET",
               url:"<?php echo base_url('surat_bpjs/load_temp2')?>",
                data:"no_surat="+no_surat,
                success:function(diagnosanya){
                    $('#list_ku2').html(diagnosanya);
                    $("#diagnosa").val('');
                   
                }
            });
            
        }
function load_data_temp3()
        {
            
            var no_surat  =  $("#no_surat").val();
            $.ajax({
                type:"GET",
               url:"<?php echo base_url('surat_bpjs/load_temp3')?>",
                data:"no_surat="+no_surat,
                success:function(pemeriksaannya){
                    $('#list_ku3').html(pemeriksaannya);
                    $("#pemeriksaan").val('');
                }
            });
            
        }
function load_data_temp4()
        {
            
            var no_surat  =  $("#no_surat").val();
            $.ajax({
                type:"GET",
               url:"<?php echo base_url('surat_bpjs/load_temp4')?>",
                data:"no_surat="+no_surat,
                success:function(obatnya){
                    $('#list_ku4').html(obatnya);
                    $("#obat").val('');
                }
            });
            
        }

         function hapus_penyakit(id)
        {
            $.ajax({
                type:"GET",
                url:"<?php echo base_url('surat_bpjs/hapus_temp1')?>",
                data:"id="+id,
                success:function(html){
                  $("#datap"+id).hide(500);
                  load_data_temp1();
                }
            });
        }
         function hapus_diagnosa(id)
        {
            $.ajax({
                type:"GET",
                url:"<?php echo base_url('surat_bpjs/hapus_temp2')?>",
                data:"id="+id,
                success:function(html){
                  $("#datad"+id).hide(500);
                  load_data_temp2();
                }
            });
        }
         function hapus_pemeriksaan(id)
        {
            $.ajax({
                type:"GET",
                url:"<?php echo base_url('surat_bpjs/hapus_temp3')?>",
                data:"id="+id,
                success:function(html){
                  $("#datapm"+id).hide(500);
                  load_data_temp3();
                }
            });
        }
         function hapus_obat(id)
        {
            $.ajax({
                type:"GET",
                url:"<?php echo base_url('surat_bpjs/hapus_temp4')?>",
                data:"id="+id,
                success:function(html){
                  $("#datao"+id).hide(500);
                  load_data_temp4();
                }
            });
        }

        function add_penyakit()
        {
                var no_surat     = $("#no_surat").val();
                var penyakit     = $("#penyakit").val();
            
               
            if(no_surat == '' || penyakit == '' ){
                alert("Data Belum Lengkap");
                die;
            }
            else
            {
             $.ajax({
                type:"GET",
                url:"<?php echo base_url('surat_bpjs/input_penyakit')?>",
                data:"no_surat="+no_surat+"&penyakit="+penyakit,
                success:function(html){
                   load_data_temp1();
                    $("#penyakit").val('');
                    document.getElementById("penyakit").focus();
                   
                }
             });
        }
}
        function add_diagnosa()
        {
                var no_surat     = $("#no_surat").val();
                var diagnosa     = $("#diagnosa").val();
            
               
            if(no_surat == '' || diagnosa == '' ){
                alert("Data Belum Lengkap");
                die;
            }
            else
            {
             $.ajax({
                type:"GET",
                url:"<?php echo base_url('surat_bpjs/input_diagnosa')?>",
                data:"no_surat="+no_surat+"&diagnosa="+diagnosa,
                success:function(html){
                   load_data_temp2();
                    $("#diagnosa").val('');
                    document.getElementById("diagnosa").focus();
                   
                }
             });
        }
}
        function add_pemeriksaan()
        {
                var no_surat     = $("#no_surat").val();
                var pemeriksaan     = $("#pemeriksaan").val();
            
               
            if(no_surat == '' || pemeriksaan == '' ){
                alert("Data Belum Lengkap");
                die;
            }
            else
            {
             $.ajax({
                type:"GET",
                url:"<?php echo base_url('surat_bpjs/input_pemeriksaan')?>",
                data:"no_surat="+no_surat+"&pemeriksaan="+pemeriksaan,
                success:function(html){
                   load_data_temp3();
                    $("#pemeriksaan").val('');
                    document.getElementById("pemeriksaan").focus();
                   
                }
             });
        }
}
        function add_obat()
        {
                var no_surat     = $("#no_surat").val();
                var obat     = $("#obat").val();
            
               
            if(no_surat == '' || obat == '' ){
                alert("Data Belum Lengkap");
                die;
            }
            else
            {
             $.ajax({
                type:"GET",
                url:"<?php echo base_url('surat_bpjs/input_obat')?>",
                data:"no_surat="+no_surat+"&obat="+obat,
                success:function(html){
                   load_data_temp4();
                    $("#obat").val('');
                    document.getElementById("obat").focus();
                   
                }
             });
        }
}

$(document).ready(function(){

$('#kode_pegawai').change(function(){    
var kode_pegawainya = $('#kode_pegawai').val(); 

$.ajax({      
    method: "POST",      
    url: "<?php echo base_url('pegawai/ambil_data_pegawai')?>", 
    dataType:'json',  
    data: { kode_pegawai: kode_pegawainya}
  
  })
    .done(function( hasilpg) {   
      $("#nama_pegawai").val(hasilpg.nama_lengkap);
     
    });
})
});
$(document).ready(function(){

$('#kode_rumah_sakit').change(function(){    
var kode_rumah_sakitnya = $('#kode_rumah_sakit').val(); 

$.ajax({      
    method: "POST",      
    url: "<?php echo base_url('rumah_sakit_rujukan/ambil_data_rs')?>", 
    dataType:'json',  
    data: { kode_rumah_sakit: kode_rumah_sakitnya}
  
  })
    .done(function( hasilrs) {   
      $("#nama_rumah_sakit").val(hasilrs.nama_rumah_sakit);
     
    });
})
});


$(document).ready(function(){

$('#kode_pasien').change(function(){    
var kode_pasiennya = $('#kode_pasien').val(); 

$.ajax({      
    method: "POST",      
    url: "<?php echo base_url('pasien/ambil_data_pasien')?>", 
    dataType:'json',  
    data: { kode_pasien: kode_pasiennya}
  
  })
    .done(function( hasilps) {   
      $("#nama_pasien").val(hasilps.nama_pasien);
      $("#umur").val(hasilps.usia);
      $("#jenis_kelamin").val(hasilps.jenis_kelamin);
      CKEDITOR.instances['alamat'].setData(hasilps.alamat);
      $("#no_kartu").val(hasilps.no_bpjs);
    });
})
});

    </script>