<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-sm-12">
      <form role="form" action="<?php echo site_url('admin/Contactdetails/create') ?>" method="post" id="save_type_form" enctype="multipart/form-data">
        <div class="card">
          <div class="card-header bg-dark">
            <h3 class="card-title"><i class="fa fa-plus"></i> <?php echo $subtitle; ?></h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <?php echo form_hidden('cont_id', $input->cont_id) ?>
                <div class="row">
                  <!-- Contact Address -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="cont_address"><?php echo ('Address'); ?></label> <small class="req"> *</small>
                      <input name="cont_address" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Contact Address') ?>" id="cont_address" value="<?php echo $input->cont_address; ?>" data-toggle="tooltip" title="<?php echo ('About Contact Address'); ?>">
                      <?php echo form_error('cont_address', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <!-- Contact Area -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="cont_area"><?php echo ('Area'); ?></label> <small class="req"> *</small>
                      <input name="cont_area" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Contact Area') ?>" id="cont_area" value="<?php echo $input->cont_area ?>" data-toggle="tooltip" title="<?php echo ('Contact Area'); ?>">
                      <?php echo form_error('cont_area', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <!-- Contact Pincode -->
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="cont_pincode"><?php echo ('Pincode'); ?></label> <small class="req"> *</small>
                      <input name="cont_pincode" class="form-control form-control-sm" type="number" placeholder="<?php echo ('Contact Pincode') ?>" id="cont_pincode" value="<?php echo $input->cont_pincode ?>" data-toggle="tooltip" title="<?php echo ('Contact Pincode'); ?>">
                      <?php echo form_error('cont_pincode', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                  <!-- Contact State -->
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="cont_state"><?php echo ('State'); ?></label> <small class="req"> *</small>
                      <input name="cont_state" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Contact State') ?>" id="cont_state" value="<?php echo $input->cont_state ?>" data-toggle="tooltip" title="<?php echo ('Contact State'); ?>">
                      <?php echo form_error('cont_state', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                  <!-- Contact Country -->
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="cont_country"><?php echo ('Country'); ?></label> <small class="req"> *</small>
                      <input name="cont_country" class="form-control form-control-sm" type="tex" placeholder="<?php echo ('Contact Country') ?>" id="cont_country" data-toggle="tooltip" value="<?php echo $input->cont_country ?>" title="<?php echo ('Contact Country'); ?>">
                      <?php echo form_error('cont_country', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                  <!-- Contact Email -->
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="cont_email"><?php echo ('Contact Email'); ?></label> <small class="req"> *</small>
                      <input name="cont_email" class="form-control form-control-sm" type="email" placeholder="<?php echo ('Contact Email') ?>" value="<?php echo $input->cont_email ?>" id="cont_email" data-toggle="tooltip" title="<?php echo ('Contact Email'); ?>">
                      <?php echo form_error('cont_email', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                  <!-- Contact Phone Number -->
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="cont_phone_no"><?php echo ('Contact Phone Number'); ?></label> <small class="req"> *</small>
                      <input name="cont_phone_no" class="form-control form-control-sm" type="tex" placeholder="<?php echo ('Contact Phone Number') ?>" value="<?php echo $input->cont_phone_no ?>" id="cont_phone_no" data-toggle="tooltip" title="<?php echo ('Contact Phone Number'); ?>">
                      <?php echo form_error('cont_phone_no', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>


                  <!-- status -->
                  <div class="col-sm-4">
                    <div class="form-group ">
                      <label for="cont_status"><?php echo ('Status'); ?></label>
                      <div class="form-check row form-inline form-control-sm">
                        <div class="col-6 form-inline">
                          <label class=" radio-inline">
                            <input type="radio" name="cont_status" value="1" <?= ($input->cont_status == '1' || ($input->cont_status != '0')) ? 'checked' : null; ?> data-toggle="tooltip" title="Active status">&nbsp;
                            <?php echo ('Active') ?>
                          </label>
                        </div>
                        <div class="col-6 form-inline">
                          <label class=" radio-inline">
                            <input type="radio" name="cont_status" value="0" <?= ($input->cont_status == '0') ? 'checked' : null; ?> data-toggle="tooltip" title="Disabled status"> &nbsp;<?php echo ('Inactive') ?>
                          </label>
                        </div>
                        <br>
                      </div>
                      <?php echo form_error('cont_status', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="card-footer">
            <!-- Submit -->
            <div class="col-sm-3 float-right">
              <div class="form-group mb-0">
                <!-- <label>Submit</label> -->
                <?php if ($this->uri->segment(3) != "edit") { ?>
                  <button type="submit" name="save" value="add_station" class="form-control form-control-sm btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-plus"> &nbsp;<?php echo ('Save'); ?></i></button>
                <?php } else { ?>

                  <button type="submit" name="save" value="edit_station" class="form-control form-control-sm btn btn-warning btn-sm pull-right checkbox-toggle"><i class="fa fa-edit"> &nbsp;<?php echo ('Update'); ?></i></button>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- Search -->
  <!-- Display -->
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header bg-dark">
          <h3 class="card-title">
            <i class="fa fa-list"></i> Contact Details
          </h3>
          <!-- <a class="btn btn-warning pull-right" href="< ?= base_url('admin/transaction/payment_report/').$search->start_date.'/'.$search->end_date; ?>"><i class="fa fa-print"></i></a> -->
        </div>

        <div class="card-body">
          <table width="100%" class="datatable_colvis table table-striped table-bordered table-hover table-sm">
            <thead>
              <tr>
                <th><?php echo ('Unique Id') ?></th>
                <th><?php echo ('Address') ?></th>
                <th><?php echo ('Area') ?></th>
                <th><?php echo ('Pincode') ?></th>
                <th><?php echo ('State') ?></th>
                <th><?php echo ('Country') ?></th>
                <th><?php echo ('Email') ?></th>
                <th><?php echo ('Phone No') ?></th>
                <th><?php echo ('Status') ?></th>
                <th><?php echo ('Action') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($contactdetails)) { ?>
                <?php $sl = 1; ?>
                <?php foreach ($contactdetails as $cd) { ?>
                  <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo $cd->cont_address ?></td>
                    <td><?php echo $cd->cont_area ?></td>
                    <td><?php echo $cd->cont_pincode ?></td>
                    <td><?php echo $cd->cont_state ?></td>
                    <td><?php echo $cd->cont_country ?></td>
                    <td><?php echo $cd->cont_email ?></td>
                    <td><?php echo $cd->cont_phone_no ?></td>

                    <td class="text-center">
                      <?php echo ($cd->cont_status) ?
                        '<i class="fa fa-check" aria-hidden="true"></i>' :
                        '<i class="fa fa-times" aria-hidden="true"></i>'; ?>
                    <td class="text-center" width="100">
                      <?php if (!in_array($cd->cont_id, [])) { ?>
                        <a href="<?php echo base_url("admin/Contactdetails/edit/$cd->cont_id") ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url("admin/Contactdetails/delete/$cd->cont_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo ('Are You Sure') ?>') "><i class="fa fa-trash"></i></a>
                      <?php } ?>
                    </td>
                  </tr>
                  <?php $sl++; ?>
                <?php } ?>
              <?php } ?>
            </tbody>
          </table> <!-- /.table-responsive -->
        </div>
      </div>
    </div>
  </div>
</section>

<!-- jQuery -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/') ?>plugins/jquery/jquery.min.js"></script>