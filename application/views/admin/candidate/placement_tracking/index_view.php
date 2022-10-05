<section class="content">
  <div class="row">
    <div class="col-sm-12 pb-2">
      <a href="<?php echo base_url("admin/candidate/batch/view/$batch->b_id") ?>" class="btn btn-md btn-success"><i class="fa fa-arrow-left"></i> Return to Batch</a>
    </div>
  </div>
  <div class="row">
    <!-- Student Placement Tracking Details -->
    <div class="col-md-12 col-sm-12">
      <?php echo validation_errors(); ?>
      <form role="form" action="<?php echo site_url('../admin/candidate/placementtracking/index/' . $batch->b_id) ?>" method="post" id="update_student_placement_tracking_details_form">
        <!-- Batch ID -->
        <?php echo form_hidden('b_id', $batch->b_id)
        ?>
        <div class="card">
          <div class="card-header bg-dark">
            <h3 class="card-title"><i class="fa fa-list"></i> Student Certificate Details</h3>
          </div>
          <div class="card-body">
            <table width="100%" class="datatable_colvisw table table-striped table-bordered table-hover table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th><?php echo ('Candidate ID') ?></th>
                  <th><?php echo ('Candidate Name') ?></th>
                  <th><?php echo ('Placement Tracking Status 1') ?></th>
                  <th><?php echo ('Placement Tracking Date 1') ?></th>
                  <th><?php echo ('Placement Tracking Status 2') ?></th>
                  <th><?php echo ('Placement Tracking Date 2') ?></th>
                  <th><?php echo ('Placement Tracking Status 3') ?></th>
                  <th><?php echo ('Placement Tracking Date 3') ?></th>
                </tr>
              </thead>
              <tbody>
                <? //= dd($student_placement_tracking_details[0]); 
                ?>
                <?php if (valArr($student_placement_tracking_details)) { ?>
                  <?php $sl = 1; ?>
                  <?php foreach ($student_placement_tracking_details as $student) { ?>
                    <tr>
                      <!-- cer_id cer_cer_id cer_agency cer_certified cer_date cer_certificate_issued cer_certificate_no -->
                      <td>
                        <?php echo $sl ?>

                        <input name="ptd_id[<?= $student->bsm_c_id ?>]" class="form-control <?= $input_height ?>" type="hidden" value="<?php echo $student->ptd_id ?>">

                        <input name="bsm_id[<?= $student->bsm_c_id ?>]" class="form-control <?= $input_height ?>" type="hidden" value="<?php echo $student->bsm_id ?>">
                      </td>
                      <td><?php echo $student->c_cand_id ?></td>
                      <td><?php echo $student->c_full_name ?></td>

                      <!-- PT Status 1 -->
                      <td>
                        <?php echo form_dropdown('ptd_status_1[' . $student->bsm_c_id . ']', $yes_no_list, $student->ptd_status_1, 'class="form-control ' . $input_height . ' ' . (form_error("ptd_status_1[" . $student->bsm_c_id . "]") ? 'is-invalid' : null) .  '" '); ?>
                      </td>
                      <!-- PT Date 1 -->
                      <td>
                        <input name="ptd_date_1[<?= $student->bsm_c_id; ?>]" class="form-control <?= $input_height . " " . (form_error("ptd_date_1[" . $student->bsm_c_id . "]") ? "is-invalid" : null);  ?>" type="date" placeholder="<?php echo ('Date') ?>" id="ptd_date_1_<?= $student->bsm_c_id; ?>" value="<?php echo $student->ptd_date_1 ?>">
                      </td>


                      <!-- PT Status 2 -->
                      <td>
                        <?php echo form_dropdown('ptd_status_2[' . $student->bsm_c_id . ']', $yes_no_list, $student->ptd_status_2, 'class="form-control ' . $input_height . ' ' . (form_error("ptd_status_2[" . $student->bsm_c_id . "]") ? 'is-invalid' : null) .  '" '); ?>
                      </td>
                      <!-- PT Date 2 -->
                      <td>
                        <input name="ptd_date_2[<?= $student->bsm_c_id; ?>]" class="form-control <?= $input_height . " " . (form_error("ptd_date_2[" . $student->bsm_c_id . "]") ? "is-invalid" : null);  ?>" type="date" placeholder="<?php echo ('Date') ?>" id="ptd_date_2_<?= $student->bsm_c_id; ?>" value="<?php echo $student->ptd_date_2 ?>">
                      </td>



                      <!-- PT Status 3 -->
                      <td>
                        <?php echo form_dropdown('ptd_status_3[' . $student->bsm_c_id . ']', $yes_no_list, $student->ptd_status_3, 'class="form-control ' . $input_height . ' ' . (form_error("ptd_status_3[" . $student->bsm_c_id . "]") ? 'is-invalid' : null) .  '" '); ?>
                      </td>
                      <!-- PT Date 3 -->
                      <td>
                        <input name="ptd_date_3[<?= $student->bsm_c_id; ?>]" class="form-control <?= $input_height . " " . (form_error("ptd_date_3[" . $student->bsm_c_id . "]") ? "is-invalid" : null);  ?>" type="date" placeholder="<?php echo ('Date') ?>" id="ptd_date_3_<?= $student->bsm_c_id; ?>" value="<?php echo $student->ptd_date_3 ?>">
                      </td>
                    </tr>
                    <?php $sl++; ?>
                  <?php } ?>
                <?php } else { ?>
                  <tr>
                    <td colspan="9">No Student Available</td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!--  -->
          <div class="card-footer">
            <button type="submit" name="update_student_placement_tracking_details_form" value="update_student_placement_tracking_details" class="float-right form-control-sm btn btn-warning btn-sm ">
              <i class="fa fa-edit"> &nbsp;<?php echo ('Save/Update'); ?></i>
            </button>
          </div>

        </div>
      </form>
    </div>

  </div>
</section>

<script>
  var objCertificate = (
    function() {
      var certificate_status;
      var init = function() {
        // Show Info message
        if (objCertificate.certificate_status.status == 1) {
          $(document).Toasts('create', {
            class: 'bg-info',
            title: 'Assessment Status',
            subtitle: '',
            autohide: true,
            delay: 5000,
            body: objCertificate.certificate_status.message
          })
        }
      }

      return {
        init: init,
        certificate_status: certificate_status,
      };
    }
  )();

  $('document').ready(function() {
    // Prepare data
    // objCertificate.certificate_status = < ?php echo json_encode($certificate_status); ?>
    // Initialization
    // objCertificate.init();
  });
</script>