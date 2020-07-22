<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penyakit extends MY_Controller {

    // protected $access = array('Admin', 'Editor','Author');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Penyakit_model');
        $this->load->library('form_validation');
    }

    function kode()
    {
             $this->db->select('RIGHT(penyakit.kode_penyakit,2) as kode_penyakit', FALSE);
             $this->db->order_by('kode_penyakit','DESC');    
             $this->db->limit(1);    
             $query = $this->db->get('penyakit');  //cek dulu apakah ada sudah ada kode di tabel.    
             if($query->num_rows() <> 0){      
                  //cek kode jika telah tersedia    
                  $data = $query->row();      
                  $kode = intval($data->kode_penyakit) + 1; 
             }
             else{      
                  $kode = 1;  //cek jika kode belum terdapat pada table
             }
                 $tgl=date('dmY'); 
                 $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
                 $kodetampil = "P"."-".$batas;  //format kode
                 return $kodetampil;  
   }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'penyakit/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'penyakit/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'penyakit/index.html';
            $config['first_url'] = base_url() . 'penyakit/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Penyakit_model->total_rows($q);
        $penyakit = $this->Penyakit_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'penyakit_data' => $penyakit,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('penyakit_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Penyakit_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kode_penyakit' => $row->kode_penyakit,
		'penyakit' => $row->penyakit,
	    );
            $this->load->view('header');
            $this->load->view('penyakit_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penyakit'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('penyakit/create_action'),
	    'id' => set_value('id'),
	    'kode_penyakit' => set_value('kode_penyakit'),
	    'penyakit' => set_value('penyakit'),
	);
        $data['kode']=$this->kode();
        $this->load->view('header');
        $this->load->view('penyakit_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_penyakit' => $this->input->post('kode_penyakit',TRUE),
		'penyakit' => $this->input->post('penyakit',TRUE),
	    );

            $this->Penyakit_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('penyakit'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Penyakit_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penyakit/update_action'),
		'id' => set_value('id', $row->id),
		'kode' => set_value('kode_penyakit', $row->kode_penyakit),
		'penyakit' => set_value('penyakit', $row->penyakit),
	    );
            $this->load->view('header');
            $this->load->view('penyakit_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penyakit'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kode_penyakit' => $this->input->post('kode_penyakit',TRUE),
		'penyakit' => $this->input->post('penyakit',TRUE),
	    );

            $this->Penyakit_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('penyakit'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Penyakit_model->get_by_id($id);

        if ($row) {
            $this->Penyakit_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('penyakit'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penyakit'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_penyakit', 'kode penyakit', 'trim|required');
	$this->form_validation->set_rules('penyakit', 'penyakit', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "penyakit.xls";
        $judul = "penyakit";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Penyakit");
	xlsWriteLabel($tablehead, $kolomhead++, "Penyakit");

	foreach ($this->Penyakit_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_penyakit);
	    xlsWriteLabel($tablebody, $kolombody++, $data->penyakit);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=penyakit.doc");

        $data = array(
            'penyakit_data' => $this->Penyakit_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('penyakit_doc',$data);
    }

}

/* End of file Penyakit.php */
/* Location: ./application/controllers/Penyakit.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-13 09:00:55 */
/* http://harviacode.com */