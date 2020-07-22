<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Surat_bpjs extends MY_Controller {

    // protected $access = array('Admin', 'Editor','Author');
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Surat_bpjs_model');
        $this->load->library('form_validation');
    }


    function kode()
    {
             $this->db->select('RIGHT(surat_bpjs.no_surat,2) as no_surat', FALSE);
             $this->db->order_by('no_surat','DESC');    
             $this->db->limit(1);    
             $query = $this->db->get('surat_bpjs');  //cek dulu apakah ada sudah ada kode di tabel.    
             if($query->num_rows() <> 0){      
                  //cek kode jika telah tersedia    
                  $data = $query->row();      
                  $kode = intval($data->no_surat) + 1; 
             }
             else{      
                  $kode = 1;  //cek jika kode belum terdapat pada table
             }
                 $tgl=date('dmY'); 
                 $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);    
                 $kodetampil = "RU"."BPJS-".$tgl.$batas;  //format kode
                 return $kodetampil;  
   }




   public function hapus_temp1()
    {
        $id=$_GET['id'];
        $this->db->query("DELETE FROM detail_penyakit where id='$id'");
    }
   public function hapus_temp2()
    {
        $id=$_GET['id'];
        $this->db->query("DELETE FROM detail_diagnosa where id='$id'");
    }
   public function hapus_temp3()
    {
        $id=$_GET['id'];
        $this->db->query("DELETE FROM detail_pemeriksaan where id='$id'");
    }
   public function hapus_temp4()
    {
        $id=$_GET['id'];
        $this->db->query("DELETE FROM detail_obat where id='$id'");
    }

     // fungsi ajax
     public function load_temp1()
     {
         echo " <table class='table table-bordered table-striped table-hover'>
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Penyakit</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>";
                     $id=$_GET['no_surat'];
                     $no=1;
                     $data = $this->db->query("SELECT * FROM detail_penyakit where no_surat='$id'")->result();
                     foreach ($data as $d) {
                      
                         echo "<tbody><tr id='datap$d->id'>
                                 <td>$no</td>
                                 <td>$d->penyakit</td>
                                 <td><button type ='button' class='btn btn-icon btn-sm btn-danger' onClick='hapus_penyakit($d->id)'><i class='fa fa-close'></i> Batal</td>
                              </tr>
                            </tbody>  ";
                         $no++;
                         
                     }
                     echo "</table>";  
                    
     }
     public function load_temp2()
     {
         echo " <table class='table table-bordered table-striped table-hover'>
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Diagnosa</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>";
                     $id=$_GET['no_surat'];
                     $no=1;
                     $data = $this->db->query("SELECT * FROM detail_diagnosa where no_surat='$id'")->result();
                     foreach ($data as $d) {
                      
                         echo "<tbody><tr id='datad$d->id'>
                                 <td>$no</td>
                                 <td>$d->diagnosa</td>
                                 <td><button type ='button' class='btn btn-icon btn-sm btn-danger' onClick='hapus_diagnosa($d->id)'><i class='fa fa-close'></i> Batal</td>
                              </tr>
                            </tbody>  ";
                         $no++;
                         
                     }
                     echo "</table>";  
                    
     }
     public function load_temp3()
     {
         echo " <table class='table table-bordered table-striped table-hover'>
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Pemeriksaan</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>";
                     $id=$_GET['no_surat'];
                     $no=1;
                     $data = $this->db->query("SELECT * FROM detail_pemeriksaan where no_surat='$id'")->result();
                     foreach ($data as $d) {
                      
                         echo "<tbody><tr id='datapm$d->id'>
                                 <td>$no</td>
                                 <td>$d->pemeriksaan</td>
                                 <td><button type ='button' class='btn btn-icon btn-sm btn-danger' onClick='hapus_pemeriksaan($d->id)'><i class='fa fa-close'></i> Batal</td>
                              </tr>
                            </tbody>  ";
                         $no++;
                         
                     }
                     echo "</table>";  
                    
     }
     public function load_temp4()
     {
         echo " <table class='table table-bordered table-striped table-hover'>
                        <thead>
                        <tr>
                        <th>No</th>
                        <th>Obat</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>";
                     $id=$_GET['no_surat'];
                     $no=1;
                     $data = $this->db->query("SELECT * FROM detail_obat where no_surat='$id'")->result();
                     foreach ($data as $d) {
                      
                         echo "<tbody><tr id='datao$d->id'>
                                 <td>$no</td>
                                 <td>$d->obat</td>
                                 <td><button type ='button' class='btn btn-icon btn-sm btn-danger' onClick='hapus_obat($d->id)'><i class='fa fa-close'></i> Batal</td>
                              </tr>
                            </tbody>  ";
                         $no++;
                         
                     }
                     echo "</table>";  
                    
     }
    

     function input_penyakit()
    {
 
         $no_surat       = $_GET['no_surat'];
         $penyakit           = $_GET['penyakit'];
      
 
        $data=array(
            'no_surat'=>$no_surat,
            'penyakit'=>$penyakit,
       
              
            );
        $this->db->insert('detail_penyakit',$data);
    }
     function input_diagnosa()
    {
 
         $no_surat       = $_GET['no_surat'];
         $diagnosa           = $_GET['diagnosa'];
      
 
        $data=array(
            'no_surat'=>$no_surat,
            'diagnosa'=>$diagnosa,
       
              
            );
        $this->db->insert('detail_diagnosa',$data);
    }
     function input_pemeriksaan()
    {
 
         $no_surat       = $_GET['no_surat'];
         $pemeriksaan     = $_GET['pemeriksaan'];
      
 
        $data=array(
            'no_surat'=>$no_surat,
            'pemeriksaan'=>$pemeriksaan,
       
              
            );
        $this->db->insert('detail_pemeriksaan',$data);
    }
     function input_obat()
    {
 
         $no_surat       = $_GET['no_surat'];
         $obat     = $_GET['obat'];
      
 
        $data=array(
            'no_surat'=>$no_surat,
            'obat'=>$obat,
       
              
            );
        $this->db->insert('detail_obat',$data);
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'surat_bpjs/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'surat_bpjs/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'surat_bpjs/index.html';
            $config['first_url'] = base_url() . 'surat_bpjs/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Surat_bpjs_model->total_rows($q);
        $surat_bpjs = $this->Surat_bpjs_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'surat_bpjs_data' => $surat_bpjs,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('header');
        $this->load->view('surat_bpjs_list', $data);
        $this->load->view('footer');
    }

    public function read($id) 
    {
        $row = $this->Surat_bpjs_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'no_surat' => $row->no_surat,
		'tanggal_surat' => $row->tanggal_surat,
		'kode_pasien' => $row->kode_pasien,
		'nama_pasien' => $row->nama_pasien,
		'umur' => $row->umur,
		'jenis_kelamin' => $row->jenis_kelamin,
		'alamat' => $row->alamat,
		'no_kartu' => $row->no_kartu,
		'kode_rumah_sakit' => $row->kode_rumah_sakit,
		'nama_rumah_sakit' => $row->nama_rumah_sakit,
		'poli' => $row->poli,
		'kode_pegawai' => $row->kode_pegawai,
		'nama_pegawai' => $row->nama_pegawai,
	    );
            $this->load->view('header');
            $this->load->view('surat_bpjs_read', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_bpjs'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('surat_bpjs/create_action'),
	    'id' => set_value('id'),
	    'no_surat' => set_value('no_surat'),
	    'tanggal_surat' => set_value('tanggal_surat'),
	    'kode_pasien' => set_value('kode_pasien'),
	    'nama_pasien' => set_value('nama_pasien'),
	    'umur' => set_value('umur'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'alamat' => set_value('alamat'),
	    'no_kartu' => set_value('no_kartu'),
	    'kode_rumah_sakit' => set_value('kode_rumah_sakit'),
	    'nama_rumah_sakit' => set_value('nama_rumah_sakit'),
	    'poli' => set_value('poli'),
	    'kode_pegawai' => set_value('kode_pegawai'),
	    'nama_pegawai' => set_value('nama_pegawai'),
	);

        $data['kode']=$this->kode();
        $this->load->view('header');
        $this->load->view('surat_bpjs_form', $data);
        $this->load->view('footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_surat' => $this->input->post('no_surat',TRUE),
		'tanggal_surat' => $this->input->post('tanggal_surat',TRUE),
		'kode_pasien' => $this->input->post('kode_pasien',TRUE),
		'nama_pasien' => $this->input->post('nama_pasien',TRUE),
		'umur' => $this->input->post('umur',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_kartu' => $this->input->post('no_kartu',TRUE),
		'kode_rumah_sakit' => $this->input->post('kode_rumah_sakit',TRUE),
		'nama_rumah_sakit' => $this->input->post('nama_rumah_sakit',TRUE),
		'poli' => $this->input->post('poli',TRUE),
		'kode_pegawai' => $this->input->post('kode_pegawai',TRUE),
		'nama_pegawai' => $this->input->post('nama_pegawai',TRUE),
	    );

            $this->Surat_bpjs_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('surat_bpjs'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Surat_bpjs_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('surat_bpjs/update_action'),
		'id' => set_value('id', $row->id),
		'kode' => set_value('no_surat', $row->no_surat),
		'tanggal_surat' => set_value('tanggal_surat', $row->tanggal_surat),
		'kode_pasien' => set_value('kode_pasien', $row->kode_pasien),
		'nama_pasien' => set_value('nama_pasien', $row->nama_pasien),
		'umur' => set_value('umur', $row->umur),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'alamat' => set_value('alamat', $row->alamat),
		'no_kartu' => set_value('no_kartu', $row->no_kartu),
		'kode_rumah_sakit' => set_value('kode_rumah_sakit', $row->kode_rumah_sakit),
		'nama_rumah_sakit' => set_value('nama_rumah_sakit', $row->nama_rumah_sakit),
		'poli' => set_value('poli', $row->poli),
		'kode_pegawai' => set_value('kode_pegawai', $row->kode_pegawai),
		'nama_pegawai' => set_value('nama_pegawai', $row->nama_pegawai),
	    );
            $this->load->view('header');
            $this->load->view('surat_bpjs_form', $data);
            $this->load->view('footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_bpjs'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'no_surat' => $this->input->post('no_surat',TRUE),
		'tanggal_surat' => $this->input->post('tanggal_surat',TRUE),
		'kode_pasien' => $this->input->post('kode_pasien',TRUE),
		'nama_pasien' => $this->input->post('nama_pasien',TRUE),
		'umur' => $this->input->post('umur',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'no_kartu' => $this->input->post('no_kartu',TRUE),
		'kode_rumah_sakit' => $this->input->post('kode_rumah_sakit',TRUE),
		'nama_rumah_sakit' => $this->input->post('nama_rumah_sakit',TRUE),
		'poli' => $this->input->post('poli',TRUE),
		'kode_pegawai' => $this->input->post('kode_pegawai',TRUE),
		'nama_pegawai' => $this->input->post('nama_pegawai',TRUE),
	    );

            $this->Surat_bpjs_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('surat_bpjs'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Surat_bpjs_model->get_by_id($id);

        if ($row) {
            $this->Surat_bpjs_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('surat_bpjs'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('surat_bpjs'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_surat', 'no surat', 'trim|required');
	$this->form_validation->set_rules('tanggal_surat', 'tanggal surat', 'trim|required');
	$this->form_validation->set_rules('kode_pasien', 'kode pasien', 'trim|required');
	$this->form_validation->set_rules('nama_pasien', 'nama pasien', 'trim|required');
	$this->form_validation->set_rules('umur', 'umur', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('no_kartu', 'no kartu', 'trim|required');
	$this->form_validation->set_rules('kode_rumah_sakit', 'kode rumah sakit', 'trim|required');
	$this->form_validation->set_rules('nama_rumah_sakit', 'nama rumah sakit', 'trim|required');
	$this->form_validation->set_rules('poli', 'poli', 'trim|required');
	$this->form_validation->set_rules('kode_pegawai', 'kode pegawai', 'trim|required');
	$this->form_validation->set_rules('nama_pegawai', 'nama pegawai', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Surat_bpjs.php */
/* Location: ./application/controllers/Surat_bpjs.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-04-16 17:15:50 */
/* http://harviacode.com */