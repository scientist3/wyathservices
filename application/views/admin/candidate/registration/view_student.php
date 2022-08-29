<?php print_r($input) ?>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">

        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <!-- #image_not avaible right now -->
              <!-- <img class="profile-user-img img-fluid img-circle" src="" alt="User profile picture"> -->
            </div>
            <h3 class="profile-username text-center"><?= $input->c_salutation . " " . $input->c_full_name ?></h3>
            <p class="text-muted text-center"><?= $input->c_cand_id ?></p>

            <p class="text-muted text-center">c_pre_traning_status: <?= $input->c_pre_traning_status ?></p>
            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Fathers Name</b> <a class="float-right"><?= $input->c_father_name ?></a>
              </li>
              <li class="list-group-item">
                <b>Mothers Name</b> <a class="float-right"><?= $input->c_mother_name ?></a>
              </li>
              <li class="list-group-item">
                <b>Mobile Number</b> <a class="float-right"><?= $input->c_mobile ?></a>
              </li>

              <li class="list-group-item">
                <b>Email</b> <a class="float-right"><?= $input->c_email ?></a>
              </li>
              <li class="list-group-item">
                <b>Address</b> <a class="float-right"><?= $input->c_perm_address ?></a>
              </li>
            </ul>
            <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
          </div>

        </div>


        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">About Me</h3>
          </div>

          <div class="card-body">
            <strong><i class="fas fa-book mr-1"></i> Education</strong>
            <p class="text-muted">
              B.S. in Computer Science from the University of Tennessee at Knoxville
            </p>
            <hr>
            <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>
            <p class="text-muted">Malibu, California</p>
            <hr>
            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
            <p class="text-muted">
              <span class="tag tag-danger">UI Design</span>

            </p>
            <hr>
            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
            </p>
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

                  <dt class="col-sm-4">Fathers Name</dt>
                  <dd class="col-sm-8"><?= $input->c_father_name ?></dd>

                  <dt class="col-sm-4">Mothers Name</dt>
                  <dd class="col-sm-8"><?= $input->c_mother_name ?></dd>

                  <dt class="col-sm-4">Guardians Name</dt>
                  <dd class="col-sm-8"><?= $input->c_guardian_name ?></dd>

                  <dt class="col-sm-4">Mobile Number</dt>
                  <dd class="col-sm-8"><?= $input->c_mobile ?></dd>

                  <dt class="col-sm-4">Email</dt>
                  <dd class="col-sm-8"><?= $input->c_email ?></dd>

                  <dt class="col-sm-4">Gender</dt>
                  <dd class="col-sm-8"><?= $gender_list[$input->c_gender]  ?></dd>

                  <dt class="col-sm-4">Date of Birth</dt>
                  <dd class="col-sm-8"><?= $input->c_dob ?></dd>

                  <dt class="col-sm-4">Marital Status</dt>
                  <dd class="col-sm-8"><?= $marital_status_list[$input->c_marital_status] ?></dd>

                  <dt class="col-sm-4">Religion</dt>
                  <dd class="col-sm-8"><?= $religion_list[$input->c_religion] ?></dd>
                </dl>
                <hr>
                <span>Address Details</span>
                <dl class="row mt-3">
                  <dt class="col-sm-4">Perm Address</dt>
                  <dd class="col-sm-8"><?php echo $input->c_perm_address ?></dd>

                  <dt class="col-sm-4">Perm State</dt>
                  <dd class="col-sm-8"><?= $state_list[$input->c_perm_state] ?></dd>
                  <dt class="col-sm-4">Perm District</dt>
                  <dd class="col-sm-8"><?= 'pending'; ?></dd>
                  <dt class="col-sm-4">Perm Tehsil</dt>
                  <dd class="col-sm-8"><?= $input->c_perm_tehsil ?></dd>


                  <dt class="col-sm-4">Perm City</dt>
                  <dd class="col-sm-8"><?= $input->c_perm_city ?></dd>
                  <dt class="col-sm-4">Perm PINCode</dt>
                  <dd class="col-sm-8"><?= $input->c_perm_pincode ?></dd>
                  <dt class="col-sm-4">Perm Constituency</dt>
                  <dd class="col-sm-8"><?= $input->c_perm_constituency ?></dd>
                  <dt class="col-sm-4">Communication Same as Perm Address</dt>
                  <dd class="col-sm-8"> </dd>
                  <dt class="col-sm-4">Communication Address</dt>
                  <dd class="col-sm-8"><?= $input->c_comm_address ?></dd>
                  <dt class="col-sm-4">Communication State </dt>
                  <dd class="col-sm-8"><?= $state_list[$input->c_comm_state] ?></dd>
                  <dt class="col-sm-4">Communication District</dt>
                  <dd class="col-sm-8"><?= $input->c_comm_district ?></dd>

                  <dt class="col-sm-4">Communication Tehsil</dt>
                  <dd class="col-sm-8"><?= $input->c_comm_tehsil ?></dd>
                  <dt class="col-sm-4">Communication City</dt>
                  <dd class="col-sm-8"><?= $input->c_comm_city ?></dd>
                  <dt class="col-sm-4">Communication PINCode</dt>
                  <dd class="col-sm-8"><?= $input->c_comm_pincode ?></dd>
                  <dt class="col-sm-4">Communication Constituency</dt>
                  <dd class="col-sm-8"><?= $input->c_comm_constituency ?></dd>

                  <dt class="col-sm-4"></dt>
                  <dd class="col-sm-8"></dd>
                </dl>

                <hr>
                <span>Other Details</span>
                <dl class="row mt-3">
                  <dt class="col-sm-4">Education Level</dt>
                  <dd class="col-sm-8"><?php echo $education_list[$input->c_education] ?></dd>
                  <dt class="col-sm-4">Category</dt>
                  <dd class="col-sm-8"><?php echo $category_list[$input->c_catagory]; ?></dd>
                  <dt class="col-sm-4">Pre Traning Status</dt>
                  <dd class="col-sm-8"><?php echo $pre_training_status_list[$input->c_pre_traning_status] ?></dd>
                  <dt class="col-sm-4">Disability</dt>
                  <dd class="col-sm-8"><?php echo $yes_no_list[$input->c_disablity]; ?></dd>
                  <dt class="col-sm-4">TypeofDisability</dt>
                  <dd class="col-sm-8"><?php echo $input->c_type_of_disablity; ?></dd>
                  <dt class="col-sm-4">ID Type</dt>
                  <dd class="col-sm-8"><?php echo $id_type_list[$input->c_id_type] ?></dd>
                  <dt class="col-sm-4">Type of AlternateID</dt>
                  <dd class="col-sm-8"><?php echo $type_of_alternate_id_list[$input->c_type_of_alternate_id] ?></dd>
                  <dt class="col-sm-4">ID No</dt>
                  <dd class="col-sm-8"><?php echo $input->c_id_no ?></dd>

                  <dt class="col-sm-4"></dt>
                  <dd class="col-sm-8"></dd>
                </dl>
              </div>




              <!-- other details -->
              <div class="tab-pane" id="candidate_certificate_details">

                <dl class="row">
                  <dt class="col-sm-4">name</dt>
                  <dd class="col-sm-8">value</dd>
                </dl>

                <li class="list-group-item">
                  <b>Certificate id : </b><?php ?>
                </li>
                <li class="list-group-item">
                  <b>Certificate id : </b><?php ?>
                </li>
                <li class="list-group-item">
                  <b>Certificate agency : </b><?php ?>
                </li>
                <li class="list-group-item">
                  <b>Certificate certified : </b><?php ?>
                </li>
                <li class="list-group-item">
                  <b>Certificate date : </b><?php ?>
                </li>
                <li class="list-group-item">
                  <b>Certificate certificate issued: </b><?php ?>
                </li>
                <li class="list-group-item">
                  <b>Certificate certificate no : </b><?php ?>
                </li>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>