
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                  <h3 class='box-title'><b>REPORT LAPORAN TRANSAKSI</b></h3>
                
                <div class='box-header'>

		<?php echo anchor(site_url('hasil_transaksi/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?php echo anchor(site_url('hasil_transaksi/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		
                </div><!-- /.box-header -->
              

      

  <div class="pull-left">
    <h4 class="heading"><?php
      echo form_open('','method="get"');
      // $default = ($this->input->get('per')) ? $this->input->get('per') : mdate('%Y-%m',now());
      echo 'Nama Rekanan : '.form_dropdown('jenis', array(''=>'-- Semua --','Pokok'=>'Pokok','Wajib'=>'Wajib','Sukarela'=>'Sukarela','Bunga'=>'Bunga Simpanan' ), $this->input->get('jenis'), 'onChange="this.form.submit()"');
        echo '   '.form_submit('export','Download', 'class="btn btn-warning"');
        echo form_close();
      // echo form_close();
      ?>
    </h4>
  </div>
    

<div class='box-body'>
        <table class="table table-bordered table-striped" >
            <thead>
                <tr class="success">
                    <th width="5px">No</th>
		        <th>Nama Rekanan</th>
		        <th>Tanggal</th>
		        <th>Deskripsi</th>
            <th>Retasi</th>
            <th>Tonase</th>
            <th>Kubikasi</th>
		        <th>Harga Dasar</th>
            <th>Debet</th>
            <th>Kredit</th>
            <th>Total</th>
            <th>Keterangan</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $total_retasi = 0;
            $total_tonase = 0;
            $total_kubikasi = 0;
            $total_harga_dasar = 0;
            $total_debet = 0;
            $total_kredit = 0;
            $total_all = 0;
            $start = 0;
            foreach ($report_transaksi_data as $report_transaksi)
            {
                ?>
            <tr>
        		    <td><?php echo ++$start ?></td>
                <td><?php echo $report_transaksi->nama_rekanan ?></td>
                <td><?php echo $report_transaksi->tanggal ?></td>
                <td><?php echo $report_transaksi->deskripsi ?></td>
                <td><?php echo $report_transaksi->retasi ?></td>
                <td><?php echo $report_transaksi->tonase ?></td>
                <td><?php echo $report_transaksi->kubikasi ?></td>
                <td><?php echo rupiah($report_transaksi->harga_dasar, $pecahan=0) ?></td>
                <td><?php echo rupiah($report_transaksi->debet, $pecahan=0) ?></td>
                <td><?php echo rupiah($report_transaksi->kredit, $pecahan=0) ?></td>
                <td><?php echo rupiah($total_rinci = ($report_transaksi->kredit - $report_transaksi->debet), $pecahan=0) ?></td>
                <td hidden="0"><?php echo rupiah( $total_retasi = $total_retasi +$report_transaksi->retasi, $pecahan = 0) ?></td>
                <td hidden="0"><?php echo rupiah( $total_tonase = $total_tonase +$report_transaksi->tonase, $pecahan = 0) ?></td>
                <td hidden="0"><?php echo rupiah( $total_kubikasi = $total_kubikasi +$report_transaksi->kubikasi, $pecahan = 0) ?></td>
                <td hidden="0"><?php echo rupiah( $total_harga_dasar = $total_harga_dasar +$report_transaksi->harga_dasar, $pecahan = 0) ?></td>
                <td hidden="0"><?php echo rupiah( $total_debet = $total_debet +$report_transaksi->debet, $pecahan = 0) ?></td>
                <td hidden="0"><?php echo rupiah( $total_kredit = $total_kredit +$report_transaksi->kredit, $pecahan = 0) ?></td>
                <td hidden="0"><?php echo rupiah( $total_all = $total_all +$total_rinci, $pecahan = 0) ?></td>

                <td><?php echo $report_transaksi->keterangan ?></td>
	        </tr>
                <?php
            }
            ?>

             <tr>
             <td colspan="4" align="center"><b>Total</b></td>
             <td><b><?php echo  rupiah($total_retasi, $pecahan = 0); ?></b></td>
             <td><b><?php echo  rupiah($total_tonase, $pecahan = 0); ?></b></td>
             <td><b><?php echo  rupiah($total_kubikasi, $pecahan = 0); ?></b></td>
             <td><b><?php echo  rupiah($total_harga_dasar, $pecahan = 0); ?></b></td>
             <td><b><?php echo  rupiah($total_debet, $pecahan = 0); ?></b></td>
             <td><b><?php echo  rupiah($total_kredit, $pecahan = 0); ?></b></td>
             <td><b><?php echo  rupiah($total_all, $pecahan = 0); ?></b></td>
             <td><b><?php echo  $report_transaksi->keterangan ?></b></td>
             </tr>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
</div><!-- /.box-body -->
 </div><!-- /.col -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->