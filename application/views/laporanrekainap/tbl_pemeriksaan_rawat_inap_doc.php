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
        <h2>Tbl_pemeriksaan_rawat_inap List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Rawat</th>
		<th>No Rekamedis</th>
		<th>Nama Pasien</th>
		<th>Tanggal Daftar</th>
		<th>Id Tempat Tidur</th>
		<th>Id Obat</th>
		<th>Id Tindakan</th>
		<th>Id Pemeriksaan Laboratorium</th>
		<th>Id Diagnosa Penyakit</th>
		<th>Hasil Pemeriksaan Fisik</th>
		<th>Riwayat Penyakit</th>
		<th>Keluhan</th>
		
            </tr><?php
            foreach ($laporanrekainap_data as $laporanrekainap)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $laporanrekainap->no_rawat ?></td>
		      <td><?php echo $laporanrekainap->no_rekamedis ?></td>
		      <td><?php echo $laporanrekainap->nama_pasien ?></td>
		      <td><?php echo $laporanrekainap->tanggal_daftar ?></td>
		      <td><?php echo $laporanrekainap->id_tempat_tidur ?></td>
		      <td><?php echo $laporanrekainap->id_obat ?></td>
		      <td><?php echo $laporanrekainap->id_tindakan ?></td>
		      <td><?php echo $laporanrekainap->id_pemeriksaan_laboratorium ?></td>
		      <td><?php echo $laporanrekainap->id_diagnosa_penyakit ?></td>
		      <td><?php echo $laporanrekainap->Hasil_pemeriksaan_fisik ?></td>
		      <td><?php echo $laporanrekainap->riwayat_penyakit ?></td>
		      <td><?php echo $laporanrekainap->keluhan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>