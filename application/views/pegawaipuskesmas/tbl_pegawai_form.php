<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA PEGAWAI</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nama Pegawai <?php echo form_error('nama_pegawai') ?></td><td><input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai" value="<?php echo $nama_pegawai; ?>" /></td></tr>

	    <tr><td width='200'>Jenis Kemalin <?php echo form_error('jenis_kemalin') ?></td><td>
	    	<?php echo form_dropdown('jenis_kemalin', array('L' => 'LAKI LAKI', 'P' => 'PEREMPUAN'), $jenis_kemalin, array('class' => 'form-control')); ?>
                            <!--<input type="text" class="form-control" name="jenis_kelamin" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?php echo $jenis_kelamin; ?>" />--></td></tr>

	    <tr><td width='200'>Npwp <?php echo form_error('npwp') ?></td><td><input type="text" class="form-control" name="npwp" id="npwp" placeholder="Npwp" value="<?php echo $npwp; ?>" /></td></tr>

	    


	    <tr><td width='200'>Jenjang Pendidikan <?php echo form_error('id_jenjang_pendidikan') ?></td><td>
                            <?php echo cmb_dinamis('id_jenjang_pendidikan', 'tbl_jenjang_pendidikan', 'nama_jenjang_pendidikan','id_jenjang_pendidikan', $id_jenjang_pendidikan)?>
                            <!--<input type="text" class="form-control" name="id_jenjang_pendidikan" id="id_jenjang_pendidikan" placeholder="Id Jenjang Pendidikan" value="<?php echo $id_jenjang_pendidikan; ?>" />--></td></tr>

	    <tr><td width='200'>Tempat Lahir <?php echo form_error('tempat_lahir') ?></td><td><input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" /></td></tr>

	    <tr><td width='200'>Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></td><td><input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" /></td></tr>

	    <tr><td width='200'>Jabatan <?php echo form_error('id_jabatan') ?></td><td>
	    	<?php echo cmb_dinamis('id_jabatan', 'tbl_jabatan', 'nama_jabatan','id_jabatan', $id_jabatan)?>
	    </td></tr>

	   

	    <tr><td width='200'>Departemen <?php echo form_error('id_departemen') ?></td><td>
	    	<?php echo cmb_dinamis('id_departemen', 'tbl_departemen', 'nama_departemen','id_departemen', $id_departemen)?>
	    </td></tr>

	    <tr><td width='200'>Bidang <?php echo form_error('id_bidang') ?></td><td>
	    	
	    	<?php echo cmb_dinamis('id_bidang', 'tbl_bidang', 'nama_bidang','id_bidang', $id_bidang)?>
	    </td></tr>


	    <tr><td width='200'>Is Aktif <?php echo form_error('is_aktif') ?></td><td><?php echo form_dropdown('is_aktif',array('AKTIF'=>'AKTIF','TIDAK AKTIF'=>'TIDAK AKTIF'),$is_aktif,array('class'=>'form-control'))?></td></tr>

	   

	    <tr><td></td><td><input type="hidden" name="nik" value="<?php echo $nik; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('pegawaipuskesmas') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>