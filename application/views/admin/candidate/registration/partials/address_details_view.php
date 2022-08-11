<div class="card">
  <div class="card-header bg-dark">
    <h3 class="card-title"><i class="fa fa-plus"></i> Address Details</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-dark btn-xs" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <div class="row">

      <div class="col-sm-4">
        <div class="form-group">
          <label for="c_perm_address"><?php echo ('Perm Address'); ?></label> <small class="req">
            *</small>
          <input name="c_perm_address" class="form-control <?= $input_height; ?>" type="text" placeholder="<?php echo ('Perm Address') ?>" id="c_perm_address" value="<?php echo $input->c_perm_address ?>">
          <?php echo form_error("c_perm_address"); ?>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group">
          <label for="c_perm_state"><?php echo ('Perm State'); ?></label> <small class="req"> *</small>
          <?php echo form_dropdown('c_perm_state', $state_list, $input->c_perm_state, 'class="form-control ' . $input_height . '" id="c_perm_state" '); ?>
          <?php echo form_error("c_perm_state"); ?>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group">
          <label for="c_perm_district"><?php echo ('Perm District'); ?></label> <small class="req">
            *</small>
          <?php echo form_dropdown('c_perm_district', $perm_district_list, $input->c_perm_district, 'class="form-control ' . $input_height . ' ' . (form_error("c_perm_district") ? 'is-invalid' : null) .  '" id="c_perm_district" '); ?>
          <?php echo form_error("c_perm_district"); ?>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <label for="c_perm_tehsil"><?php echo ('Perm Tehsil'); ?></label> <small class="req"> *</small>
          <input name="c_perm_tehsil" class="form-control <?= $input_height; ?>" type="text" placeholder="<?php echo ('Perm Tehsil') ?>" id="c_perm_tehsil" value="<?php echo $input->c_perm_tehsil ?>">
          <?php echo form_error("c_perm_tehsil"); ?>
        </div>
      </div>

      <div class="col-sm-3">
        <div class="form-group">
          <label for="c_perm_city"><?php echo ('Perm City'); ?></label> <small class="req"> *</small>
          <input name="c_perm_city" class="form-control <?= $input_height; ?>" type="text" placeholder="<?php echo ('Perm City') ?>" id="c_perm_city" value="<?php echo $input->c_perm_city ?>">
          <?php echo form_error("c_perm_city"); ?>

        </div>
      </div>

      <div class="col-sm-2">
        <div class="form-group">
          <label for="c_perm_pincode"><?php echo ('Perm PINCode'); ?></label> <small class="req">
            *</small>
          <input name="c_perm_pincode" class="form-control <?= $input_height; ?>" type="text" placeholder="<?php echo ('Perm PINCode') ?>" id="c_perm_pincode" value="<?php echo $input->c_perm_pincode ?>">
          <?php echo form_error("c_perm_pincode"); ?>
        </div>
      </div>

      <div class="col-sm-4">
        <div class="form-group">
          <label for="c_perm_constituency"><?php echo ('Perm Constituency'); ?></label> <small class="req">
            *</small>
          <input name="c_perm_constituency" class="form-control <?= $input_height; ?>" type="text" placeholder="<?php echo ('Perm Constituency') ?>" id="c_perm_constituency" value="<?php echo $input->c_perm_constituency ?>">
          <?php echo form_error("c_perm_constituency"); ?>
        </div>
      </div>

      <div class="col-sm-12">
        <div class="form-group form-check ">
          <hr>
          <input type="checkbox" class="form-check-input ml-3" name="c_comm_same_as_perm" id="c_comm_same_as_perm" value="<?php echo $input->c_comm_same_as_perm ?>" <?php echo ($input->c_comm_same_as_perm == 1) ? 'checked' : null ?>>
          <label class="form-check-label ml-5" for="c_comm_same_as_perm">Communication Same as Perm Address</label>
          <hr>
        </div>
      </div>

      <div class="col-sm-4 comm_address_div" id="c_comm_address_div">
        <div class="form-group">
          <label for="c_comm_address"><?php echo ('Communication Address.'); ?></label> <small class="req">
            *</small>
          <input name="c_comm_address" class="form-control <?= $input_height; ?>" type="text" placeholder="<?php echo ('Communication Address') ?>" id="c_comm_address" value="<?php echo $input->c_comm_address ?>">
          <?php echo form_error("c_comm_address"); ?>
        </div>
      </div>

      <div class="col-sm-4 comm_address_div" id="c_comm_state_div">
        <div class="form-group">
          <label for="c_comm_state"><?php echo ('Communication State'); ?></label> <small class="req">
            *</small>
          <?php echo form_dropdown('c_comm_state', $state_list, $input->c_comm_state, 'class="form-control ' . $input_height . '"
              id="c_comm_state" '); ?>
          <?php echo form_error("c_comm_state"); ?>
        </div>
      </div>

      <div class="col-sm-4 comm_address_div" id="c_comm_district_div">
        <div class="form-group">
          <label for="c_comm_district"><?php echo ('Communication District'); ?></label> <small class="req">
            *</small>
          <?php echo form_dropdown('c_comm_district', $comm_district_list, $input->c_comm_district, 'class="form-control ' . $input_height . '"
              id="c_comm_district" '); ?>
          <?php echo form_error("c_comm_district"); ?>
        </div>
      </div>

      <div class="col-sm-3 comm_address_div" id="c_comm_tehsil">
        <div class="form-group">
          <label for="c_comm_tehsil"><?php echo ('Communication Tehsil'); ?></label> <small class="req">
            *</small>
          <input name="c_comm_tehsil" class="form-control <?= $input_height; ?>" type="text" placeholder="<?php echo ('Communication Tehsil') ?>" id="c_comm_tehsil" value="<?php echo $input->c_comm_tehsil ?>">
          <?php echo form_error("c_comm_tehsil"); ?>
        </div>
      </div>

      <div class="col-sm-3 comm_address_div" id="c_comm_city_div">
        <div class="form-group">
          <label for="c_comm_city"><?php echo ('Communication City'); ?></label> <small class="req">
            *</small>
          <input name="c_comm_city" class="form-control <?= $input_height; ?>" type="text" placeholder="<?php echo ('Communication City') ?>" id="communicationcity" value="<?php echo $input->c_comm_city ?>">
          <?php echo form_error("c_comm_city"); ?>
        </div>
      </div>

      <div class="col-sm-3 comm_address_div" id="c_comm_pincode_div">
        <div class="form-group">
          <label for="c_comm_pincode"><?php echo ('Communication PINCode'); ?></label> <small class="req">
            *</small>
          <input name="c_comm_pincode" class="form-control <?= $input_height; ?>" type="text" placeholder="<?php echo ('Communication PINCode') ?>" id="c_comm_pincode" value="<?php echo $input->c_comm_pincode ?>">
          <?php echo form_error("c_comm_pincode"); ?>
        </div>
      </div>

      <!-- riyaz Ther is one option to show and hide in one line of code -->
      <div class="col-sm-3 comm_address_div" id="c_comm_constituency_div">
        <div class="form-group">
          <label for="c_comm_constituency"><?php echo ('Communication Constituency'); ?></label> <small class="req"> *</small>
          <input name="c_comm_constituency" class="form-control <?= $input_height; ?>" type="text" placeholder="<?php echo ('Communication Constituency') ?>" id="c_comm_constituency" value="<?php echo $input->c_comm_constituency ?>">
          <?php echo form_error("c_comm_constituency"); ?>
        </div>
      </div>
    </div>
  </div>
</div>