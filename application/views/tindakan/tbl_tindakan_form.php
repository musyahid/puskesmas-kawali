<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TINDAKAN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'  


		 <tr><td width='200'>Id Tindakan <?php echo form_error('id_tindakan') ?></td><td><input type="text" class="form-control" name="id_tindakan" id="id_tindakan" placeholder="Id Tindakan" value="<?php echo $id_tindakan; ?>" /></td></tr>

	    <tr><td width='200'>Jenis Tindakan <?php echo form_error('jenis_tindakan') ?></td><td>
	    	
	    	<?php echo form_dropdown('jenis_tindakan', array('RAWAT_JALAN' => 'Rawat jalan', 'RAWAT_INAP' => 'Rawat Inap'), $jenis_tindakan, array('class' => 'form-control')); ?>

	    </td></tr>

	    <tr><td width='200'>Nama Tindakan <?php echo form_error('nama_tindakan') ?></td><td><input type="text" class="form-control" name="nama_tindakan" id="nama_tindakan" placeholder="Nama Tindakan" value="<?php echo $nama_tindakan; ?>" /></td></tr>

	    <tr><td width='200'>Kategori Tindakan <?php echo form_error('id_kategori_tindakan') ?></td><td>
	    	
	    	<?php echo cmb_dinamis('id_kategori_tindakan', 'tbl_kategori_tindakan', 'kategori_tindakan', 'id_kategori_tindakan', $id_kategori_tindakan); ?>


	    </td></tr>


	    <tr><td width='200'>Tarif <?php echo form_error('tarif') ?></td><td><input type="text" class="form-control" name="tarif" id="tarif" placeholder="Tarif" value="<?php echo $tarif; ?>" /></td></tr>

	    <tr><td width='200'>Tindakan Oleh <?php echo form_error('tindakan_oleh') ?></td><td>
	    	
	    	<?php echo form_dropdown('tindakan_oleh', array('dokter' => 'Dokter', 'petugas' => 'Petugas', 'dokter_dan_petugas' => 'Dokter Dan petugas'), $tindakan_oleh, array('class' => 'form-control')); ?>

	    </td></tr>


	    <tr><td width='200'>Poliklinik <?php echo form_error('id_poliklinik') ?></td><td>
	    	
	    	<?php echo cmb_dinamis('id_poliklinik', 'tbl_poliklinik', 'nama_poliklinik', 'id_poliklinik', $id_poliklinik) ?>
	    	
	    </td></tr>
	    <tr><td></td><td> 


	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('tindakan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>

