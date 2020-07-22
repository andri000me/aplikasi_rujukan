<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Poli extends MY_Controller {

    // protected $access = array('Admin', 'Editor','Author');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Poli_model');
        $this->load->library('form_validation');
    }

   

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'poli/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'poli/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'poli/index.html';
            $config['first_url'] = base_url() . 'poli/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Poli_model->total_rows($q);
        $poli = $this->Poli_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'poli_data' => $poli,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('poli_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Poli_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kode_poli' => $row->kode_poli,
		'nama_poli' => $row->nama_poli,
	    );
            $this->load->view('header');
            $this->load->view('poli_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('poli'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('poli/create_action'),
	    'id' => set_value('id'),
	    'kode_poli' => set_value('kode_poli'),
	    'nama_poli' => set_value('nama_poli'),
	);
        $data['kode']=$this->Poli_model->kode();
        $this->load->view('header');
        $this->load->view('poli_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_poli' => $this->input->post('kode_poli',TRUE),
		'nama_poli' => $this->input->post('nama_poli',TRUE),
	    );

            $this->Poli_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('poli'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Poli_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('poli/update_action'),
		'id' => set_value('id', $row->id),
		'kode' => set_value('kode_poli', $row->kode_poli),
		'nama_poli' => set_value('nama_poli', $row->nama_poli),
	    );
            $this->load->view('header');
            $this->load->view('poli_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('poli'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kode_poli' => $this->input->post('kode_poli',TRUE),
		'nama_poli' => $this->input->post('nama_poli',TRUE),
	    );

            $this->Poli_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('poli'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Poli_model->get_by_id($id);

        if ($row) {
            $this->Poli_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('poli'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('poli'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_poli', 'kode poli', 'trim|required');
	$this->form_validation->set_rules('nama_poli', 'nama poli', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "poli.xls";
        $judul = "poli";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Poli");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Poli");

	foreach ($this->Poli_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_poli);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_poli);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=poli.doc");

        $data = array(
            'poli_data' => $this->Poli_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('poli_doc',$data);
    }

}

/* End of file Poli.php */
/* Location: ./application/controllers/Poli.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-13 19:25:08 */
/* http://harviacode.com */