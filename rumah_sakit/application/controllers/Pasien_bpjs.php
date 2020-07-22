<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pasien_bpjs extends MY_Controller {

    // protected $access = array('Admin', 'Editor','Author');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pasien_bpjs_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pasien_bpjs/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pasien_bpjs/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pasien_bpjs/index.html';
            $config['first_url'] = base_url() . 'pasien_bpjs/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pasien_bpjs_model->total_rows($q);
        $pasien_bpjs = $this->Pasien_bpjs_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pasien_bpjs_data' => $pasien_bpjs,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('pasien_bpjs_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Pasien_bpjs_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kode_pasien' => $row->kode_pasien,
		'no_identitas' => $row->no_identitas,
		'no_bpjs' => $row->no_bpjs,
		'nama_pasien' => $row->nama_pasien,
		'jenis_kelamin' => $row->jenis_kelamin,
		'usia' => $row->usia,
		'alamat' => $row->alamat,
		'no_hp' => $row->no_hp,
		'tanggal_daftar' => $row->tanggal_daftar,
	    );
            $this->load->view('header');
            $this->load->view('pasien_bpjs_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasien_bpjs'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pasien_bpjs/create_action'),
	    'id' => set_value('id'),
	    'kode_pasien' => set_value('kode_pasien'),
	    'no_identitas' => set_value('no_identitas'),
	    'no_bpjs' => set_value('no_bpjs'),
	    'nama_pasien' => set_value('nama_pasien'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'usia' => set_value('usia'),
	    'alamat' => set_value('alamat'),
	    'no_hp' => set_value('no_hp'),
	    'tanggal_daftar' => set_value('tanggal_daftar'),
	);

        $this->load->view('header');
        $this->load->view('pasien_bpjs_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kode_pasien' => $this->input->post('kode_pasien',TRUE),
		'no_identitas' => $this->input->post('no_identitas',TRUE),
		'no_bpjs' => $this->input->post('no_bpjs',TRUE),
		'nama_pasien' => $this->input->post('nama_pasien',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'usia' => $this->input->post('usia',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'tanggal_daftar' => $this->input->post('tanggal_daftar',TRUE),
	    );

            $this->Pasien_bpjs_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pasien_bpjs'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pasien_bpjs_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pasien_bpjs/update_action'),
		'id' => set_value('id', $row->id),
		'kode_pasien' => set_value('kode_pasien', $row->kode_pasien),
		'no_identitas' => set_value('no_identitas', $row->no_identitas),
		'no_bpjs' => set_value('no_bpjs', $row->no_bpjs),
		'nama_pasien' => set_value('nama_pasien', $row->nama_pasien),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'usia' => set_value('usia', $row->usia),
		'alamat' => set_value('alamat', $row->alamat),
		'no_hp' => set_value('no_hp', $row->no_hp),
		'tanggal_daftar' => set_value('tanggal_daftar', $row->tanggal_daftar),
	    );
            $this->load->view('header');
            $this->load->view('pasien_bpjs_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasien_bpjs'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kode_pasien' => $this->input->post('kode_pasien',TRUE),
		'no_identitas' => $this->input->post('no_identitas',TRUE),
		'no_bpjs' => $this->input->post('no_bpjs',TRUE),
		'nama_pasien' => $this->input->post('nama_pasien',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'usia' => $this->input->post('usia',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'tanggal_daftar' => $this->input->post('tanggal_daftar',TRUE),
	    );

            $this->Pasien_bpjs_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pasien_bpjs'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pasien_bpjs_model->get_by_id($id);

        if ($row) {
            $this->Pasien_bpjs_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pasien_bpjs'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasien_bpjs'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kode_pasien', 'kode pasien', 'trim|required');
	$this->form_validation->set_rules('no_identitas', 'no identitas', 'trim|required');
	$this->form_validation->set_rules('no_bpjs', 'no bpjs', 'trim|required');
	$this->form_validation->set_rules('nama_pasien', 'nama pasien', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('usia', 'usia', 'trim|required|numeric');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
	$this->form_validation->set_rules('tanggal_daftar', 'tanggal daftar', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pasien_bpjs.xls";
        $judul = "pasien_bpjs";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode Pasien");
	xlsWriteLabel($tablehead, $kolomhead++, "No Identitas");
	xlsWriteLabel($tablehead, $kolomhead++, "No Bpjs");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pasien");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Usia");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "No Hp");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Daftar");

	foreach ($this->Pasien_bpjs_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kode_pasien);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_identitas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_bpjs);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pasien);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	    xlsWriteNumber($tablebody, $kolombody++, $data->usia);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_hp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_daftar);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pasien_bpjs.doc");

        $data = array(
            'pasien_bpjs_data' => $this->Pasien_bpjs_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pasien_bpjs_doc',$data);
    }

}

/* End of file Pasien_bpjs.php */
/* Location: ./application/controllers/Pasien_bpjs.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-13 09:14:04 */
/* http://harviacode.com */