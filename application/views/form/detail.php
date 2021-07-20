<div class="content-wrapper">
    
    <section class="content">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('msg') ?>"></div>
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">BIODATA PASIEN </h3>
            </div>

            <div class="box-body">
              <table class="table table-bordered" style="margin-bottom: 10px">

                <tr><td width="200">No Rawat</td><td><?php echo $form['no_rawat'] ?></td></tr>
                <tr><td>No Rekamedis</td><td><?php echo $form['no_rekamedis'] ?></td></tr>
                <tr><td>Nama Pasien</td><td><?php echo $form['nama_pasien'] ?></td></tr>
                
              </table>

              <!--  //modal untuk input tindakan-->
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#inputTindakan">
               Input Tindakan
              </button>
             <!-- Trigger the modal with a button input Obat -->
              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#inputObat">Input Pemberian Obat</button>
            <!-- Button Input -->
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#inputPemeriksaan">Input pemeriksaan laboratorium</button>
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#inputDiagnosa">Input diagnosa</button>
            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#inputPemeriksaanPasien">Input Pemeriksaan Pasien</button>
  

            <!-- Modal Input Tindakan-->
            <div class="modal fade" id="inputTindakan" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Input Tindakan</h4>
                  </div>
                  <div class="modal-body">

                    <?php echo form_open('form/periksa_action')?>

                    <table class="table table-bordered">
                      <input value="<?php echo $no_rawat?>"    type="hidden" name="no_rawat">
                      <tr>
                        <td width="200">Dilakukan Oleh</td>
                        <td><?php echo form_dropdown('tindakan_oleh', array('dokter' => 'Dokter', 'petugas' => 'Petugas', 'dokter_dan_petugas' => 'Dokter Dan petugas'), null, array('class' => 'form-control select2', 'id'=>'tindakan_oleh', 'onChange' => 'pemberi_tindakan()', 'style'=> 'width: 100%;')); ?></td>
                      </tr>
                      <tr><td>Nama Tindakan</td>
                      <!-- <td><input type="text" id='txt_cari_tindakan' required   placeholder="Masukan Nama Tindakan" name="nama_tindakan" class="form-control ui-autocomplete-input"></td> -->
                      <td><?php echo cmb_dinamis('nama_tindakan', 'tbl_tindakan','nama_tindakan','nama_tindakan');?></td>
                      </tr>
                      <tr><td>Hasil Periksa</td><td><input type="text" required name="hasil_periksa" placeholder="Masukan Hasil Periksa" class="form-control"></td></tr>
                      <tr><td>Perkembangan</td><td><input type="text" required name="perkembangan" placeholder="Masukan Perkembangan Sekarang" class="form-control"></td></tr>
                    </table>

                    <div class="tindakan_by">
                      <table class="table table-bordered">
                        <tr>
                        <td width="200">Masukan Nama Dokter</td>
                        <td><?php echo cmb_dinamis('nama_dokter', 'tbl_dokter','nama_dokter','nama_dokter');?></td>
                        </tr>
                      
                      </table>
                      
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                  </div>
                </form>
                </div>
              </div>
            </div>


            <!-- Modal Input Obat -->
            <div id="inputObat" class="modal fadSe" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Input Pemberian Obat</h4>
                        </div>
                        <?php echo form_open('form/beriobat_action'); ?>
                        <div class="modal-body">
                        <button type="button" id="btn2" class="btn btn-primary" > + Tambah Obat</button>
                            <input value="<?php echo $no_rawat; ?>" type="hidden" name="no_rawat">
                            <table class="table table-bordered">
                                <tr>
                                <td>Nama Obat</td>
                                <td>
                                    <select name="nama_obat[]" id="nama_obat" class="form-control" onchange="autocomplate_data_obat()">
                                      <option value="">-PILIH-</option>
                                      <?php foreach ($data_obat as $data) { ?>
                                      <option value="<?= $data->nama_barang ?>"><?= $data->nama_barang ?></option>
                                      <?php } ?>
                                    </select>
                                </td>
                                </tr>
                                <tr><td>Satuan Obat</td><td><input type="text"  placeholder="Satuan Obat" class="form-control satuan_obat" readonly></td></tr>
                                <tr><td>Qty</td><td><input type="number" name="qty" placeholder="Qty" class="form-control"></td></tr>
                                <tr><td>Dosis</td><td><input type="text" name="dosis" placeholder="Dosis" class="form-control"></td></tr>
                            </table>    
                        </div>
                        <div class="modal-body">
                        <div class="add-obat"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                    </form>

                </div>
            </div>

            <!-- Modal Input Pemeriksaan -->
            <div id="inputPemeriksaan" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Input Pemeriksaaan Laboratorium</h4>
                        </div>
                        <?php echo form_open('form/create_pemeriksaan_laboratorium'); ?>
                        <div class="modal-body">
                            <input value="<?php echo $no_rawat; ?>" type="hidden" name="no_rawat">
                            <table class="table table-bordered">
                                <tr>
                                <td>Nama Pemeriksaan</td>
                                <td><?php echo cmb_dinamis('id_pemeriksaan_laboratorium', 'tbl_pemeriksaan_laboratorium','nama_periksa','id_pemeriksaan_laboratorium');?></td></tr>
                                <tr>
                                <tr>
                                <td>Hasil</td>
                                <td><input type="text" required name="hasil" placeholder="Hasil" class="form-control"></td>
                                </tr>
                                <td>Keterangan</td>
                                <td><input type="text" required name="keterangan" placeholder="Keterangan" class="form-control"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Input pemeriksaan laboratorium</button>
                        </div>
                    </div>
                    </form>

                </div>
            </div>

            <!-- Modal Input Diagnosa -->
            <div id="inputDiagnosa" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Input Diagnosa</h4>
                        </div>
                        <?php echo form_open('form/create_diagnosa_penyakit'); ?>
                        <div class="modal-body">
                            <input value="<?php echo $no_rawat; ?>" type="hidden" name="no_rawat">
                            <table class="table table-bordered">
                                <tr>
                                <td>Nama Penyakit</td>
                                <td>                                
                                    <select id='id_diagnosa_penyakit' name='id_diagnosa_penyakit' class='form-control'>
                                    <option value="">-Pilih-</option>
                                      <?php foreach($diagnosa_penyakit as $data) {
                                        
                                        echo "<option value='". $data->id_diagnosa_penyakit."'>".$data->nama_penyakit."</option>";
                                        
                                      }
                                      ?>
                                    </select>
                                  </td>
                                </tr>
                                <tr><td>Ciri - Ciri Penyakit</td><td>
                                  <input type="text" name="ciri_ciri_penyakit" class="form-control" placeholder="Ciri - ciri penyakit">
                                </td></tr>
                                <tr><td>Ciri - Ciri Umum</td><td>
                                  <input type="text" name="ciri_ciri_umum"  class="form-control" placeholder="Ciri - ciri umum">
                                </td></tr>
                                <tr><td>Keterangan</td><td>
                                  <input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
                                </td></tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                    </form>

                </div>
            </div>

            <!-- Modal Input Pemeriksaan Pasien -->
            <div class="modal fade" id="inputPemeriksaanPasien" aria-labelledby="myModalLabel">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Input Tindakan</h4>
                  </div>
                  <div class="modal-body">

                    <?php echo form_open('form/create_pemeriksaan_pasien')?>

                    <table class="table table-bordered">
                      <input value="<?php echo $no_rawat?>"    type="hidden" name="no_rawat">
                      </tr>
                      <tr><td>Berat Badan *<span class="label label-danger">Kilogram</span></td><td><input type="number" required name="berat_badan" placeholder="Masukan Berat Badan" class="form-control"></td></tr>
                      <tr><td>Tensi Darah *<span class="label label-danger">mmHg</span></td><td><input type="text" required name="tensi_darah" placeholder="Masukan Tensi Darah" class="form-control"></td></tr>
                      <tr><td>Suhu Badan *<span class="label label-danger">Celsius</span></td><td><input type="number" required name="suhu_badan" placeholder="Masukan Suhu Badan" class="form-control"></td></tr>
                    </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
              
            </div>
            
        </div>


        <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">RIWAYAT TINDAKAN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatables_riwayat_tindakan" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tindakan</th>
                  <th>Hasil Periksa</th>
                  <th>Perkembangan</th>
                  <td>Diperiksa Oleh</td>
                  <th>Tanggal</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  foreach ($tindakan as $t) { ?>

                      <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $t->nama_tindakan ?></td>
                          <td><?= $t->hasil_periksa ?></td>
                          <td><?= $t->perkembangan ?></td>
                          <td><?php if ($t->jumlah_pemeriksa > 1) {
                            echo 'Dokter dan Petugas';
                          } else {
                            echo $t->keterangan;
                          } ?></td>
                          <td><?=  $t->tanggal ?></td>
                      </tr>

                  <?php } ?>
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>

          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">RIWAYAT PEMBERIAN OBAT </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatables_riwayat_obat" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Obat</th>
                  <th>Nama Obat</th>
                  <th>Jumlah</th>
                  <th>Tanggal</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  foreach ($pemberian_obat as $po) {
                    echo "<tr>
                              <td>$no</td>
                              <td>$po->id_obat</td>
                              <td>$po->nama_obat</td>
                              <td>$po->jumlah</td>
                              <td>$po->tanggal</td></tr>";
                    $no++;

                  }
                  ?>
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>


          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">RIWAYAT PEMERIKSAAN LABORATORIUM </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatables_pemeriksaan_labaoratorium" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pemeriksaan</th>
                  <th>Hasil Periksa</th>
                  <th>Keterangan</th>
                  <th>Tanggal</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  foreach ($pemeriksaan_laboratorium as $pl) {
                    echo "<tr>
                                    <td>$no</td>
                                    <td>$pl->nama_periksa</td>
                                    <td>$pl->hasil</td>
                                    <td>$pl->keterangan</td>
                                    <td>$pl->tanggal</td></tr>";
                    $no++;

                  }
                  ?>
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>

          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">RIWAYAT DIAGNOSA </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatables_pemeriksaan_diagnosa" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Penyakit</th>
                  <th>Ciri - Ciri Penyakit</th>
                  <th>Ciri - Ciri Umum</th>
                  <th>Keterangan</th>
                  <th>Tanggal</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  foreach ($riwayat_diagnosa_penyakit as $dp) {
                    echo "<tr>
                                    <td>$no</td>
                                    <td>$dp->nama_penyakit</td>
                                    <td>$dp->ciri_ciri_penyakit</td>
                                    <td>$dp->ciri_ciri_umum</td>
                                    <td>$dp->keterangan</td>
                                    <td>$dp->tanggal</td></tr>";
                    $no++;

                  }
                  ?>
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>

          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">RIWAYAT PEMERIKSAAN PASIEN </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatables_pemeriksaan_pasien" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>BERAT BADAN</th>
                  <th>TENSI DARAH</th>
                  <th>SUHU BADAN</th>
                  <th>Tanggal</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no = 1;
                  foreach ($riwayat_pemeriksaan_pasien as $dp) {
                    echo "<tr>
                                    <td>$no</td>
                                    <td>$dp->berat_badan</td>
                                    <td>$dp->tensi_darah</td>
                                    <td>$dp->suhu_badan</td>
                                    <td>$dp->tanggal</td></tr>";
                    $no++;

                  }
                  ?>
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>

    </section>

</div>

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>


<script type="text/javascript">



  function cari_dokter(){

     //autocomplete Nama Dokter
         $("txt_nama_dokter").autocomplete({
            source: "<?php echo base_url() ?>/index.php/dokter/autocomplate",
            minLength: 1
        });

  }

  function cari_petugas(){
    //autocomplete Nama petugas
          $("txt_nama_petugas").autocomplete({
            source: "<?php echo base_url() ?>/index.php/pegawaipuskesmas/autocomplate",
            minLength: 1
        });

  }

  function cari_obat(){
    //autocomplete Nama petugas
          $("txt_nama_obat").autocomplete({
            source: "<?php echo base_url() ?>/index.php/obatdanalkes/autocomplate",
            minLength: 1
        });

  }


    $('#id_diagnosa_penyakit').on('change', function() {
      $(function() {

      //autocomplete
      $("#id_diagnosa_penyakit").autocomplete({	
          source: "<?php echo base_url()?>index.php/form/autocomplate_id_diagnosa",
          minLength: 1
      });		

      

    });

    autocomplate_diagnosa_penyakit();
            
    });


    // autocomplate_diagnosa_penyakit();



    function autocomplate_diagnosa_penyakit(){
    var id_diagnosa_penyakit = $("#id_diagnosa_penyakit").val();
        $.ajax({
            url: "<?php echo base_url() ?>index.php/form/autoFillDiagnosa",
            data:"id_diagnosa_penyakit="+id_diagnosa_penyakit ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#ciri_ciri_penyakit').val(obj.ciri_ciri_penyakit);
            $('#ciri_ciri_umum').val(obj.ciri_ciri_umum);
            $('#keterangan').val(obj.keterangan);
        });


    }
    

  function pemberi_tindakan(){
    var tindakan_oleh = $('#tindakan_oleh').val();
            $.ajax({
                url:"<?php echo base_url ();?>index.php/form/pemberi_tindakan_ajax",
                data:"tindakan_oleh="+tindakan_oleh ,
                success: function(html)
                { 
                    $(".tindakan_by").html(html);
                }
            });
        }

</script>

<script type="text/javascript">

    $(function() {

        //autocomplete tindakan
        $("txt_cari_tindakan").autocomplete({
            source: "<?php echo base_url() ?>/index.php/tindakan/autocomplate",
            minLength: 1
        });

    });


</script>

<script>
        $(document).ready(function(){
        $("#btn2").click(function(){
          
            $('.add-obat').append(
            '<table class="table table-bordered">' +
            '<tr>' +
            '<td>Nama Obat</td>' +
            '<td><select name="nama_obat[]" id="nama_obat" class="form-control" onchange="autocomplate_data_obat()">' +
            '<option value="">-PILIH-</option>' +
            '<?php foreach ($data_obat as $data) { ?>' +
            '<option value="<?= $data->nama_barang; ?>"><?= $data->nama_barang; ?> </option>' +
            '<?php } ?>' +
            '</select></td>' +
            '<tr><td>Satuan Obat</td><td><input type="text"  placeholder="Satuan Obat" class="form-control satuan_obat" readonly></td></tr>' +
            '<tr><td>Qty</td><td><input type="number" name="qty" placeholder="Qty" class="form-control"></td></tr>' +
            '<tr><td>Dosis</td><td><input type="text" name="dosis" placeholder="Dosis" class="form-control"></td></tr>' +
            '</table>'
            );
        });
        });

    	function autocomplate_data_obat(){
        $(function() {
  
        //autocomplete
            $("#nama_obat").autocomplete({
                source: "<?php echo base_url()?>index.php/form/autocomplate_data_obat",
                minLength: 1
            });
        });
        autoFill();

        }

      function autoFill(){
        var nama_obat = $("#nama_obat").val();
            $.ajax({
                url: "<?php echo base_url() ?>index.php/form/autoFillObat",
                data:"nama_obat="+nama_obat ,
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
          console.log(obj)
                $('.satuan_obat').val(obj.nama_satuan);
            });
      }
</script>
