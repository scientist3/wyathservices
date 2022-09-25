<section class="content">
  <div class="row">
    <div class="col-sm-12 pb-2">
      <a href="<?php echo base_url("admin/candidate/batch/view/$batch->b_id") ?>" class="btn btn-md btn-success"><i class="fa fa-arrow-left"></i> Return to Batch</a>
    </div>
  </div>
  <div class="row">

    <!-- Student training Details -->
    <div class="col-md-12 col-sm-12">
      <?php echo validation_errors(); ?>
      <form role="form" action="<?php echo site_url('../admin/candidate/batch/training/' . $batch->b_id) ?>" method="post" id="update_student_training">
        <!-- Batch ID -->
        <?php echo form_hidden('b_id', $batch->b_id)
        ?>
        <div class="card">
          <div class="card-header bg-dark">
            <h3 class="card-title"><i class="fa fa-list"></i> Student training Details</h3>
          </div>
          <div class="card-body">
            <table width="100%" class="datatable_colvisw table table-striped table-bordered table-hover table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th><?php echo ('Candidate ID') ?></th>
                  <th><?php echo ('Candidate Name') ?></th>
                  <th><?php echo ('Training Status') ?></th>
                </tr>
              </thead>
              <tbody>
                <?php if (valArr($student_training_details)) { ?>
                  <?php $sl = 1; ?>
                  <?php foreach ($student_training_details as $student) { ?>
                    <tr>
                      <td>
                        <?php echo $sl ?>
                      </td>
                      <td><?php echo $student->c_cand_id ?></td>
                      <td><?php echo $student->c_full_name ?></td>
                      <td>
                        <?php echo form_dropdown('c_training_status[' . $student->bsm_c_id . ']', $training_status_list, $student->c_training_status, 'class="form-control js-training-status-dropdown ' . $input_height . ' ' . (form_error("c_training_status[" . $student->bsm_c_id . "]") ? 'is-invalid' : null) . ' " id="c_training_status_' . $student->bsm_c_id . '"'); ?>
                        <?php echo form_error("c_training_status[' . $student->bsm_c_id . ']"); ?>
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
            <button type="submit" name="update_student_training_details_form" value="update_student_training_details" class="float-right form-control-sm btn btn-warning btn-sm "><i class="fa fa-edit">
                &nbsp;<?php echo ('Update'); ?></i></button>
          </div>

        </div>
      </form>
    </div>

  </div>
</section>

<script>
  var objTraining = (
    function() {
      var training_status;
      var init = function() {

        // Show Info message
        if (objTraining.training_status.status == 1) {
          $(document).Toasts('create', {
            class: 'bg-info',
            title: 'Assessment Status',
            subtitle: '',
            autohide: true,
            delay: 5000,
            body: objTraining.training_status.message
          })
        } else {
          $(document).Toasts('create', {
            class: 'bg-info',
            title: 'Assessment Status',
            subtitle: '',
            autohide: true,
            delay: 5000,
            body: objTraining.training_status.message
          })
        }
      }

      return {
        init: init,
        training_status: training_status,
      };
    }
  )();

  $('document').ready(function() {
    // Prepare data
    objTraining.training_status = <?php echo json_encode($training_status); ?>
    // Initialization
    objTraining.init();
  });
</script>