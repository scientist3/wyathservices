<section class="content">
  <div class="row">
    <div class="col-sm-12 pb-2">
      <a href="<?php echo base_url("admin/candidate/batch/view/$batch->b_id") ?>" class="btn btn-md btn-success"><i
          class="fa fa-arrow-left"></i> Return to Batch</a>
    </div>
  </div>
  <div class="row">
    <!-- Student Certificate Details -->
    <div class="col-md-12 col-sm-12">
      <?php echo validation_errors(); ?>
      <form role="form" action="<?php echo site_url('../admin/candidate/certificate/index/' . $batch->b_id) ?>"
        method="post" id="update_student_certificate_details_form">
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
                  <th><?php echo ('Certificate ID') ?></th>
                  <th><?php echo ('Agency') ?></th>
                  <th><?php echo ('Certified') ?></th>
                  <th><?php echo ('Date') ?></th>
                  <th><?php echo ('Name of the Certificate Issued') ?></th>
                  <th><?php echo ('Certficate No') ?></th>
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
                    <input name="cer_id[<?= $student->bsm_c_id ?>]" class="form-control <?= $input_height ?>"
                      type="hidden" value="<?php echo $student->cer_id ?>">

                    <input name="bsm_id[<?= $student->bsm_c_id ?>]" class="form-control <?= $input_height ?>"
                      type="hidden" value="<?php echo $student->bsm_id ?>">
                  </td>
                  <td><?php echo $student->c_cand_id ?></td>
                  <td><?php echo $student->c_full_name ?></td>
                  <!-- Certificate ID -->
                  <td>
                    <input name="cer_cer_id[<?= $student->bsm_c_id; ?>]"
                      class="form-control <?= $input_height . " " . (form_error("cer_cer_id[" . $student->bsm_c_id . "]") ? "is-invalid" : null);  ?>"
                      type="text" placeholder="<?php echo ('Certificate ID') ?>"
                      id="cer_cer_id_<?= $student->bsm_c_id; ?>" value="<?php echo $student->cer_cer_id ?>">
                  </td>
                  <!-- Certificate Agency -->
                  <td>
                    <input name="cer_agency[<?= $student->bsm_c_id; ?>]"
                      class="form-control <?= $input_height . " " . (form_error("cer_agency[" . $student->bsm_c_id . "]") ? "is-invalid" : null);  ?>"
                      type="text" placeholder="<?php echo ('Agency') ?>" id="cer_agency_<?= $student->bsm_c_id; ?>"
                      value="<?php echo $student->cer_agency ?>">
                  </td>
                  <!-- Certificate Agency -->
                  <td>
                    <?php echo form_dropdown('cer_certified[' . $student->bsm_c_id . ']', $yes_no_list, $student->cer_certified, 'class="form-control ' . $input_height . ' ' . (form_error("cer_certified[" . $student->bsm_c_id . "]") ? 'is-invalid' : null) .  '" '); ?>
                  </td>
                  <td>
                    <input name="cer_date[<?= $student->bsm_c_id; ?>]"
                      class="form-control <?= $input_height . " " . (form_error("cer_date[" . $student->bsm_c_id . "]") ? "is-invalid" : null);  ?>"
                      type="date" placeholder="<?php echo ('Date') ?>" id="cer_date_<?= $student->bsm_c_id; ?>"
                      value="<?php echo $student->cer_date ?>">
                  </td>
                  <td>
                    <input name="cer_certificate_issued[<?= $student->bsm_c_id; ?>]"
                      class="form-control <?= $input_height . " " . (form_error("cer_certificate_issued[" . $student->bsm_c_id . "]") ? "is-invalid" : null);  ?>"
                      type="text" placeholder="<?php echo ('Certificate Name') ?>"
                      id="cer_certificate_issued_<?= $student->bsm_c_id; ?>"
                      value="<?php echo $student->cer_certificate_issued ?>">
                  </td>
                  <td>
                    <input name="cer_certificate_no[<?= $student->bsm_c_id; ?>]"
                      class="form-control <?= $input_height . " " . (form_error("cer_certificate_no[" . $student->bsm_c_id . "]") ? "is-invalid" : null);  ?>"
                      type="text" placeholder="<?php echo ('Certificate Number') ?>"
                      id="cer_certificate_no_<?= $student->bsm_c_id; ?>"
                      value="<?php echo $student->cer_certificate_no ?>">
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
            <button type="submit" name="update_student_assessment_details_form"
              value="update_student_assessment_details" class="float-right form-control-sm btn btn-warning btn-sm ">
              <i class="fa fa-edit"> &nbsp;<?php echo ('Update'); ?></i>
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
  objCertificate.certificate_status = <?php echo json_encode($certificate_status); ?>
  // Initialization
  objCertificate.init();
});
</script>