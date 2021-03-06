<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pegawaipuskesmas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_pegawai_puskesmas_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','pegawaipuskesmas/tbl_pegawai_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_pegawai_puskesmas_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_pegawai_puskesmas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'nik' => $row->nik,
		'nama_pegawai' => $row->nama_pegawai,
		'jenis_kemalin' => $row->jenis_kemalin,
		'npwp' => $row->npwp,
		'id_jenjang_pendidikan' => $row->id_jenjang_pendidikan,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'id_jabatan' => $row->id_jabatan,
		'id_departemen' => $row->id_departemen,
		'id_bidang' => $row->id_bidang,
		'is_aktif' => $row->is_aktif,
	    );
            $this->template->load('template','pegawaipuskesmas/tbl_pegawai_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pegawaipuskesmas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('pegawaipuskesmas/create_action'),
	    'nik' => set_value('nik'),
	    'nama_pegawai' => set_value('nama_pegawai'),
	    'jenis_kemalin' => set_value('jenis_kemalin'),
	    'npwp' => set_value('npwp'),
	    'id_jenjang_pendidikan' => set_value('id_jenjang_pendidikan'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'id_jabatan' => set_value('id_jabatan'),
	    'id_departemen' => set_value('id_departemen'),
	    'id_bidang' => set_value('id_bidang'),
	    'is_aktif' => set_value('is_aktif'),
	);
        $this->template->load('template','pegawaipuskesmas/tbl_pegawai_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_pegawai' => $this->input->post('nama_pegawai',TRUE),
		'jenis_kemalin' => $this->input->post('jenis_kemalin',TRUE),
		'npwp' => $this->input->post('npwp',TRUE),
		'id_jenjang_pendidikan' => $this->input->post('id_jenjang_pendidikan',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'id_jabatan' => $this->input->post('id_jabatan',TRUE),
		'id_departemen' => $this->input->post('id_departemen',TRUE),
		'id_bidang' => $this->input->post('id_bidang',TRUE),
		'is_aktif' => $this->input->post('is_aktif',TRUE),
	    );

            $this->Tbl_pegawai_puskesmas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('pegawaipuskesmas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_pegawai_puskesmas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pegawaipuskesmas/update_action'),
		'nik' => set_value('nik', $row->nik),
		'nama_pegawai' => set_value('nama_pegawai', $row->nama_pegawai),
		'jenis_kemalin' => set_value('jenis_kemalin', $row->jenis_kemalin),
		'npwp' => set_value('npwp', $row->npwp),
		'id_jenjang_pendidikan' => set_value('id_jenjang_pendidikan', $row->id_jenjang_pendidikan),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'id_jabatan' => set_value('id_jabatan', $row->id_jabatan),
		'id_departemen' => set_value('id_departemen', $row->id_departemen),
		'id_bidang' => set_value('id_bidang', $row->id_bidang),
		'is_aktif' => set_value('is_aktif', $row->is_aktif),
	    );
            $this->template->load('template','pegawaipuskesmas/tbl_pegawai_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pegawaipuskesmas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nik', TRUE));
        } else {
            $data = array(
		'nama_pegawai' => $this->input->post('nama_pegawai',TRUE),
		'jenis_kemalin' => $this->input->post('jenis_kemalin',TRUE),
		'npwp' => $this->input->post('npwp',TRUE),
		'id_jenjang_pendidikan' => $this->input->post('id_jenjang_pendidikan',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'id_jabatan' => $this->input->post('id_jabatan',TRUE),
		'id_departemen' => $this->input->post('id_departemen',TRUE),
		'id_bidang' => $this->input->post('id_bidang',TRUE),
		'is_aktif' => $this->input->post('is_aktif',TRUE),
	    );

            $this->Tbl_pegawai_puskesmas_model->update($this->input->post('nik', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pegawaipuskesmas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_pegawai_puskesmas_model->get_by_id($id);

        if ($row) {
            $this->Tbl_pegawai_puskesmas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pegawaipuskesmas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pegawaipuskesmas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_pegawai', 'nama pegawai', 'trim|required');
	$this->form_validation->set_rules('jenis_kemalin', 'jenis kemalin', 'trim|required');
	$this->form_validation->set_rules('npwp', 'npwp', 'trim|required');
	$this->form_validation->set_rules('id_jenjang_pendidikan', 'id jenjang pendidikan', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('id_jabatan', 'id jabatan', 'trim|required');
	$this->form_validation->set_rules('id_departemen', 'id departemen', 'trim|required');
	$this->form_validation->set_rules('id_bidang', 'id bidang', 'trim|required');
	$this->form_validation->set_rules('is_aktif', 'is aktif', 'trim|required');

	$this->form_validation->set_rules('nik', 'nik', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_pegawai.xls";
        $judul = "tbl_pegawai";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pegawai");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kemalin");
	xlsWriteLabel($tablehead, $kolomhead++, "Npwp");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Jenjang Pendidikan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Jabatan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Departemen");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Bidang");
	xlsWriteLabel($tablehead, $kolomhead++, "Is Aktif");

	foreach ($this->Tbl_pegawai_puskesmas_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pegawai);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kemalin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->npwp);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_jenjang_pendidikan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_jabatan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_departemen);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_bidang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->is_aktif);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_pegawai.doc");

        $data = array(
            'tbl_pegawai_data' => $this->Tbl_pegawai_puskesmas_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pegawaipuskesmas/tbl_pegawai_doc',$data);
    }

    function autocomplate(){
        autocomplate_json('tbl_pegawai', 'nama_pegawai');
    }

}

/* End of file Pegawaipuskesmas.php */
/* Location: ./application/controllers/Pegawaipuskesmas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-17 02:51:43 */
/* http://harviacode.com */