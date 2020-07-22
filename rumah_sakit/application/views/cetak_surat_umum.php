<html>
<head>
<style>
               .word-table {
                   /* border:1px solid black !important;  */
                   border-collapse: collapse !important;
                   /* width: 100%; */
               }
               .word-table tr th, .word-table tr td{
                   /* border:1px solid black !important;  */
                   padding: 0px 5px;
                  
                   
               }
               .word-table th{
                   border:1px solid black !important; 
                   padding: 0px 10px;
                   background-color:yellow;
                   
               }
           </style>

</head>
<title>SURAT RUJUKAN PASIEN UMUM</title>
<body>
    <table>
       <tr>
         <td width="200px;"><img src="image/bakti.png" alt="" width="50px;"></td>
         <td width="200px;">DINAS KESEHATAN KAB MUARO JAMBI <br>
         <p style="text-align:center;margin-top:0px;">Puskesmas PIR II Bajubang</p> 
         </td>
         <td width="200px;"></td>
       </tr>
       <tr style="margin-top:-10px;">
       <td width="200px;"></td>
         <td width="200px;" style="text-align:center;"></td>
         <td width="200px;"></td>
       </tr>
    </table>
    <hr>

    <table>
      <tr>
        <td width="250px;"><h3></h3></td>
        <td colspan="2"><h3>Surat Rujukan Pasien</h3></td>
       <td></td>
      </tr>
    </table>
    <table class="word-table">
      <tr>
        <td>No.Rujukan</td>
        <td>:</td>
        <td><?=$umum['no_surat']?></td>
      </tr>
      <tr>
        <td>Puskesmas</td>
        <td>:</td>
        <td>Puskesmas PIR II Bajubang</td>
      </tr>
      <tr>
        <td>Kabupaten</td>
        <td>:</td>
        <td>Muaro Jambi</td>
      </tr>
    </table>
     <br><br>
    <table class="word-table">
        <tr>
          <td width="80px;">Kepada Yth,  dr.Poli</td>
          <td>:</td>
          <td><?=$umum['poli']?></td>
        </tr>
        <tr>
          <td width="80px;">Di Rumah Sakit</td>
          <td>:</td>
          <td><?=$umum['nama_rumah_sakit']?></td>
        </tr>
       
        <tr>
          <td width="80px;">Tanggal</td>
          <td>:</td>
          <td><?=tgl_indo($umum['tanggal_surat'])?></td>
        </tr>
        <tr>
        
          <td colspan="4"><br> Mohon pemeriksaan lebih lanjut dan penanganan lebih lanjut penderita :</td>
        </tr>
    </table>
    <br>
    <br>
    <table class="word-table">
        <tr>
          <td>Nama Pasien</td>
          <td>:</td>
          <td><?=$umum['nama_pasien']?></td>
        </tr>
        <tr>
          <td>Usia Pasien</td>
          <td>:</td>
          <td><?=$umum['umur']?> Thn</td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>:</td>
          <td><?=$umum['jenis_kelamin']?></td>
        </tr>
        <tr>
          <td>Alamat Pasien</td>
          <td>:</td>
          <td><?=$umum['alamat']?></td>
        </tr>
        <tr>
          <td>Penyakit</td>
          <td>:</td>
          <td>
          <?php $u=$umum['no_surat']; $py=$this->db->query("SELECT * FROM detail_penyakit where no_surat='$u'")->result();?>
        <?php foreach($py as $p):?>
        <?php echo $p->penyakit.",";?>
        <?php endforeach;?>
          </td>
        </tr>
        <tr>
          <td>Diagnosa</td>
          <td>:</td>
          <td>
          <?php $u=$umum['no_surat']; $py=$this->db->query("SELECT * FROM detail_diagnosa where no_surat='$u'")->result();?>
        <?php foreach($py as $p):?>
        <?php echo $p->diagnosa.",";?>
        <?php endforeach;?>
          </td>
        </tr>
        <tr>
          <td>Pemeriksaan</td>
          <td>:</td>
          <td>
          <?php $u=$umum['no_surat']; $py=$this->db->query("SELECT * FROM detail_pemeriksaan where no_surat='$u'")->result();?>
        <?php foreach($py as $p):?>
        <?php echo $p->pemeriksaan.",";?>
        <?php endforeach;?>
          </td>
        </tr>
        <tr>
          <td>Obat</td>
          <td>:</td>
          <td>
          <?php $u=$umum['no_surat']; $py=$this->db->query("SELECT * FROM detail_obat where no_surat='$u'")->result();?>
        <?php foreach($py as $p):?>
        <?php echo $p->obat.",";?>
        <?php endforeach;?>
          </td>
        </tr>
    </table>
    <br>
    <br>
    <table class="word-table">
     <tr>
       <td>Demikian atas bantuannya, Kami ucapkan Terima Kasih.</td>
     </tr>
    </table>
<br>
<br>
    <table>
     <tr>
       <td width="200px;">Yang Menerima rujukan</td>
       <td width="300px;"><h3></h3></td>
       <td width="200px;">Mengetahui</td>
     </tr>
     <tr>
       <td width="200px;"><h3></h3></td>
       <td width="300px;"><h3></h3></td>
       <td width="200px;"><h3></h3></td>
     </tr>
   
     <tr>
       <td width="200px;"><h3><br><br></h3></td>
       <td width="300px;"><h3></h3></td>
       <td width="200px;"><h3></h3></td>
     </tr>
   
     <tr>
       <td width="200px;"><p>(___________________)</p></td>
       <td width="300px;"><h3></h3></td>
       <td width="200px;" style="text-decoration:underline;"><p>(<?=$umum['nama_pegawai']?>)</p><p>NIP :<?=$umum['kode_pegawai']?></p></td>
     </tr>
   
    </table>
</body>
</html>