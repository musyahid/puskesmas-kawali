<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tindakan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_tindakan_model');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    public function index()
    {
        $this->template->load('template','tindakan/tbl_tindakan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_tindakan_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tbl_tindakan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_tindakan' => $row->id_tindakan,
		'jenis_tindakan' => $row->jenis_tindakan,
		'nama_tindakan' => $row->nama_tindakan,
		'id_kategori_tindakan' => $row->id_kategori_tindakan,
		'tarif' => $row->tarif,
		'tindakan_oleh' => $row->tindakan_oleh,
		'id_poliklinik' => $row->id_poliklinik,
	    );
            $this->template->load('template','tindakan/tbl_tindakan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tindakan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tindakan/create_action'),
	    'id_tindakan' => set_value('id_tindakan'),
	    'jenis_tindakan' => set_value('jenis_tindakan'),
	    'nama_tindakan' => set_value('nama_tindakan'),
	    'id_kategori_tindakan' => set_value('id_kategori_tindakan'),
	    'tarif' => set_value('tarif'),
	    'tindakan_oleh' => set_value('tindakan_oleh'),
	    'id_poliklinik' => set_value('id_poliklinik'),
	);
        $this->template->load('template','tindakan/tbl_tindakan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'id_tindakan' => $this->input->post('id_tindakan',TRUE),
		'jenis_tindakan' => $this->input->post('jenis_tindakan',TRUE),
		'nama_tindakan' => $this->input->post('nama_tindakan',TRUE),
		'id_kategori_tindakan' => $this->input->post('id_kategori_tindakan',TRUE),
		'tarif' => $this->input->post('tarif',TRUE),
		'tindakan_oleh' => $this->input->post('tindakan_oleh',TRUE),
		'id_poliklinik' => $this->input->post('id_poliklinik',TRUE),
	    );

            $this->Tbl_tindakan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            $url = site_url('tindakan');
            echo '<link rel="stylesheet" href="'.base_url().'assets/sweetalert/sweetalert.css">';
            echo '<script src="'.base_url().'assets/sweetalert/sweetalert.min.js"></script>';
            echo "
                        <script>
                        setTimeout(function(){
                            swal({
                                title: 'Data Tindakan Berhasil Ditambah',
                                icon: 'success',
                                button: 'Ok',
                            }).then(function() {
                                window.location = '$url';
                            });
                        }, 500);
                        </script>
                    ";
            //redirect(site_url('tindakan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_tindakan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tindakan/update_action'),
		'id_tindakan' => set_value('id_tindakan', $row->id_tindakan),
		'jenis_tindakan' => set_value('jenis_tindakan', $row->jenis_tindakan),
		'nama_tindakan' => set_value('nama_tindakan', $row->nama_tindakan),
		'id_kategori_tindakan' => set_value('id_kategori_tindakan', $row->id_kategori_tindakan),
		'tarif' => set_value('tarif', $row->tarif),
		'tindakan_oleh' => set_value('tindakan_oleh', $row->tindakan_oleh),
		'id_poliklinik' => set_value('id_poliklinik', $row->id_poliklinik),
	    );
            $this->template->load('template','tindakan/tbl_tindakan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tindakan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_tindakan', TRUE));
        } else {
            $data = array(
		'jenis_tindakan' => $this->input->post('jenis_tindakan',TRUE),
		'nama_tindakan' => $this->input->post('nama_tindakan',TRUE),
		'id_kategori_tindakan' => $this->input->post('id_kategori_tindakan',TRUE),
		'tarif' => $this->input->post('tarif',TRUE),
		'tindakan_oleh' => $this->input->post('tindakan_oleh',TRUE),
		'id_poliklinik' => $this->input->post('id_poliklinik',TRUE),
	    );

            $this->Tbl_tindakan_model->update($this->input->post('id_tindakan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            $url = site_url('tindakan');
            echo '<link rel="stylesheet" href="'.base_url().'assets/sweetalert/sweetalert.css">';
            echo '<script src="'.base_url().'assets/sweetalert/sweetalert.min.js"></script>';
            echo "
                        <script>
                        setTimeout(function(){
                            swal({
                                title: 'Data Tindakan Berhasil Diupdate',
                                icon: 'success',
                                button: 'Ok',
                            }).then(function() {
                                window.location = '$url';
                            });
                        }, 500);
                        </script>
                    ";
            //redirect(site_url('tindakan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_tindakan_model->get_by_id($id);

        if ($row) {
            $this->Tbl_tindakan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            $url = site_url('tindakan');
            echo '<link rel="stylesheet" href="'.base_url().'assets/sweetalert/sweetalert.css">';
            echo '<script src="'.base_url().'assets/sweetalert/sweetalert.min.js"></script>';
            echo "
                        <script>
                        setTimeout(function(){
                            swal({
                                title: 'Data Tindakan Berhasil Dihapus',
                                icon: 'success',
                                button: 'Ok',
                            }).then(function() {
                                window.location = '$url';
                            });
                        }, 500);
                        </script>
                    ";
           // redirect(site_url('tindakan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tindakan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis_tindakan', 'jenis tindakan', 'trim|required');
	$this->form_validation->set_rules('nama_tindakan', 'nama tindakan', 'trim|required');
	$this->form_validation->set_rules('id_kategori_tindakan', 'id kategori tindakan', 'trim|required');
	$this->form_validation->set_rules('tarif', 'tarif', 'trim|required');
	$this->form_validation->set_rules('tindakan_oleh', 'tindakan oleh', 'trim|required');
	$this->form_validation->set_rules('id_poliklinik', 'id poliklinik', 'trim|required');

	$this->form_validation->set_rules('id_tindakan', 'id_tindakan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_tindakan.xls";
        $judul = "tbl_tindakan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Tindakan");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Tindakan");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Kategori Tindakan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tarif");
	xlsWriteLabel($tablehead, $kolomhead++, "Tindakan Oleh");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Poliklinik");

	foreach ($this->Tbl_tindakan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_tindakan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_tindakan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_kategori_tindakan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tarif);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tindakan_oleh);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_poliklinik);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_tindakan.doc");

        $data = array(
            'tbl_tindakan_data' => $this->Tbl_tindakan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('tindakan/tbl_tindakan_doc',$data);
    }

    function autocomplate(){
        autocomplate_json('tbl_tindakan', 'nama_tindakan');
    }

}

/* End of file Tindakan.php */
/* Location: ./application/controllers/Tindakan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-04-12 15:45:15 */
/* http://harviacode.com */