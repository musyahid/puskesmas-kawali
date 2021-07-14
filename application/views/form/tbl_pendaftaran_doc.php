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
        <h2>Tbl_pendaftaran List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>No Registrasi</th>
		<th>No Rekamedis</th>
		<th>Cara Masuk</th>
		<th>Tanggal Daftar</th>
		<th>Kode Dokter Penanggung Jawab</th>
		<th>Id Poliklinik</th>
		<th>Nama Penanggung Jawab</th>
		<th>Hubungan Dengan Penanggung Jawab</th>
		<th>Alamat Penanggung Jawab</th>
		<th>Id Jenis Bayar</th>
		
		<th>No Hp Penanggung Jawab</th>
		
            </tr><?php
            foreach ($form_data as $form)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $form->no_registrasi ?></td>
		      <td><?php echo $form->no_rekamedis ?></td>
		      <td><?php echo $form->cara_masuk ?></td>
		      <td><?php echo $form->tanggal_daftar ?></td>
		      <td><?php echo $form->kode_dokter_penanggung_jawab ?></td>
		      <td><?php echo $form->id_poliklinik ?></td>
		      <td><?php echo $form->nama_penanggung_jawab ?></td>
		      <td><?php echo $form->hubungan_dengan_penanggung_jawab ?></td>
		      <td><?php echo $form->alamat_penanggung_jawab ?></td>
		      <td><?php echo $form->id_jenis_bayar ?></td>
		      
		      <td><?php echo $form->no_hp_penanggung_jawab ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>