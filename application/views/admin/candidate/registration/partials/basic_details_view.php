<!-- Basic details -->
<div class="card">
  <div class="card-header bg-dark">
    <h3 class="card-title"><i class="fa fa-plus"></i> Basic Details</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-dark btn-xs" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-sm-4">
        <div class="form-group form-inline ">
          <label for="c_cand_id"><?php echo ('Candidate ID :'); ?></label> <small class="req text-red text-md"> </small>
          <input type="text" name="c_cand_id" class="form-control <?= $input_height; ?> <?= form_error("c_cand_id") ? 'is-invalid' : null; ?> " placeholder="<?php echo ('Candidate ID') ?>" id="c_cand_id" value="<?php echo $input->c_cand_id; ?>">
          <?php echo form_error("c_cand_id"); ?>

        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-1">
        <div class="form-group">
          <label for="c_salutation"><?php echo ('Salutation'); ?></label> <small class="req"></small>
          <?php echo form_dropdown('c_salutation', $salutation_list, $input->c_salutation, 'class="form-control ' . $input_height . '" id="c_salutation" '); ?>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group">
          <label for="c_full_name"><?php echo ('Full Name'); ?></label> <small class="req text-red text-md"> *</small>
          <input type="text" name="c_full_name" class="form-control <?= $input_height; ?> <?= form_error("c_full_name") ? 'is-invalid' : null; ?> " placeholder="<?php echo ('Full Name') ?>" id="c_full_name" value="<?php echo $input->c_full_name; ?>">
          <?php echo form_error("c_full_name"); ?>

        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group">
          <label for="c_father_name"><?php echo ('Fathers Name'); ?></label> <small class="req">
            *</small>
          <input name="c_father_name" class="form-control <?= $input_height; ?> <?= form_error("c_father_name") ? 'is-invalid' : null; ?>" type="text" placeholder="<?php echo ('Fathers Name') ?>" id="c_father_name" value="<?php echo $input->c_father_name; ?>">
          <?php echo form_error("c_father_name"); ?>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <label for="c_mother_name"><?php echo ('Mothers Name'); ?></label> <small class="req"> *</small>
          <input name="c_mother_name" class="form-control <?= $input_height; ?>  <?= form_error("c_mother_name") ? 'is-invalid' : null; ?>" type="text" placeholder="<?php echo ('Mothers Name') ?>" id="c_mother_name" value="<?php echo $input->c_mother_name ?>">
          <?php echo form_error("c_mother_name"); ?>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group">
          <label for="c_guardian_name"><?php echo ('Guardians Name'); ?></label> <small class="req"> *</small>
          <input name="c_guardian_name" class="form-control <?= $input_height; ?>  <?= form_error("c_guardian_name") ? 'is-invalid' : null; ?>" type="text" placeholder="<?php echo ('Guardians Name') ?>" id="c_guardian_name" value="<?php echo $input->c_guardian_name ?>">
          <?php echo form_error("c_guardian_name"); ?>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group">
          <label for="c_mobile"><?php echo ('Mobile Number'); ?></label> <small class="req"> *</small>
          <input name="c_mobile" class="form-control <?= $input_height; ?> <?= form_error("c_mobile") ? 'is-invalid' : null; ?>" type="text" placeholder="<?php echo ('Mobile Number') ?>" id="c_mobile" value="<?php echo $input->c_mobile ?>">
          <?php echo form_error("c_mobile"); ?>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group">
          <label for="c_email"><?php echo ('Email ID'); ?></label> <small class="req"> *</small>
          <input name="c_email" class="form-control <?= $input_height; ?> <?= form_error("c_email") ? 'is-invalid' : null; ?>" type="email" placeholder="<?php echo ('Email ID') ?>" id="c_email" value="<?php echo $input->c_email ?>">
          <?php echo form_error("c_email"); ?>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <label for="c_gender"><?php echo ('Gender'); ?></label> <small class="req"> *</small>
          <?php echo form_dropdown('c_gender', $gender_list, $input->c_gender, 'class="form-control ' . $input_height .
            ' ' .
            (form_error("c_gender") ? 'is-invalid' : null) .
            '" id="c_gender" 
                '); ?>
          <?php echo form_error("c_gender"); ?>

        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <label for="c_dob"><?php echo ('Date of Birth'); ?></label> <small class="req"> *</small>
          <input type="date" name="c_dob" class="form-control <?= $input_height; ?> <?= form_error("c_email") ? 'is-invalid' : null; ?>" type="text" placeholder="<?php echo ('Date od Birth ') ?>" id="c_dob" value="<?php echo $input->c_dob ?>">
          <?php // echo date('d-M-Y', strtotime($input->c_dob)) 
          ?>
          <?php echo form_error("c_dob"); ?>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <label for="c_marital_status"><?php echo ('Marital Status'); ?></label> <small class="req"> *</small>
          <?php echo form_dropdown('c_marital_status', $marital_status_list, $input->c_marital_status, 'class="form-control ' . $input_height .

            ' ' .
            (form_error("c_marital_status") ? 'is-invalid' : null) .
            '" id="c_marital_status" 
              '); ?>
          <?php echo form_error("c_marital_status"); ?>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <label for="c_religion"><?php echo ('Religion'); ?></label> <small class="req"> *</small>
          <?php echo form_dropdown('c_religion', $religion_list, $input->c_religion, 'class="form-control ' . $input_height . ' ' . (form_error("c_religion") ? 'is-invalid' : null) . '" id="c_religion" '); ?>
          <?php echo form_error("c_religion"); ?>

        </div>
      </div>
    </div>
  </div>
</div>