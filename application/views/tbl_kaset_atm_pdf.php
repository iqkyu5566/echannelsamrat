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
        <h2>Tbl_kaset_atm List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Unit Kerja</th>
		<th>Tid Atm</th>
		<th>Merk Atm</th>
		<th>Jumlah</th>
		<th>Status</th>
		<th>Surat Pengantar</th>
		<th>Keterangan</th>
		
            </tr><?php
            foreach ($kaset_atm_data as $kaset_atm)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $kaset_atm->unit_kerja ?></td>
		      <td><?php echo $kaset_atm->tid_atm ?></td>
		      <td><?php echo $kaset_atm->merk_atm ?></td>
		      <td><?php echo $kaset_atm->jumlah ?></td>
		      <td><?php echo $kaset_atm->status ?></td>
		      <td><?php echo $kaset_atm->surat_pengantar ?></td>
		      <td><?php echo $kaset_atm->keterangan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>