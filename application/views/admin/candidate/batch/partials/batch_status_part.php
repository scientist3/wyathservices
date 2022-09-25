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
        <!-- Training Status -->
        <div class="col-sm-4 col-md-3">
          <?php if ($batch->b_training_completed == 1) { ?>
            <div class="row">
              <div class="col-sm-12">
                <div class="progress mb-3 rounded">
                  <div class="progress-bar bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <span class="">Training Completed</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <a type="submit" class="btn btn-sm btn-primary w-100" id="mark_assessement_complete_model" href="<?= site_url('../admin/candidate/batch/training/' . $batch->b_id) ?>"><i class="fas fa-edit"></i> Update Training</a>
              </div>
            </div>
          <?php } else { ?>
            <div class="row">
              <div class="col-sm-12">
                <div class="progress mb-3 rounded">
                  <div class="progress-bar bg-gray" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <span class="">Training Incompleted</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                <a type="submit" class="btn btn-sm btn-primary w-100" id="mark_assessement_complete_model" href="<?= site_url('../admin/candidate/batch/training/' . $batch->b_id) ?>"><i class="fas fa-check"></i> Submit Training</a>
              </div>
            </div>

          <?php }  ?>
        </div>

        <!-- Assessment Status -->
        <div class="col-sm-4 col-md-3">
          <!-- Traing Completed -->
          <?php if ($batch->b_training_completed == 1) { ?>
            <!-- Assessment Completed -->
            <?php if ($batch->b_assessment_completed == 1) { ?>
              <div class="row">
                <div class="col-sm-12">
                  <div class="progress mb-3 rounded">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                      <span class="">Assessment Completed</span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <a type="submit" class="btn btn-sm btn-primary w-100" id="mark_assessement_complete_model" href="<?= site_url('../admin/candidate/assessment/index/' . $batch->b_id) ?>"><i class="fas fa-edit"></i> Update Assessment</a>
                </div>
              </div>
            <?php } else { ?>
              <!-- Assessment Incompleted -->
              <div class="row">
                <div class="col-sm-12">
                  <div class="progress mb-3 rounded">
                    <div class="progress-bar bg-gray" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                      <span class="">Assessment Incompleted</span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <a type="submit" class="btn btn-sm btn-primary w-100" id="mark_assessement_complete_model" href="<?= site_url('../admin/candidate/assessment/index/' . $batch->b_id) ?>"><i class="fas fa-check"></i> Complete Assessment</a>
                </div>
              </div>
            <?php }  ?>
          <?php } else { ?>
            <!-- Traing Not Completed -->
            <div class="row">
              <div class="col-sm-12">
                <div class="progress mb-3 rounded">
                  <div class="progress-bar bg-gray" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <span class="">Please Complete the training first.</span>
                  </div>
                </div>
              </div>
            </div>
          <?php }  ?>
        </div>
        <!-- < ?= dd($batch); ?> -->

        <!-- Certificate Status -->
        <div class="col-sm-4 col-md-3">
          <!-- Certificate Completed -->
          <?php if ($batch->b_training_completed == 1 && $batch->b_assessment_completed == 1) { ?>
            <?php if ($certificate_status->status == 1) { ?>
              <div class="progress mb-3 rounded">
                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                  <span class="">Certificate Completed</span>
                </div>
              </div>
              <a type="submit" class="btn btn-sm btn-primary w-100" id="mark_assessement_complete_model" href="<?= site_url('../admin/candidate/certificate/index/' . $batch->b_id) ?>"><i class="fas fa-edit"></i> Update Certificate Details</a>
            <?php } else { ?>
              <div class="progress mb-3 rounded">
                <div class="progress-bar bg-gray" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                  <span class="">Certificate Incompleted</span>
                </div>
              </div>
              <a type="submit" class="btn btn-sm btn-primary w-100" id="mark_assessement_complete_model" href="<?= site_url('../admin/candidate/certificate/index/' . $batch->b_id) ?>"><i class="fas fa-check"></i> Submit Certificate Details</a>
            <?php } ?>
          <?php } else { ?>
            <!-- Traing Not Completed -->
            <div class="progress mb-3 rounded">
              <div class="progress-bar bg-gray" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                <span class="">Please Complete the Assessment first.</span>
              </div>
            </div>
          <?php }  ?>

        </div>

        <!-- Placement Status -->
        <div class="col-sm-4 col-md-3">
          <!-- Placement Completed -->
          <?php if ($batch->b_training_completed == 1 && $batch->b_assessment_completed == 1 && $certificate_status->status == 1 && 1) { ?>
            <div class="progress mb-3 rounded">
              <div class="progress-bar bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                <span class="">Placement Completed</span>
              </div>
            </div>
            <a type="submit" class="btn btn-sm btn-primary w-100" id="mark_assessement_complete_model" href="<?= site_url('../admin/candidate/placement/index/' . $batch->b_id) ?>"><i class="fas fa-edit"></i> Update Placement</a>
          <?php } else { ?>
            <!-- Traing Not Completed -->
            <div class="progress mb-3 rounded">
              <div class="progress-bar bg-gray" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                <span class="">Please Complete the Certificate first.</span>
              </div>
            </div>
          <?php }  ?>

        </div>

        <!-- Placement Tracking Status -->
        <div class="col-sm-4 col-md-3">
          <!-- Traing Completed -->
          <?php if ($batch->b_training_completed == 1) { ?>
            <!-- Assessment Completed -->
            <?php if ($batch->b_assessment_completed == 1) { ?>
              <div class="progress mb-3 rounded">
                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                  <span class="">Placement Tracking Completed</span>
                </div>
              </div>
              <a type="submit" class="btn btn-sm btn-primary w-100" id="mark_assessement_complete_model" href="<?= site_url('../admin/candidate/assessment/index/' . $batch->b_id) ?>"><i class="fas fa-check"></i>Submit Assessment</a>
            <?php } else { ?>
              <!-- Assessment Incompleted -->
              <div class="progress mb-3 rounded">
                <div class="progress-bar bg-gray" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                  <span class="">Placement Tracking Incompleted</span>
                </div>
              </div>

              <a type="submit" class="btn btn-sm btn-primary w-100" id="mark_assessement_complete_model" href="<?= site_url('../admin/candidate/assessment/index/' . $batch->b_id) ?>"><i class="fas fa-check"></i>Complete Assessment</a>

            <?php }  ?>
          <?php } else { ?>
            <!-- Traing Not Completed -->
            <div class="progress mb-3 rounded">
              <div class="progress-bar bg-gray" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                <span class="">Please complete the Placement Details.</span>
              </div>
            </div>
          <?php }  ?>

        </div>


      </div>
    </div>
  </div>
</div>