<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- Save -->
    <div class="col-sm-4">
      <div class="card">
        <div class="card-header bg-dark">
          <h3 class="card-title"><i class="fa fa-plus"></i> <?php echo $subtitle; ?></h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
            <!-- ?php echo site_url('admin/gallery/create') ?> -->
              <form role="form" action="" method="post" id="save_type_form" enctype="multipart/form-data">

                <div class="row">

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="assessmentmode"><?php echo ('Assessment Mode'); ?></label> <small class="req"> *</small>
                      <input name="assessmentmode" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Assessment Mode') ?>" id="assessmentmode" value="" data-toggle="tooltip" title="<?php echo ('Assessment Mode'); ?>">
                      <?php echo form_error('gal_img_caption', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="agencyid"><?php echo ('Agency ID'); ?></label> <small class="req"> *</small>
                      <input name="agencyid" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Agency ID') ?>" id="agencyid" value="" data-toggle="tooltip" title="<?php echo ('Agency ID'); ?>">
                      <?php echo form_error('agencyid', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>


                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="agencyaame"><?php echo ('Agency Name'); ?></label> <small class="req"> *</small>
                      <input name="agencyaame" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Agency Name') ?>" id="agencyaame" value="" data-toggle="tooltip" title="Agency Name">
                      <?php echo form_error('agencyaame', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="assessorid"><?php echo ('Assessor ID'); ?></label> <small class="req"> *</small>
                      <input name="assessorid" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Assessor ID') ?>" id="assessorid" value="" data-toggle="tooltip" title="<?php echo ('Assessor ID'); ?>">
                      <?php echo form_error('assessorid', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="assessor"><?php echo ('Assessor'); ?></label> <small class="req"> *</small>
                      <input name="assessor" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Assessor') ?>" id="assessor" value="" data-toggle="tooltip" title="<?php echo ('Assessor'); ?>">
                      <?php echo form_error('assessor', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>


                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="fromdate"><?php echo ('From Date'); ?></label> <small class="req"> *</small>
                      <input name="fromdate" class="form-control form-control-sm" type="date" placeholder="<?php echo ('From Date') ?>" id="From Date" value="" data-toggle="tooltip" title="<?php echo ('From Date'); ?>">
                      <?php echo form_error('fromdate', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="todate"><?php echo ('To Date'); ?></label> <small class="req"> *</small>
                      <input name="todate" class="form-control form-control-sm" type="date" placeholder="<?php echo ('To Date') ?>" id="todate" value="" data-toggle="tooltip" title="<?php echo ('To Date'); ?>">
                      <?php echo form_error('todate', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>


                  <!-- Submit -->
                  <div class="col-sm-12 ">
                    <div class="form-group">
                      <!-- <label>Submit</label> -->
                      <?php if ($this->uri->segment(3) != "edit") {?>
                        <button type="submit" name="save" value="add_station" class="form-control form-control-sm btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-plus"> &nbsp;<?php echo ('Save'); ?></i></button>
                      <?php } else {?>
                        <button type="submit" name="save" value="edit_station" class="form-control form-control-sm btn btn-warning btn-sm pull-right checkbox-toggle"><i class="fa fa-edit"> &nbsp;<?php echo ('Update'); ?></i></button>
                      <?php }?>
                    </div>
                  </div>
                </div>
                <!-- <hr><hr> -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Search -->
    <!-- Display -->
    <div class="col-sm-8">
      <div class="card">
        <div class="card-header bg-dark">
          <h3 class="card-title">
            <i class="fa fa-list"></i> View Assessment
          </h3>
          <!-- <a class="btn btn-warning pull-right" href="< ?= base_url('admin/transaction/payment_report/').$search->start_date.'/'.$search->end_date; ?>"><i class="fa fa-print"></i></a> -->
        </div>
        <div class="card-body">
          <table width="100%" class="datatable_colvis table table-striped table-bordered table-hover table-sm">
            <thead>
              <tr>
                <th><?php echo ('AS Id') ?></th>
                <th><?php echo ('Assessment Mode') ?></th>
                <th><?php echo ('Agency ID') ?></th>
                <th><?php echo ('Agency Name') ?></th>
                <th><?php echo ('Assessor ID') ?></th>
                <th><?php echo ('Assessor') ?></th>
                <th><?php echo ('From Date') ?></th>
                <th><?php echo ('To Date') ?></th>
                <th><?php echo ('Action') ?></th>
              </tr>
            </thead>
            <tbody>

                  <tr>
                    <td>001</td>
                    <td>NSDC/NCVET/Third Party</td>
                    <td>AG--001</td>
                    <td>I Soft</td>
                    <td>Acc-Id-001</td>
                    <td> Mujataba</td>
                    <td> 01-06-2022</td>
                    <td> 30-06-2022</td>
                    <td class="text-center" width="100">

                        <a href="#" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo ('Are You Sure') ?>') "><i class="fa fa-trash"></i></a>

                    </td>
                  </tr>
                  <tr>
                    <td>002</td>
                    <td>NSDC/NCVET/Third Party</td>
                    <td>AG--001</td>
                    <td>I Soft</td>
                    <td>Acc-Id-001</td>
                    <td> Mujataba</td>
                    <td> 01-06-2022</td>
                    <td> 30-06-2022</td>
                    <td class="text-center" width="100">

                        <a href="#" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo ('Are You Sure') ?>') "><i class="fa fa-trash"></i></a>

                    </td>
                  </tr>

            </tbody>
          </table> <!-- /.table-responsive -->
        </div>
      </div>
    </div>
  </div>
</section>

<!-- jQuery -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/') ?>plugins/jquery/jquery.min.js"></script>