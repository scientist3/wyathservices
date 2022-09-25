<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-sm-12 pb-2">
      <a href="<?php echo base_url("admin/candidate/batch/view/$batch->b_id") ?>" class="btn btn-md btn-success"><i class="fa fa-arrow-left"></i> Return to Batch</a>
    </div>
  </div>
  <div class="row">
    <!-- Display -->
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header bg-dark">
          <h3 class="card-title">
            <i class="fa fa-list"></i> Add/Update Placement
          </h3>
        </div>
        <div class="card-body">
          <table width="100%" class="datatable_colvis table table-striped table-bordered table-hover table-sm">
            <thead>
              <tr>
                <th><?php echo ('Unique Id') ?></th>
                <th><?php echo ('Candidate Name') ?></th>
                <th><?php echo ('Training Status') ?></th>
                <th><?php echo ('Assessment Status') ?></th>
                <th><?php echo ('Assessment Percentage') ?></th>
                <th><?php echo ('Certified') ?></th>
                <th><?php echo ('Action') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($student_placement_details)) { ?>
                <?php $sl = 1; ?>
                <?php foreach ($student_placement_details as $student) { ?>
                  <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo $student->c_full_name; ?></td>
                    <td>
                      <div class="badge badge-<?php echo $student->c_training_status == 1 ? "success" : "danger"; ?> p-2">
                        <?php echo ($student->c_training_status != null) ? $training_status_list[$student->c_training_status] : "NA"; ?>
                      </div>
                    </td>
                    <td>
                      <div class="badge badge-<?php echo $student->bsm_assessment_status == 1 ? "success" : "danger"; ?> p-2">
                        <?php echo ($student->bsm_assessment_status != null) ? $assessment_status_list[$student->bsm_assessment_status] : "NA"; ?>
                      </div>
                    </td>
                    <td><?php echo $student->bsm_assessment_percentage; ?></td>
                    <td>
                      <div class="badge badge-<?php echo $student->cer_certified == 1 ? "success" : "danger"; ?> p-2">
                        <?php echo ($student->cer_certified != null) ? $yes_no_list[$student->cer_certified] : "NA"; ?>
                      </div>
                    </td>
                    <td>
                      <?php
                      $boolIsAdd = ($student->bsm_pd_id == null) || empty($student->bsm_pd_id);
                      ?>
                      <a href="<?php echo base_url("admin/candidate/placement/create/$batch->b_id/$student->bsm_id/$student->bsm_pd_id") ?>" class="btn btn-sm btn-<?php echo ($boolIsAdd) ? 'success' : 'warning'; ?>"><i class="fa fa-<?php echo ($boolIsAdd) ? 'plus' : 'edit'; ?>"></i> <?php echo ($boolIsAdd) ? 'Add' : 'Update'; ?></a>
                    </td>
                  </tr>
                  <?php $sl++; ?>
                <?php } ?>
              <?php } ?>
            </tbody>
          </table> <!-- /.table-responsive -->
        </div>
      </div>
    </div>
  </div>
</section>

<!-- jQuery -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/') ?>plugins/jquery/jquery.min.js"></script>