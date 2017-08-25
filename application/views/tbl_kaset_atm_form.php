<!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
                <div class='box-header'>
                
                  <h3 class='box-title'>TBL_KASET_ATM</h3>
                      <div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Unit Kerja <?php echo form_error('unit_kerja') ?></td>
            <td><input type="text" class="form-control" name="unit_kerja" id="unit_kerja" placeholder="Unit Kerja" value="<?php echo $unit_kerja; ?>" />
        </td>
	    <tr><td>Tid Atm <?php echo form_error('tid_atm') ?></td>
            <td><input type="text" class="form-control" name="tid_atm" id="tid_atm" placeholder="Tid Atm" value="<?php echo $tid_atm; ?>" />
        </td>
	    <tr><td>Merk Atm <?php echo form_error('merk_atm') ?></td>
            <td><input type="text" class="form-control" name="merk_atm" id="merk_atm" placeholder="Merk Atm" value="<?php echo $merk_atm; ?>" />
        </td>
	    <tr><td>Jumlah <?php echo form_error('jumlah') ?></td>
            <td><input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
        </td>
	    <tr><td>Status <?php echo form_error('status') ?></td>
            <td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </td>
	    <tr><td>Surat Pengantar <?php echo form_error('surat_pengantar') ?></td>
            <td><input type="text" class="form-control" name="surat_pengantar" id="surat_pengantar" placeholder="Surat Pengantar" value="<?php echo $surat_pengantar; ?>" />
        </td>
	    <tr><td>Keterangan <?php echo form_error('keterangan') ?></td>
            <td><input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
        </td>
	    <input type="hidden" name="id_kaset_atm" value="<?php echo $id_kaset_atm; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('kaset_atm') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->