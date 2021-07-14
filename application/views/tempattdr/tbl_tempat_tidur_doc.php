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
        <h2>Tbl_tempat_tidur List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Ruang Rawat Inap</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($tempattdr_data as $tempattdr)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tempattdr->id_ruang_rawat_inap ?></td>
		      <td><?php echo $tempattdr->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>