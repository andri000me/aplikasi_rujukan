<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Dashboard extends MY_Controller {

    protected $access=array('Admin');
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Grafik_model');
        $this->load->library('form_validation');
    }
    
	public function index()
	{	

        $data=array(
            'umum'=>$this->db->get_where('pasien',array('kategori_pasien'=>'UMUM')),
            'bpjs'=>$this->db->get_where('pasien',array('kategori_pasien'=>'BPJS')),
            'rs'=>$this->db->get('rumah_sakit_rujukan'),
            'surat_umum'=>$this->db->get('surat_umum'),
            'surat_bpjs'=>$this->db->get('surat_bpjs') 
        );
        $this->load->view('header');
        $this->load->view('index',$data);
        $this->load->view('footer');
        
    } 
  

    public function get_data_gender()
	{
		$this->load->model('Grafik_model');
		$data 	= $this->Grafik_model->get_data_gender();
		$cek	= json_encode($data);
		print_r($cek);
		exit(); 
	}
    public function get_data2()
	{
		$this->load->model('Grafik_model');
		$data 	= $this->Grafik_model->get_data2();
		$cek	= json_encode($data);
		print_r($cek);
		exit(); 
	}
}
?>