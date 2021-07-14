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
        <h2>Tbl_pasien List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Pasien</th>
		<th>Jenis Kelamin</th>
		<th>Golongan Darah</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Nama Ibu</th>
		<th>Alamat</th>
		<th>Agama</th>
		<th>Status Menikah</th>
		<th>No Hp</th>
		<th>Pekerjaan</th>
		
            </tr><?php
            foreach ($pasienpuskesmas_data as $pasienpuskesmas)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pasienpuskesmas->nama_pasien ?></td>
		      <td><?php echo $pasienpuskesmas->jenis_kelamin ?></td>
		      <td><?php echo $pasienpuskesmas->golongan_darah ?></td>
		      <td><?php echo $pasienpuskesmas->tempat_lahir ?></td>
		      <td><?php echo $pasienpuskesmas->tanggal_lahir ?></td>
		      <td><?php echo $pasienpuskesmas->nama_ibu ?></td>
		      <td><?php echo $pasienpuskesmas->alamat ?></td>
		      <td><?php echo $pasienpuskesmas->agama ?></td>
		      <td><?php echo $pasienpuskesmas->status_menikah ?></td>
		      <td><?php echo $pasienpuskesmas->no_hp ?></td>
		      <td><?php echo $pasienpuskesmas->pekerjaan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>