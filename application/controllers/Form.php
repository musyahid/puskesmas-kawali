<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Form extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Tbl_form_model');
        $this->load->library('form_validation');
        $this->load->model(['Tbl_ruang_rawat_inap_model']);
        $this->load->model(['Tbl_pasien_model']);
    }

    public function index()
    {
        $cara_masuk_url = $this->uri->segment(3);
        if ($cara_masuk_url == 'walan') {
            $cara_masuk = "RAWAT JALAN";
        } elseif ($cara_masuk_url == 'wanap') {
            $cara_masuk = "RAWAT INAP";
        } else {
            $cara_masuk = "RAWAT INAP";
        }


        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'index.php/form/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'index.php/form/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'index.php/form/index';
            $config['first_url'] = base_url() . 'index.php/form/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tbl_form_model->total_rows($q);
        // $form = $this->Tbl_form_model->get_limit_data($config['per_page'], $start, $q, $cara_masuk);
        $form = $this->Tbl_form_model->get_data_pendaftaran($cara_masuk);
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'form_data' => $form,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template', 'form/tbl_pendaftaran_list', $data);
    }

    function autocomplate_dokter()
    {
        $this->db->like('nama_dokter', $_GET['term']);
        $this->db->select('nama_dokter');
        $datadokter = $this->db->get('tbl_dokter')->result();
        foreach ($datadokter as $dokter) {
            $return_arr[] = $dokter->nama_dokter;
        }

        echo json_encode($return_arr);
    }


    function autocomplate_no_rekamedis()
    {
        $this->db->like('no_rekamedis', $_GET['term']);
        $this->db->select('no_rekamedis');
        $datapasien = $this->db->get('tbl_pasien')->result();
        foreach ($datapasien as $pasien) {
            $return_arr[] = $pasien->no_rekamedis;
        }

        echo json_encode($return_arr);
    }

    function autoFill()
    {

        $no_rekamedis = $_GET['no_rekamedis'];
        $this->db->where('no_rekamedis', $no_rekamedis);
        $pasien = $this->db->get('tbl_pasien')->row_array();
        $data = array(
            'nama_pasien'      =>  $pasien['nama_pasien'],
            'tanggal_lahir'   =>  $pasien['tanggal_lahir']
        );
        echo json_encode($data);
    }

    function autocomplate_data_obat()
    {
        $this->db->like('nama_barang', $_GET['term']);
        $this->db->select('nama_barang');
        $dataobat = $this->db->get('tbl_obat_alkes_bhp')->result();
        foreach ($dataobat as $obat) {
            $return_arr[] = $obat->nama_barang;
        }

        echo json_encode($return_arr);
    }

    function autoFillObat()
    {

        $nama_barang = $_GET['nama_obat'];
        $this->db->from('tbl_obat_alkes_bhp a');
        $this->db->join('tbl_satuan_barang b', 'a.id_satuan_barang = b.id_satuan_barang');
        $this->db->where('nama_barang', $nama_barang);
        $obat = $this->db->get()->row_array();
        $data = array(
            'nama_barang'      =>  $obat['nama_barang'],
            'id_satuan_barang'   =>  $obat['id_satuan_barang'],
            'nama_satuan'         =>  $obat['nama_satuan']
        );
        echo json_encode($data);
    }

    // function autocomplate_id_diagnosa(){
    //     $this->db->like('id_diagnosa_penyakit', $_GET['term']);
    //     $this->db->select('id_diagnosa_penyakit');
    //     $datadiagnosa = $this->db->get('tbl_diagnosa_penyakit')->result();
    //     foreach ($datadiagnosa as $diagnosa) {
    //         $return_arr[] = $diagnosa->id_diagnosa_penyakit;
    //     }

    //     echo json_encode($return_arr);
    // }

    // function autoFillDiagnosa(){

    //     $id_diagnosa_penyakit = $_GET['id_diagnosa_penyakit'];
    //     $this->db->where('id_diagnosa_penyakit',$id_diagnosa_penyakit);
    //     $diagnosa = $this->db->get('tbl_diagnosa_penyakit')->row_array();
    //     $data = array(
    //                 'nama_penyakit'      =>  $diagnosa['nama_penyakit'],
    //                 'ciri_ciri_penyakit'   =>  $diagnosa['ciri_ciri_penyakit'],
    //                 'keterangan'   =>  $diagnosa['keterangan'],
    //                 'ciri_ciri_umum'   =>  $diagnosa['ciri_ciri_umum'],
    //             );
    //      echo json_encode($data);
    // }



    function autocomplate_ruang_rawat_inap()
    {
        $this->db->like('id_ruang_rawat_inap', $_GET['term']);
        $this->db->select('id_ruang_rawat_inap');
        $datatidur = $this->db->get('tbl_rawat_inap')->result();
        foreach ($datatidur as $tidur) {
            $return_arr[] = $tidur->id_tempat_tidur;
        }

        echo json_encode($return_arr);
    }

    function detail()
    {
        $no_rawat = substr($this->uri->uri_string(3), 12);

        $sql_daftar = "SELECT pd.no_rekamedis,pd.no_rawat,ps.nama_pasien FROM 
                        tbl_pendaftaran as pd,tbl_pasien as ps
                        WHERE pd.no_rekamedis=ps.no_rekamedis and pd.no_rawat='$no_rawat'";

        $sql_tindakan = "SELECT a.id_riwayat_tindakan, b.nama_tindakan, a.hasil_periksa, a.perkembangan, c.keterangan, a.tanggal, COUNT(*) jumlah_pemeriksa  FROM tbl_riwayat_tindakan a JOIN tbl_tindakan b ON a.id_tindakan = b.id_tindakan
        JOIN tbl_pj_riwayat_tindakan c ON a.id_riwayat_tindakan = c.id_riwayat_tindakan WHERE no_rawat='$no_rawat'
        GROUP BY a.id_riwayat_tindakan";

        $sql_obat = "SELECT a.id_obat_alkes_bhp AS 'id_obat', b.nama_barang AS 'nama_obat', jumlah, tanggal FROM tbl_riwayat_pemberian_obat a 
        JOIN tbl_obat_alkes_bhp b ON a.id_obat_alkes_bhp = b.id_obat_alkes_bhp WHERE no_rawat='$no_rawat'";

        $sql_pemeriksaan_laboratorium = "SELECT b.nama_periksa, hasil, keterangan, tanggal FROM tbl_riwayat_pemeriksaan_laboratorium a
        JOIN tbl_pemeriksaan_laboratorium b ON a.id_pemeriksaan_laboratorium = b.id_pemeriksaan_laboratorium WHERE no_rawat='$no_rawat'";

        $sql_diagnosa_penyakit = "SELECT b.nama_penyakit, a.ciri_ciri_penyakit, a.ciri_ciri_umum, a.keterangan, a.tanggal FROM tbl_riwayat_diagnosa_penyakit a
        JOIN tbl_diagnosa_penyakit b ON a.id_diagnosa_penyakit = b.id_diagnosa_penyakit WHERE no_rawat='$no_rawat'";

        $sql_pemeriksaan_pasien = "SELECT * from tbl_riwayat_pemeriksaan_pasien WHERE no_rawat='$no_rawat'";

        $sql_data_obat = "SELECT * FROM tbl_obat_alkes_bhp";

        $data['form'] =  $this->db->query($sql_daftar)->row_array();
        $data['no_rawat'] = $no_rawat;
        //GET DATA
        $data['tindakan']                   = $this->db->query($sql_tindakan)->result();
        $data['pemberian_obat']             = $this->db->query($sql_obat)->result();
        $data['pemeriksaan_laboratorium']   = $this->db->query($sql_pemeriksaan_laboratorium)->result();
        $data['riwayat_diagnosa_penyakit']          = $this->db->query($sql_diagnosa_penyakit)->result();
        $data['riwayat_pemeriksaan_pasien']          = $this->db->query($sql_pemeriksaan_pasien)->result();

        $data['data_obat']              = $this->db->query($sql_data_obat)->result();
        $data['diagnosa_penyakit']          = $this->db->get('tbl_diagnosa_penyakit')->result();


        $this->template->load('template', 'form/detail', $data);
    }





    public function read()

    {

        $this->template->load('template', 'form/tbl_pendaftaran_list');

        //$this->template->load('template','pendaftaran/tbl_pendaftaran_list');
        //$this->template->load('template','pendaftaran/detail');



        die;
        $row = $this->Tbl_form_model->get_by_id($id);
        if ($row) {
            $data = array(
                'no_registrasi' => $row->no_registrasi,
                'no_rawat' => $row->no_rawat,
                'no_rekamedis' => $row->no_rekamedis,
                'cara_masuk' => $row->cara_masuk,
                'tanggal_daftar' => $row->tanggal_daftar,
                'kode_dokter_penanggung_jawab' => $row->kode_dokter_penanggung_jawab,
                'id_poliklinik' => $row->id_poliklinik,
                'nama_penanggung_jawab' => $row->nama_penanggung_jawab,
                'hubungan_dengan_penanggung_jawab' => $row->hubungan_dengan_penanggung_jawab,
                'alamat_penanggung_jawab' => $row->alamat_penanggung_jawab,
                'id_jenis_bayar' => $row->id_jenis_bayar,
               // 'asal_rujukan' => $row->asal_rujukan,
                'no_hp_penanggung_jawab' => $row->no_hp_penanggung_jawab,
            );
            $this->template->load('template', 'form/tbl_pendaftaran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('form'));
        }
    }

    public function create()
    {

        $data = array(
            'button' => 'Create',
            'action' => site_url('form/create_action'),
            'no_registrasi' => set_value('no_registrasi'),
            'no_rawat' => set_value('no_rawat'),
            'no_rekamedis' => set_value('no_rekamedis'),
            'cara_masuk' => set_value('cara_masuk'),
            'tanggal_daftar' => set_value('tanggal_daftar'),
            'kode_dokter_penanggung_jawab' => set_value('kode_dokter_penanggung_jawab'),
            'id_poliklinik' => set_value('id_poliklinik'),
            'nama_penanggung_jawab' => set_value('nama_penanggung_jawab'),
            'hubungan_dengan_penanggung_jawab' => set_value('hubungan_dengan_penanggung_jawab'),
            'alamat_penanggung_jawab' => set_value('alamat_penanggung_jawab'),
            'id_jenis_bayar' => set_value('id_jenis_bayar'),
            //'asal_rujukan' => set_value('asal_rujukan'),
            'no_hp_penanggung_jawab' => set_value('no_hp_penanggung_jawab'),
            "data_rawat_inap" => $this->Tbl_ruang_rawat_inap_model->modaltampil(),
            "data_pasien" => $this->Tbl_pasien_model->get_all()
        );
        $this->template->load('template', 'form/tbl_pendaftaran_form', $data);
    }

    // function getKodeDokter($namaDokter){
    //     $this->db->where('nama_dokter',$namaDokter);
    //     $dokter = $this->db->get('tbl_dokter')->row_array();
    //     return $dokter['kode_dokter'];

    // }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {


            $data = array(
                'no_rawat' => $this->input->post('no_rawat', TRUE),
                'no_registrasi' => $this->input->post('no_registrasi', TRUE),
                'no_rekamedis' => $this->input->post('no_rekamedis', TRUE),
                'cara_masuk' => $this->input->post('cara_masuk', TRUE),
                'tanggal_daftar' => $this->input->post('tanggal_daftar', TRUE),
                'kode_dokter_penanggung_jawab' => $this->input->post('kode_dokter_penanggung_jawab', TRUE),
                'id_poliklinik' => $this->input->post('id_poliklinik', TRUE),
                'nama_penanggung_jawab' => $this->input->post('nama_penanggung_jawab', TRUE),
                'hubungan_dengan_penanggung_jawab' => $this->input->post('hubungan_dengan_penanggung_jawab', TRUE),
                'alamat_penanggung_jawab' => $this->input->post('alamat_penanggung_jawab', TRUE),
                'id_jenis_bayar' => $this->input->post('id_jenis_bayar', TRUE),
               // 'asal_rujukan' => $this->input->post('asal_rujukan', TRUE),
                'no_hp_penanggung_jawab' => $this->input->post('no_hp_penanggung_jawab', TRUE),
            );
            echo '<link rel="stylesheet" href="'.base_url().'assets/sweetalert/sweetalert.css">';
            echo '<script src="'.base_url().'assets/sweetalert/sweetalert.min.js"></script>';
            //Digunakan untuk menyimpan data rawat inap
            $cara_masuk = $this->input->post('cara_masuk', TRUE);
            if ($cara_masuk == "RAWAT INAP") {
                $data_ranap = array(
                    'no_rawat'          => $this->input->post('no_rawat', TRUE),
                    'tanggal_masuk'     => $this->input->post('tanggal_daftar', TRUE),
                    'tanggal_keluar'    => '000-00-00',
                    'id_ruang_rawat_inap'   => $this->input->post('id_ruang_rawat_inap', TRUE)
                );

                $cariruang = $this->Tbl_form_model->carikode($this->input->post('id_ruang_rawat_inap'));

                if ($cariruang->status == 'kosong') {

                    $this->db->insert('tbl_rawat_inap', $data_ranap);


                    // update status tempat tidur
                    $this->db->where('id_ruang_rawat_inap', $this->input->post('id_ruang_rawat_inap', TRUE));
                    $this->db->update('tbl_ruang_rawat_inap', array('status' => 'diisi'));


                    $this->Tbl_form_model->insert($data);
                    // echo $this->session->set_flashdata('msg', 'Ditambah');

                    redirect(site_url('form'));
                } else {
                    $url = site_url('form');
                    echo "
                        <script>
                        setTimeout(function(){
                            swal({
                                    title: 'Data Gagal, Karena tempat Tidur Telah Terisi',
                                    icon: 'error',
                                }).then(function() {
                                    window.location = '$url';
                                });
                        }, 500);
                        </script>
                    ";
                    // $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Gagal, Karena tempat Tidur Telah Terisi</div>');
                    // redirect(site_url('form'));
                }



                $this->db->insert('tbl_rawat_inap', $data_ranap);


                //update status tempat tidur
                $this->db->where('id_ruang_rawat_inap', $this->input->post('id_ruang_rawat_inap', TRUE));
                $this->db->update('tbl_ruang_rawat_inap', array('status' => 'diisi'));


                //    }

                $this->Tbl_form_model->insert($data);
                echo "
                    <script>
                    setTimeout(function(){
                        swal({
                            title: 'Pendaftaran Rawat Inap berhasil ditambahkan',
                            icon: 'success',
                            button: 'Ok',
                        }).then(function() {
                            window.location = '$url';
                        });
                    }, 500);
                    </script>
                ";
                // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran Rawat Inap berhasil ditambahkan</div>');
                // redirect(site_url('form'));
            } else {
                $data = array(
                    'no_rawat' => $this->input->post('no_rawat', TRUE),
                    'no_registrasi' => $this->input->post('no_registrasi', TRUE),
                    'no_rekamedis' => $this->input->post('no_rekamedis', TRUE),
                    'cara_masuk' => $this->input->post('cara_masuk', TRUE),
                    'tanggal_daftar' => $this->input->post('tanggal_daftar', TRUE),
                    'kode_dokter_penanggung_jawab' => $this->input->post('kode_dokter_penanggung_jawab', TRUE),
                    'id_poliklinik' => $this->input->post('id_poliklinik', TRUE),
                    'nama_penanggung_jawab' => $this->input->post('nama_penanggung_jawab', TRUE),
                    'hubungan_dengan_penanggung_jawab' => $this->input->post('hubungan_dengan_penanggung_jawab', TRUE),
                    'alamat_penanggung_jawab' => $this->input->post('alamat_penanggung_jawab', TRUE),
                    'id_jenis_bayar' => $this->input->post('id_jenis_bayar', TRUE),
                    //'asal_rujukan' => $this->input->post('asal_rujukan', TRUE),
                    'no_hp_penanggung_jawab' => $this->input->post('no_hp_penanggung_jawab', TRUE),
                );
                $url = site_url('form/index/walan');
                $this->Tbl_form_model->insert($data);
                echo "
                        <script>
                        setTimeout(function(){
                            swal({
                                title: 'Pendaftaran Rawat Jalan berhasil ditambahkan',
                                icon: 'success',
                                button: 'Ok',
                            }).then(function() {
                                window.location = '$url';
                            });
                        }, 500);
                        </script>
                    ";
                // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pendaftaran Rawat Jalan berhasil ditambahkan</div>');
                // $this->session->set_flashdata('message', 'Create Record Success 2');
                // redirect(site_url('form/index/walan'));
            }
        }
    }

    public function update($id)
    {
        $row = $this->Tbl_form_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('form/update_action'),
                'no_registrasi' => set_value('no_registrasi', $row->no_registrasi),
                'no_rawat' => set_value('no_rawat', $row->no_rawat),
                'no_rekamedis' => set_value('no_rekamedis', $row->no_rekamedis),
                'cara_masuk' => set_value('cara_masuk', $row->cara_masuk),
                'tanggal_daftar' => set_value('tanggal_daftar', $row->tanggal_daftar),
                'kode_dokter_penanggung_jawab' => set_value('kode_dokter_penanggung_jawab', $row->kode_dokter_penanggung_jawab),
                'id_poliklinik' => set_value('id_poliklinik', $row->id_poliklinik),
                'nama_penanggung_jawab' => set_value('nama_penanggung_jawab', $row->nama_penanggung_jawab),
                'hubungan_dengan_penanggung_jawab' => set_value('hubungan_dengan_penanggung_jawab', $row->hubungan_dengan_penanggung_jawab),
                'alamat_penanggung_jawab' => set_value('alamat_penanggung_jawab', $row->alamat_penanggung_jawab),
                'id_jenis_bayar' => set_value('id_jenis_bayar', $row->id_jenis_bayar),
               // 'asal_rujukan' => set_value('asal_rujukan', $row->asal_rujukan),
                'no_hp_penanggung_jawab' => set_value('no_hp_penanggung_jawab', $row->no_hp_penanggung_jawab),
            );
            $this->template->load('template', 'form/tbl_pendaftaran_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('form'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no_rawat', TRUE));
        } else {
            $data = array(
                'no_registrasi' => $this->input->post('no_registrasi', TRUE),
                'no_rekamedis' => $this->input->post('no_rekamedis', TRUE),
                'cara_masuk' => $this->input->post('cara_masuk', TRUE),
                'tanggal_daftar' => $this->input->post('tanggal_daftar', TRUE),
                'kode_dokter_penanggung_jawab' => $this->input->post('kode_dokter_penanggung_jawab', TRUE),
                'id_poliklinik' => $this->input->post('id_poliklinik', TRUE),
                'nama_penanggung_jawab' => $this->input->post('nama_penanggung_jawab', TRUE),
                'hubungan_dengan_penanggung_jawab' => $this->input->post('hubungan_dengan_penanggung_jawab', TRUE),
                'alamat_penanggung_jawab' => $this->input->post('alamat_penanggung_jawab', TRUE),
                'id_jenis_bayar' => $this->input->post('id_jenis_bayar', TRUE),
              //  'asal_rujukan' => $this->input->post('asal_rujukan', TRUE),
                'no_hp_penanggung_jawab' => $this->input->post('no_hp_penanggung_jawab', TRUE),
            );

            $this->Tbl_form_model->update($this->input->post('no_rawat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('form'));
        }
    }

    public function delete($id)
    {
        $row = $this->Tbl_form_model->get_by_id($id);

        if ($row) {
            $this->Tbl_form_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('form'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('form'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('no_registrasi', 'no registrasi', 'trim|required');
        $this->form_validation->set_rules('no_rekamedis', 'no rekamedis', 'trim|required');
        $this->form_validation->set_rules('cara_masuk', 'cara masuk', 'trim|required');
        $this->form_validation->set_rules('tanggal_daftar', 'tanggal daftar', 'trim|required');
        $this->form_validation->set_rules('kode_dokter_penanggung_jawab', 'kode dokter penanggung jawab', 'trim|required');
        $this->form_validation->set_rules('id_poliklinik', 'id poliklinik', 'trim|required');
        $this->form_validation->set_rules('nama_penanggung_jawab', 'nama penanggung jawab', 'trim|required');
        $this->form_validation->set_rules('hubungan_dengan_penanggung_jawab', 'hubungan dengan penanggung jawab', 'trim|required');
        $this->form_validation->set_rules('alamat_penanggung_jawab', 'alamat penanggung jawab', 'trim|required');
        $this->form_validation->set_rules('id_jenis_bayar', 'id jenis bayar', 'trim|required');
      //  $this->form_validation->set_rules('asal_rujukan', 'asal rujukan', 'trim|required');
        $this->form_validation->set_rules('no_hp_penanggung_jawab', 'no hp penanggung jawab', 'trim|required');

        $this->form_validation->set_rules('no_rawat', 'no_rawat', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_pendaftaran.xls";
        $judul = "tbl_pendaftaran";
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
        xlsWriteLabel($tablehead, $kolomhead++, "No Registrasi");
        xlsWriteLabel($tablehead, $kolomhead++, "No Rekamedis");
        xlsWriteLabel($tablehead, $kolomhead++, "Cara Masuk");
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Daftar");
        xlsWriteLabel($tablehead, $kolomhead++, "Kode Dokter Penanggung Jawab");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Poliklinik");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Penanggung Jawab");
        xlsWriteLabel($tablehead, $kolomhead++, "Hubungan Dengan Penanggung Jawab");
        xlsWriteLabel($tablehead, $kolomhead++, "Alamat Penanggung Jawab");
        xlsWriteLabel($tablehead, $kolomhead++, "Id Jenis Bayar");
       // xlsWriteLabel($tablehead, $kolomhead++, "Asal Rujukan");
        xlsWriteLabel($tablehead, $kolomhead++, "No Hp Penanggung Jawab");

        foreach ($this->Tbl_form_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->no_registrasi);
            xlsWriteLabel($tablebody, $kolombody++, $data->no_rekamedis);
            xlsWriteLabel($tablebody, $kolombody++, $data->cara_masuk);
            xlsWriteLabel($tablebody, $kolombody++, $data->tanggal_daftar);
            xlsWriteNumber($tablebody, $kolombody++, $data->kode_dokter_penanggung_jawab);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_poliklinik);
            xlsWriteLabel($tablebody, $kolombody++, $data->nama_penanggung_jawab);
            xlsWriteLabel($tablebody, $kolombody++, $data->hubungan_dengan_penanggung_jawab);
            xlsWriteLabel($tablebody, $kolombody++, $data->alamat_penanggung_jawab);
            xlsWriteNumber($tablebody, $kolombody++, $data->id_jenis_bayar);
         //   xlsWriteLabel($tablebody, $kolombody++, $data->asal_rujukan);
            xlsWriteNumber($tablebody, $kolombody++, $data->no_hp_penanggung_jawab);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_pendaftaran.doc");

        $data = array(
            'tbl_pendaftaran_data' => $this->Tbl_form_model->get_all(),
            'start' => 0
        );

        $this->load->view('form/tbl_pendaftaran_doc', $data);
    }

    function pemberi_tindakan_ajax()
    {
        $tindakan_oleh = $_GET['tindakan_oleh'];
        echo "<table class='table table-bordered'>";
        if ($tindakan_oleh == 'petugas') {
            $get_pegawai =  cmb_dinamis('nama_petugas', 'tbl_pegawai', 'nama_pegawai', 'nama_pegawai');
            echo "<tr><td width='200'>Nama Petugas</td><td>$get_pegawai</td></tr>";
        } elseif ($tindakan_oleh == 'dokter') {
            $get_dokter =  cmb_dinamis('nama_dokter', 'tbl_dokter', 'nama_dokter', 'nama_dokter');
            echo "<tr><td width='200'>Nama Dokter</td><td>$get_dokter</td></tr>";
        } else {
            $get_pegawai =  cmb_dinamis('nama_petugas', 'tbl_pegawai', 'nama_pegawai', 'nama_pegawai');
            echo "<tr><td width='200'>Nama Petugas</td><td>$get_pegawai</td></tr>";
            $get_dokter =  cmb_dinamis('nama_dokter', 'tbl_dokter', 'nama_dokter', 'nama_dokter');
            echo "<tr><td width='200'>Nama Dokter</td><td>$get_dokter</td></tr>";
        }
        echo "</table>";
    }

    function periksa_action()
    {
        $nama_tindakan  = $this->input->post('nama_tindakan');
        $tindakan       = $this->db->get_where('tbl_tindakan', array('nama_tindakan' => $nama_tindakan))->row_array();
        $hasil_periksa  = $this->input->post('hasil_periksa');
        $perkembangan   = $this->input->post('perkembangan');
        $no_rawat       = $this->input->post('no_rawat');

        $data = array(
            'no_rawat'      =>  $no_rawat,
            'hasil_periksa' =>  $hasil_periksa,
            'perkembangan'  =>  $perkembangan,
            'id_tindakan' =>  $tindakan['id_tindakan'],
            'tanggal'       =>  date('Y-m-d')
        );
        $this->db->insert('tbl_riwayat_tindakan', $data);

        $id_riwayat_tindakan = $this->db->insert_id();

        // insert history yang memberi tindakan
        $tindakan_oleh = $this->input->post('tindakan_oleh');
        if ($tindakan_oleh == 'dokter') {
            $nama_dokter = $this->input->post('nama_dokter');
            $dokter      = $this->db->get_where('tbl_dokter', array('nama_dokter' => $nama_dokter))->row_array();
            $data = array(
                'kode_pj_riwayat_tindakan'              =>  $dokter['kode_dokter'],
                'keterangan'           =>  'dokter',
                'id_riwayat_tindakan'  =>  $id_riwayat_tindakan
            );
            $this->db->insert('tbl_pj_riwayat_tindakan', $data);
        } elseif ($tindakan_oleh == 'petugas') {
            $nama_pegawai = $this->input->post('nama_petugas');
            $pegawai = $this->db->get_where('tbl_pegawai', array('nama_pegawai' => $nama_pegawai))->row_array();
            $data = array(
                'kode_pj_riwayat_tindakan'              =>  $pegawai['nik'],
                'keterangan'           =>  'petugas',
                'id_riwayat_tindakan'  =>  $id_riwayat_tindakan
            );
            $this->db->insert('tbl_pj_riwayat_tindakan', $data);
        } else {
            // data dokter
            $nama_dokter = $this->input->post('nama_dokter');
            $dokter      = $this->db->get_where('tbl_dokter', array('nama_dokter' => $nama_dokter))->row_array();
            $data_dokter = array(
                'kode_pj_riwayat_tindakan'              =>  $dokter['kode_dokter'],
                'keterangan'           =>  'dokter',
                'id_riwayat_tindakan'  =>  $id_riwayat_tindakan
            );
            $this->db->insert('tbl_pj_riwayat_tindakan', $data_dokter);

            // data petugas
            $nama_pegawai = $this->input->post('nama_petugas');
            $pegawai = $this->db->get_where('tbl_pegawai', array('nama_pegawai' => $nama_pegawai))->row_array();
            $data_pegawai = array(
                'kode_pj_riwayat_tindakan'              =>  $pegawai['nik'],
                'keterangan'           =>  'petugas',
                'id_riwayat_tindakan'  =>  $id_riwayat_tindakan
            );
            $this->db->insert('tbl_pj_riwayat_tindakan', $data_pegawai);
        }
        echo $this->session->set_flashdata('msg', 'Ditambah');
        redirect('form/detail/' . $no_rawat);
    }

    function beriobat_action()
    {
        $nama_barang  = $this->input->post('nama_obat');
        $id_obat_alkes_bhp        = $this->db->get_where('tbl_obat_alkes_bhp', array('nama_barang' => $nama_barang))->row_array();
        $no_rawat       = $this->input->post('no_rawat');
        $tanggal        = date('Y-m-d');
        $jumlah         = $this->input->post('qty');
        $data = array(
            'no_rawat'      =>  $no_rawat,
            'id_obat_alkes_bhp'   =>  $id_obat_alkes_bhp['id_obat_alkes_bhp'],
            'tanggal'       =>  $tanggal,
            'jumlah'        =>  $jumlah
        );

        $pengurangan_stok_obat = $id_obat_alkes_bhp['stok'] - $data['jumlah'];
        //Update stok obat
        $this->db->set('stok', $pengurangan_stok_obat);
        $this->db->where('id_obat_alkes_bhp', $id_obat_alkes_bhp['id_obat_alkes_bhp']);
        $this->db->update('tbl_obat_alkes_bhp');

        //insert ke tabel tbl_obat_alkes_bhp
        $this->db->insert('tbl_riwayat_pemberian_obat', $data);
        echo $this->session->set_flashdata('msg', 'Ditambah');
        redirect('form/detail/' . $no_rawat);
    }

    function create_pemeriksaan_laboratorium()
    {
        $no_rawat       = $this->input->post('no_rawat');
        $tanggal        = date('Y-m-d');
        $id_pemeriksaan_laboratorium = $this->input->post('id_pemeriksaan_laboratorium');
        $keterangan = $this->input->post('keterangan');
        $hasil = $this->input->post('hasil');

        $data = array(
            'no_rawat' => $no_rawat,
            'tanggal' => $tanggal,
            'id_pemeriksaan_laboratorium' => $id_pemeriksaan_laboratorium,
            'hasil' => $hasil,
            'keterangan' => $keterangan
        );

        $this->db->insert('tbl_riwayat_pemeriksaan_laboratorium', $data);
        echo $this->session->set_flashdata('msg', 'Ditambah');
        redirect('form/detail/' . $no_rawat);
    }

    function create_pemeriksaan_pasien()
    {
        $no_rawat       = $this->input->post('no_rawat');
        $berat_badan    = $this->input->post('berat_badan');
        $tensi_darah    = $this->input->post('tensi_darah');
        $suhu_badan    = $this->input->post('suhu_badan');
        $tanggal        = date('Y-m-d');

        $data = array(
            'no_rawat' => $no_rawat,
            'berat_badan' => $berat_badan,
            'tensi_darah' => $tensi_darah,
            'suhu_badan' => $suhu_badan,
            'tanggal'     => $tanggal  
        );

        $this->db->insert('tbl_riwayat_pemeriksaan_pasien', $data);
        echo $this->session->set_flashdata('msg', 'Ditambah');
        redirect('form/detail/' . $no_rawat);
    }

    function create_diagnosa_penyakit()
    {
        $no_rawat       = $this->input->post('no_rawat');
        $tanggal        = date('Y-m-d');
        $id_diagnosa_penyakit = $this->input->post('id_diagnosa_penyakit');
        $ciri_ciri_penyakit = $this->input->post('ciri_ciri_penyakit');
        $ciri_ciri_umum = $this->input->post('ciri_ciri_umum');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'no_rawat' => $no_rawat,
            'tanggal' => $tanggal,
            'id_diagnosa_penyakit' => $id_diagnosa_penyakit,
            'ciri_ciri_penyakit' => $ciri_ciri_penyakit,
            'ciri_ciri_umum' => $ciri_ciri_umum,
            'keterangan' => $keterangan
        );

        $this->db->insert('tbl_riwayat_diagnosa_penyakit', $data);
        echo $this->session->set_flashdata('msg', 'Ditambah');
        redirect('form/detail/' . $no_rawat);
    }
}

/* End of file Form.php */
/* Location: ./application/controllers/Form.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-03-18 15:36:35 */
/* http://harviacode.com */