<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA RUANG RAWAT INAP</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        


		<tr><td width='200'>Nama Ruangan <?php echo form_error('nama_ruangan') ?></td><td><input type="text" class="form-control" name="nama_ruangan" id="nama_ruangan" placeholder="Nama Ruangan" value="<?php echo $nama_ruangan; ?>" /></td></tr>


		 <tr><td>Kode Tempat Tidur</td><td><input placeholder="Kode Ruangan" class="form-control" type="text" name="id_ruang_rawat_inap" value="<?php echo $id_ruang_rawat_inap; ?>" /> </td></tr>

	    <tr><td width='200'>Gedung <?php echo form_error('id_gedung') ?></td><td>
	    	
	    	<?php echo cmb_dinamis('id_gedung', 'tbl_gedung', 'nama_gedung', 'id_gedung',$id_gedung)?>
	    </td></tr>
	    
	    <tr><td width='200'>Kelas <?php echo form_error('kelas') ?></td><td>

	    	 <?php echo form_dropdown('kelas',array('KELAS 1'=>'KELAS 1','KELAS 2'=>'KELAS 2','KELAS 3'=>'KELAS 3'),$kelas,array('class'=>'form-control'));?>
	    </td></tr>
	    <tr><td width='200'>Tarif <?php echo form_error('tarif') ?></td><td><input type="text" class="form-control" name="tarif" id="tarif" placeholder="Tarif" value="<?php echo $tarif; ?>" /></td></tr>
	    <tr><td width='200'>Status <?php echo form_error('status') ?></td><td><input type="text" readonly="" class="form-control" name="status" id="status" placeholder="Status" value="KOSONG" /></td></tr>


	    <tr><td></td><td>
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('ruanginap') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>