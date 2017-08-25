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
        <h2>Tbl_mikrotik List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Unit Kerja</th>
		<th>Kategori</th>
		<th>Tid</th>
		<th>Deskripsi</th>
		<th>Ip Lan</th>
		<th>Ip Pool</th>
		<th>No Ccid</th>
		<th>Keterangan</th>
		
            </tr><?php
            foreach ($mikrotik_data as $mikrotik)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $mikrotik->unit_kerja ?></td>
		      <td><?php echo $mikrotik->kategori ?></td>
		      <td><?php echo $mikrotik->tid ?></td>
		      <td><?php echo $mikrotik->deskripsi ?></td>
		      <td><?php echo $mikrotik->ip_lan ?></td>
		      <td><?php echo $mikrotik->ip_pool ?></td>
		      <td><?php echo $mikrotik->no_ccid ?></td>
		      <td><?php echo $mikrotik->keterangan ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>