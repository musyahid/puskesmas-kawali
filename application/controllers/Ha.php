<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ha extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_tempat_tidur_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'ha/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ha/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ha/index.html';
            $config['first_url'] = base_url() . 'ha/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tbl_tempat_tidur_model->total_rows($q);
        $ha = $this->Tbl_tempat_tidur_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'ha_data' => $ha,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','ha/tbl_tempat_tidur_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_tempat_tidur_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tempat_tidur' => $row->id_tempat_tidur,
		'id_ruang_rawat_inap' => $row->id_ruang_rawat_inap,
		'status' => $row->status,
	    );
            $this->template->load('template','ha/tbl_tempat_tidur_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ha'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ha/create_action'),
	    'id_tempat_tidur' => set_value('id_tempat_tidur'),
	    'id_ruang_rawat_inap' => set_value('id_ruang_rawat_inap'),
	    'status' => set_value('status'),
	);
        $this->template->load('template','ha/tbl_tempat_tidur_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_ruang_rawat_inap' => $this->input->post('id_ruang_rawat_inap',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Tbl_tempat_tidur_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('ha'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_tempat_tidur_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ha/update_action'),
		'id_tempat_tidur' => set_value('id_tempat_tidur', $row->id_tempat_tidur),
		'id_ruang_rawat_inap' => set_value('id_ruang_rawat_inap', $row->id_ruang_rawat_inap),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','ha/tbl_tempat_tidur_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ha'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tempat_tidur', TRUE));
        } else {
            $data = array(
		'id_ruang_rawat_inap' => $this->input->post('id_ruang_rawat_inap',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Tbl_tempat_tidur_model->update($this->input->post('id_tempat_tidur', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ha'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_tempat_tidur_model->get_by_id($id);

        if ($row) {
            $this->Tbl_tempat_tidur_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ha'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ha'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_ruang_rawat_inap', 'id ruang rawat inap', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_tempat_tidur', 'id_tempat_tidur', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Ha.php */
/* Location: ./application/controllers/Ha.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-06 12:34:07 */
/* http://harviacode.com */