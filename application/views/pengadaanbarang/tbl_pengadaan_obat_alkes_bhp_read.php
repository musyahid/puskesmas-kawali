<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Tbl_pengadaan_obat_alkes_bhp Read</h2>
        <table class="table">
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Id Supplier</td><td><?php echo $id_supplier; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pengadaanbarang') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>