<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">FORM PENGADAAN OBAT ALKES BHP</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        


		<tr><td>Nomor Faktur</td><td>
			
			<input  type="text" name="id_pengadaan_obat_alkes_bhp" placeholder="Masukkan Nomor Faktur" class="form-control" id="id_pengadaan_obat_alkes_bhp" value="<?php echo $id_pengadaan_obat_alkes_bhp; ?>" /> 
		</td></tr>
	    <tr><td width='200'>Tanggal <?php echo form_error('tanggal') ?></td><td><input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td></tr>

	    <tr><td width='200'>Id Supplier <?php echo form_error('id_supplier') ?></td><td><input type="text" class="form-control" name="id_supplier" id="id_supplier" placeholder="Id Supplier" value="<?php echo $id_supplier; ?>" /></td></tr>

	    <tr><td>Cari Barang</td>
	    	<td>
	    		<div class="row">
	    		<div class="col-xs-7">
	    		<input type="text" id="barang" placeholder="Masukkan Nama Barang" class="form-control">
	    	</div>
	    		<div class="col-xs-2"><input type="text" id="harga" placeholder="Harga" class="form-control"></div>
	    		<div class="col-xs-1"><input type="text" id="qyt" placeholder="Qty" class="form-control"></div>
	    	</div>
	    	</td>

	    </tr>

	    <tr><td></td><td> 
	    <button  type="button" class="btn btn-danger" onclick="add ()">Add Barang</button>
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('pengadaanbarang') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>

	<div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">FORM PENGADAAN OBAT ALKES BHP</h3>
            </div>
	<table class="table table-bordered">
		
		<tr><th>NO</th>
			<th>Nama Barang</th>
			<th>QTY</th>
			<th>Harga Beli</th>
		</tr>

	</table>
</div>


</div>
</div>


<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>

<script type="text/javascript">
    $(function() {
        //autocomplete
        $("#barang").autocomplete({
            source: "<?php echo base_url()?>/index.php/pengadaanbarang/autocomplate",
            minLength: 1
        });				
    });
</script>
<script type="text/javascript">
	function add(){
        var barang = $("#barang").val();
        var harga = $("#harga").val();
        var qyt = $("#qyt").val();
      	var id_pengadaan_obat_alkes_bhp = $("#id_pengadaan_obat_alkes_bhp").val();


        $.ajax({
            url:"<?php echo base_url() ?>index.php/pengadaanbarang/add_ajax",
            data:"barang=" + barang + "&qyt="+ qty+"&harga=" + harga + "&id_pengadaan_obat_alkes_bhp="+ id_pengadaan_obat_alkes_bhp ,
            success: function(html)
            {
            	alert('berhasil');
               // load();
            }
        });
       
    
    }
    
    


</script>