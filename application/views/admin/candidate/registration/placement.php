<!-- Main content -->
<section class="content">
  <div class="col-sm-12">
    <!-- ?php echo site_url('admin/aboutus/create') ?> -->
    <!-- ?php echo site_url('admin/boardmembers/create') ?> -->
      <form role="form" action="<?php echo site_url('../admin/candidate/registration/placement') ?>" method="post" id="save_type_form" enctype="multipart/form-data">
        <div class="card">
          <div class="card-header bg-dark">
            <h3 class="card-title"><i class="fa fa-plus"></i> <?php echo $subtitle; ?></h3>
          </div>
          <div class="card-body">
            <div class="row">

            <!-- salutation -->
              <div class="col-md-12">
                <?php //echo form_hidden('ab_id', $input->ab_id) ?>
                <div class="row">
                <div class="input-group mb-1">


          </div>
            <!-- salutation end-->

            <!-- Fullname -->
            <!-- Gender -->
            <!-- Dateofbirth -->
            <div class="col-sm-3">
                  <div class="form-group">
                  <label for="placementstatus"><?php echo ('Placement Status'); ?></label> <small class="req"></small>
                  <?php echo form_dropdown('placementstatus', $placementstatus, 0/*$user->user_role*/, 'class="form-control" name="placementstatus" '); ?>
                  </div>
                </div>
            <div class="col-sm-4">
                  <div class="form-group">
                  <label for="employmenttype"><?php echo ('Employment Type'); ?></label> <small class="req"> *</small>
                  <input name="employmenttype" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Employment Type') ?>" id="employmenttype" style="padding:18px;" value="<?php //echo $input->ab_employmenttype; ?>" >
                  </div>
                </div>

                <div class="col-sm-5">
                  <div class="form-group">
                  <label for="apprenticeship"><?php echo ('Apprentice Ship'); ?></label> <small class="req"> *</small>
                  <input name="apprenticeship" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Apprentice Ship') ?>" id="apprenticeship" style="padding:18px;" value="<?php //echo $input->ab_apprenticeship; ?>" >
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                  <label for="UFSfECFC"><?php echo ('Undertaking For SelfEmployed Collected From Candidate'); ?></label> <small class="req"> *</small>
                  <input name="UFSfECFC" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Undertaking For SelfEmployed Collected From Candidate') ?>" id="UFSfECFC" style="padding:18px;" value="<?php //echo $input->ab_UFSfECFC; ?>" >
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                  <label for="POUSEOFHSP"><?php echo ('Proof Of Upskilling SelfEmployed Opted For Higher Studies Provided'); ?></label> <small class="req"> *</small>
                  <input name="POUSEOFHSP" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Proof Of Upskilling SelfEmployed Opted For Higher Studies Provided') ?>" id="POUSEOFHSP" style="padding:18px;" value="<?php //echo $input->ab_POUSEOFHSP; ?>" >
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                  <label for="typeofproof"><?php echo ('Type Of Proof'); ?></label> <small class="req"> *</small>
                  <input name="typeofproof" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Type Of Proof') ?>" id="typeofproof" style="padding:18px;" value="<?php //echo $input->ab_typeofproof; ?>" >
                  </div>
                </div>


                <div class="col-sm-2">
                  <div class="form-group">
                  <label for="dateofjoining"><?php echo ('Date of Joining'); ?></label> <small class="req"> *</small>
                  <input type="date" name="dateofjoining" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Date od Joining ') ?>" id="dateofjoining" style="padding:18px;" value="<?php //echo $input->ab_fullname; ?>" >
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                  <label for="employername"><?php echo ('Employer Name'); ?></label> <small class="req"> *</small>
                  <input name="employername" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Employer Name') ?>" id="employername" style="padding:18px;" value="<?php //echo $input->ab_fullname; ?>" >
                  </div>
                </div>



                <div class="col-sm-4">
                  <div class="form-group">
                  <label for="employercontactpersonname"><?php echo ('Employer Contact Person Name'); ?></label> <small class="req"> *</small>
                  <input name="employercontactpersonname" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Employer Contact Person Name') ?>" id="employercontactpersonname" style="padding:18px;" value="<?php //echo $input->ab_fullname; ?>" >
                  </div>
                </div>

                <div class="col-sm-5">
                  <div class="form-group">
                  <label for="employercontactpersondesignation"><?php echo ('Employer Contact Person Designation'); ?></label> <small class="req"> *</small>
                  <input name="employercontactpersondesignation" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Employer Contact Person Designation') ?>" id="employercontactpersondesignation" style="padding:18px;" value="<?php //echo $input->ab_fullname; ?>" >
                  </div>
                </div>



                <div class="col-sm-3">
                  <div class="form-group">
                  <label for="employercontactno"><?php echo ('Employer Contact No'); ?></label> <small class="req"> *</small>
                  <input name="employercontactno" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Employer Contact No') ?>" id="employercontactno" style="padding:18px;" value="<?php //echo $input->ab_fullname; ?>" >
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                  <label for="locationofemployerstate"><?php echo ('Location of Employer State'); ?></label> <small class="req"> *</small>
                  <input name="locationofemployerstate" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Location of Employer State') ?>" id="locationofemployerstate" style="padding:18px;" value="<?php //echo $input->ab_fullname; ?>" >
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                  <label for="locationofemployerdistrict"><?php echo ('Location of Employer District'); ?></label> <small class="req"> *</small>
                  <input name="locationofemployerdistrict" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Location of Employer District') ?>" id="locationofemployerdistrict" style="padding:18px;" value="<?php //echo $input->ab_fullname; ?>" >
                  </div>
                </div>

                <div class="col-sm-8">
                  <div class="form-group">
                  <label for="feedbackcollectedfromemployer"><?php echo ('Feedback Collected from Employer'); ?></label> <small class="req"> *</small>
                  <input name="feedbackcollectedfromemployer" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Feedback Collected from Employer') ?>" id="feedbackcollectedfromemployer" style="padding:18px;" value="<?php //echo $input->ab_fullname; ?>" >
                  </div>
                </div>

                <div class="col-sm-7">
                  <div class="form-group">
                  <label for="frequencyoffeedback"><?php echo ('Frequency of Feedback'); ?></label> <small class="req"> *</small>
                  <input name="frequencyoffeedback" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Frequency of Feedback') ?>" id="frequencyoffeedback" style="padding:18px;" value="<?php //echo $input->ab_fullname; ?>" >
                  </div>
                </div>

                <div class="col-sm-5">
                  <div class="form-group">
                  <label for="stateofplacementorwork"><?php echo ('State of Placement OR Work'); ?></label> <small class="req"> *</small>
                  <input name="stateofplacementorwork" class="form-control form-control-sm" type="text" placeholder="<?php echo ('State of Placement OR Work') ?>" id="stateofplacementorwork" style="padding:18px;" value="<?php //echo $input->ab_fullname; ?>" >
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                  <label for="districtofplacementorwork"><?php echo ('District of Placement OR Work'); ?></label> <small class="req"> *</small>
                  <input name="districtofplacementorwork" class="form-control form-control-sm" type="text" placeholder="<?php echo ('District of Placement OR Work') ?>" id="districtofplacementorwork" style="padding:18px;" value="<?php //echo $input->ab_fullname; ?>" >
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                  <label for="monthlyearningorctcbeforetraining"><?php echo ('Monthly Earning ORCTC Before Training'); ?></label> <small class="req"> *</small>
                  <input name="monthlyearningorctcbeforetraining" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Monthly Earning ORCTC Before Training') ?>" id="monthlyearningorctcbeforetraining" style="padding:18px;" value="<?php //echo $input->ab_fullname; ?>" >
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                  <label for="monthlycurrentctcorearning"><?php echo ('Monthly Current CTCOR Earning'); ?></label> <small class="req"> *</small>
                  <input name="monthlycurrentctcorearning" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Monthly Current CTCOR Earning') ?>" id="monthlycurrentctcorearning" style="padding:18px;" value="<?php //echo $input->ab_fullname; ?>" >
                  </div>
                </div>

                <div class="col-sm-12 ">
                    <div class="form-group">
                      <!-- <label>Submit</label> -->

                        <button type="submit" name="save" value="add_station" class="form-control form-control-sm btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-plus"> &nbsp;<?php echo ('Register'); ?></i></button>


                    </div>
                  </div>

                </div>
                <!-- <hr><hr> -->

              </div>

            </div>

          </div>

        </div>
      </form>

  </div>
  <!-- Search -->
  <!-- Display -->

</section>

<!-- jQuery -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/') ?>plugins/jquery/jquery.min.js"></script>