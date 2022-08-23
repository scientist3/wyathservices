<section class="content">
  <div class="row">
    <!-- Assessment Details Form -->
    <div class="col-md-4 col-sm-12">
      <div class="card">
        <div class="card-header bg-dark">
          <h3 class="card-title"><i class="fa fa-plus"></i> <?php echo "Assemmsnt"; ?></h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <form role="form" action="<?php echo site_url('../admin/candidate/assessment/index/' . $batch->b_id) ?>" method="post" id="save_assessment_details_form">
                <div class="row">
                  <!-- Batch ID -->
                  <?php echo form_hidden('b_id', $batch->b_id) ?>
                  <?php echo form_hidden('as_id', $input->as_id) ?>

                  <!-- Assessment ID -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="as_as_id"><?php echo ('Assessment ID'); ?></label> <small class="req"> *</small>
                      <input name="as_as_id" class="form-control  <?= $input_height . ' ' . (form_error("as_as_id") ? 'is-invalid' : null);  ?> " type="text" placeholder="<?php echo ('Assessment ID') ?>" id="as_as_id" value="<?php echo $input->as_as_id ?>">
                      <?php echo form_error("as_as_id"); ?>
                    </div>
                  </div>

                  <!-- Assessment Mode -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="as_mode"><?php echo ('Assessment Mode'); ?></label> <small class="req"> *</small>
                      <input name="as_mode" class="form-control  <?= $input_height . ' ' . (form_error("as_mode") ? 'is-invalid' : null);  ?>" type="text" placeholder="<?php echo ('Assessment Mode') ?>" id="as_mode" value="<?php echo $input->as_mode ?>">
                      <?php echo form_error("as_mode"); ?>
                    </div>
                  </div>

                  <!-- Assessment Agency ID -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="as_agency_id"><?php echo ('Assessment Agency ID'); ?></label> <small class="req"> *</small>
                      <input name="as_agency_id" class="form-control  <?= $input_height . ' ' . (form_error("as_agency_id") ? 'is-invalid' : null);  ?>" type="text" placeholder="<?php echo ('Assessment Agency ID') ?>" id="as_agency_id" value="<?php echo $input->as_agency_id ?>">
                      <?php echo form_error("as_agency_id"); ?>
                    </div>
                  </div>

                  <!-- Assessment Agency Name -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="as_agency_name"><?php echo ('Assessment Agency Name'); ?></label> <small class="req"> *</small>
                      <input name="as_agency_name" class="form-control  <?= $input_height . ' ' . (form_error("as_agency_name") ? 'is-invalid' : null);  ?>" type="text" placeholder="<?php echo ('Assessment Agency Name') ?>" id="as_agency_name" value="<?php echo $input->as_agency_name ?>">
                      <?php echo form_error("as_agency_name"); ?>
                    </div>
                  </div>

                  <!-- Assessment Assessor ID -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="as_assessor_id"><?php echo ('Assessment Assessor ID'); ?></label> <small class="req"> *</small>
                      <input name="as_assessor_id" class="form-control  <?= $input_height . ' ' . (form_error("as_assessor_id") ? 'is-invalid' : null);  ?>" type="text" placeholder="<?php echo ('Assessment Assessor ID') ?>" id="as_assessor_id" value="<?php echo $input->as_assessor_id ?>">
                      <?php echo form_error("as_assessor_id"); ?>
                    </div>
                  </div>

                  <!-- Assessment Assessor -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="as_assessor"><?php echo ('Assessment Assessor'); ?></label> <small class="req"> *</small>
                      <input name="as_assessor" class="form-control  <?= $input_height . ' ' . (form_error("as_assessor") ? 'is-invalid' : null);  ?>" type="text" placeholder="<?php echo ('Assessment Assessor') ?>" id="as_assessor" value="<?php echo $input->as_assessor ?>">
                      <?php echo form_error("as_assessor") ?>
                    </div>
                  </div>

                  <!-- From Date -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="as_from_date"><?php echo ('From Date'); ?></label> <small class="req"> *</small>
                      <input name="as_from_date" class="form-control  <?= $input_height . ' ' . (form_error("as_from_date") ? 'is-invalid' : null);  ?>" type="date" placeholder="<?php echo ('From Date') ?>" id="as_from_date" value="<?php echo $input->as_from_date ?>">
                      <?php echo form_error("as_from_date") ?>
                    </div>
                  </div>

                  <!-- To Date -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="as_to_date"><?php echo ('To Date'); ?></label> <small class="req"> *</small>
                      <input name="as_to_date" class="form-control  <?= $input_height . ' ' . (form_error("as_to_date") ? 'is-invalid' : null);  ?>" type="date" placeholder="<?php echo ('To Date') ?>" id="as_to_date" value="<?php echo $input->as_to_date ?>">
                      <?php echo form_error("as_to_date"); ?>
                    </div>
                  </div>

                  <!-- Save Button -->
                  <div class="col-sm-12 ">
                    <div class="form-group">
                      <button type="submit" name="save_assessment_details_form" value="add_update_assessment" class="form-control  <?= $input_height; ?> form-control-sm btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-plus"> &nbsp;Save</i></button>
                    </div>
                  </div>

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Student Assessmen Details -->
    <div class="col-md-8 col-sm-12">
      <?php echo validation_errors(); ?>
      <form role="form" action="<?php echo site_url('../admin/candidate/assessment/index/' . $batch->b_id) ?>" method="post" id="update_student_assessment_details_form">
        <!-- Batch ID -->
        <?php echo form_hidden('b_id', $batch->b_id)
        ?>
        <div class="card">
          <div class="card-header bg-dark">
            <h3 class="card-title"><i class="fa fa-list"></i> Student Assessment Details</h3>
          </div>
          <div class="card-body">
            <table width="100%" class="datatable_colvisw table table-striped table-bordered table-hover table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th><?php echo ('Candidate ID') ?></th>
                  <th><?php echo ('Candidate Name') ?></th>
                  <th><?php echo ('Assessment Status') ?></th>
                  <th><?php echo ('Assessment Percentage') ?></th>
                </tr>
              </thead>
              <tbody>
                <?php if (valArr($student_assessment_details)) { ?>
                  <?php $sl = 1; ?>
                  <?php foreach ($student_assessment_details as $student) { ?>
                    <tr>
                      <td>
                        <?php echo $sl ?>
                      </td>
                      <td><?php echo $student->c_cand_id ?></td>
                      <td><?php echo $student->c_full_name ?></td>
                      <td>
                        <?php echo form_dropdown('bsm_assessment_status[' . $student->bsm_id . ']', $assessment_status_list, $student->bsm_assessment_status, 'class="form-control js-assessment-status-dropdown ' . $input_height . ' ' . (form_error("bsm_assessment_status[" . $student->bsm_id . "]") ? 'is-invalid' : null) . ' " id="bsm_assessment_status_' . $student->bsm_id . '"'); ?>
                        <?php echo form_error("bsm_assessment_status[' . $student->bsm_id . ']"); ?>
                      </td>
                      <td>
                        <input name="bsm_assessment_percentage[<?= $student->bsm_id; ?>]" class="form-control <?= $input_height . " " . (form_error("bsm_assessment_percentage[" . $student->bsm_id . "]") ? "is-invalid" : null);  ?>" type="text" placeholder="<?php echo ('Assessment Percentage') ?>" id="bsm_assessment_percentage_<?= $student->bsm_id; ?>" value="<?php echo $student->bsm_assessment_percentage ?>">
                        <?php echo form_error("bsm_assessment_percentage[" . $student->bsm_id . "]"); ?>
                      </td>
                    </tr>
                    <?php $sl++; ?>
                  <?php } ?>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!--  -->
          <div class="card-footer">
            <button type="submit" name="update_student_assessment_details_form" value="update_student_assessment_details" class="float-right form-control-sm btn btn-warning btn-sm "><i class="fa fa-edit">
                &nbsp;<?php echo ('Update'); ?></i></button>
          </div>

        </div>
      </form>
    </div>

  </div>
</section>

<script>
  var objAssessment = (
    function() {
      var assessment_status;
      var init = function() {
        // On Selecting Student that you want to be added bind change event
        $('.js-assessment-status-dropdown').off('change').on('change', function() {
          let bsm_id = this.id.split('_').pop();
          if (this.value == 2) {
            $("#bsm_assessment_percentage_" + bsm_id).val('');
            $("#bsm_assessment_percentage_" + bsm_id).prop('disabled', 'disabled');
          } else {
            $("#bsm_assessment_percentage_" + bsm_id).removeAttr('disabled');
          }
        });

        // Show Info message
        if (objAssessment.assessment_status.status == 1) {
          $(document).Toasts('create', {
            class: 'bg-info',
            title: 'Assessment Status',
            subtitle: '',
            autohide: true,
            delay: 5000,
            body: objAssessment.assessment_status.message
          })
        }
        objAssessment.enableDisableAssessmentStatus();
      }

      var enableDisableAssessmentStatus = () => {
        $('.js-assessment-status-dropdown').map((e, el) => {
          if (el.value == 2) {
            $("#bsm_assessment_percentage_" + el.id.split('_').pop()).prop('disabled', 'disabled');
          }
        })
      }

      return {
        init: init,
        assessment_status: assessment_status,
        enableDisableAssessmentStatus: enableDisableAssessmentStatus
      };
    }
  )();

  $('document').ready(function() {
    // Prepare data
    objAssessment.assessment_status = <?php echo json_encode($assessment_status); ?>
    // Initialization
    objAssessment.init();
  });
</script>