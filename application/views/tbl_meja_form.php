<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>TBL_MEJA</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Nama Meja <?php echo form_error('nama_meja') ?></td>
            <td><input type="text" class="form-control" name="nama_meja" id="nama_meja" placeholder="Nama Meja" value="<?php echo $nama_meja; ?>" />
        </td>
	    <tr><td>Lokasi Meja <?php echo form_error('lokasi_meja') ?></td>
            <td><input type="text" class="form-control" name="lokasi_meja" id="lokasi_meja" placeholder="Lokasi Meja" value="<?php echo $lokasi_meja; ?>" />
        </td>
	    <input type="hidden" name="id_meja" value="<?php echo $id_meja; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('meja') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->