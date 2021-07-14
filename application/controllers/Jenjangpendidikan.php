<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenjangpendidikan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_jenjang_pendidikan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','jenjangpendidikan/tbl_jenjang_pendidikan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_jenjang_pendidikan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_jenjang_pendidikan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_jenjang_pendidikan' => $row->id_jenjang_pendidikan,
		'nama_jenjang_pendidikan' => $row->nama_jenjang_pendidikan,
	    );
            $this->template->load('template','jenjangpendidikan/tbl_jenjang_pendidikan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenjangpendidikan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenjangpendidikan/create_action'),
	    'id_jenjang_pendidikan' => set_value('id_jenjang_pendidikan'),
	    'nama_jenjang_pendidikan' => set_value('nama_jenjang_pendidikan'),
	);
        $this->template->load('template','jenjangpendidikan/tbl_jenjang_pendidikan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_jenjang_pendidikan' => $this->input->post('nama_jenjang_pendidikan',TRUE),
	    );

            $this->Tbl_jenjang_pendidikan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('jenjangpendidikan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_jenjang_pendidikan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenjangpendidikan/update_action'),
		'id_jenjang_pendidikan' => set_value('id_jenjang_pendidikan', $row->id_jenjang_pendidikan),
		'nama_jenjang_pendidikan' => set_value('nama_jenjang_pendidikan', $row->nama_jenjang_pendidikan),
	    );
            $this->template->load('template','jenjangpendidikan/tbl_jenjang_pendidikan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenjangpendidikan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenjang_pendidikan', TRUE));
        } else {
            $data = array(
		'nama_jenjang_pendidikan' => $this->input->post('nama_jenjang_pendidikan',TRUE),
	    );

            $this->Tbl_jenjang_pendidikan_model->update($this->input->post('id_jenjang_pendidikan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenjangpendidikan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_jenjang_pendidikan_model->get_by_id($id);

        if ($row) {
            $this->Tbl_jenjang_pendidikan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenjangpendidikan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenjangpendidikan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_jenjang_pendidikan', 'nama jenjang pendidikan', 'trim|required');

	$this->form_validation->set_rules('id_jenjang_pendidikan', 'id_jenjang_pendidikan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_jenjang_pendidikan.xls";
        $judul = "tbl_jenjang_pendidikan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Jenjang Pendidikan");

	foreach ($this->Tbl_jenjang_pendidikan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_jenjang_pendidikan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_jenjang_pendidikan.doc");

        $data = array(
            'tbl_jenjang_pendidikan_data' => $this->Tbl_jenjang_pendidikan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('jenjangpendidikan/tbl_jenjang_pendidikan_doc',$data);
    }

}

/* End of file Jenjangpendidikan.php */
/* Location: ./application/controllers/Jenjangpendidikan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-02-24 05:52:12 */
/* http://harviacode.com */