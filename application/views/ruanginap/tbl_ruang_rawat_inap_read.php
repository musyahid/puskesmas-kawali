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
        <h2 style="margin-top:0px">Tbl_ruang_rawat_inap Read</h2>
        <table class="table">
	    <tr><td>Id Gedung</td><td><?php echo $id_gedung; ?></td></tr>
	    <tr><td>Nama Ruangan</td><td><?php echo $nama_ruangan; ?></td></tr>
	    <tr><td>Kelas</td><td><?php echo $kelas; ?></td></tr>
	    <tr><td>Tarif</td><td><?php echo $tarif; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('ruanginap') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>