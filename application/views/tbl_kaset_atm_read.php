
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Tbl_kaset_atm Read</h3>
        <table class="table table-bordered">
	    <tr><td>Unit Kerja</td><td><?php echo $unit_kerja; ?></td></tr>
	    <tr><td>Tid Atm</td><td><?php echo $tid_atm; ?></td></tr>
	    <tr><td>Merk Atm</td><td><?php echo $merk_atm; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Surat Pengantar</td><td><?php echo $surat_pengantar; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('kaset_atm') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->