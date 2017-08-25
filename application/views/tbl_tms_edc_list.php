
        <!-- Main content -->
        <section class='content'>
          <div class='row'>


          	 <div class='col-xs-12'>
              <div class='box'>
                
                  <h3 class='box-title'> <div class='col-xs-12'><b>DATA EDC BRI SAMRAT</b></div></h3>   

                   <div class='box-header' align="right">
                    <?php echo anchor('tms_edc/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
                    <?php echo anchor(site_url('tms_edc/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?>
                    <?php echo anchor(site_url('rekanan/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
                    <?php echo anchor(site_url('rekanan/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                   </div><!-- /.box-header -->

        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="10px">No</th>
		    <th>Sn Edc Lama</th>
		    <th width="10px">Merk Lama</th>
		    <th>Tid Lama</th>
		    <th>Tid Baru</th>
		    <th>Nama Agen Lama</th>
		    <th>Nama Agen Baru</th>
		    <th>Kode Uker Lama</th>
		    <th>Jenis Edc Lama</th>
		    <th>Keterangan</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($tms_edc_data as $tms_edc)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $tms_edc->sn_edc_lama ?></td>
		    <td><?php echo $tms_edc->merk_lama ?></td>
		    <td><?php echo $tms_edc->tid_lama ?></td>
		    <td><?php echo $tms_edc->tid_baru ?></td>
		    <td><?php echo $tms_edc->nama_agen_lama ?></td>
		    <td><?php echo $tms_edc->nama_agen_baru ?></td>
		    <td><?php echo $tms_edc->kode_uker_lama ?></td>
		    <td><?php echo $tms_edc->jenis_edc_lama ?></td>
		    <td><?php echo $tms_edc->keterangan ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('tms_edc/read/'.$tms_edc->id_tms),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('tms_edc/update/'.$tms_edc->id_tms),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
			echo '  '; 
			echo anchor(site_url('tms_edc/delete/'.$tms_edc->id_tms),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
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
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->