<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_pemeriksa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_pemeriksa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tbl_pemeriksa/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tbl_pemeriksa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tbl_pemeriksa/index.html';
            $config['first_url'] = base_url() . 'tbl_pemeriksa/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tbl_pemeriksa_model->total_rows($q);
        $tbl_pemeriksa = $this->Tbl_pemeriksa_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tbl_pemeriksa_data' => $tbl_pemeriksa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','tbl_pemeriksa/tbl_pemeriksa_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_pemeriksa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_periksa' => $row->id_periksa,
		'no_rawat' => $row->no_rawat,
		'no_rekamedis' => $row->no_rekamedis,
		'tanggal_daftar' => $row->tanggal_daftar,
		'id_tindakan' => $row->id_tindakan,
		'id_pemeriksaan_laboratorium' => $row->id_pemeriksaan_laboratorium,
		'id_diagnosa_penyakit' => $row->id_diagnosa_penyakit,
		'keluhan' => $row->keluhan,
	    );
            $this->template->load('template','tbl_pemeriksa/tbl_pemeriksa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_pemeriksa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tbl_pemeriksa/create_action'),
	    'id_periksa' => set_value('id_periksa'),
	    'no_rawat' => set_value('no_rawat'),
	    'no_rekamedis' => set_value('no_rekamedis'),
	    'tanggal_daftar' => set_value('tanggal_daftar'),
	    'id_tindakan' => set_value('id_tindakan'),
	    'id_pemeriksaan_laboratorium' => set_value('id_pemeriksaan_laboratorium'),
	    'id_diagnosa_penyakit' => set_value('id_diagnosa_penyakit'),
	    'keluhan' => set_value('keluhan'),
	);
        $this->template->load('template','tbl_pemeriksa/tbl_pemeriksa_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'no_rawat' => $this->input->post('no_rawat',TRUE),
		'no_rekamedis' => $this->input->post('no_rekamedis',TRUE),
		'tanggal_daftar' => $this->input->post('tanggal_daftar',TRUE),
		'id_tindakan' => $this->input->post('id_tindakan',TRUE),
		'id_pemeriksaan_laboratorium' => $this->input->post('id_pemeriksaan_laboratorium',TRUE),
		'id_diagnosa_penyakit' => $this->input->post('id_diagnosa_penyakit',TRUE),
		'keluhan' => $this->input->post('keluhan',TRUE),
	    );

            $this->Tbl_pemeriksa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('tbl_pemeriksa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_pemeriksa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tbl_pemeriksa/update_action'),
		'id_periksa' => set_value('id_periksa', $row->id_periksa),
		'no_rawat' => set_value('no_rawat', $row->no_rawat),
		'no_rekamedis' => set_value('no_rekamedis', $row->no_rekamedis),
		'tanggal_daftar' => set_value('tanggal_daftar', $row->tanggal_daftar),
		'id_tindakan' => set_value('id_tindakan', $row->id_tindakan),
		'id_pemeriksaan_laboratorium' => set_value('id_pemeriksaan_laboratorium', $row->id_pemeriksaan_laboratorium),
		'id_diagnosa_penyakit' => set_value('id_diagnosa_penyakit', $row->id_diagnosa_penyakit),
		'keluhan' => set_value('keluhan', $row->keluhan),
	    );
            $this->template->load('template','tbl_pemeriksa/tbl_pemeriksa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_pemeriksa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_periksa', TRUE));
        } else {
            $data = array(
		'no_rawat' => $this->input->post('no_rawat',TRUE),
		'no_rekamedis' => $this->input->post('no_rekamedis',TRUE),
		'tanggal_daftar' => $this->input->post('tanggal_daftar',TRUE),
		'id_tindakan' => $this->input->post('id_tindakan',TRUE),
		'id_pemeriksaan_laboratorium' => $this->input->post('id_pemeriksaan_laboratorium',TRUE),
		'id_diagnosa_penyakit' => $this->input->post('id_diagnosa_penyakit',TRUE),
		'keluhan' => $this->input->post('keluhan',TRUE),
	    );

            $this->Tbl_pemeriksa_model->update($this->input->post('id_periksa', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tbl_pemeriksa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_pemeriksa_model->get_by_id($id);

        if ($row) {
            $this->Tbl_pemeriksa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tbl_pemeriksa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tbl_pemeriksa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_rawat', 'no rawat', 'trim|required');
	$this->form_validation->set_rules('no_rekamedis', 'no rekamedis', 'trim|required');
	$this->form_validation->set_rules('tanggal_daftar', 'tanggal daftar', 'trim|required');
	$this->form_validation->set_rules('id_tindakan', 'id tindakan', 'trim|required');
	$this->form_validation->set_rules('id_pemeriksaan_laboratorium', 'id pemeriksaan laboratorium', 'trim|required');
	$this->form_validation->set_rules('id_diagnosa_penyakit', 'id diagnosa penyakit', 'trim|required');
	$this->form_validation->set_rules('keluhan', 'keluhan', 'trim|required');

	$this->form_validation->set_rules('id_periksa', 'id_periksa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_pemeriksa.xls";
        $judul = "tbl_pemeriksa";
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
	xlsWriteLabel($tablehead, $kolomhead++, "No Rawat");
	xlsWriteLabel($tablehead, $kolomhead++, "No Rekamedis");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Daftar");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tindakan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Pemeriksaan Laboratorium");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Diagnosa Penyakit");
	xlsWriteLabel($tablehead, $kolomhead++, "Keluhan");

	foreach ($this->Tbl_pemeriksa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_rawat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_rekamedis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_daftar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_tindakan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_pemeriksaan_laboratorium);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_diagnosa_penyakit);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keluhan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_pemeriksa.doc");

        $data = array(
            'tbl_pemeriksa_data' => $this->Tbl_pemeriksa_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tbl_pemeriksa/tbl_pemeriksa_doc',$data);
    }

}

/* End of file Tbl_pemeriksa.php */
/* Location: ./application/controllers/Tbl_pemeriksa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-05 02:08:22 */
/* http://harviacode.com */