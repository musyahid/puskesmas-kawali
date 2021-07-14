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
        <h2>Tbl_pegawai List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Pegawai</th>
		<th>Jenis Kemalin</th>
		<th>Npwp</th>
		<th>Id Jenjang Pendidikan</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Id Jabatan</th>
		<th>Id Departemen</th>
		<th>Id Bidang</th>
		<th>Is Aktif</th>
		
            </tr><?php
            foreach ($pegawaipuskesmas_data as $pegawaipuskesmas)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pegawaipuskesmas->nama_pegawai ?></td>
		      <td><?php echo $pegawaipuskesmas->jenis_kemalin ?></td>
		      <td><?php echo $pegawaipuskesmas->npwp ?></td>
		      <td><?php echo $pegawaipuskesmas->id_jenjang_pendidikan ?></td>
		      <td><?php echo $pegawaipuskesmas->tempat_lahir ?></td>
		      <td><?php echo $pegawaipuskesmas->tanggal_lahir ?></td>
		      <td><?php echo $pegawaipuskesmas->id_jabatan ?></td>
		      <td><?php echo $pegawaipuskesmas->id_departemen ?></td>
		      <td><?php echo $pegawaipuskesmas->id_bidang ?></td>
		      <td><?php echo $pegawaipuskesmas->is_aktif ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>