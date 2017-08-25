<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>TBL_MIKROTIK</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Unit Kerja <?php echo form_error('unit_kerja') ?></td>
            <td><input type="text" class="form-control" name="unit_kerja" id="unit_kerja" placeholder="Unit Kerja" value="<?php echo $unit_kerja; ?>" />
        </td>
	    <tr><td>Kategori <?php echo form_error('kategori') ?></td>
            <td><input type="text" class="form-control" name="kategori" id="kategori" placeholder="Kategori" value="<?php echo $kategori; ?>" />
        </td>
	    <tr><td>Tid <?php echo form_error('tid') ?></td>
            <td><input type="text" class="form-control" name="tid" id="tid" placeholder="Tid" value="<?php echo $tid; ?>" />
        </td>
	    <tr><td>Deskripsi <?php echo form_error('deskripsi') ?></td>
            <td><input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" value="<?php echo $deskripsi; ?>" />
        </td>
	    <tr><td>Ip Lan <?php echo form_error('ip_lan') ?></td>
            <td><input type="text" class="form-control" name="ip_lan" id="ip_lan" placeholder="Ip Lan" value="<?php echo $ip_lan; ?>" />
        </td>
	    <tr><td>Ip Pool <?php echo form_error('ip_pool') ?></td>
            <td><input type="text" class="form-control" name="ip_pool" id="ip_pool" placeholder="Ip Pool" value="<?php echo $ip_pool; ?>" />
        </td>
	    <tr><td>No Ccid <?php echo form_error('no_ccid') ?></td>
            <td><input type="text" class="form-control" name="no_ccid" id="no_ccid" placeholder="No Ccid" value="<?php echo $no_ccid; ?>" />
        </td>
	    <tr><td>Keterangan <?php echo form_error('keterangan') ?></td>
            <td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </td>
	    <input type="hidden" name="id_mikrotik" value="<?php echo $id_mikrotik; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mikrotik') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->