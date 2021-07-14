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
        <h2>Tbl_jadwal_prakter_dokter List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode Dokter</th>
		<th>Hari</th>
		<th>Jam Mulai</th>
		<th>Ja Selesai</th>
		<th>Id Poliklinik</th>
		
            </tr><?php
            foreach ($praktekdokter_data as $praktekdokter)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $praktekdokter->kode_dokter ?></td>
		      <td><?php echo $praktekdokter->hari ?></td>
		      <td><?php echo $praktekdokter->jam_mulai ?></td>
		      <td><?php echo $praktekdokter->ja_selesai ?></td>
		      <td><?php echo $praktekdokter->id_poliklinik ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>