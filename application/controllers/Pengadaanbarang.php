<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengadaanbarang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_pengadaan_obat_alkes_bhp_model');
        $this->load->library('form_validation');
    }

    function autocomplate(){
        //untuk pencarian obat
        $this->db->like('nama_barang', $_GET['term']);
        $this->db->select('nama_barang');
        $products = $this->db->get('tbl_obat_alkes_bhp')->result();
        foreach ($products as $product) {
            $return_arr[] = $product->nama_barang;
        }

        echo json_encode($return_arr);

    }
    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'pengadaanbarang/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'pengadaanbarang/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'pengadaanbarang/index.html';
            $config['first_url'] = base_url() . 'pengadaanbarang/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tbl_pengadaan_obat_alkes_bhp_model->total_rows($q);
        $pengadaanbarang = $this->Tbl_pengadaan_obat_alkes_bhp_model->get_limit_data($config['per_page'], $start, $q);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'pengadaanbarang_data' => $pengadaanbarang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template','pengadaanbarang/tbl_pengadaan_obat_alkes_bhp_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Tbl_pengadaan_obat_alkes_bhp_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_pengadaan_obat_alkes_bhp' => $row->id_pengadaan_obat_alkes_bhp,
		'tanggal' => $row->tanggal,
		'id_supplier' => $row->id_supplier,
	    );
            $this->template->load('template','pengadaanbarang/tbl_pengadaan_obat_alkes_bhp_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengadaanbarang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Simpan Transaksi',
            'action' => site_url('pengadaanbarang/create_action'),
	    'id_pengadaan_obat_alkes_bhp' => set_value('id_pengadaan_obat_alkes_bhp'),
	    'tanggal' => set_value('tanggal'),
	    'id_supplier' => set_value('id_supplier'),
	);
        $this->template->load('template','pengadaanbarang/tbl_pengadaan_obat_alkes_bhp_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'id_supplier' => $this->input->post('id_supplier',TRUE),
	    );

            $this->Tbl_pengadaan_obat_alkes_bhp_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('pengadaanbarang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_pengadaan_obat_alkes_bhp_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pengadaanbarang/update_action'),
		'id_pengadaan_obat_alkes_bhp' => set_value('id_pengadaan_obat_alkes_bhp', $row->id_pengadaan_obat_alkes_bhp),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'id_supplier' => set_value('id_supplier', $row->id_supplier),
	    );
            $this->template->load('template','pengadaanbarang/tbl_pengadaan_obat_alkes_bhp_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengadaanbarang'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_pengadaan_obat_alkes_bhp', TRUE));
        } else {
            $data = array(
		'tanggal' => $this->input->post('tanggal',TRUE),
		'id_supplier' => $this->input->post('id_supplier',TRUE),
	    );

            $this->Tbl_pengadaan_obat_alkes_bhp_model->update($this->input->post('id_pengadaan_obat_alkes_bhp', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengadaanbarang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_pengadaan_obat_alkes_bhp_model->get_by_id($id);

        if ($row) {
            $this->Tbl_pengadaan_obat_alkes_bhp_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengadaanbarang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengadaanbarang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('id_supplier', 'id supplier', 'trim|required');

	$this->form_validation->set_rules('id_pengadaan_obat_alkes_bhp', 'id_pengadaan_obat_alkes_bhp', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function add_ajax(){

        $Namabarang = $this->input->get('barang');
        $qyt = $this->input->get('qyt');
        $harga =$this->input->get('harga');
        $id_pengadaan_obat_alkes_bhp = $this->input->get('id_pengadaan_obat_alkes_bhp');

        $id_pengadaan_obat_alkes_bhp = $this->input->get('');
        // mencari kode barang berdasarkan nama barang
        $barang = $this->db->get_where('tbl_obat_alkes_bhp',array('nama_barang'=>$NamaBarang))->row_array();

         $data = array('id_obat_alkes_bhp'=>$barang['id_obat_alkes_bhp'],'qyt'=>$qyt,'id_pengadaan_obat_alkes_bhp'=>$id_pengadaan_obat_alkes_bhp,'harga'=>$harga);
        $this->db->insert('tbl_pengadaan_detail',$data);
       
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_pengadaan_obat_alkes_bhp.xls";
        $judul = "tbl_pengadaan_obat_alkes_bhp";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Supplier");

	foreach ($this->Tbl_pengadaan_obat_alkes_bhp_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_supplier);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_pengadaan_obat_alkes_bhp.doc");

        $data = array(
            'tbl_pengadaan_obat_alkes_bhp_data' => $this->Tbl_pengadaan_obat_alkes_bhp_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('pengadaanbarang/tbl_pengadaan_obat_alkes_bhp_doc',$data);
    }

}

/* End of file Pengadaanbarang.php */
/* Location: ./application/controllers/Pengadaanbarang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-03-20 17:22:34 */
/* http://harviacode.com */