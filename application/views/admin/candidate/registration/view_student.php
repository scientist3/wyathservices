<!-- <?php print_r($input) ?> -->

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <!-- #image_not available right now -->
              <!-- <img class="profile-user-img img-fluid img-circle" src="" alt="User profile picture"> -->
            </div>
            <h3 class="profile-username text-center"><?= $input->c_salutation . " " . $input->c_full_name ?></h3>
            <p class="text-muted text-center"><?= $input->c_cand_id ?></p>

            <p class="text-muted text-center">Pre-Training Status: <?= $input->c_pre_traning_status ?></p>
            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Father's Name</b> <a class="float-right"><?= $input->c_father_name ?></a>
              </li>
              <li class="list-group-item">
                <b>Mother's Name</b> <a class="float-right"><?= $input->c_mother_name ?></a>
              </li>
              <li class="list-group-item">
                <b>Mobile Number</b> <a class="float-right"><?= $input->c_mobile ?></a>
              </li>

              <li class="list-group-item">
                <b>Email</b> <a class="float-right"><?= $input->c_email ?></a>
              </li>
              <li class="list-group-item">
                <b>Permanent Address</b> <a class="float-right"><?= $input->c_perm_address ?></a>
              </li>
            </ul>
          </div>
        </div>

        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">About Me</h3>
          </div>

          <div class="card-body">
            <strong><i class="fas fa-book mr-1"></i> Education</strong>
            <p class="text-muted">
              <?= isset($education_list[$input->c_education]) ? $education_list[$input->c_education] : 'N/A' ?>
            </p>
            <hr>
            <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
            <p class="text-muted"><?= isset($input->c_perm_city) ? $input->c_perm_city : 'N/A' ?></p>
            <hr>
            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
            <p class="text-muted">
              <span class="tag tag-danger">UI Design</span>
            </p>
            <hr>
            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
      </div>

      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#candidate_basic_details" data-toggle="tab">Basic
                  Details</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="#candidate_certificate_details" data-toggle="tab">
                  Certificate</a></li>
              <li class="nav-item"><a class="nav-link" href="#candidate_placement_details" data-toggle="tab"> Placement
                  Details</a></li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content">

              <!-- candidate basic details -->

              <div class="active tab-pane" id="candidate_basic_details">
                <dl class="row">
                  <dt class="col-sm-4">Candidate ID</dt>
                  <dd class="col-sm-8"><?= $input->c_cand_id ?></dd>

                  <dt class="col-sm-4">Candidate Name</dt>
                  <dd class="col-sm-8"><?= $input->c_full_name ?></dd>

                  <dt class="col-sm-4">Father's Name</dt>
                  <dd class="col-sm-8"><?= $input->c_father_name ?></dd>

                  <dt class="col-sm-4">Mother's Name</dt>
                  <dd class="col-sm-8"><?= $input->c_mother_name ?></dd>

                  <dt class="col-sm-4">Guardian's Name</dt>
                  <dd class="col-sm-8"><?= $input->c_guardian_name ?></dd>

                  <dt class="col-sm-4">Mobile Number</dt>
                  <dd class="col-sm-8"><?= $input->c_mobile ?></dd>

                  <dt class="col-sm-4">Email</dt>
                  <dd class="col-sm-8"><?= $input->c_email ?></dd>

                  <dt class="col-sm-4">Gender</dt>
                  <dd class="col-sm-8"><?= isset($gender_list[$input->c_gender]) ? $gender_list[$input->c_gender] : 'N/A' ?></dd>

                  <dt class="col-sm-4">Date of Birth</dt>
                  <dd class="col-sm-8"><?= $input->c_dob ?></dd>

                  <dt class="col-sm-4">Marital Status</dt>
                  <dd class="col-sm-8"><?= isset($marital_status_list[$input->c_marital_status]) ? $marital_status_list[$input->c_marital_status] : 'N/A' ?></dd>

                  <dt class="col-sm-4">Religion</dt>
                  <dd class="col-sm-8"><?= isset($religion_list[$input->c_religion]) ? $religion_list[$input->c_religion] : 'N/A' ?></dd>
                </dl>
                <hr>
                <span>Address Details</span>
                <dl class="row mt-3">
                  <dt class="col-sm-4">Permanent Address</dt>
                  <dd class="col-sm-8"><?= $input->c_perm_address ?></dd>

                  <dt class="col-sm-4">Permanent State</dt>
                  <dd class="col-sm-8"><?= isset($state_list[$input->c_perm_state]) ? $state_list[$input->c_perm_state] : 'N/A' ?></dd>

                  <dt class="col-sm-4">Permanent City</dt>
                  <dd class="col-sm-8"><?= isset($input->c_perm_city) ? $input->c_perm_city : 'N/A' ?></dd>

                  <dt class="col-sm-4">Communication Address</dt>
                  <dd class="col-sm-8"><?= $input->c_comm_address ?></dd>

                  <dt class="col-sm-4">Communication State</dt>
                  <dd class="col-sm-8"><?= isset($state_list[$input->c_comm_state]) ? $state_list[$input->c_comm_state] : 'N/A' ?></dd>

                  <dt class="col-sm-4">Communication City</dt>
                  <dd class="col-sm-8"><?= isset($input->c_comm_city) ? $input->c_comm_city : 'N/A' ?></dd>
                </dl>

                <hr>
                <span>Other Details</span>
                <dl class="row mt-3">
                  <dt class="col-sm-4">Education Level</dt>
                  <dd class="col-sm-8"><?= isset($education_list[$input->c_education]) ? $education_list[$input->c_education] : 'N/A' ?></dd>

                  <dt class="col-sm-4">Category</dt>
                  <dd class="col-sm-8"><?= isset($category_list[$input->c_catagory]) ? $category_list[$input->c_catagory] : 'N/A' ?></dd>

                  <dt class="col-sm-4">Pre Training Status</dt>
                  <dd class="col-sm-8"><?= isset($pre_training_status_list[$input->c_pre_traning_status]) ? $pre_training_status_list[$input->c_pre_traning_status] : 'N/A' ?></dd>

                  <dt class="col-sm-4">Disability</dt>
                  <dd class="col-sm-8"><?= isset($yes_no_list[$input->c_disablity]) ? $yes_no_list[$input->c_disablity] : 'N/A' ?></dd>

                  <dt class="col-sm-4">ID Type</dt>
                  <dd class="col-sm-8"><?= isset($id_type_list[$input->c_id_type]) ? $id_type_list[$input->c_id_type] : 'N/A' ?></dd>

                  <dt class="col-sm-4">ID No</dt>
                  <dd class="col-sm-8"><?= $input->c_id_no ?></dd>

                  <dt class="col-sm-4">Employment Status</dt>
                  <dd class="col-sm-8"><?= isset($employment_status_list[$input->c_employment_status]) ? $employment_status_list[$input->c_employment_status] : 'N/A' ?></dd>
                </dl>
              </div>

              <!-- candidate certificate details -->
              <div class="tab-pane" id="candidate_certificate_details">
                <dl class="row mt-3">
                  <dt class="col-sm-4">Agency</dt>
                  <dd class="col-sm-8"><?= isset($input->cer_agency) ? $input->cer_agency : 'N/A' ?></dd>

                  <dt class="col-sm-4">Certified</dt>
                  <dd class="col-sm-8"><?= $input->cer_certified ? 'Certified' : 'Not Certified' ?></dd>

                  <dt class="col-sm-4">Date</dt>
                  <dd class="col-sm-8"><?= $input->cer_date ?? 'N/A' ?></dd>

                  <dt class="col-sm-4">Issued</dt>
                  <dd class="col-sm-8"><?= $input->cer_certificate_issued ?? 'N/A' ?></dd>

                  <dt class="col-sm-4">Certificate No</dt>
                  <dd class="col-sm-8"><?= $input->cer_certificate_no ?? 'N/A' ?></dd>
                </dl>
              </div>

              <!-- candidate placement details -->
              <div class="tab-pane" id="candidate_placement_details">
                <dl class="row mt-3">
                  <?php
                  $isPlaced = isset($input->pd_placement_status) ? true : false;
                  // $showByEmployment = isset($input->pd_employment_type) ? '' : ''; 
                  ?>
                  <!-- Placement Status -->
                  <dt class="col-sm-4">Placement Status:</dt>
                  <dd class="col-sm-8"><?= $isPlaced ? ($input->pd_placement_status ? 'Placed' : 'Not Placed') : 'N/A' ?></dd>

                  <!-- Show Employment Type if Placement Status is 0 -->
                  <?php if ($isPlaced && $input->pd_placement_status == 0): ?>
                    <dt class="col-sm-4">Employment Type:</dt>
                    <dd class="col-sm-8"><?= isset($employment_status_list[$input->c_employment_status]) ? $employment_status_list[$input->c_employment_status] : 'N/A' ?></dd>
                  <?php endif; ?>

                  <!-- Show Details for pd_employment_type 3 when Placement Status is 1 -->
                  <?php if ($isPlaced && $input->pd_placement_status == 1 && $input->pd_employment_type == 3): ?>
                    <dt class="col-sm-4">Employment Type:</dt>
                    <dd class="col-sm-8"><?= isset($employment_status_list[$input->c_employment_status]) ? $employment_status_list[$input->c_employment_status] : 'N/A' ?></dd>

                    <dt class="col-sm-4">Date of Joining:</dt>
                    <dd class="col-sm-8"><?= isset($input->pd_date_of_joining) ? date('Y-m-d', strtotime($input->pd_date_of_joining)) : 'N/A' ?></dd>

                    <dt class="col-sm-4">Employer Name:</dt>
                    <dd class="col-sm-8"><?= isset($input->pd_employer_name) ? $input->pd_employer_name : 'N/A' ?></dd>

                    <dt class="col-sm-4">District:</dt>
                    <dd class="col-sm-8"><?= isset($district_list[$input->pd_district]) ? $district_list[$input->pd_district] : 'N/A' ?></dd>

                    <dt class="col-sm-4">Feedback Collected:</dt>
                    <dd class="col-sm-8"><?= isset($input->pd_feedback_collected_employer) ? ($input->pd_feedback_collected_employer == 1 ? 'Yes' : 'No') : 'N/A' ?></dd>

                    <dt class="col-sm-4">Feedback Frequency:</dt>
                    <dd class="col-sm-8"><?= isset($frequency_feedback_list[$input->pd_feedback_frequency]) ? $frequency_feedback_list[$input->pd_feedback_frequency] : 'N/A' ?></dd>
                  <?php endif; ?>

                  <?php if ($isPlaced && $input->pd_placement_status == 1 && $input->pd_employment_type == 4): ?>
                    <dt class="col-sm-4">Date of Joining:</dt>
                    <dd class="col-sm-8"><?= isset($input->pd_date_of_joining) ? date('Y-m-d', strtotime($input->pd_date_of_joining)) : 'N/A' ?></dd>
                  <?php endif; ?>

                  <?php if (isset($input->pd_placement_status, $input->pd_employment_type) && $input->pd_placement_status == 1 && $input->pd_employment_type == 5): ?>
                    <dt class="col-sm-4">Date of Joining:</dt>
                    <dd class="col-sm-8"><?= isset($input->pd_date_of_joining) ? date('Y-m-d', strtotime($input->pd_date_of_joining)) : 'N/A' ?></dd>

                    <dt class="col-sm-4">Employment Type:</dt>
                    <dd class="col-sm-8"><?= isset($employment_status_list[$input->c_employment_status]) ? $employment_status_list[$input->c_employment_status] : 'N/A' ?></dd>

                    <dt class="col-sm-4">District:</dt>
                    <dd class="col-sm-8"><?= isset($district_list[$input->pd_district]) ? $district_list[$input->pd_district] : 'N/A' ?></dd>

                    <dt class="col-sm-4">Feedback Collected:</dt>
                    <dd class="col-sm-8"><?= isset($input->pd_feedback_collected_employer) ? ($input->pd_feedback_collected_employer == 1 ? 'Yes' : 'No') : 'N/A' ?></dd>

                    <dt class="col-sm-4">Feedback Frequency:</dt>
                    <dd class="col-sm-8"><?= isset($frequency_feedback_list[$input->pd_feedback_frequency]) ? $frequency_feedback_list[$input->pd_feedback_frequency] : 'N/A' ?></dd>
                  <?php endif; ?>
                </dl>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>