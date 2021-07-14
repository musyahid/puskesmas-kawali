<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporanrekainap extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_laporan_reka_inap_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'laporanrekainap/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'laporanrekainap/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'laporanrekainap/index.html';
            $config['first_url'] = base_url() . 'laporanrekainap/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tbl_laporan_reka_inap_model->total_rows($q);
        $laporanrekainap = $this->Tbl_laporan_reka_inap_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'laporanrekainap_data' => $laporanrekainap,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','laporanrekainap/tbl_pemeriksaan_rawat_inap_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_laporan_reka_inap_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_periksa' => $row->id_periksa,
		'no_rawat' => $row->no_rawat,
		'no_rekamedis' => $row->no_rekamedis,
		'nama_pasien' => $row->nama_pasien,
		'tanggal_daftar' => $row->tanggal_daftar,
		'id_tempat_tidur' => $row->id_tempat_tidur,
		'id_obat' => $row->id_obat,
		'id_tindakan' => $row->id_tindakan,
		'id_pemeriksaan_laboratorium' => $row->id_pemeriksaan_laboratorium,
		'id_diagnosa_penyakit' => $row->id_diagnosa_penyakit,
		'Hasil_pemeriksaan_fisik' => $row->Hasil_pemeriksaan_fisik,
		'riwayat_penyakit' => $row->riwayat_penyakit,
		'keluhan' => $row->keluhan,
	    );
            $this->template->load('template','laporanrekainap/tbl_pemeriksaan_rawat_inap_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporanrekainap'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('laporanrekainap/create_action'),
	    'id_periksa' => set_value('id_periksa'),
	    'no_rawat' => set_value('no_rawat'),
	    'no_rekamedis' => set_value('no_rekamedis'),
	    'nama_pasien' => set_value('nama_pasien'),
	    'tanggal_daftar' => set_value('tanggal_daftar'),
	    'id_tempat_tidur' => set_value('id_tempat_tidur'),
	    'id_obat' => set_value('id_obat'),
	    'id_tindakan' => set_value('id_tindakan'),
	    'id_pemeriksaan_laboratorium' => set_value('id_pemeriksaan_laboratorium'),
	    'id_diagnosa_penyakit' => set_value('id_diagnosa_penyakit'),
	    'Hasil_pemeriksaan_fisik' => set_value('Hasil_pemeriksaan_fisik'),
	    'riwayat_penyakit' => set_value('riwayat_penyakit'),
	    'keluhan' => set_value('keluhan'),
	);
        $this->template->load('template','laporanrekainap/tbl_pemeriksaan_rawat_inap_form', $data);
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
		'nama_pasien' => $this->input->post('nama_pasien',TRUE),
		'tanggal_daftar' => $this->input->post('tanggal_daftar',TRUE),
		'id_tempat_tidur' => $this->input->post('id_tempat_tidur',TRUE),
		'id_obat' => $this->input->post('id_obat',TRUE),
		'id_tindakan' => $this->input->post('id_tindakan',TRUE),
		'id_pemeriksaan_laboratorium' => $this->input->post('id_pemeriksaan_laboratorium',TRUE),
		'id_diagnosa_penyakit' => $this->input->post('id_diagnosa_penyakit',TRUE),
		'Hasil_pemeriksaan_fisik' => $this->input->post('Hasil_pemeriksaan_fisik',TRUE),
		'riwayat_penyakit' => $this->input->post('riwayat_penyakit',TRUE),
		'keluhan' => $this->input->post('keluhan',TRUE),
	    );

            $this->Tbl_laporan_reka_inap_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('laporanrekainap'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_laporan_reka_inap_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('laporanrekainap/update_action'),
		'id_periksa' => set_value('id_periksa', $row->id_periksa),
		'no_rawat' => set_value('no_rawat', $row->no_rawat),
		'no_rekamedis' => set_value('no_rekamedis', $row->no_rekamedis),
		'nama_pasien' => set_value('nama_pasien', $row->nama_pasien),
		'tanggal_daftar' => set_value('tanggal_daftar', $row->tanggal_daftar),
		'id_tempat_tidur' => set_value('id_tempat_tidur', $row->id_tempat_tidur),
		'id_obat' => set_value('id_obat', $row->id_obat),
		'id_tindakan' => set_value('id_tindakan', $row->id_tindakan),
		'id_pemeriksaan_laboratorium' => set_value('id_pemeriksaan_laboratorium', $row->id_pemeriksaan_laboratorium),
		'id_diagnosa_penyakit' => set_value('id_diagnosa_penyakit', $row->id_diagnosa_penyakit),
		'Hasil_pemeriksaan_fisik' => set_value('Hasil_pemeriksaan_fisik', $row->Hasil_pemeriksaan_fisik),
		'riwayat_penyakit' => set_value('riwayat_penyakit', $row->riwayat_penyakit),
		'keluhan' => set_value('keluhan', $row->keluhan),
	    );
            $this->template->load('template','laporanrekainap/tbl_pemeriksaan_rawat_inap_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporanrekainap'));
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
		'nama_pasien' => $this->input->post('nama_pasien',TRUE),
		'tanggal_daftar' => $this->input->post('tanggal_daftar',TRUE),
		'id_tempat_tidur' => $this->input->post('id_tempat_tidur',TRUE),
		'id_obat' => $this->input->post('id_obat',TRUE),
		'id_tindakan' => $this->input->post('id_tindakan',TRUE),
		'id_pemeriksaan_laboratorium' => $this->input->post('id_pemeriksaan_laboratorium',TRUE),
		'id_diagnosa_penyakit' => $this->input->post('id_diagnosa_penyakit',TRUE),
		'Hasil_pemeriksaan_fisik' => $this->input->post('Hasil_pemeriksaan_fisik',TRUE),
		'riwayat_penyakit' => $this->input->post('riwayat_penyakit',TRUE),
		'keluhan' => $this->input->post('keluhan',TRUE),
	    );

            $this->Tbl_laporan_reka_inap_model->update($this->input->post('id_periksa', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('laporanrekainap'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_laporan_reka_inap_model->get_by_id($id);

        if ($row) {
            $this->Tbl_laporan_reka_inap_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('laporanrekainap'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('laporanrekainap'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('no_rawat', 'no rawat', 'trim|required');
	$this->form_validation->set_rules('no_rekamedis', 'no rekamedis', 'trim|required');
	$this->form_validation->set_rules('nama_pasien', 'nama pasien', 'trim|required');
	$this->form_validation->set_rules('tanggal_daftar', 'tanggal daftar', 'trim|required');
	$this->form_validation->set_rules('id_tempat_tidur', 'id tempat tidur', 'trim|required');
	$this->form_validation->set_rules('id_obat', 'id obat', 'trim|required');
	$this->form_validation->set_rules('id_tindakan', 'id tindakan', 'trim|required');
	$this->form_validation->set_rules('id_pemeriksaan_laboratorium', 'id pemeriksaan laboratorium', 'trim|required');
	$this->form_validation->set_rules('id_diagnosa_penyakit', 'id diagnosa penyakit', 'trim|required');
	$this->form_validation->set_rules('Hasil_pemeriksaan_fisik', 'hasil pemeriksaan fisik', 'trim|required');
	$this->form_validation->set_rules('riwayat_penyakit', 'riwayat penyakit', 'trim|required');
	$this->form_validation->set_rules('keluhan', 'keluhan', 'trim|required');

	$this->form_validation->set_rules('id_periksa', 'id_periksa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_pemeriksaan_rawat_inap.xls";
        $judul = "tbl_pemeriksaan_rawat_inap";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pasien");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Daftar");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tempat Tidur");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Obat");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Tindakan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Pemeriksaan Laboratorium");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Diagnosa Penyakit");
	xlsWriteLabel($tablehead, $kolomhead++, "Hasil Pemeriksaan Fisik");
	xlsWriteLabel($tablehead, $kolomhead++, "Riwayat Penyakit");
	xlsWriteLabel($tablehead, $kolomhead++, "Keluhan");

	foreach ($this->Tbl_laporan_reka_inap_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_rawat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_rekamedis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pasien);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_daftar);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_tempat_tidur);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_obat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_tindakan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_pemeriksaan_laboratorium);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_diagnosa_penyakit);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Hasil_pemeriksaan_fisik);
	    xlsWriteLabel($tablebody, $kolombody++, $data->riwayat_penyakit);
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
        header("Content-Disposition: attachment;Filename=tbl_pemeriksaan_rawat_inap.doc");

        $data = array(
            'tbl_pemeriksaan_rawat_inap_data' => $this->Tbl_laporan_reka_inap_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('laporanrekainap/tbl_pemeriksaan_rawat_inap_doc',$data);
    }

}

/* End of file Laporanrekainap.php */
/* Location: ./application/controllers/Laporanrekainap.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-05 09:09:45 */
/* http://harviacode.com */