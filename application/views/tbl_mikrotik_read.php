
        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                <h3 class='box-title'>Tbl_mikrotik Read</h3>
        <table class="table table-bordered">
	    <tr><td>Unit Kerja</td><td><?php echo $unit_kerja; ?></td></tr>
	    <tr><td>Kategori</td><td><?php echo $kategori; ?></td></tr>
	    <tr><td>Tid</td><td><?php echo $tid; ?></td></tr>
	    <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
	    <tr><td>Ip Lan</td><td><?php echo $ip_lan; ?></td></tr>
	    <tr><td>Ip Pool</td><td><?php echo $ip_pool; ?></td></tr>
	    <tr><td>No Ccid</td><td><?php echo $no_ccid; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $keterangan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('mikrotik') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->