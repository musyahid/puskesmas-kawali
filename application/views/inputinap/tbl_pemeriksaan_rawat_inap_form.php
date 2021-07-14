<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA PEMERIKSAAN PASIEN RAWAT INAP</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        


		<tr><td width='200'>Nomor Pemeriksaan <?php echo form_error('no_rekamedis') ?></td><td><input type="text" id="id_periksa"  placeholder="Nomor Pemeriksaan" class="form-control" name="id_periksa" value="<?php echo noPemeriksa() ?>" /> </td></tr>

	     <tr><td width='200'>No Rawat <?php echo form_error('no_rawat') ?></td><td>
	    	
	    	<?php echo cmb_dinamis('no_rawat','tbl_pendaftaran','no_rawat','no_rawat',$no_rawat);?>

	    </td></tr>


	    <tr><td width='200'>No Rekamedis <?php echo form_error('no_rekamedis') ?></td><td><input type="text" class="form-control" name="no_rekamedis"  onkeyup="autocomplate_norekamedis()" id="no_rekamedis" placeholder="No Rekamedis" value="<?php echo $no_rekamedis; ?>" /></td></tr>

	    <tr><td>Nama Pasien</td><td>
	    	
	    	<input type="text" name="nama_pasien" id="nama_pasien" class="form-control" placeholder="Nama Pasien">

	    </td></tr>

	    <tr><td width='200'>Tanggal Daftar <?php echo form_error('tanggal_daftar') ?></td><td><input type="date" class="form-control" name="tanggal_daftar" id="tanggal_daftar" placeholder="Tanggal Daftar" value="<?php echo $tanggal_daftar; ?>" /></td></tr>
	    <tr><td width='200'>Tempat Tidur <?php echo form_error('id_tempat_tidur') ?></td><td>
	    	
	    	<?php echo cmb_dinamis('id_tempat_tidur','tbl_tempat_tidur','id_tempat_tidur','id_tempat_tidur',$id_tempat_tidur);?>

	    </td></tr>


	     <tr><td width='200'>OBAT <?php echo form_error('id_obat') ?></td><td><?php echo form_dropdown('id_obat', array('OBAT TIDUR' => 'OBAT TIDUR', 'OBAT PENENANG' => 'OBAT PENENANG','OBAT PEREDA NYERI'=>'OBAT PEREDA NYERI'), $id_obat, array('class' => 'form-control')); ?></td></tr>



	     <tr><td width='200'>Tindakan <?php echo form_error('id_tindakan') ?></td><td>
	    	

	    	<?php echo cmb_dinamis('id_tindakan','tbl_tindakan','nama_tindakan','id_tindakan',$id_tindakan);?>

	    </td></tr>

	    <tr><td width='200'>Pemeriksaan Laboratorium <?php echo form_error('id_pemeriksaan_laboratorium') ?></td><td>
	    	
	    	<?php echo cmb_dinamis('id_pemeriksaan_laboratorium','tbl_pemeriksaan_laboratorium','nama_periksa','id_pemeriksaan_laboratorium',$id_pemeriksaan_laboratorium);?>

	    </td></tr>


	    <tr><td width='200'>Diagnosa Penyakit <?php echo form_error('id_diagnosa_penyakit') ?></td><td>
	    	

		<?php echo cmb_dinamis('id_diagnosa_penyakit','tb_diagnosa_penyakit','nama_penyakit','id_diagnosa_penyakit',$id_diagnosa_penyakit);?>	    	

	    </td></tr>
	    <tr><td width='200'>Hasil Pemeriksaan Fisik <?php echo form_error('Hasil_pemeriksaan_fisik') ?></td><td><input type="text" class="form-control" name="Hasil_pemeriksaan_fisik" id="Hasil_pemeriksaan_fisik" placeholder="Hasil Pemeriksaan Fisik" value="<?php echo $Hasil_pemeriksaan_fisik; ?>" /></td></tr>
	    
        <tr><td width='200'>Riwayat Penyakit <?php echo form_error('riwayat_penyakit') ?></td><td> <textarea class="form-control" rows="3" name="riwayat_penyakit" id="riwayat_penyakit" placeholder="Riwayat Penyakit"><?php echo $riwayat_penyakit; ?></textarea></td></tr>
	    
        <tr><td width='200'>Keluhan <?php echo form_error('keluhan') ?></td><td> <textarea class="form-control" rows="3" name="keluhan" id="keluhan" placeholder="Keluhan"><?php echo $keluhan; ?></textarea></td></tr>
	    <tr><td></td><td>
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('inputinap') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>


<script type="text/javascript">
    $(function() {
        //autocomplete
        $("#no_rawat").autocomplete({
            source: "http://localhost/cigenerator/index.php/welcome/autocomplate_norawat",
            minLength: 1
        });				
    });
</script>

<script type="text/javascript">

	function autocomplate_norekamedis(){


		$(function() {
        //autocomplete
        $("#no_rekamedis").autocomplete({
            source: "<?php echo base_url()?>index.php/form/autocomplate_no_rekamedis",
            minLength: 1
        });				
    });
		autoFill();

	}

	function autoFill(){
		 var no_rekamedis = $("#no_rekamedis").val();
        $.ajax({
            url: "<?php echo base_url() ?>index.php/form/autoFill",
            data:"no_rekamedis="+no_rekamedis ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#nama_pasien').val(obj.nama_pasien);
           
        });


	}
	</script>