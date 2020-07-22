 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?=$umum->num_rows();?></h3>

              <p>Pasien Umum</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-plus"></i>
            </div>
            <!-- <a href="<?=base_url('user');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
            <h3><?=$bpjs->num_rows();?></h3>

              <p>Pasien BPJS</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <!-- <a href="<?=base_url('kendaraan');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            <h3><?=$rs->num_rows();?></h3>

              <p>Rumah Sakit Rujukan</p>
            </div>
            <div class="icon">
              <i class="fa fa-hospital-o"></i>
            </div>
            <!-- <a href="<?=base_url('petugas');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
            <h3><?=$surat_umum->num_rows() + $surat_bpjs->num_rows();?></h3>

              <p>Total Surat Rujukan</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-o"></i>
            </div>
            <!-- <a href="<?=base_url('lokasi_operasional');?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
      </div>
  
        <div class="row text-center">
            <div class="col-md-6">
              <div class="box">
              <div class="box-header">
                <h3>Grafik Pasien Berdasarkan Gender</h3>
              </div>
              <div class="box-body">
                <div class="chart-container">
                    <div class="chart">
                    <div id="gender" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
                    </div>
                  </div>
              </div>
              <!-- /.box-body -->
              </div>
            </div>
            <div class="col-md-6">
              <div class="box">
              <div class="box-header">
                <h3>Grafik Pasien Berdasarkan Jenis Pasien</h3>
              </div>
              <div class="box-body">
                <div class="chart-container">
                    <div class="chart">
                    <div id="rujukan" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
                    </div>
                  </div>
              </div>
              <!-- /.box-body -->
              </div>
            </div>
        </div>
       


    
     </section>

    
<script async="" src="https://www.youtube.com/iframe_api"></script>
<script>
 function onYouTubeIframeAPIReady() {
  var player;
  player = new YT.Player('muteYouTubeVideoPlayer', {
    videoId: 'VLUy16hnRhs', // YouTube Video ID
    width: 600,               // panjang video (in px)
    height: 360,              // lebar video (in px)
    playerVars: {
      autoplay: 0,        // Auto-play ketika video dimuat
      controls: 0,        // Menyembunyikan play/pause
      showinfo: 0,        // Menyembunyikan judul video
      modestbranding: 0,  // Menyembunyikan logo Youtube ketika video diputar
      loop: 0,            // Mengulang video lagi ketika selesai diputar
      fs: 0,              // Menyembunyikan tombol fullscreen
      cc_load_policty: 0, // Menyembunyikan captions
      iv_load_policy: 3,  // Menyembunyikan anotasi
      autohide: 1,       // Menyembunyikan kontrol video
      hd:1 
    },
   
  });
 }
 
</script>