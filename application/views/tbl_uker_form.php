<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>TBL_UKER</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Kode Branch <?php echo form_error('kode_branch') ?></td>
            <td><input type="text" class="form-control" name="kode_branch" id="kode_branch" placeholder="Kode Branch" value="<?php echo $kode_branch; ?>" />
        </td>
	    <tr><td>Nama Uker <?php echo form_error('nama_uker') ?></td>
            <td><input type="text" class="form-control" name="nama_uker" id="nama_uker" placeholder="Nama Uker" value="<?php echo $nama_uker; ?>" />
        </td>
	    <tr><td>Alamat Uker <?php echo form_error('alamat_uker') ?></td>
            <td><input type="text" class="form-control" name="alamat_uker" id="alamat_uker" placeholder="Alamat Uker" value="<?php echo $alamat_uker; ?>" />
        </td>
	    <input type="hidden" name="id_uker" value="<?php echo $id_uker; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('uker') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->