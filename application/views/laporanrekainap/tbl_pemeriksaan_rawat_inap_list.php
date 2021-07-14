<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">LAPORAN REKAMEDIS PASIEN RAWAT INAP</h3>
                    </div>
        
        <div class="box-body">
            <div class='row'>
            <div class='col-md-9'>
            <div style="padding-bottom: 10px;"'>
        </div>
            </div>
            <div class='col-md-3'>
            <form action="<?php echo site_url('laporanrekainap/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('laporanrekainap'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
            </div>
        
   
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
        <th>No Pemeriksa</th>
		<th>No Rawat</th>
		<th>No Reka</th>
		<th>Nama Pasien</th>
		<th>Tgl Daftar</th>
		<th>Tpt Tidur</th>
		<th>Obat</th>
		<th>Tindakan</th>
		<th>Pemeriksaan Labo</th>
		<th>Diagnosa Penyakit</th>
		<th>Hasil Pemerik Fisik</th>
		<th>Riwayat Penyakit</th>
		<th>Keluhan</th>
            </tr><?php
            foreach ($laporanrekainap_data as $laporanrekainap)
            {
                ?>
                <tr>
            <td><?php echo $laporanrekainap->id_periksa ?></td>
			<td><?php echo $laporanrekainap->no_rawat ?></td>
			<td><?php echo $laporanrekainap->no_rekamedis ?></td>
			<td><?php echo $laporanrekainap->nama_pasien ?></td>
			<td><?php echo $laporanrekainap->tanggal_daftar ?></td>
			<td><?php echo $laporanrekainap->id_tempat_tidur ?></td>
			<td><?php echo $laporanrekainap->id_obat ?></td>
			<td><?php echo $laporanrekainap->nama_tindakan ?></td>
			<td><?php echo $laporanrekainap->nama_periksa ?></td>
			<td><?php echo $laporanrekainap->nama_penyakit ?></td>
			<td><?php echo $laporanrekainap->Hasil_pemeriksaan_fisik ?></td>
			<td><?php echo $laporanrekainap->riwayat_penyakit ?></td>
			<td><?php echo $laporanrekainap->keluhan ?></td>
			
		</tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>