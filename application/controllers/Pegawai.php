<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pegawai extends MY_Controller {

    // protected $access = array('Admin', 'Editor','Author');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pegawai_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pegawai/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pegawai/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pegawai/index.html';
            $config['first_url'] = base_url() . 'pegawai/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pegawai_model->total_rows($q);
        $pegawai = $this->Pegawai_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pegawai_data' => $pegawai,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('pegawai_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Pegawai_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nip' => $row->nip,
		'nama_lengkap' => $row->nama_lengkap,
		'jenis_kelamin' => $row->jenis_kelamin,
		'tanggal_lahir' => $row->tanggal_lahir,
		'agama' => $row->agama,
		'alamat' => $row->alamat,
		'no_telp' => $row->no_telp,
		'jabatan' => $row->jabatan,
	    );
            $this->load->view('header');
            $this->load->view('pegawai_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pegawai'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pegawai/create_action'),
	    'id' => set_value('id'),
	    'nip' => set_value('nip'),
	    'nama_lengkap' => set_value('nama_lengkap'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'agama' => set_value('agama'),
	    'alamat' => set_value('alamat'),
	    'no_telp' => set_value('no_telp'),
        'jabatan' => set_value('jabatan'),
        'pilih_jabatan'=>$this->db->query("SELECT * FROM jabatan")->result()
	);

        $this->load->view('header');
        $this->load->view('pegawai_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nip' => $this->input->post('nip',TRUE),
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
	    );

            $this->Pegawai_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pegawai'));
        }
    }
    
    public function ambil_data_pegawai()
    {
        $kode_pegawai = $_POST['kode_pegawai'];
        $data = $this->db->query("SELECT * FROM pegawai WHERE nip='$kode_pegawai'")->result();
        foreach($data as $dd)
        {
            $data =array(
                'nama_lengkap'=>$dd->nama_lengkap    
            );
            
           echo json_encode($data);
        }
    }

    public function update($id) 
    {
        $row = $this->Pegawai_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pegawai/update_action'),
		'id' => set_value('id', $row->id),
		'nip' => set_value('nip', $row->nip),
		'nama_lengkap' => set_value('nama_lengkap', $row->nama_lengkap),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'agama' => set_value('agama', $row->agama),
		'alamat' => set_value('alamat', $row->alamat),
		'no_telp' => set_value('no_telp', $row->no_telp),
        'jabatan' => set_value('jabatan', $row->jabatan),
        'pilih_jabatan'=>$this->db->query("SELECT * FROM jabatan")->result()
	    );
            $this->load->view('header');
            $this->load->view('pegawai_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pegawai'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nip' => $this->input->post('nip',TRUE),
		'nama_lengkap' => $this->input->post('nama_lengkap',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
	    );

            $this->Pegawai_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pegawai'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pegawai_model->get_by_id($id);

        if ($row) {
            $this->Pegawai_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pegawai'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pegawai'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nip', 'nip', 'trim|required');
	$this->form_validation->set_rules('nama_lengkap', 'nama lengkap', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pegawai.xls";
        $judul = "pegawai";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nip");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Lengkap");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Agama");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "No Telp");
	xlsWriteLabel($tablehead, $kolomhead++, "Jabatan");

	foreach ($this->Pegawai_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nip);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_lengkap);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->agama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_telp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jabatan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=pegawai.doc");

        $data = array(
            'pegawai_data' => $this->Pegawai_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pegawai_doc',$data);
    }

}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-13 08:53:15 */
/* http://harviacode.com */