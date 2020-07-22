<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rumah_sakit_rujukan extends MY_Controller {

    // protected $access = array('Admin', 'Editor','Author');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Rumah_sakit_rujukan_model');
        $this->load->library('form_validation');
    }


    function kode()
    {
             $this->db->select('RIGHT(rumah_sakit_rujukan.kode_rumah_sakit,2) as kode_rumah_sakit', FALSE);
             $this->db->order_by('kode_rumah_sakit','DESC');    
             $this->db->limit(1);    
             $query = $this->db->get('rumah_sakit_rujukan');  //cek dulu apakah ada sudah ada kode di tabel.    
             if($query->num_rows() <> 0){      
                  //cek kode jika telah tersedia    
                  $data = $query->row();      
                  $kode = intval($data->kode_rumah_sakit) + 1; 
             }
             else{      
                  $kode = 1;  //cek jika kode belum terdapat pada table
             }
                 $tgl=date('dmY'); 
                 $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
                 $kodetampil = "RS"."-".$batas;  //format kode
                 return $kodetampil;  
   }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'rumah_sakit_rujukan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'rumah_sakit_rujukan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'rumah_sakit_rujukan/index.html';
            $config['first_url'] = base_url() . 'rumah_sakit_rujukan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Rumah_sakit_rujukan_model->total_rows($q);
        $rumah_sakit_rujukan = $this->Rumah_sakit_rujukan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'rumah_sakit_rujukan_data' => $rumah_sakit_rujukan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('rumah_sakit_rujukan_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Rumah_sakit_rujukan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kode_rumah_sakit' => $row->kode_rumah_sakit,
		'nama_rumah_sakit' => $row->nama_rumah_sakit,
		'alamat' => $row->alamat,
		'terima_bpjs' => $row->terima_bpjs,
	    );
            $this->load->view('header');
            $this->load->view('rumah_sakit_rujukan_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rumah_sakit_rujukan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('rumah_sakit_rujukan/create_action'),
	    'id' => set_value('id'),
	    'kode_rumah_sakit' => set_value('kode_rumah_sakit'),
	    'nama_rumah_sakit' => set_value('nama_rumah_sakit'),
	    'alamat' => set_value('alamat'),
	    'terima_bpjs' => set_value('terima_bpjs'),
	);
        $data['kode']=$this->kode();
        $this->load->view('header');
        $this->load->view('rumah_sakit_rujukan_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_rumah_sakit' => $this->input->post('kode_rumah_sakit',TRUE),
		'nama_rumah_sakit' => $this->input->post('nama_rumah_sakit',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'terima_bpjs' => $this->input->post('terima_bpjs',TRUE),
	    );

            $this->Rumah_sakit_rujukan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('rumah_sakit_rujukan'));
        }
    }
    
    public function ambil_data_rs()
    {
        $kode_rumah_sakit = $_POST['kode_rumah_sakit'];
        $data = $this->db->query("SELECT * FROM rumah_sakit_rujukan WHERE kode_rumah_sakit='$kode_rumah_sakit'")->result();
        foreach($data as $dd)
        {
            $data =array(
                'nama_rumah_sakit'=>$dd->nama_rumah_sakit    
            );
            
           echo json_encode($data);
        }
    }


    public function update($id) 
    {
        $row = $this->Rumah_sakit_rujukan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('rumah_sakit_rujukan/update_action'),
		'id' => set_value('id', $row->id),
		'kode' => set_value('kode_rumah_sakit', $row->kode_rumah_sakit),
		'nama_rumah_sakit' => set_value('nama_rumah_sakit', $row->nama_rumah_sakit),
		'alamat' => set_value('alamat', $row->alamat),
		'terima_bpjs' => set_value('terima_bpjs', $row->terima_bpjs),
	    );
            $this->load->view('header');
            $this->load->view('rumah_sakit_rujukan_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rumah_sakit_rujukan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kode_rumah_sakit' => $this->input->post('kode_rumah_sakit',TRUE),
		'nama_rumah_sakit' => $this->input->post('nama_rumah_sakit',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'terima_bpjs' => $this->input->post('terima_bpjs',TRUE),
	    );

            $this->Rumah_sakit_rujukan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('rumah_sakit_rujukan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Rumah_sakit_rujukan_model->get_by_id($id);

        if ($row) {
            $this->Rumah_sakit_rujukan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('rumah_sakit_rujukan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('rumah_sakit_rujukan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_rumah_sakit', 'kode rumah sakit', 'trim|required');
	$this->form_validation->set_rules('nama_rumah_sakit', 'nama rumah sakit', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('terima_bpjs', 'terima bpjs', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "rumah_sakit_rujukan.xls";
        $judul = "rumah_sakit_rujukan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Rumah Sakit");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Rumah Sakit");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Terima Bpjs");

	foreach ($this->Rumah_sakit_rujukan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_rumah_sakit);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_rumah_sakit);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->terima_bpjs);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=rumah_sakit_rujukan.doc");

        $data = array(
            'rumah_sakit_rujukan_data' => $this->Rumah_sakit_rujukan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('rumah_sakit_rujukan_doc',$data);
    }

}

/* End of file Rumah_sakit_rujukan.php */
/* Location: ./application/controllers/Rumah_sakit_rujukan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-13 09:14:09 */
/* http://harviacode.com */