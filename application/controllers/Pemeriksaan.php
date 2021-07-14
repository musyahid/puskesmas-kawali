<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemeriksaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tb_diagnosa_penyakit_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','pemeriksaan/tb_diagnosa_penyakit_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tb_diagnosa_penyakit_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tb_diagnosa_penyakit_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_diagnosa_penyakit' => $row->id_diagnosa_penyakit,
		'nama_penyakit' => $row->nama_penyakit,
		'ciri_ciri_penyakit' => $row->ciri_ciri_penyakit,
		'keterangan' => $row->keterangan,
		'ciri_ciri_umum' => $row->ciri_ciri_umum,
	    );
            $this->template->load('template','pemeriksaan/tb_diagnosa_penyakit_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemeriksaan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pemeriksaan/create_action'),
	    'id_diagnosa_penyakit' => set_value('id_diagnosa_penyakit'),
	    'nama_penyakit' => set_value('nama_penyakit'),
	    'ciri_ciri_penyakit' => set_value('ciri_ciri_penyakit'),
	    'keterangan' => set_value('keterangan'),
	    'ciri_ciri_umum' => set_value('ciri_ciri_umum'),
	);
        $this->template->load('template','pemeriksaan/tb_diagnosa_penyakit_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'id_diagnosa_penyakit' => $this->input->post('id_diagnosa_penyakit',TRUE),
		'nama_penyakit' => $this->input->post('nama_penyakit',TRUE),
		'ciri_ciri_penyakit' => $this->input->post('ciri_ciri_penyakit',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'ciri_ciri_umum' => $this->input->post('ciri_ciri_umum',TRUE),
	    );

            $this->Tb_diagnosa_penyakit_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            $url = site_url('pemeriksaan');
            echo '<link rel="stylesheet" href="'.base_url().'assets/sweetalert/sweetalert.css">';
            echo '<script src="'.base_url().'assets/sweetalert/sweetalert.min.js"></script>';
            echo "
                        <script>
                        setTimeout(function(){
                            swal({
                                title: 'Data Diagnosa Penyakit Berhasil Ditambahkan',
                                icon: 'success',
                                button: 'Ok',
                            }).then(function() {
                                window.location = '$url';
                            });
                        }, 500);
                        </script>
                    ";
           // redirect(site_url('pemeriksaan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_diagnosa_penyakit_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pemeriksaan/update_action'),
		'id_diagnosa_penyakit' => set_value('id_diagnosa_penyakit', $row->id_diagnosa_penyakit),
		'nama_penyakit' => set_value('nama_penyakit', $row->nama_penyakit),
		'ciri_ciri_penyakit' => set_value('ciri_ciri_penyakit', $row->ciri_ciri_penyakit),
		'keterangan' => set_value('keterangan', $row->keterangan),
		'ciri_ciri_umum' => set_value('ciri_ciri_umum', $row->ciri_ciri_umum),
	    );
            $this->template->load('template','pemeriksaan/tb_diagnosa_penyakit_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemeriksaan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_diagnosa_penyakit', TRUE));
        } else {
            $data = array(
		'nama_penyakit' => $this->input->post('nama_penyakit',TRUE),
		'ciri_ciri_penyakit' => $this->input->post('ciri_ciri_penyakit',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
		'ciri_ciri_umum' => $this->input->post('ciri_ciri_umum',TRUE),
	    );

            $this->Tb_diagnosa_penyakit_model->update($this->input->post('id_diagnosa_penyakit', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            $url = site_url('pemeriksaan');
            echo '<link rel="stylesheet" href="'.base_url().'assets/sweetalert/sweetalert.css">';
            echo '<script src="'.base_url().'assets/sweetalert/sweetalert.min.js"></script>';
            echo "
                        <script>
                        setTimeout(function(){
                            swal({
                                title: 'Data Diagnosa Penyakit Berhasil Diupdate',
                                icon: 'success',
                                button: 'Ok',
                            }).then(function() {
                                window.location = '$url';
                            });
                        }, 500);
                        </script>
                    ";
            //redirect(site_url('pemeriksaan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_diagnosa_penyakit_model->get_by_id($id);

        if ($row) {
            $this->Tb_diagnosa_penyakit_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            $url = site_url('pemeriksaan');
            echo '<link rel="stylesheet" href="'.base_url().'assets/sweetalert/sweetalert.css">';
            echo '<script src="'.base_url().'assets/sweetalert/sweetalert.min.js"></script>';
            echo "
                        <script>
                        setTimeout(function(){
                            swal({
                                title: 'Data Diagnosa Penyakit Berhasil Dihapus',
                                icon: 'success',
                                button: 'Ok',
                            }).then(function() {
                                window.location = '$url';
                            });
                        }, 500);
                        </script>
                    ";
           // redirect(site_url('pemeriksaan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemeriksaan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_penyakit', 'nama penyakit', 'trim|required');
	$this->form_validation->set_rules('ciri_ciri_penyakit', 'ciri ciri penyakit', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
	$this->form_validation->set_rules('ciri_ciri_umum', 'ciri ciri umum', 'trim|required');

	$this->form_validation->set_rules('id_diagnosa_penyakit', 'id_diagnosa_penyakit', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Pemeriksaan.php */
/* Location: ./application/controllers/Pemeriksaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-17 08:19:55 */
/* http://harviacode.com */