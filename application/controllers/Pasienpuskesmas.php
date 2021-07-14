<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pasienpuskesmas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_pasien_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pasienpuskesmas/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pasienpuskesmas/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pasienpuskesmas/index.html';
            $config['first_url'] = base_url() . 'pasienpuskesmas/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tbl_pasien_model->total_rows($q);
        $pasienpuskesmas = $this->Tbl_pasien_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pasienpuskesmas_data' => $pasienpuskesmas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','pasienpuskesmas/tbl_pasien_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_pasien_model->get_by_id($id);
        if ($row) {
            $data = array(
		'no_rekamedis' => $row->no_rekamedis,
		'nama_pasien' => $row->nama_pasien,
		'jenis_kelamin' => $row->jenis_kelamin,
		'golongan_darah' => $row->golongan_darah,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'nama_ibu' => $row->nama_ibu,
		'alamat' => $row->alamat,
		'agama' => $row->agama,
		'status_menikah' => $row->status_menikah,
		'no_hp' => $row->no_hp,
		'pekerjaan' => $row->pekerjaan,
	    );
            $this->template->load('template','pasienpuskesmas/tbl_pasien_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasienpuskesmas'));
        }
    }

    public function create() 
    {
        $noRekBaru = noRekamedisOtomatis();
        $data = array(
            'button' => 'Create',
            'action' => site_url('pasienpuskesmas/create_action'),
	    'no_rekamedis' => set_value('no_rekamedis',$noRekBaru),
	    'nama_pasien' => set_value('nama_pasien'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'golongan_darah' => set_value('golongan_darah'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'nama_ibu' => set_value('nama_ibu'),
	    'alamat' => set_value('alamat'),
	    'agama' => set_value('agama'),
	    'status_menikah' => set_value('status_menikah'),
	    'no_hp' => set_value('no_hp'),
	    'pekerjaan' => set_value('pekerjaan'),
	);
        $this->template->load('template','pasienpuskesmas/tbl_pasien_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'no_rekamedis' => $this->input->post('no_rekamedis',TRUE),
		'nama_pasien' => $this->input->post('nama_pasien',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'golongan_darah' => $this->input->post('golongan_darah',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'nama_ibu' => $this->input->post('nama_ibu',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'status_menikah' => $this->input->post('status_menikah',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
	    );

            $this->Tbl_pasien_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('pasienpuskesmas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_pasien_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pasienpuskesmas/update_action'),
		'no_rekamedis' => set_value('no_rekamedis', $row->no_rekamedis),
		'nama_pasien' => set_value('nama_pasien', $row->nama_pasien),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'golongan_darah' => set_value('golongan_darah', $row->golongan_darah),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'nama_ibu' => set_value('nama_ibu', $row->nama_ibu),
		'alamat' => set_value('alamat', $row->alamat),
		'agama' => set_value('agama', $row->agama),
		'status_menikah' => set_value('status_menikah', $row->status_menikah),
		'no_hp' => set_value('no_hp', $row->no_hp),
		'pekerjaan' => set_value('pekerjaan', $row->pekerjaan),
	    );
            $this->template->load('template','pasienpuskesmas/tbl_pasien_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasienpuskesmas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_rekamedis', TRUE));
        } else {
            $data = array(
		'nama_pasien' => $this->input->post('nama_pasien',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'golongan_darah' => $this->input->post('golongan_darah',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'nama_ibu' => $this->input->post('nama_ibu',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'status_menikah' => $this->input->post('status_menikah',TRUE),
		'no_hp' => $this->input->post('no_hp',TRUE),
		'pekerjaan' => $this->input->post('pekerjaan',TRUE),
	    );

            $this->Tbl_pasien_model->update($this->input->post('no_rekamedis', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pasienpuskesmas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_pasien_model->get_by_id($id);

        if ($row) {
            $this->Tbl_pasien_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pasienpuskesmas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pasienpuskesmas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_pasien', 'nama pasien', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('golongan_darah', 'golongan darah', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('nama_ibu', 'nama ibu', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('status_menikah', 'status menikah', 'trim|required');
	$this->form_validation->set_rules('no_hp', 'no hp', 'trim|required');
	$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|required');

	$this->form_validation->set_rules('no_rekamedis', 'no_rekamedis', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_pasien.xls";
        $judul = "tbl_pasien";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Pasien");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Kelamin");
	xlsWriteLabel($tablehead, $kolomhead++, "Golongan Darah");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Ibu");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Agama");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Menikah");
	xlsWriteLabel($tablehead, $kolomhead++, "No Hp");
	xlsWriteLabel($tablehead, $kolomhead++, "Pekerjaan");

	foreach ($this->Tbl_pasien_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_pasien);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_kelamin);
	    xlsWriteLabel($tablebody, $kolombody++, $data->golongan_darah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_ibu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->agama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_menikah);
	    xlsWriteNumber($tablebody, $kolombody++, $data->no_hp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pekerjaan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_pasien.doc");

        $data = array(
            'tbl_pasien_data' => $this->Tbl_pasien_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pasienpuskesmas/tbl_pasien_doc',$data);
    }

}

/* End of file Pasienpuskesmas.php */
/* Location: ./application/controllers/Pasienpuskesmas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-03-17 06:08:38 */
/* http://harviacode.com */