<div class="card">
  <div class="card-header bg-dark">
    <h3 class="card-title"><i class="fa fa-plus"></i> Other Details</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-dark btn-xs" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-sm-3">
        <div class="form-group">
          <label for="c_education"><?php echo ('Education Level'); ?></label> <small class="req"> *</small>
          <?php echo form_dropdown('c_education', $education_list, $input->c_education, 'class="form-control ' . $input_height  . ' ' . (form_error("c_education") ? 'is-invalid' : null) . '" id="c_education" '); ?>
          <?php echo form_error("c_education"); ?>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <label for="c_catagory"><?php echo ('Category '); ?></label> <small class="req"> *</small>
          <?php echo form_dropdown('c_catagory', $category_list, $input->c_catagory, 'class="form-control ' . $input_height  . ' ' . (form_error("c_catagory") ? 'is-invalid' : null) . '" id="c_catagory" '); ?>
          <?php echo form_error("c_catagory"); ?>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <label for="c_pre_traning_status"><?php echo ('Pre Traning Status'); ?></label> <small class="req">
            *</small>
          <?php echo form_dropdown('c_pre_traning_status', $pre_training_status_list, $input->c_pre_traning_status, 'class="form-control ' . $input_height  . ' ' . (form_error("c_pre_traning_status") ? 'is-invalid' : null) .  '" id="c_pre_traning_status" '); ?>
          <?php echo form_error("c_pre_traning_status"); ?>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <label for="c_disablity"><?php echo ('Disability '); ?></label> <small class="req"> *</small>
          <?php echo form_dropdown('c_disablity', $yes_no_list, $input->c_disablity, 'class="form-control ' . $input_height . ' ' . (form_error("c_disablity") ? 'is-invalid' : null) .  '"  id="c_disablity" '); ?>
        </div>
      </div>

      <div class="col-sm-3" id="c_type_of_disablity_div">
        <div class="form-group">
          <label for="c_type_of_disablity"><?php echo ('TypeofDisability'); ?></label> <small class="req"> *</small>
          <?php echo form_dropdown('c_type_of_disablity', $todisability_list, $input->c_type_of_disablity, 'class="form-control ' . $input_height  . ' ' . (form_error("c_type_of_disablity") ? 'is-invalid' : null) .  '" id="c_type_of_disablity" '); ?>
          <?php echo form_error("c_type_of_disablity"); ?>

        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <label for="c_id_type"><?php echo ('ID Type'); ?></label> <small class="req"> *</small>
          <?php echo form_dropdown('c_id_type', $id_type_list, $input->c_id_type, 'class="form-control ' . $input_height  . ' ' . (form_error("c_id_type") ? 'is-invalid' : null) .  '" id="c_id_type" '); ?>
          <?php echo form_error("c_id_type"); ?>
        </div>
      </div>

      <div class="col-sm-3" id="c_type_of_alternate_id_div">
        <div class="form-group">
          <label for="c_type_of_alternate_id"><?php echo ('Type of AlternateID'); ?></label> <small class="req">
            *</small>
          <?php echo form_dropdown('c_type_of_alternate_id', $type_of_alternate_id_list, $input->c_type_of_alternate_id, 'class="form-control ' . $input_height  . ' ' . (form_error("c_type_of_alternate_id") ? 'is-invalid' : null) .  '" id="c_type_of_alternate_id" '); ?>
          <?php echo form_error("c_type_of_alternate_id"); ?>
        </div>
      </div>

      <div class="col-sm-3" id="c_id_no">
        <div class="form-group">
          <label for="c_id_no"><?php echo ('ID No.'); ?></label> <small class="req"> *</small>
          <input name="c_id_no" class="form-control <?= $input_height; ?> <?php echo form_error("c_type_of_disablity") ? 'is-invalid' : null; ?>" type="text" placeholder="<?php echo ('ID No.') ?>" id="c_id_no" value="<?php echo $input->c_id_no ?>">
          <?php echo form_error("c_id_no"); ?>
        </div>
      </div>
    </div>
  </div>
</div>