<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL_PEMERIKSAAN_RAWAT_INAP</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>No Rawat <?php echo form_error('no_rawat') ?></td><td><input type="text" class="form-control" name="no_rawat" id="no_rawat" placeholder="No Rawat" value="<?php echo $no_rawat; ?>" /></td></tr>
	    <tr><td width='200'>No Rekamedis <?php echo form_error('no_rekamedis') ?></td><td><input type="text" class="form-control" name="no_rekamedis" id="no_rekamedis" placeholder="No Rekamedis" value="<?php echo $no_rekamedis; ?>" /></td></tr>
	    <tr><td width='200'>Nama Pasien <?php echo form_error('nama_pasien') ?></td><td><input type="text" class="form-control" name="nama_pasien" id="nama_pasien" placeholder="Nama Pasien" value="<?php echo $nama_pasien; ?>" /></td></tr>
	    <tr><td width='200'>Tanggal Daftar <?php echo form_error('tanggal_daftar') ?></td><td><input type="date" class="form-control" name="tanggal_daftar" id="tanggal_daftar" placeholder="Tanggal Daftar" value="<?php echo $tanggal_daftar; ?>" /></td></tr>
	    <tr><td width='200'>Id Tempat Tidur <?php echo form_error('id_tempat_tidur') ?></td><td><input type="text" class="form-control" name="id_tempat_tidur" id="id_tempat_tidur" placeholder="Id Tempat Tidur" value="<?php echo $id_tempat_tidur; ?>" /></td></tr>
	    <tr><td width='200'>Id Obat <?php echo form_error('id_obat') ?></td><td><input type="text" class="form-control" name="id_obat" id="id_obat" placeholder="Id Obat" value="<?php echo $id_obat; ?>" /></td></tr>
	    <tr><td width='200'>Id Tindakan <?php echo form_error('id_tindakan') ?></td><td><input type="text" class="form-control" name="id_tindakan" id="id_tindakan" placeholder="Id Tindakan" value="<?php echo $id_tindakan; ?>" /></td></tr>
	    <tr><td width='200'>Id Pemeriksaan Laboratorium <?php echo form_error('id_pemeriksaan_laboratorium') ?></td><td><input type="text" class="form-control" name="id_pemeriksaan_laboratorium" id="id_pemeriksaan_laboratorium" placeholder="Id Pemeriksaan Laboratorium" value="<?php echo $id_pemeriksaan_laboratorium; ?>" /></td></tr>
	    <tr><td width='200'>Id Diagnosa Penyakit <?php echo form_error('id_diagnosa_penyakit') ?></td><td><input type="text" class="form-control" name="id_diagnosa_penyakit" id="id_diagnosa_penyakit" placeholder="Id Diagnosa Penyakit" value="<?php echo $id_diagnosa_penyakit; ?>" /></td></tr>
	    <tr><td width='200'>Hasil Pemeriksaan Fisik <?php echo form_error('Hasil_pemeriksaan_fisik') ?></td><td><input type="text" class="form-control" name="Hasil_pemeriksaan_fisik" id="Hasil_pemeriksaan_fisik" placeholder="Hasil Pemeriksaan Fisik" value="<?php echo $Hasil_pemeriksaan_fisik; ?>" /></td></tr>
	    
        <tr><td width='200'>Riwayat Penyakit <?php echo form_error('riwayat_penyakit') ?></td><td> <textarea class="form-control" rows="3" name="riwayat_penyakit" id="riwayat_penyakit" placeholder="Riwayat Penyakit"><?php echo $riwayat_penyakit; ?></textarea></td></tr>
	    
        <tr><td width='200'>Keluhan <?php echo form_error('keluhan') ?></td><td> <textarea class="form-control" rows="3" name="keluhan" id="keluhan" placeholder="Keluhan"><?php echo $keluhan; ?></textarea></td></tr>
	    <tr><td></td><td><input type="hidden" name="id_periksa" value="<?php echo $id_periksa; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('laporanrekainap') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>