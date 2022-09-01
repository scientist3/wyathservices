<!-- Main content -->
<section class="content">
  <!-- Batch Progress -->
  <div class="col-md-12">
    <div class="card card-dark">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-spinner float-sm-left"> Batch Progress/Status</i>
        </h3>
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-sm-6 pb-5">
            <?php if ($batch->b_training_completed == 1) { ?>
              <div class="progress mb-3 h-50 rounded">
                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                  <span class="">Training Completed</span>
                </div>
              </div>
              <a type="submit" class="btn btn-sm btn-primary w-100" id="mark_assessement_complete_model" href="<?= site_url('../admin/candidate/batch/training/' . $batch->b_id) ?>"><i class="fas fa-check"></i>Submit Training</a>
              <!-- <button type="button" class="btn btn-sm btn-warning w-100" data-toggle="modal" data-target="#mark_training_incomplete_model" data-toggle="tooltip" title="If you want to add more student please mark training status to incomplete."><i class="fas fa-times"></i> Mark Training Incompleted</button> -->
            <?php } else { ?>
              <div class="progress mb-3 h-50 rounded">
                <div class="progress-bar bg-gray" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                  <span class="">Training Incompleted</span>
                </div>
              </div>
              <a type="submit" class="btn btn-sm btn-primary w-100" id="mark_assessement_complete_model" href="<?= site_url('../admin/candidate/batch/training/' . $batch->b_id) ?>"><i class="fas fa-check"></i>Submit Training</a>
              <!-- <button type="button" class="btn btn-sm btn-primary w-100" data-toggle="modal" data-target="#mark_training_complete_model" data-toggle="tooltip" title="If you mark training status complete, then you can't add/remove students to/from batch."><i class="fas fa-check"></i> Mark Training Complete</button> -->
            <?php }  ?>
          </div>
          <div class="col-sm-6 pb-5">
            <!-- Traing Completed -->
            <?php if ($batch->b_training_completed == 1) { ?>
              <!-- Assessment Completed -->
              <?php if ($batch->b_assessment_completed == 1) { ?>
                <div class="progress mb-3 h-50 rounded">
                  <div class="progress-bar bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <span class="">Assessment Completed</span>
                  </div>
                </div>
                <a type="submit" class="btn btn-sm btn-primary w-100" id="mark_assessement_complete_model" href="<?= site_url('../admin/candidate/assessment/index/' . $batch->b_id) ?>"><i class="fas fa-check"></i>Submit Assessment</a>
              <?php } else { ?>
                <!-- Assessment Incompleted -->
                <div class="progress mb-3 h-50 rounded">
                  <div class="progress-bar bg-gray" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <span class="">Assessment Incompleted</span>
                  </div>
                </div>

                <a type="submit" class="btn btn-sm btn-primary w-100" id="mark_assessement_complete_model" href="<?= site_url('../admin/candidate/assessment/index/' . $batch->b_id) ?>"><i class="fas fa-check"></i>Complete Assessment</a>


              <?php }  ?>
            <?php } else { ?>
              <!-- Traing Not Completed -->
              <div class="progress mb-3 h-50 rounded">
                <div class="progress-bar bg-gray" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                  <span class="">Please Complete the training first.</span>
                </div>
              </div>
            <?php }  ?>

          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <!-- Save -->
    <div class="col-sm-4">
      <form role="form" action="<?php echo site_url('../admin/candidate/batch/addStudentsToBatch/' . $batch->b_id) ?>" method="post" id="save_type_form" enctype="multipart/form-data">
        <?php echo form_hidden('b_id', $batch->b_id) ?>
        <div class="card">
          <div class="card-header bg-dark">
            <h3 class="card-title"><i class="fa fa-plus"></i> <?php echo $subtitle; ?></h3>
          </div>
          <div class="card-body">
            <table width="100%" class="datatable_search_only table table-striped table-bordered table-hover table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th><?php echo ('Candidate ID') ?></th>
                  <th><?php echo ('Candidate Name') ?></th>
                  <!-- TODO:Remove Extra Fields, FIX UI, Check checkbox -->
                  <!-- <th><?php echo ('Action') ?></th> -->
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($not_enrolled_students)) { ?>
                  <?php $sl = 1; ?>
                  <?php foreach ($not_enrolled_students as $student) { ?>
                    <tr>
                      <td>
                        <div class="form-groupp d-flex justify-content-center align-items-center">
                          <div class="select">
                            <input name="students[]" class="js-student-not-enrolled form-control ml-1 mr-1" type="checkbox" value="<?php echo $student->c_id; ?>">
                          </div>
                        </div>
                      </td>
                      <td><?php echo $student->c_cand_id ?></td>
                      <td><?php echo $student->c_full_name ?></td>
                    </tr>
                    <?php $sl++; ?>
                  <?php } ?>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer clearfix">
            <?php
            if (!$batch->b_training_completed) {
            ?>
              <button type="submit" name="save" value="add_students" class="float-right form-control-sm btn btn-primary btn-sm "><i class="fa fa-plus">
                  &nbsp;<?php echo ('Add Students To Batch'); ?></i></button>
            <?php
            } else {
            ?>
              <button disabled class="float-right form-control-sm btn btn-primary btn-sm "><i class="fa fa-plus">
                  &nbsp;<?php echo ('Add Students To Batch'); ?></i></button>
            <?php
            }
            ?>
          </div>
        </div>
      </form>
    </div>

    <div class="col-sm-8">
      <form role="form" action="<?php echo site_url('../admin/candidate/batch/removeStudentsFromBatch/' . $batch->b_id) ?>" method="post" id="save_type_form" enctype="multipart/form-data">
        <?php echo form_hidden('b_id', $batch->b_id) ?>
        <div class="card">
          <div class="card-header bg-dark">
            <h3 class="card-title"><i class="fa fa-list"></i> Existing Batch Students</h3>
          </div>
          <div class="card-body">
            <table width="100%" class="datatable_colvis table table-striped table-bordered table-hover table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th><?php echo ('Candidate ID') ?></th>
                  <th><?php echo ('Candidate Name') ?></th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($enrolled_students)) { ?>
                  <?php $sl = 1; ?>
                  <?php foreach ($enrolled_students as $student) { ?>
                    <tr>
                      <td>
                        <div class="form-groupp d-flex justify-content-center align-items-center">
                          <div class="select">
                            <input name="bsm_c_ids[]" class="js-student-id form-control ml-1 mr-1" id="bsm_c_id" type="checkbox" value="<?php echo $student->bsm_c_id; ?>" />
                            <input name="bsm_ids[]" class="js-batch-mapping-id d-none" id="bsm_id" type="checkbox" value="<?php echo $student->bsm_id; ?>" />
                          </div>
                        </div>
                      </td>
                      <td><?php echo $student->c_cand_id ?></td>
                      <td><?php echo $student->c_full_name ?></td>
                    </tr>
                    <?php $sl++; ?>
                  <?php } ?>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!--  -->
          <?php
          if (!$batch->b_training_completed) {
          ?>
            <div class="card-footer">
              <button type="submit" name="save" value="add_students" class="float-right form-control-sm btn btn-warning btn-sm "><i class="fa fa-plus" data-toggle="tooltip" title="Removing students form the batch will delete all record of that student like Assessment, Certificate, Placement and Tracking Details.">
                  &nbsp;<?php echo ('Remove Student From Batch'); ?></i></button>
            </div>
          <?php
          } else {
          ?>
            <div class="card-footer">
              <button disabled name="save" value="add_students" class="float-right form-control-sm btn btn-warning btn-sm "><i class="fa fa-plus">
                  &nbsp;<?php echo ('Remove Student From Batch'); ?></i></button>
            </div>
          <?php

          }
          ?>
        </div>
      </form>
    </div>
  </div>
</section>




<script>
  var objBatch = (
    function() {
      var arrobjEnrolledStudent = 0;
      var STUDENTS_PER_BATCH_LIMIT = 0;
      var showWarningMessage = '';

      var init = function() {

        $('[data-toggle="tooltip"]').tooltip();

        // On Selecting Student that you want to be added
        $('input[class=js-student-not-enrolled]').off('change').on('change', function(e) {
          // Exising + checked <= Limit === TRUE then allow Check 

          if ((objBatch.arrobjEnrolledStudent.length + $('input[class=js-student-not-enrolled]:checked')
              .length) <= objBatch.STUDENTS_PER_BATCH_LIMIT) {
            if ($(this).prop('checked') == true) {
              $(this).prop('checked', true);
            } else {
              $(this).prop('checked', false);
            }
          } else {
            alert('You have selected more candidate then allowed per batch.')
            $(this).prop('checked', false);
          }
        });

        // Toggle Checkbox of bsm_id(Mapping) with bsm_c_id(candidate)
        $('input[class=js-student-id]').off('change').on('change', function(e) {
          //  debugger , input[class=js-batch-mapping-id]
          if ($(this).prop('checked') == true) {
            $(this).siblings('input#bsm_id.js-batch-mapping-id').prop('checked', true);
          } else {
            $(this).siblings('input#bsm_id.js-batch-mapping-id').prop('checked', false);
          }
        });

        // Show Warning
        if (objBatch.showWarningMessage != '') {
          $(document).Toasts('create', {
            class: 'bg-warning',
            title: 'Removing Student From Batch',
            subtitle: '',
            autohide: true,
            delay: 5000,
            body: 'Removing students form the batch will delete all record of that student like Assessment, Certificate, Placement and Tracking Details.'
          })
        }
      }

      return {
        init: init,
        arrobjEnrolledStudent: arrobjEnrolledStudent,
        STUDENTS_PER_BATCH_LIMIT: STUDENTS_PER_BATCH_LIMIT,
        showWarningMessage: showWarningMessage
      };
    }
  )();
  $('document').ready(function() {

    // Prepare data
    objBatch.STUDENTS_PER_BATCH_LIMIT = <?php echo $STUDENTS_PER_BATCH_LIMIT; ?>;
    objBatch.arrobjEnrolledStudent = <?php echo json_encode($enrolled_students) ?>;
    objBatch.showWarningMessage = <?php echo json_encode($warning_msg) ?>;

    // Initialization
    objBatch.init();
  });
</script>