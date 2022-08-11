<div class="card js-experience-card">
  <div class="card-header bg-dark">
    <h3 class="card-title"><i class="fa fa-plus"></i> Experience Details & Heard About Us</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-dark btn-xs" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="row">

      <div class="col-sm-3 experience_div">
        <div class="form-group">
          <label for="c_prev_exp_sector"><?php echo ('Prev. Exp. Sector'); ?></label> <small class="req"> *</small>
          <input name="c_prev_exp_sector" class="form-control <?= $input_height; ?> <?php echo form_error("c_prev_exp_sector") ? 'is-invalid' : null; ?>" type="text" placeholder="<?php echo ('Prev. Exp. Sector') ?>" id="c_prev_exp_sector" value="<?php echo $input->c_prev_exp_sector ?>">
          <?php echo form_error("c_prev_exp_sector"); ?>
        </div>
      </div>

      <div class="col-sm-3 experience_div">
        <div class="form-group">
          <label for="c_prev_exp_no_of_months"><?php echo ('Prev. Experience Months'); ?></label> <small class="req"> *</small>
          <input name="c_prev_exp_no_of_months" class="form-control <?= $input_height; ?> <?php echo form_error("c_prev_exp_no_of_months") ? 'is-invalid' : null; ?>" type="text" placeholder="<?php echo ('Prev. Experience Months') ?>" id="c_prev_exp_no_of_months" value="<?php echo $input->c_prev_exp_no_of_months ?>">
          <?php echo form_error("c_prev_exp_no_of_months"); ?>

        </div>
      </div>

      <div class="col-sm-2 experience_div">
        <div class="form-group">
          <label for="c_employed"><?php echo ('Employed'); ?></label> <small class="req">
            *</small>
          <?php echo form_dropdown('c_employed', $yes_no_list, $input->c_employed, 'class="form-control ' . $input_height  . ' ' . (form_error("c_employed") ? 'is-invalid' : null) .  '" id="c_employed" '); ?>
          <?php echo form_error("c_employed"); ?>
        </div>
      </div>

      <div class="col-sm-4 experience_div">
        <div class="form-group">
          <label for="c_employment_status"><?php echo ('Employement Status'); ?></label> <small class="req">
            *</small>
          <?php echo form_dropdown('c_employment_status', $employment_status_list, $input->c_employment_status, 'class="form-control ' . $input_height  . ' ' . (form_error("c_employment_status") ? 'is-invalid' : null) .  '" id="c_employment_status" '); ?>
          <?php echo form_error("c_employment_status"); ?>
        </div>
      </div>

      <div class="col-sm-3 experience_div">
        <div class="form-group">
          <label for="c_employement_details"><?php echo ('Employement Details'); ?></label> <small class="req"> *</small>
          <input name="c_employement_details" class="form-control <?= $input_height; ?> <?php echo form_error("c_employement_details") ? 'is-invalid' : null; ?>" type="text" placeholder="<?php echo ('Employement Details') ?>" id="c_employement_details" value="<?php echo $input->c_employement_details ?>">
          <?php echo form_error("c_employement_details"); ?>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group">
          <label for="c_heard_about_us"><?php echo ('Heard About Us'); ?></label> <small class="req">
            *</small>
          <?php echo form_dropdown('c_heard_about_us', $heard_about_us_list, $input->c_heard_about_us, 'class="form-control ' . $input_height  . ' ' . (form_error("c_heard_about_us") ? 'is-invalid' : null) .  '" id="c_heard_about_us" '); ?>
          <?php echo form_error("c_perm_constituency"); ?>
        </div>
      </div>

    </div>
  </div>
</div>