<section class="content">
  <div class="row">
    <!-- Placement Details Form -->
    <div class="col-md-12 col-sm-12">
      <div class="card">
        <div class="card-header bg-dark">
          <h3 class="card-title"><i class="fa fa-plus"></i> aaa<?php echo $title; ?></h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <form role="form" action="<?php echo site_url('../admin/candidate/placement/create/' . $batch->b_id . '/' . $input->pd_id) ?>" method="post" id="save_assessment_details_form">
                <div class="row">
                  <!-- Batch ID -->
                  <?php echo form_hidden('b_id', $batch->b_id) ?>
                  <?php echo form_hidden('pd_id', $input->pd_id) ?>
                  <?php // echo form_hidden('as_id', $input->as_id) 
                  ?>

                  <!-- Placement ID -->
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="pd_pd_id"><?php echo ('Placement ID'); ?></label> <small class="req"> *</small>
                      <input name="pd_pd_id" class="form-control  <?= $input_height . ' ' . (form_error("pd_pd_id") ? 'is-invalid' : null);  ?> " type="text" placeholder="<?php echo ('Placement ID') ?>" id="pd_pd_id" value="<?php echo $input->pd_pd_id ?>">
                      <?php echo form_error("pd_pd_id"); ?>
                    </div>
                  </div>

                  <!-- Placement Status -->
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="pd_placement_status"><?php echo ('Placement Status'); ?></label> <small class="req"> *</small>
                      <?php echo form_dropdown('pd_placement_status', $yes_no_list, $input->pd_placement_status, 'class="form-control ' . $input_height . ' ' . (form_error("pd_placement_status") ? 'is-invalid' : null) . ' " id="pd_placement_status_dropdown"'); ?>
                      <?php echo form_error("pd_placement_status"); ?>
                    </div>
                  </div>

                  <!-- Employement Type -->
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="pd_employment_type"><?php echo ('Placement Status'); ?></label> <small class="req"> *</small>
                      <?php echo form_dropdown('pd_employment_type', '', $input->pd_employment_type, 'class="form-control ' . $input_height . ' ' . (form_error("pd_employment_type") ? 'is-invalid' : null) . ' " id="pd_employment_type_dropdown"'); ?>
                      <?php echo form_error("pd_employment_type"); ?>
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
            <div class="card-tools">
              <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                  <!-- <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a> -->
                  <a class="nav-link active" href="<?php echo site_url('../admin/candidate/batch/view/' . $batch->b_id) ?>">Batch View</a>
                </li>
              </ul>
            </div>
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
  var objPlacement = (
    function() {
      var assessment_status;
      var arr_employement_type_by_placement_status;
      var init = function() {

        // Placement Status change event
        $('#pd_placement_status_dropdown').off('change').on('change', function() {
          onPlacementStatusChangeHandler();
          onEmploymentTypeChangeHandler();
          showHideTypeOfProof();
          showHideDateOfJoining();
        });

        // Employment Type change event
        $('#pd_employment_type_dropdown').off('change').on('change', function() {
          onEmploymentTypeChangeHandler();
          showHideTypeOfProof();
        });

        onPlacementStatusChangeHandler();
        onEmploymentTypeChangeHandler();
        showHideTypeOfProof();
      }

      function onPlacementStatusChangeHandler() {
        // Set Employment type based on placement status
        var objPSD = $('#pd_placement_status_dropdown').val();
        const eType = objPlacement.arr_employement_type_by_placement_status[objPSD]
        var strOptionsForEmploymentTypeHtml = "";
        Object.keys(eType).map(
          (key) => {
            if (key == objPlacement.inputEmploymentStatus) {
              return strOptionsForEmploymentTypeHtml += `<option value="${key}" selected="selected">${eType[key]}</option>`;
            } else {
              return strOptionsForEmploymentTypeHtml += `<option value="${key}">${eType[key]}</option>`;
            }
          }
        );
        $('#pd_employment_type_dropdown').html(strOptionsForEmploymentTypeHtml);

        // Show hide Proof in case of Placement status is NO
        if (0 == objPSD) {
          // Show ProofOfUpskillingSelfEmployedOptedForHigherStudiesProvided
          console.log('Show Proof')
        } else {
          // Hide ProofOfUpskillingSelfEmployedOptedForHigherStudiesProvided
          console.log('Hide Proof');
        }
      }

      function onEmploymentTypeChangeHandler() {
        /**
         * If Placement status is YES & Employment Type is Self EMployed then
         *  show UndertakingForSelfEmployedCollectedFromCandidate
         * else{
         *  hide Undertaking
         */
        var placementStatusValue = $('#pd_placement_status_dropdown').val();
        var employmentTypeValue = $('#pd_employment_type_dropdown').val();
        if (1 == placementStatusValue && 4 == employmentTypeValue) {
          // Show Undertaking file
          console.log('Show Undertaking');
        } else {
          // hode undertaking
          console.log('Hide Undertaking');
        }
      }

      function showHideTypeOfProof() {
        var placementStatusValue = $('#pd_placement_status_dropdown').val();
        var employmentTypeValue = $('#pd_employment_type_dropdown').val();
        if (1 == placementStatusValue && 3 == employmentTypeValue) {
          // Show Undertaking file
          console.log('Show Type of Proof');
        } else {
          // hide undertaking
          console.log('Hide Type of Proof');
        }
      }

      function showHideDateOfJoining() {
        var placementStatusValue = $('#pd_placement_status_dropdown').val();
        if (1 == placementStatusValue) {
          // Show DOJ
          console.log('Show DOJ');
        } else {
          // hide DOJ
          console.log('Hide DOJ');
        }
      }

      function showHideEmployerName() {
        var placementStatusValue = $('#pd_placement_status_dropdown').val();
        var employmentTypeValue = $('#pd_employment_type_dropdown').val();
        if (1 == placementStatusValue && 3 == employmentTypeValue) {
          // Show Employer Name
          console.log('Show Employer Name');
        } else {
          // Hide Employer Name
          console.log('Hide Employer Name');
        }
      }

      // var enableDisableAssessmentStatus = () => {
      //   $('.js-assessment-status-dropdown').map((e, el) => {
      //     if (el.value == 2) {
      //       $("#bsm_assessment_percentage_" + el.id.split('_').pop()).prop('disabled', 'disabled');
      //     }
      //   })
      // }

      return {
        init: init,
        arr_employement_type_by_placement_status: arr_employement_type_by_placement_status
      };
    }
  )();

  $('document').ready(function() {
    // Prepare data
    // objPlacement.placement_status = < ?php echo json_encode($yes); ?>
    debugger
    objPlacement.arr_employement_type_by_placement_status = <?php echo json_encode($employement_type_by_placement_status); ?>;
    objPlacement.inputEmploymentStatus = <?php echo json_encode($input->pd_employment_type); ?>;
    // Initialization
    objPlacement.init();
  });
</script>