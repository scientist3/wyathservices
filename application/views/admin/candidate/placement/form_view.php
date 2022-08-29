<div class="card">
  <div class="card-header bg-dark">
    <h3 class="card-title"><i class="fa fa-plus"></i> <?php echo $subtitle; ?></h3>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <form role="form" action="<?php echo site_url('../admin/candidate/course/index/' . $input->crs_id) ?>" method="post" id="save_type_form" enctype="multipart/form-data">
          <?php echo form_input([
            'type'  => 'hidden',
            'name'  => 'crs_id',
            'id'    => 'crs_id',
            'value' =>  $input->crs_id,
          ]) ?>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="crs_course_id"><?php echo ('Course ID'); ?></label> <small class="req"> *</small>
                <input name="crs_course_id" class="form-control <?= $input_height . ' ' . (form_error("crs_course_id") ? 'is-invalid' : null) ?>
                      " type=" text" placeholder="<?php echo ('Course ID') ?>" id="crs_course_id" value="<?php echo $input->crs_course_id ?>" data-toggle="tooltip" title="<?php echo ('Course Name'); ?>">
                <?php echo form_error('crs_course_id'); ?>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group">
                <label for="crs_course_name"><?php echo ('Course Name'); ?></label> <small class="req"> *</small>
                <input name="crs_course_name" class="form-control <?= $input_height ?>
                      <?= form_error("crs_course_name") ? 'is-invalid' : null; ?>
                      " type=" text" placeholder="<?php echo ('Course Name') ?>" id="crs_course_name" value="<?php echo $input->crs_course_name ?>" data-toggle="tooltip" title="<?php echo ('Course Name'); ?>">
                <?php echo form_error('crs_course_name'); ?>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group">
                <label for="crs_course_type"><?php echo ('Course Type'); ?></label> <small class="req"> *</small>
                <input name="crs_course_type" class="form-control <?php $input_height ?> <?= form_error("crs_course_type") ? 'is-invalid' : null; ?> " type="text" placeholder="<?php echo ('Course Type') ?>" id="crs_course_type" value="<?php echo $input->crs_course_type ?>" data-toggle="tooltip" title="<?php echo ('Course Type'); ?>">
                <?php echo form_error('crs_course_type'); ?>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group">
                <label for="crs_sector_covered"><?php echo ('Sector Covered'); ?></label> <small class="req"> *</small>
                <input name="crs_sector_covered" class="form-control <?php $input_height ?> <?= form_error("crs_sector_covered") ? 'is-invalid' : null; ?> " type="text" placeholder="<?php echo ('Sector Covered') ?>" id="crs_sector_covered" value="<?php echo $input->crs_sector_covered ?>" data-toggle="tooltip" title="Sector Covered">
                <?php echo form_error('crs_sector_covered'); ?>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group">
                <label for="crs_course_fee"><?php echo ('Course Fee'); ?></label> <small class="req"> *</small>
                <input name="crs_course_fee" class="form-control <?php $input_height ?> <?= form_error("crs_course_fee") ? 'is-invalid' : null; ?> " type="text" placeholder="<?php echo ('Course Fee') ?>" id="crs_course_fee" value="<?php echo $input->crs_course_fee ?>" data-toggle="tooltip" title="<?php echo ('Course Fee'); ?>">
                <?php echo form_error('crs_course_fee'); ?>
              </div>
            </div>

            <div class="col-sm-12">
              <div class="form-group">
                <label for="crs_fee_paid_by"><?php echo ('Fee PaidBy'); ?></label> <small class="req"> *</small>
                <input name="crs_fee_paid_by" class="form-control <?php $input_height ?> <?= form_error("crs_fee_paid_by") ? 'is-invalid' : null; ?> " type="text" placeholder="<?php echo ('Fee PaidBy') ?>" id="crs_fee_paid_by" value="<?php echo $input->crs_fee_paid_by ?>" data-toggle="tooltip" title="<?php echo ('Fee PaidBy'); ?>">
                <?php echo form_error('crs_fee_paid_by'); ?>
              </div>
            </div>

            <!-- Submit -->
            <div class="col-sm-12 ">
              <div class="form-group">
                <?php if (empty($input->crs_id)) { ?>
                  <button type="submit" name="save" value="add_station" class="form-control btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-plus">
                      &nbsp;<?php echo ('Save'); ?></i></button>
                <?php } else { ?>
                  <button type="submit" name="save" value="edit_station" class="form-control btn btn-warning btn-sm pull-right checkbox-toggle"><i class="fa fa-edit">
                      &nbsp;<?php echo ('Update'); ?></i></button>
                <?php } ?>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>