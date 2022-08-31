<!-- Main content -->
<section class="content">
  <!-- Add Batch -->
  <div class="row">
    <div class="col-sm-12">
      <form role="form" action="<?php echo site_url('../admin/candidate/batch/index/' . $input->b_id) ?>" method="post" id="save_type_form" enctype="multipart/form-data">
        <div class="card">
          <div class="card-header bg-dark">
            <h3 class="card-title"><i class="fa fa-plus"></i> <?php echo $subtitle; ?></h3>
          </div>
          <div class="card-body">
            <div class="row">

              <!-- Batch ID Hidden -->
              <?php echo form_hidden('b_id', $input->b_id) ?>

              <!-- Batch ID -->
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="b_bch_id"><?php echo ('Batch ID'); ?></label> <small class="req"> *</small>
                  <input name="b_bch_id" class="form-control <?= $input_height . ' ' . (form_error("b_bch_id") ? 'is-invalid' : null); ?>" type="text" placeholder="<?php echo ('Batch Type') ?>" id="b_bch_id" value="<?php echo $input->b_bch_id ?>">
                  <?php echo form_error("b_bch_id"); ?>
                </div>
              </div>

              <!-- Batch Type -->
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="b_batch_type"><?php echo ('Batch Type'); ?></label> <small class="req"> *</small>
                  <input name="b_batch_type" class="form-control <?= $input_height . ' ' . (form_error("b_batch_type") ? 'is-invalid' : null); ?> ?>" type="text" placeholder="<?php echo ('Batch Type') ?>" id="b_batch_type" value="<?php echo $input->b_batch_type ?>">
                  <?php echo form_error("b_batch_type"); ?>
                </div>
              </div>

              <!-- Start Date -->
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="b_start_date"><?php echo ('Start Date'); ?></label> <small class="req"> *</small>
                  <input name="b_start_date" class="form-control <?= $input_height . ' ' . (form_error("b_start_date") ? 'is-invalid' : null); ?>" type="date" placeholder="<?php echo ('Start Date') ?>" id="b_start_date" value="<?php echo $input->b_start_date ?>">
                  <?php echo form_error('b_start_date'); ?>
                </div>
              </div>

              <!-- End Date -->
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="b_end_date"><?php echo ('End Date'); ?></label> <small class="req"> *</small>
                  <input name="b_end_date" class="form-control <?= $input_height . ' ' . (form_error("b_end_date") ? 'is-invalid' : null); ?>" type="date" placeholder="<?php echo ('End Date') ?>" id="b_end_date" value="<?php echo $input->b_end_date ?>">
                  <?php echo form_error('b_end_date'); ?>
                </div>
              </div>

              <!-- Course -->
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="b_course_id"><?php echo ('Course'); ?></label> <small class="req"> *</small>
                  <?php echo form_dropdown('b_course_id', $course_list, $input->b_course_id, 'class="form-control ' . $input_height . ' ' . (form_error("b_course_id") ? 'is-invalid' : null) . ' " id="b_course_id" name="b_course_id" '); ?>
                  <?php echo form_error("b_course_id"); ?>
                </div>
              </div>

              <!-- Trainer Name -->
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="b_trainer_name"><?php echo ('Trainer Name'); ?></label> <small class="req"> *</small>
                  <input name="b_trainer_name" class="form-control <?php echo $input_height . ' ' . (form_error("b_trainer_name") ? 'is-invalid' : null); ?>" type="text" placeholder="<?php echo ('Trainer Name') ?>" id="b_trainer_name" value="<?php echo $input->b_trainer_name ?>">
                  <?php echo form_error("b_trainer_name"); ?>
                </div>
              </div>

              <!-- Training Center -->
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="b_tc_id"><?php echo ('Training Center'); ?></label> <small class="req">
                    *</small>
                  <?php echo form_dropdown('b_tc_id', $training_center_list, $input->b_tc_id, 'class="form-control ' . $input_height . ' ' . (form_error("b_tc_id") ? 'is-invalid' : null) . ' " id="b_tc_id"'); ?>
                  <?php echo form_error("b_tc_id"); ?>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer clearfix">
            <!-- Submit / Save Button -->
            <?php if ($this->uri->segment(3) != "edit") { ?>
              <button type="submit" name="save" value="add_batch" class=" btn btn-primary btn-md float-right checkbox-toggle"><i class="fa fa-plus"> &nbsp;<?php echo ('Save'); ?></i></button>
            <?php } else { ?>
              <button type="submit" name="save" value="edit_batch" class=" btn btn-warning btn-md float-right checkbox-toggle"><i class="fa fa-edit"> &nbsp;<?php echo ('Update'); ?></i></button>
            <?php } ?>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Batch List -->
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header bg-dark">
          <h3 class="card-title">
            <i class="fa fa-list"></i> View Batch
          </h3>
        </div>
        <div class="card-body">
          <table width="100%" class="datatable_colvis table table-striped table-bordered table-hover table-sm">
            <thead>
              <tr>
                <th><?php echo ('Unique Id') ?></th>
                <th><?php echo ('Batch  Type') ?></th>
                <th><?php echo ('Start Date') ?></th>
                <th><?php echo ('End Date') ?></th>
                <th><?php echo ('Course Name') ?></th>
                <th><?php echo ('Trainer Name') ?></th>
                <th><?php echo ('Training Completed') ?></th>
                <th>
                  <?php echo ('Assessment Completed') ?>
                </th>
                <th><?php echo ('Action') ?></th>
              </tr>
            </thead>
            <tbody>
              <!--  -->
              <?php if (!empty($batchs)) { ?>
                <?php $sl = 1; ?>
                <?php foreach ($batchs as $batch) { ?>
                  <tr>
                    <td><?php echo $batch->b_bch_id ?></td>
                    <td><?php echo $batch->b_batch_type ?></td>
                    <td><?php echo $batch->b_start_date ?></td>
                    <td><?php echo $batch->b_end_date ?></td>
                    <td><?php echo $batch->crs_course_name ?></td>
                    <td><?php echo $batch->b_trainer_name ?></td>
                    <td>
                      <div class="badge badge-<?php echo $batch->b_training_completed ? "success" : "danger"; ?> p-2">
                        <?php echo $yes_no_list[$batch->b_training_completed]; ?>
                      </div>
                    </td>
                    <td>
                      <div class="badge badge-<?php echo $batch->b_assessment_completed ? "success" : "danger"; ?> p-2">
                        <?php echo $yes_no_list[$batch->b_assessment_completed]; ?>
                      </div>
                    </td>
                    <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="<?php echo base_url("admin/candidate/batch/view/$batch->b_id") ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                        <a href="<?php echo base_url("admin/candidate/batch/index/$batch->b_id/$batch->b_bch_id") ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url("/admin/candidate/batch/delete/$batch->b_id/$batch->b_bch_id") ?>" class="btn btn-sm btn-danger" onclick="return confirm('<?php echo ('Are You Sure') ?>') "><i class="fa fa-trash"></i></a>
                      </div>
                  </tr>
                  <?php $sl++; ?>
                <?php } ?>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- jQuery -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/') ?>plugins/jquery/jquery.min.js"></script>