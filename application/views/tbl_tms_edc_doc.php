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
        <h2>Tbl_tms_edc List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Tms</th>
		<th>Sn Edc Lama</th>
		<th>Sn Edc Baru</th>
		<th>Merk Lama</th>
		<th>Merk Baru</th>
		<th>Spk Edc Lama</th>
		<th>Spk Edc Baru</th>
		<th>No Simcard Lama</th>
		<th>No Simcard Baru</th>
		<th>Sn Simcard Lama</th>
		<th>Sn Simcard Baru</th>
		<th>Sn Clr Lama</th>
		<th>Sn Clr Baru</th>
		<th>Sam Brizzi Lama</th>
		<th>Sam Brizzi Baru</th>
		<th>Tid Lama</th>
		<th>Tid Baru</th>
		<th>Mid Lama</th>
		<th>Mid Baru</th>
		<th>Nama Agen Lama</th>
		<th>Nama Agen Baru</th>
		<th>Alamat Agen Lama</th>
		<th>Alamat Agen Baru</th>
		<th>Cabang Lama</th>
		<th>Cabang Baru</th>
		<th>Branch Lama</th>
		<th>Branch Baru</th>
		<th>Kode Uker Lama</th>
		<th>Kode Uker Baru</th>
		<th>Norek Lama</th>
		<th>Norek Baru</th>
		
            </tr><?php
            foreach ($tms_edc_data as $tms_edc)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $tms_edc->id_tms ?></td>
		      <td><?php echo $tms_edc->sn_edc_lama ?></td>
		      <td><?php echo $tms_edc->sn_edc_baru ?></td>
		      <td><?php echo $tms_edc->merk_lama ?></td>
		      <td><?php echo $tms_edc->merk_baru ?></td>
		      <td><?php echo $tms_edc->spk_edc_lama ?></td>
		      <td><?php echo $tms_edc->spk_edc_baru ?></td>
		      <td><?php echo $tms_edc->no_simcard_lama ?></td>
		      <td><?php echo $tms_edc->no_simcard_baru ?></td>
		      <td><?php echo $tms_edc->sn_simcard_lama ?></td>
		      <td><?php echo $tms_edc->sn_simcard_baru ?></td>
		      <td><?php echo $tms_edc->sn_clr_lama ?></td>
		      <td><?php echo $tms_edc->sn_clr_baru ?></td>
		      <td><?php echo $tms_edc->sam_brizzi_lama ?></td>
		      <td><?php echo $tms_edc->sam_brizzi_baru ?></td>
		      <td><?php echo $tms_edc->tid_lama ?></td>
		      <td><?php echo $tms_edc->tid_baru ?></td>
		      <td><?php echo $tms_edc->mid_lama ?></td>
		      <td><?php echo $tms_edc->mid_baru ?></td>
		      <td><?php echo $tms_edc->nama_agen_lama ?></td>
		      <td><?php echo $tms_edc->nama_agen_baru ?></td>
		      <td><?php echo $tms_edc->alamat_agen_lama ?></td>
		      <td><?php echo $tms_edc->alamat_agen_baru ?></td>
		      <td><?php echo $tms_edc->cabang_lama ?></td>
		      <td><?php echo $tms_edc->cabang_baru ?></td>
		      <td><?php echo $tms_edc->branch_lama ?></td>
		      <td><?php echo $tms_edc->branch_baru ?></td>
		      <td><?php echo $tms_edc->kode_uker_lama ?></td>
		      <td><?php echo $tms_edc->kode_uker_baru ?></td>
		      <td><?php echo $tms_edc->norek_lama ?></td>
		      <td><?php echo $tms_edc->norek_baru ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>