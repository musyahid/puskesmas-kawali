<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
               
            <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">RIWAYAT TINDAKAN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatables_riwayat_tindakan" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No Rawat</th>
                        <th>No Regis</th>
                        <th>No Rekamedis</th>
                        <th>Nama Pasien</th>
                        <th>Cara Masuk</th>
                        <th>Nama Dokter Penanggung Jawab</th>
                        <?php
                        if($this->uri->segment(3)=='walan'){
                                echo " <th>Poliklinik Tujuan</th>";
                            }else{
                                echo " <th>Nama Ruangan</th>";

                            }

                        ?>
                        <th>Jenis Bayar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                  foreach ($form_data as $data) { ?>

                      <tr>
                        <td><?php echo $data->no_rawat ?></td>
                        <td><?php echo $data->no_registrasi ?></td>
                        <td><?php echo $data->no_rekamedis ?></td>
                        <td><?php echo $data->nama_pasien ?></td>
                        <td><?php echo $data->cara_masuk ?></td>
                        <td><?php echo $data->nama_dokter ?></td>
                        <td><?php 

                        if($this->uri->segment(3)=='walan'){
                                        echo $data->nama_poliklinik;
                                    }else{
                            //cari dara rawat inap
                            $ranap = $this->db->get_where('tbl_rawat_inap',array('no_rawat'=>$data->no_rawat))->row_array();
                                        $kodeTempatTidur = $ranap['id_ruang_rawat_inap'];
                                        $sqlRuangRanap = "SELECT nama_ruangan FROM tbl_ruang_rawat_inap WHERE id_ruang_rawat_inap=id_ruang_rawat_inap and id_ruang_rawat_inap='$kodeTempatTidur'";
                                        $bed = $this->db->query($sqlRuangRanap)->row_array();
                                        echo $bed['nama_ruangan'];
                        }
                        ?></td>
                        <td><?php echo $data->jenis_bayar ?></td>
                        <td style="text-align:center" width="100px">
                            <?php 
                            echo anchor(site_url('RekamMedis/detail_rekam_medis/'.$data->no_rawat),'<i class="fa fa-eye" aria-hidden="true"></i>','class="btn btn-danger btn-sm"'); 
                            
                            ?>
                        </td>
                      </tr>

                  <?php } ?>
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
                
            </div>
        </div>
    </section>
</div>