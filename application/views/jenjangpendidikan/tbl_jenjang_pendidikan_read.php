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
        <h2 style="margin-top:0px">Tbl_jenjang_pendidikan Read</h2>
        <table class="table">
	    <tr><td>Nama Jenjang Pendidikan</td><td><?php echo $nama_jenjang_pendidikan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('jenjangpendidikan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>