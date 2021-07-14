<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laboratorium extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_laboratorium_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','laboratorium/tbl_pemeriksaan_laboratorium_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_laboratorium_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_laboratorium_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pemeriksaan_laboratorium' => $row->id_pemeriksaan_laboratorium,
		'nama_periksa' => $row->nama_periksa,
		'tarif' => $row->tarif,
	    );
            $this->template->load('template','laboratorium/tbl_pemeriksaan_laboratorium_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laboratorium'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('laboratorium/create_action'),
	    'id_pemeriksaan_laboratorium' => set_value('id_pemeriksaan_laboratorium'),
	    'nama_periksa' => set_value('nama_periksa'),
	    'tarif' => set_value('tarif'),
	);
        $this->template->load('template','laboratorium/tbl_pemeriksaan_laboratorium_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'id_pemeriksaan_laboratorium' => $this->input->post('id_pemeriksaan_laboratorium',TRUE),
		'nama_periksa' => $this->input->post('nama_periksa',TRUE),
		'tarif' => $this->input->post('tarif',TRUE),
	    );

            $this->Tbl_laboratorium_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            $url = site_url('laboratorium');
            echo '<link rel="stylesheet" href="'.base_url().'assets/sweetalert/sweetalert.css">';
            echo '<script src="'.base_url().'assets/sweetalert/sweetalert.min.js"></script>';
            echo "
                        <script>
                        setTimeout(function(){
                            swal({
                                title: 'Data Laboratorium Berhasil Ditambahkan',
                                icon: 'success',
                                button: 'Ok',
                            }).then(function() {
                                window.location = '$url';
                            });
                        }, 500);
                        </script>
                    ";
            //redirect(site_url('laboratorium'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_laboratorium_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('laboratorium/update_action'),
		'id_pemeriksaan_laboratorium' => set_value('id_pemeriksaan_laboratorium', $row->id_pemeriksaan_laboratorium),
		'nama_periksa' => set_value('nama_periksa', $row->nama_periksa),
		'tarif' => set_value('tarif', $row->tarif),
	    );
            $this->template->load('template','laboratorium/tbl_pemeriksaan_laboratorium_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laboratorium'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pemeriksaan_laboratorium', TRUE));
        } else {
            $data = array(
		'nama_periksa' => $this->input->post('nama_periksa',TRUE),
		'tarif' => $this->input->post('tarif',TRUE),
	    );

            $this->Tbl_laboratorium_model->update($this->input->post('id_pemeriksaan_laboratorium', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            $url = site_url('laboratorium');
            echo '<link rel="stylesheet" href="'.base_url().'assets/sweetalert/sweetalert.css">';
            echo '<script src="'.base_url().'assets/sweetalert/sweetalert.min.js"></script>';
            echo "
                        <script>
                        setTimeout(function(){
                            swal({
                                title: 'Data Laboratorium Berhasil Diupdate',
                                icon: 'success',
                                button: 'Ok',
                            }).then(function() {
                                window.location = '$url';
                            });
                        }, 500);
                        </script>
                    ";
            //redirect(site_url('laboratorium'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_laboratorium_model->get_by_id($id);

        if ($row) {
            $this->Tbl_laboratorium_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            $url = site_url('laboratorium');
            echo '<link rel="stylesheet" href="'.base_url().'assets/sweetalert/sweetalert.css">';
            echo '<script src="'.base_url().'assets/sweetalert/sweetalert.min.js"></script>';
            echo "
                        <script>
                        setTimeout(function(){
                            swal({
                                title: 'Data Laboratorium Berhasil Dihapus',
                                icon: 'success',
                                button: 'Ok',
                            }).then(function() {
                                window.location = '$url';
                            });
                        }, 500);
                        </script>
                    ";
            //redirect(site_url('laboratorium'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            echo "
                                <script>
                                setTimeout(function(){
                                    swal({
                                        title: 'Data Laboratorium Gagal Dihapus',
                                        icon: 'error',
                                    }).then(function() {
                                        window.location = '$url';
                                    });
                                }, 500);
                                </script>
                            ";
            //redirect(site_url('laboratorium'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_periksa', 'nama periksa', 'trim|required');
	$this->form_validation->set_rules('tarif', 'tarif', 'trim|required');

	$this->form_validation->set_rules('id_pemeriksaan_laboratorium', 'id_pemeriksaan_laboratorium', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Laboratorium.php */
/* Location: ./application/controllers/Laboratorium.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-17 08:48:39 */
/* http://harviacode.com */