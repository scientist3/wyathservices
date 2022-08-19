<!-- Main content -->
<section class="content">
  <!-- Warnings -->
  <?php if ($this->session->flashdata('warning') != null) {  ?>
  <div class="alert alert-warning alert-dismissable is-invalid">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <?php echo $this->session->flashdata('warning'); ?>
  </div>
  <?php } ?>

  <!--  -->
  <div class="col-md-12">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">
          <i class="fas fa-bullhorn float-sm-left"></i>
          Training Status
          <div class="row mt-3">
            <span class="badge bg-info rounded-pill float-right">Training Status :
              <?php if ($batch->b_training_completed)
                echo "Completed";
              else
                echo "Not Compeleted";
              ?>
            </span>
            &nsc;&nabla;
            <span class="badge bg-secondry rounded-pill float-right">Assesment Status : Not Completed</span>
            &nshortmid;
            <span class="badge bg-secondry rounded-pill float-right">Students in
              Batch:<?php print(count($enrolled_students)) ?>
            </span>
          </div>
        </h3>
      </div>

      <div class="card-body">
        <div class="row-sm-4">
          <div class="callout callout-info">
            <h5>Batch Training Status!</h5>
            <div class="row">
              <p>
                <button type="button" class="btn btn-primary m-3" data-toggle="modal"
                  data-target="#completetraining_model">
                  Complete Training
                </button>
              </p>
              <p>
                <button type="button" class="btn btn-primary m-3" data-toggle="modal"
                  data-target="#completetraining_model">
                  Complete Assesment
                </button>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- compelete training model -->

  <div class="modal fade" id="completetraining_model" tabindex="-1" role="dialog"
    aria-labelledby="completetraining_model" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Training Status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo site_url('../admin/candidate/batch/batchcompletereqest') ?>">
            <input type="hidden" name="b_id" value="<?php echo $batch->b_id ?>">
            <input type="hidden" name="studentlist[]" value="<?php print_r($enrolled_students) ?>">
            Do you want to change batch training status to training completed
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Update Status</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- end -->
  <!-- info message  for batch complete-->
  <div id="accordion">

    <div class="card card-info">
      <div class="card-header">
        <h4 class="card-title w-100">
          <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false">
            Batch Training Has been Completed You Can,t Add Or Remove Students
          </a>
        </h4>
      </div>
      <div id="collapseThree" class="collapse" data-parent="#accordion">
        <div class="card-body">
          In case if You Want to Remove Change Batch Training Status To Not Completed
        </div>
      </div>
    </div>
  </div>

  <!-- end -->

  <div class="row">
    <!-- Save -->
    <div class="col-sm-4">
      <form role="form" action="<?php echo site_url('../admin/candidate/batch/addStudentsToBatch/' . $batch->b_id) ?>"
        method="post" id="save_type_form" enctype="multipart/form-data">
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
                    <div class="form-group">
                      <div class="">
                        <input name="students[]" class="js-student-not-enrolled" type="checkbox"
                          value="<?php echo $student->c_id; ?>">
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
            <button type="submit" name="save" value="add_students"
              class="float-right form-control-sm btn btn-primary btn-sm "><i class="fa fa-plus">
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
      <form role="form"
        action="<?php echo site_url('../admin/candidate/batch/removeStudentsFromBatch/' . $batch->b_id) ?>"
        method="post" id="save_type_form" enctype="multipart/form-data">
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
                    <div class="form-group">
                      <div class="select">
                        <input name="bsm_c_ids[]" class="js-student-id" id="bsm_c_id" type="checkbox"
                          value="<?php echo $student->bsm_c_id; ?>" />
                        <input name="bsm_ids[]" class="js-batch-mapping-id d-none" id="bsm_id" type="checkbox"
                          value="<?php echo $student->bsm_id; ?>" />
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
            <button type="submit" name="save" value="add_students"
              class="float-right form-control-sm btn btn-warning btn-sm "><i class="fa fa-plus">
                &nbsp;<?php echo ('Remove Student From Batch'); ?></i></button>
          </div>
          <?php
          } else {
          ?>
          <div class="card-footer">
            <button disabled name="save" value="add_students"
              class="float-right form-control-sm btn btn-warning btn-sm "><i class="fa fa-plus">
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

    var init = function() {

      // On Selecting Student that you want to be added
      $('input[class=js-student-not-enrolled]').off('change').on('change', function(e) {
        // Exising + checked <= Limit === TRUE then allow Check 
        if ((objBatch.arrobjEnrolledStudent.length + $('input[class=js-student-not-enrolled]:checked')
            .length) <= objBatch.STUDENTS_PER_BATCH_LIMIT) {
          $(this).prop('checked', true);
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
    }

    return {
      init: init,
      arrobjEnrolledStudent: arrobjEnrolledStudent,
      STUDENTS_PER_BATCH_LIMIT: STUDENTS_PER_BATCH_LIMIT
    };
  }
)();
$('document').ready(function() {
  // Prepare data
  objBatch.STUDENTS_PER_BATCH_LIMIT = <?php echo $STUDENTS_PER_BATCH_LIMIT; ?>;
  objBatch.arrobjEnrolledStudent = <?php echo json_encode($enrolled_students) ?>;

  // Initialization
  objBatch.init();
});
</script>