<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA TBL PASIEN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'  
		

		<tr><td width='200'>Nomor Rekamedis <?php echo form_error('no_rekamedis') ?></td><td><input type="text" id="no_rekamedis"  placeholder="Nomor Rekamedis" class="form-control" name="no_rekamedis" value="<?php echo $no_rekamedis; ?>" /> </td></tr>

	    <tr><td width='200'>Nama Pasien <?php echo form_error('nama_pasien') ?></td><td><input type="text" class="form-control" name="nama_pasien" id="nama_pasien" placeholder="Nama Pasien" value="<?php echo $nama_pasien; ?>" /></td></tr>

	    <tr><td width='200'>Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></td><td><?php echo form_dropdown('jenis_kelamin', array('L' => 'LAKI LAKI', 'P' => 'PEREMPUAN'), $jenis_kelamin, array('class' => 'form-control')); ?></td></tr>

	  
	    <tr><td width='200'>Golongan Darah <?php echo form_error('golongan_darah') ?></td><td><?php echo form_dropdown('golongan_darah', array('A' => 'A', 'B' => 'B','O'=>'O','AB'=>'AB'), $golongan_darah, array('class' => 'form-control')); ?></td></tr>


	    <tr><td width='200'>Tempat Lahir <?php echo form_error('tempat_lahir') ?></td><td><input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" /></td></tr>
	    
	    <tr><td width='200'>Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></td><td><input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" /></td></tr>
	    
	    <tr><td width='200'>Nama Ibu <?php echo form_error('nama_ibu') ?></td><td><input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu" value="<?php echo $nama_ibu; ?>" /></td></tr>
	    
        <tr><td width='200'>Alamat <?php echo form_error('alamat') ?></td><td> <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea></td></tr>
	   
	    <tr><td width='200'>Agama <?php echo form_error('agama') ?></td><td><?php echo form_dropdown('agama', array('ISLAM' => 'ISLAM', 'KRISTEN' => 'KRISTEN','KATOLIK'=>'KATOLIK','BUDHA'=>'BUDHA','HINDU'=>'HINDU'), $agama, array('class' => 'form-control')); ?></td></tr>


	    <tr><td width='200'>Status Menikah <?php echo form_error('status_menikah') ?></td><td><?php echo form_dropdown('status_menikah', array('BELUM MENIKAH' => 'BELUM MENIKAH', 'SUDAH MENIKAH' => 'SUDAH MENIKAH'), $status_menikah, array('class' => 'form-control')); ?></td></tr>
	    
	    <tr><td width='200'>No Hp <?php echo form_error('no_hp') ?></td><td><input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" /></td></tr>
	    
	    <tr><td width='200'>Pekerjaan <?php echo form_error('pekerjaan') ?></td><td><?php echo form_dropdown('pekerjaan', array('BELUM BEKERJA' => 'BELUM BEKERJA', 'SUDAH BEKERJA' => 'SUDAH BEKERJA'), $pekerjaan, array('class' => 'form-control')); ?></td></tr>



	    
	    
	    <tr><td> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('pasienpuskesmas') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>