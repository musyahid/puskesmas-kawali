<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tbl_pemeriksa List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Rawat</th>
		<th>No Rekamedis</th>
		<th>Tanggal Daftar</th>
		<th>Id Tindakan</th>
		<th>Id Pemeriksaan Laboratorium</th>
		<th>Id Diagnosa Penyakit</th>
		<th>Keluhan</th>
		
            </tr><?php
            foreach ($periksa_data as $periksa)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $periksa->no_rawat ?></td>
		      <td><?php echo $periksa->no_rekamedis ?></td>
		      <td><?php echo $periksa->tanggal_daftar ?></td>
		      <td><?php echo $periksa->id_tindakan ?></td>
		      <td><?php echo $periksa->id_pemeriksaan_laboratorium ?></td>
		      <td><?php echo $periksa->id_diagnosa_penyakit ?></td>
		      <td><?php echo $periksa->keluhan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>