<div class="content-wrapper">
    
    <section class="content">
    	<div class="col-md-6">
    		<div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">DATA PENDAFTARAN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    
	    <tr><td width='200'>No Registrasi <?php echo form_error('no_registrasi') ?></td><td><input type="text" readonly="" class="form-control" name="no_registrasi"  id="no_registrasi" placeholder="No Registrasi" value="<?php echo noRegistrasiOtomatis(); ?>" /></td></tr>

	    <tr><td width='200'>No Rawat <?php echo form_error('no_rawat') ?></td><td><input type="text" readonly="" class="form-control" name="no_rawat" id="no_rawat" placeholder="No Rawat" value="<?php echo date('Y/m/d/').noRegistrasiOtomatis(); ?>" /></td></tr>

	    <tr><td width='200'>Cara Masuk <?php echo form_error('cara_masuk') ?></td><td>

	    	<?php echo form_dropdown('cara_masuk',array('RAWAT JALAN'=>'RAWAT JALAN','RAWAT INAP'=>'RAWAT INAP'),$cara_masuk,array('class'=>'form-control'));?></td></tr>


	    <tr><td>Kode Tempat Tidur</td><td>
	    	

	    	<input type="text" name="id_ruang_rawat_inap" placeholder="Masukkan Kode Tempat Tidur" class="form-control">
	    </td>
	</tr>

	<tr><td></td><td>
		
		<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#id_ruang_rawat_inap">
  Lihat Ketersediaan Ruang Rawat Inap
</button>


	</td></tr>
	    

	
	    
	    <tr><td width='200'>Tanggal Daftar <?php echo form_error('tanggal_daftar') ?></td><td><input type="date" class="form-control" name="tanggal_daftar" id="tanggal_daftar" placeholder="Tanggal Daftar" value="<?php echo date('Y-m-d'); ?>" /></td></tr>


		<tr><td width='200'>Kode Dokter Penanggung Jawab <?php echo form_error('kode_dokter_penanggung_jawab') ?></td><td>

		<?php echo cmb_dinamis('kode_dokter_penanggung_jawab','tbl_dokter','nama_dokter', 'kode_dokter', $kode_dokter_penanggung_jawab);?>

	    <tr><td width='200'>Poliklinik <?php echo form_error('id_poliklinik') ?></td><td>

	    	<?php echo cmb_dinamis('id_poliklinik','tbl_poliklinik','nama_poliklinik','id_poliklinik',$id_poliklinik);?>

	    <tr><td width='200'>Jenis Bayar <?php echo form_error('id_jenis_bayar') ?></td><td>
	    	

	    	<?php echo cmb_dinamis('id_jenis_bayar','tbl_jenis_bayar','jenis_bayar','id_jenis_bayar',$id_jenis_bayar);?>

	    </td></tr>

	   
	    <tr><td></td><td> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('form') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table>       </div>
    	</div>
    	<div class="col-md-6">
    		<div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">DATA PASIEN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>No Rekamedis <?php echo form_error('no_rekamedis') ?></td><td><input type="text" class="form-control" name="no_rekamedis"  onkeyup="autocomplate_norekamedis()" id="no_rekamedis" placeholder="No Rekamedis" value="<?php echo $no_rekamedis; ?>" /></td></tr>
		<tr><td></td><td>
		
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalDataPasien">
		Lihat Data Pasien
		</button>
			</td></tr>
		

	    <tr><td>Nama Pasien</td><td>
	    	
	    	<input type="text" name="nama_pasien" id="nama_pasien" class="form-control" placeholder="Nama Pasien">

	    </td></tr>

	    <tr><td>Tanggal Lahir</td><td>
	    	
	    	<input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir">

	    </td></tr>
	    
	    
	    <tr><td width='200'>Nama Penanggung Jawab <?php echo form_error('nama_penanggung_jawab') ?></td><td><input type="text" class="form-control" name="nama_penanggung_jawab" id="nama_penanggung_jawab" placeholder="Nama Penanggung Jawab" value="<?php echo $nama_penanggung_jawab; ?>" /></td></tr>

	    <tr><td width='200'>Hubungan Dengan Penanggung Jawab <?php echo form_error('hubungan_dengan_penanggung_jawab') ?></td><td>
	    	
	    		<?php echo form_dropdown('hubungan_dengan_penanggung_jawab',array('ORANG TUA'=>'ORANG TUA','ANAK KANDUNG'=>'ANAK KANDUNG','SUAMI'=>'SUAMI','ISTRI'=>'ISTRI','SAUDARA'=>'SAUDARA','SAUDARA KANDUNG'=>'SAUDARA KANDUNG'),$hubungan_dengan_penanggung_jawab,array('class'=>'form-control'));?>


	    </td></tr>
	    
        <tr><td width='200'>No Hp Penanggung Jawab <?php echo form_error('no_hp_penanggung_jawab') ?></td><td><input type="text" class="form-control" name="no_hp_penanggung_jawab" id="no_hp_penanggung_jawab" placeholder="No Hp Penanggung Jawab" value="<?php echo $no_hp_penanggung_jawab; ?>" /></td></tr>

        <tr><td width='200'>Alamat Penanggung Jawab <?php echo form_error('alamat_penanggung_jawab') ?></td><td> <textarea class="form-control" rows="3" name="alamat_penanggung_jawab" id="alamat_penanggung_jawab" placeholder="Alamat Penanggung Jawab"><?php echo $alamat_penanggung_jawab; ?></textarea></td></tr>
	    
	    
	    <tr><td></td><td>
	    </td></tr>
	</table></form>        </div>
    	</div>
</div>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>

<script type="text/javascript">
    $(function() {
        //autocomplete
        $("#kode_dokter_penanggung_jawab").autocomplete({
            source: "<?php echo base_url()?>index.php/form/autocomplate_dokter",
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
			console.log(obj)
            $('#nama_pasien').val(obj.nama_pasien);
            $('#tanggal_lahir').val(obj.tanggal_lahir);
           
        });


	}
	</script>


	<script type="text/javascript">
    $(function() {
        //autocomplete
        $("#id_ruang_rawat_inap").autocomplete({
            source: "<?php echo base_url()?>index.php/form/autocomplate_ruang_rawat_inap",
            minLength: 1
        });				
    });
</script>

<div class="modal fade" id="id_ruang_rawat_inap">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Tampil Data</h4>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-bordered table-striped" id="table">
					<thead>
						<tr>
							 <td>Nama Ruangan</td>
            				 <td>Kode Tempat Tidur</td>
		    				 <td>Gedung</td>
		                     <td>Kelas</td>
		                     <td>Tarif</td>
		                     <td>Status</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data_rawat_inap as $datainap){?>
							<tr>
							<td><?php echo $datainap->nama_ruangan?></td>
							<td><?php echo $datainap->id_ruang_rawat_inap?></td>
							<td><?php echo $datainap->nama_gedung?></td>
							<td><?php echo $datainap->kelas?></td>
							<td><?php echo $datainap->tarif?></td>
							<td><?php echo $datainap->status?></td>
						</tr>

						<?php }?>
						
					</tbody>
					
				</table>


				<div class="modal-footer">
       			 <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
       
      			</div>
			</div>
		</div>
	</div>
	
</div>

<div class="modal fade" id="modalDataPasien">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Tampil Data</h4>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-bordered table-striped" id="table">
					<thead>
						<tr>
							 <td>Nomor Rekamedis</td>
            				 <td>Nama Pasien</td>
		    				 <td>Jenis Kelamin</td>
		                     <td>Golongan Darah</td>
		                     <td>Tempat Lahir</td>
		                     <td>Tanggal Lahir</td>
		                     <td>Nomor HP</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data_pasien as $data){?>
							<tr>
							<td><?php echo $data->no_rekamedis?></td>
							<td><?php echo $data->nama_pasien?></td>
							<td><?php echo $data->jenis_kelamin?></td>
							<td><?php echo $data->golongan_darah?></td>
							<td><?php echo $data->tempat_lahir?></td>
							<td><?php echo $data->tanggal_lahir?></td>
							<td><?php echo $data->no_hp?></td>
						</tr>

						<?php }?>
						
					</tbody>
					
				</table>


				<div class="modal-footer">
       			 <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
       
      			</div>
			</div>
		</div>
	</div>
	
</div>



    
