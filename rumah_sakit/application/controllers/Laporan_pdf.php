  <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This controller can be accessed 
 * for all logged in users
 */
class Laporan_pdf extends MY_Controller {

   

   function __construct() {
        parent::__construct();
        require_once APPPATH.'third_party/dompdf/dompdf_config.inc.php';
    }
    
   
   

     
      public function cetak_surat_umum($no_surat)
      {
          $dompdf= new Dompdf();
          $data['umum']=$this->db->query("SELECT * FROM surat_umum where no_surat='$no_surat'")->row_array();
        
          // $data['umum']=  $this->db->query("SELECT a.*,b.*,c.*,d.*,e.* FROM surat_umum a JOIN detail_penyakit b on a.no_surat=b.no_surat JOIN detail_diagnosa c on a.no_surat=c.no_surat JOIN detail_pemeriksaan d on a.no_surat=d.no_surat JOIN detail_obat e on a.no_surat=e.no_surat")->result();
          $data['start']=0;
          $html=$this->load->view('cetak_surat_umum',$data,true);
         
          $dompdf->load_html($html);
          $dompdf->set_paper('A4','potrait');
          $dompdf->render();
         
          $pdf = $dompdf->output();
   
          $dompdf->stream('Surat Rujukan Pasien UMUM.pdf',array("Attachment"=>FALSE));
       }
      public function cetak_surat_bpjs($no_surat)
      {
          $dompdf= new Dompdf();
          $data['umum']=$this->db->query("SELECT * FROM surat_bpjs where no_surat='$no_surat'")->row_array();
        
          // $data['umum']=  $this->db->query("SELECT a.*,b.*,c.*,d.*,e.* FROM surat_umum a JOIN detail_penyakit b on a.no_surat=b.no_surat JOIN detail_diagnosa c on a.no_surat=c.no_surat JOIN detail_pemeriksaan d on a.no_surat=d.no_surat JOIN detail_obat e on a.no_surat=e.no_surat")->result();
          $data['start']=0;
          $html=$this->load->view('cetak_surat_bpjs',$data,true);
         
          $dompdf->load_html($html);
          $dompdf->set_paper('A4','potrait');
          $dompdf->render();
         
          $pdf = $dompdf->output();
   
          $dompdf->stream('Surat Rujukan Pasien BPJS.pdf',array("Attachment"=>FALSE));
       }

     
    
}


