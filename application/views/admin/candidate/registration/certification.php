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
                      <label for="agency"><?php echo ('Agency'); ?></label> <small class="req"> *</small>
                      <input name="agency" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Agency') ?>" id="agency" value="" data-toggle="tooltip" title="<?php echo ('Agency'); ?>">
                      <?php echo form_error('gal_img_caption', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="certified"><?php echo ('Certified'); ?></label> <small class="req"> *</small>
                      <input name="certified" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Certified') ?>" id="certified" value="" data-toggle="tooltip" title="<?php echo ('Certified'); ?>">
                      <?php echo form_error('certified', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>


                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="date"><?php echo ('Date'); ?></label> <small class="req"> *</small>
                      <input name="date" class="form-control form-control-sm" type="date" placeholder="<?php echo ('Date') ?>" id="date" value="" data-toggle="tooltip" title="Date">
                      <?php echo form_error('date', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="certificateissued"><?php echo ('Certificate Issued'); ?></label> <small class="req"> *</small>
                      <input name="certificateissued" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Certificate Issued') ?>" id="certificateissued" value="" data-toggle="tooltip" title="<?php echo ('Certificate Issued'); ?>">
                      <?php echo form_error('certificateissued', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="certificateno"><?php echo ('Certificate No'); ?></label> <small class="req"> *</small>
                      <input name="certificateno" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Certificate No') ?>" id="certificateno" value="" data-toggle="tooltip" title="<?php echo ('Certificate No'); ?>">
                      <?php echo form_error('certificateno', '<span class="badge bg-danger p-1">', '</span>'); ?>
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
            <i class="fa fa-list"></i> View Certification
          </h3>
          <!-- <a class="btn btn-warning pull-right" href="< ?= base_url('admin/transaction/payment_report/').$search->start_date.'/'.$search->end_date; ?>"><i class="fa fa-print"></i></a> -->
        </div>
        <div class="card-body">
          <table width="100%" class="datatable_colvis table table-striped table-bordered table-hover table-sm">
            <thead>

              <tr>
                <th><?php echo ('CRT ID') ?></th>
                <th><?php echo ('Agency') ?></th>
                <th><?php echo ('Certified') ?></th>
                <th><?php echo ('Date') ?></th>
                <th><?php echo ('Certificate Issued') ?></th>
                <th><?php echo ('CertificateNo') ?></th>
                <th><?php echo ('Action') ?></th>
              </tr>
            </thead>
            <tbody>

                  <tr>
                    <td>CRT-001</td>
                    <td>PMKY</td>
                    <td>Yes</td>
                    <td>1-Mar-2022</td>
                    <td>Tailer</td>
                    <td> PMKY-TAILOR-2022-546</td>
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