<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tempattdr extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_tempat_tidurtdr_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tempattdr/tbl_tempat_tidur_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_tempat_tidurtdr_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_tempat_tidurtdr_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tempat_tidur' => $row->id_tempat_tidur,
		'id_ruang_rawat_inap' => $row->id_ruang_rawat_inap,
		'status' => $row->status,
	    );
            $this->template->load('template','tempattdr/tbl_tempat_tidur_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tempattdr'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tempattdr/create_action'),
	    'id_tempat_tidur' => set_value('id_tempat_tidur'),
	    'id_ruang_rawat_inap' => set_value('id_ruang_rawat_inap'),
	    'status' => set_value('status'),
	);
        $this->template->load('template','tempattdr/tbl_tempat_tidur_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'id_tempat_tidur' => $this->input->post('id_tempat_tidur'),
		'id_ruang_rawat_inap' => $this->input->post('id_ruang_rawat_inap',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Tbl_tempat_tidurtdr_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tempattdr'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_tempat_tidurtdr_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tempattdr/update_action'),
		'id_tempat_tidur' => set_value('id_tempat_tidur', $row->id_tempat_tidur),
		'id_ruang_rawat_inap' => set_value('id_ruang_rawat_inap', $row->id_ruang_rawat_inap),
		'status' => set_value('status', $row->status),
	    );
            $this->template->load('template','tempattdr/tbl_tempat_tidur_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tempattdr'));
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

            $this->Tbl_tempat_tidurtdr_model->update($this->input->post('id_tempat_tidur', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tempattdr'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_tempat_tidurtdr_model->get_by_id($id);

        if ($row) {
            $this->Tbl_tempat_tidurtdr_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tempattdr'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tempattdr'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_ruang_rawat_inap', 'id ruang rawat inap', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('id_tempat_tidur', 'id_tempat_tidur', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_tempat_tidur.xls";
        $judul = "tbl_tempat_tidur";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Ruang Rawat Inap");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");

	foreach ($this->Tbl_tempat_tidurtdr_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_ruang_rawat_inap);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_tempat_tidur.doc");

        $data = array(
            'tbl_tempat_tidur_data' => $this->Tbl_tempat_tidurtdr_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tempattdr/tbl_tempat_tidur_doc',$data);
    }

}

/* End of file Tempattdr.php */
/* Location: ./application/controllers/Tempattdr.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-03-18 00:43:17 */
/* http://harviacode.com */