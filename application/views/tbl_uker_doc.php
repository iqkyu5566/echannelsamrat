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
        <h2>Tbl_uker List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kode Branch</th>
		<th>Nama Uker</th>
		<th>Alamat Uker</th>
		
            </tr><?php
            foreach ($uker_data as $uker)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $uker->kode_branch ?></td>
		      <td><?php echo $uker->nama_uker ?></td>
		      <td><?php echo $uker->alamat_uker ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>