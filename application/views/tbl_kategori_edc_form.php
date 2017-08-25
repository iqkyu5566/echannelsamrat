<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>TBL_KATEGORI_EDC</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Nama Edc <?php echo form_error('nama_edc') ?></td>
            <td><input type="text" class="form-control" name="nama_edc" id="nama_edc" placeholder="Nama Edc" value="<?php echo $nama_edc; ?>" />
        </td>
	    <input type="hidden" name="id_kategori_edc" value="<?php echo $id_kategori_edc; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kategori_edc') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->