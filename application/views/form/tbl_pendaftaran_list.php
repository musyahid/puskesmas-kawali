<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">

                    <div class="box-header">
                        <h3 class="box-title">INPUT PEMERIKSAAN PASIEN</h3>
                    </div>

                    <div class="box-body">
                        <div class='row'>
                            <div class='col-md-9'>
                                <div style="padding-bottom: 10px;">

                                </div>
                            </div>
                            <div class=' col-md-3'>
                                <!-- <form action="<?php echo site_url('form/index'); ?>" class="form-inline" method="get">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                        <span class="input-group-btn">
                                            <?php
                                            if ($q <> '') {
                                            ?>
                                                <a href="<?php echo site_url('form'); ?>" class="btn btn-default">Reset</a>
                                            <?php
                                            }
                                            ?>
                                            <button class="btn btn-primary" type="submit">Search</button>
                                        </span>
                                    </div>
                                </form> -->
                            </div>
                        </div>


                        <div class="row" style="margin-bottom: 10px">
                            <div class="col-md-4 text-center">
                                <?= $this->session->flashdata('message') ?>
                                <!-- <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message') ?>"></div> -->
                            </div>
                            <div class="col-md-1 text-right">
                            </div>
                            <div class="col-md-3 text-right">

                            </div>
                        </div>
                        <table class="table table-bordered" id="myTable" style="margin-bottom: 10px">
                            <thead>
                                <tr style="background-color: #6495ED;">
                                    <th>No Rawat</th>
                                    
                                    <th>No Rekamedis</th>
                                    <th>Nama Pasien</th>
                                    <th>Cara Masuk</th>
                                    <th>Nama Dokter Penanggung Jawab</th>
                                    <?php
                                    if ($this->uri->segment(3) == 'walan') {
                                        echo " <th>Poliklinik Tujuan</th>";
                                    } else {
                                        echo " <th>Nama Ruangan</th>";
                                    }

                                    ?>
                                    <th>Jenis Bayar</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($form_data as $form) {
                                ?>


                                    <tr>
                                        <td><?php echo $form->no_rawat ?></td>
                                        
                                        <td><?php echo $form->no_rekamedis ?></td>
                                        <td><?php echo $form->nama_pasien ?></td>
                                        <td><?php echo $form->cara_masuk ?></td>
                                        <td><?php echo $form->nama_dokter ?></td>
                                        <td><?php

                                            if ($this->uri->segment(3) == 'walan') {
                                                echo $form->nama_poliklinik;
                                            } else {
                                                //cari dara rawat inap
                                                $ranap = $this->db->get_where('tbl_rawat_inap', array('no_rawat' => $form->no_rawat))->row_array();
                                                $kodeTempatTidur = $ranap['id_ruang_rawat_inap'];
                                                $sqlRuangRanap = "SELECT nama_ruangan FROM tbl_ruang_rawat_inap WHERE id_ruang_rawat_inap=id_ruang_rawat_inap and id_ruang_rawat_inap='$kodeTempatTidur'";
                                                $bed = $this->db->query($sqlRuangRanap)->row_array();
                                                echo $bed['nama_ruangan'];
                                            }
                                            ?></td>
                                        <td><?php echo $form->jenis_bayar ?></td>
                                        <td style="text-align:center" width="100px">
                                            <?php
                                            echo anchor(site_url('form/detail/' . $form->no_rawat), '<i class="fa fa-eye" aria-hidden="true"></i>', 'class="btn btn-danger btn-sm"');

                                            ?>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6 text-right">
                                <!-- <?php echo $pagination ?> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script>
    $(document).ready(function() {
        $("#myTable").dataTable();
    });
</script>