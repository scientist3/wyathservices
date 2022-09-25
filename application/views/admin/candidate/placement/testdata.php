<!-- Assessment Agency ID -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="as_agency_id"><?php echo ('Assessment Agency ID'); ?></label> <small class="req"> *</small>
                      <input name="as_agency_id" class="form-control  <?php //echo $input_height . ' ' . (form_error("as_agency_id") ? 'is-invalid' : null);  ?>" type="text" placeholder="<?php echo ('Assessment Agency ID') ?>" id="as_agency_id" value="<?php //echo $input->as_agency_id ?>">
                      <?php echo form_error("as_agency_id"); ?>
                    </div>
                  </div>

                  <!-- Assessment Agency Name -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="as_agency_name"><?php echo ('Assessment Agency Name'); ?></label> <small class="req"> *</small>
                      <input name="as_agency_name" class="form-control  <?php //echo $input_height . ' ' . (form_error("as_agency_name") ? 'is-invalid' : null);  ?>" type="text" placeholder="<?php echo ('Assessment Agency Name') ?>" id="as_agency_name" value="<?php //echo $input->as_agency_name ?>">
                      <?php echo form_error("as_agency_name"); ?>
                    </div>
                  </div>

                  <!-- Assessment Assessor ID -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="as_assessor_id"><?php echo ('Assessment Assessor ID'); ?></label> <small class="req"> *</small>
                      <input name="as_assessor_id" class="form-control  <?php //echo $input_height . ' ' . (form_error("as_assessor_id") ? 'is-invalid' : null);  ?>" type="text" placeholder="<?php echo ('Assessment Assessor ID') ?>" id="as_assessor_id" value="<?php //echo $input->as_assessor_id ?>">
                      <?php echo form_error("as_assessor_id"); ?>
                    </div>
                  </div>

                  <!-- Assessment Assessor -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="as_assessor"><?php echo ('Assessment Assessor'); ?></label> <small class="req"> *</small>
                      <input name="as_assessor" class="form-control  <?= $input_height . ' ' . (form_error("as_assessor") ? 'is-invalid' : null);  ?>" type="text" placeholder="<?php echo ('Assessment Assessor') ?>" id="as_assessor" value="<?php //echo $input->as_assessor ?>">
                      <?php echo form_error("as_assessor") ?>
                    </div>
                  </div>

                  <!-- From Date -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="as_from_date"><?php echo ('From Date'); ?></label> <small class="req"> *</small>
                      <input name="as_from_date" class="form-control  <?= $input_height . ' ' . (form_error("as_from_date") ? 'is-invalid' : null);  ?>" type="date" placeholder="<?php echo ('From Date') ?>" id="as_from_date" value="<?php //echo $input->as_from_date ?>">
                      <?php echo form_error("as_from_date") ?>
                    </div>
                  </div>

                  <!-- To Date -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="as_to_date"><?php echo ('To Date'); ?></label> <small class="req"> *</small>
                      <input name="as_to_date" class="form-control  <?= $input_height . ' ' . (form_error("as_to_date") ? 'is-invalid' : null);  ?>" type="date" placeholder="<?php echo ('To Date') ?>" id="as_to_date" value="<?php //echo $input->as_to_date ?>">
                      <?php echo form_error("as_to_date"); ?>
                    </div>
                  </div>