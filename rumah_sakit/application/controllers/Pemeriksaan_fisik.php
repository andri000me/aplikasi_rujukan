<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemeriksaan_fisik extends MY_Controller {

    // protected $access = array('Admin', 'Editor','Author');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pemeriksaan_fisik_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pemeriksaan_fisik/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pemeriksaan_fisik/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pemeriksaan_fisik/index.html';
            $config['first_url'] = base_url() . 'pemeriksaan_fisik/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Pemeriksaan_fisik_model->total_rows($q);
        $pemeriksaan_fisik = $this->Pemeriksaan_fisik_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pemeriksaan_fisik_data' => $pemeriksaan_fisik,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('pemeriksaan_fisik_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Pemeriksaan_fisik_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'pemeriksaan' => $row->pemeriksaan,
	    );
            $this->load->view('header');
            $this->load->view('pemeriksaan_fisik_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemeriksaan_fisik'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pemeriksaan_fisik/create_action'),
	    'id' => set_value('id'),
	    'pemeriksaan' => set_value('pemeriksaan'),
	);

        $this->load->view('header');
        $this->load->view('pemeriksaan_fisik_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'pemeriksaan' => $this->input->post('pemeriksaan',TRUE),
	    );

            $this->Pemeriksaan_fisik_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pemeriksaan_fisik'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Pemeriksaan_fisik_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pemeriksaan_fisik/update_action'),
		'id' => set_value('id', $row->id),
		'pemeriksaan' => set_value('pemeriksaan', $row->pemeriksaan),
	    );
            $this->load->view('header');
            $this->load->view('pemeriksaan_fisik_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemeriksaan_fisik'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'pemeriksaan' => $this->input->post('pemeriksaan',TRUE),
	    );

            $this->Pemeriksaan_fisik_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pemeriksaan_fisik'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Pemeriksaan_fisik_model->get_by_id($id);

        if ($row) {
            $this->Pemeriksaan_fisik_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pemeriksaan_fisik'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemeriksaan_fisik'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('pemeriksaan', 'pemeriksaan', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pemeriksaan_fisik.php */
/* Location: ./application/controllers/Pemeriksaan_fisik.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-16 17:18:57 */
/* http://harviacode.com */