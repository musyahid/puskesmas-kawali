<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ruanginap extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_ruang_rawat_inap_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','ruanginap/tbl_ruang_rawat_inap_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_ruang_rawat_inap_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_ruang_rawat_inap_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_ruang_rawat_inap' => $row->id_ruang_rawat_inap,
		'id_gedung' => $row->id_gedung,
		'nama_ruangan' => $row->nama_ruangan,
		'kelas' => $row->kelas,
		'tarif' => $row->tarif,
		'status' => $row->status,
	    );
            $this->template->load('template','ruanginap/tbl_ruang_rawat_inap_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ruanginap'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ruanginap/create_action'),
	    'id_ruang_rawat_inap' => set_value('id_ruang_rawat_inap'),
	    'id_gedung' => set_value('id_gedung'),
	    'nama_ruangan' => set_value('nama_ruangan'),
	    'kelas' => set_value('kelas'),
	    'tarif' => set_value('tarif'),
	    'status' => set_value('status'),
	);
        $this->template->load('template','ruanginap/tbl_ruang_rawat_inap_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'id_ruang_rawat_inap' => $this->input->post('id_ruang_rawat_inap',TRUE),
		'id_gedung' => $this->input->post('id_gedung',TRUE),
		'nama_ruangan' => $this->input->post('nama_ruangan',TRUE),
		'kelas' => $this->input->post('kelas',TRUE),
		'tarif' => $this->input->post('tarif',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Tbl_ruang_rawat_inap_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('ruanginap'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_ruang_rawat_inap_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ruanginap/update_action'),
		'id_ruang_rawat_inap' => set_value('id_ruang_rawat_inap', $row->id_ruang_rawat_inap),
		'id_gedung' => set_value('id_gedung', $row->id_gedung),
		'nama_ruangan' => set_value('nama_ruangan', $row->nama_ruangan),
		'kelas' => set_value('kelas', $row->kelas),
		'tarif' => set_value('tarif', $row->tarif),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','ruanginap/tbl_ruang_rawat_inap_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ruanginap'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_ruang_rawat_inap', TRUE));
        } else {
            $data = array(
		'id_gedung' => $this->input->post('id_gedung',TRUE),
		'nama_ruangan' => $this->input->post('nama_ruangan',TRUE),
		'kelas' => $this->input->post('kelas',TRUE),
		'tarif' => $this->input->post('tarif',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Tbl_ruang_rawat_inap_model->update($this->input->post('id_ruang_rawat_inap', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ruanginap'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_ruang_rawat_inap_model->get_by_id($id);

        if ($row) {
            $this->Tbl_ruang_rawat_inap_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ruanginap'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ruanginap'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_gedung', 'id gedung', 'trim|required');
	$this->form_validation->set_rules('nama_ruangan', 'nama ruangan', 'trim|required');
	$this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
	$this->form_validation->set_rules('tarif', 'tarif', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_ruang_rawat_inap', 'id_ruang_rawat_inap', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Ruanginap.php */
/* Location: ./application/controllers/Ruanginap.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-06 14:24:53 */
/* http://harviacode.com */