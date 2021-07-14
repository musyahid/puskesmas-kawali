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
        <h2 style="margin-top:0px">Tbl_pemeriksaan_rawat_inap Read</h2>
        <table class="table">
	    <tr><td>No Rawat</td><td><?php echo $no_rawat; ?></td></tr>
	    <tr><td>No Rekamedis</td><td><?php echo $no_rekamedis; ?></td></tr>
	    <tr><td>Nama Pasien</td><td><?php echo $nama_pasien; ?></td></tr>
	    <tr><td>Tanggal Daftar</td><td><?php echo $tanggal_daftar; ?></td></tr>
	    <tr><td>Id Tempat Tidur</td><td><?php echo $id_tempat_tidur; ?></td></tr>
	    <tr><td>Id Obat</td><td><?php echo $id_obat; ?></td></tr>
	    <tr><td>Id Tindakan</td><td><?php echo $id_tindakan; ?></td></tr>
	    <tr><td>Id Pemeriksaan Laboratorium</td><td><?php echo $id_pemeriksaan_laboratorium; ?></td></tr>
	    <tr><td>Id Diagnosa Penyakit</td><td><?php echo $id_diagnosa_penyakit; ?></td></tr>
	    <tr><td>Hasil Pemeriksaan Fisik</td><td><?php echo $Hasil_pemeriksaan_fisik; ?></td></tr>
	    <tr><td>Riwayat Penyakit</td><td><?php echo $riwayat_penyakit; ?></td></tr>
	    <tr><td>Keluhan</td><td><?php echo $keluhan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('laporanrekainap') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>