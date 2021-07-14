<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA INPUT PEMERIKSAAN PASIEN RAWAT INAP </h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nomor Pemeriksaan <?php echo form_error('no_rekamedis') ?></td><td><input type="text" id="id_periksa"  placeholder="Nomor Pemeriksaan" class="form-control" name="id_periksa" value="<?php echo noPemeriksa() ?>" /> </td></tr>

	    <tr><td width='200'>No Rawat <?php echo form_error('no_rawat') ?></td><td>
	    	
	    	<?php echo cmb_dinamis('no_rawat','tbl_pendaftaran','no_rawat','no_rawat',$no_rawat);?>

	    </td></tr>


	    <tr><td width='200'>No Rekamedis <?php echo form_error('no_rekamedis') ?></td><td>
	    	
	    	<?php echo cmb_dinamis('no_rekamedis','tbl_pasien','no_rekamedis','no_rekamedis',$no_rekamedis);?>

	    </td></tr>

	     <tr><td width='200'>Nama Pasien <?php echo form_error('nama_pasien') ?></td><td>
	    	
	    	<?php echo cmb_dinamis('no_rekamedis','tbl_pasien','nama_pasien','no_rekamedis',$no_rekamedis);?>

	    </td></tr>


	    <tr><td width='200'>Tanggal Daftar <?php echo form_error('tanggal_daftar') ?></td><td><input type="date" class="form-control" name="tanggal_daftar" id="tanggal_daftar" placeholder="Tanggal Daftar" value="<?php echo $tanggal_daftar; ?>" /></td></tr>

	    <tr><td width='200'>Tindakan <?php echo form_error('id_tindakan') ?></td><td>
	    	

	    	<?php echo cmb_dinamis('id_tindakan','tbl_tindakan','nama_tindakan','id_tindakan',$id_tindakan);?>

	    </td></tr>

	    <tr><td width='200'>Pemeriksaan Laboratorium <?php echo form_error('id_pemeriksaan_laboratorium') ?></td><td>
	    	
	    	<?php echo cmb_dinamis('id_pemeriksaan_laboratorium','tbl_pemeriksaan_laboratorium','nama_periksa','id_pemeriksaan_laboratorium',$id_pemeriksaan_laboratorium);?>

	    </td></tr>


	    <tr><td width='200'>Diagnosa Penyakit <?php echo form_error('id_diagnosa_penyakit') ?></td><td>
	    	

		<?php echo cmb_dinamis('id_diagnosa_penyakit','tb_diagnosa_penyakit','nama_penyakit','id_diagnosa_penyakit',$id_diagnosa_penyakit);?>	    	

	    </td></tr>
	    
        <tr><td width='200'>Keluhan <?php echo form_error('keluhan') ?></td><td> <textarea class="form-control" rows="3" name="keluhan" id="keluhan" placeholder="Keluhan"><?php echo $keluhan; ?></textarea></td></tr>
	    <tr><td></td><td>
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('periksa') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>