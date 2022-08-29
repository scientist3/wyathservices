<!-- <?php print_r($input) ?> -->
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
      </div>

      <!--  -->
      <div class="col-md-9 col-md-5 bg-white">
        <ul class="nav nav-tabs pl-4 ml-3">
          <li class="active"><a data-toggle="tab" href="#Summery" class="text-dark font-weight-bold"
              aria-expanded="true"><i class="fa fa-indent"></i> Summery</a></li>
          <li class="ml-3"><a data-toggle="tab" href="#Contact" class="text-dark font-weight-bold"
              aria-expanded="false"><i class="fa fa-bookmark-o"></i> Contact Info</a></li>
          <li class="ml-3"><a data-toggle="tab" href="#Address" class="text-dark font-weight-bold"
              aria-expanded="false"><i class="fa fa-home"></i> Address</a></li>
          <li class="ml-3"><a data-toggle="tab" href="#General" class="text-dark font-weight-bold"
              aria-expanded="false"><i class="fa fa-info"></i> General Info</a></li>

          <li class="ml-3"><a data-toggle="tab" href="#General" class="text-dark font-weight-bold"
              aria-expanded="false"><i class="fa fa-briefcase"></i> Certificate</a></li>
          <li class="ml-3"><a data-toggle="tab" href="#General" class="text-dark font-weight-bold"
              aria-expanded="false"><i class="fa fa-work"></i> Placement Details</a></li>
        </ul>

        <div class="tab-content">
          <div id="Summery" class="tab-pane fade active in">

            <div class="table-responsive panel">
              <table class="table">
                <tbody>

                  <tr>
                    <td class="text-dark"><i class="fa fa-user"></i> Full Name</td>
                    <td>Viddhyut Mall</td>
                  </tr>
                  <tr>
                    <td class="text-dark"><i class="fa fa-list-ol"></i> Scholar Number</td>
                    <td>45</td>
                  </tr>
                  <tr>
                    <td class="text-dark"><i class="fa fa-book"></i> Medium</td>
                    <td>English</td>
                  </tr>
                  <tr>
                    <td class="text-dark"><i class="fa fa-group"></i> Class &amp; Section</td>
                    <td>12-F</td>
                  </tr>
                  <tr>
                    <td class="text-dark"><i class="fa fa-calendar"></i> Birthday</td>
                    <td>December 2, 2011</td>
                  </tr>

                  <tr>
                    <td class="text-dark"><i class="fa fa-university"></i> School</td>
                    <td>
                      Shyama Mall Girls Inter College </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div id="Address" class="tab-pane fade">
            <div class="table-responsive panel">
              <table class="table">
                <tbody>

                  <tr>
                    <td class="text-dark"><i class="fa fa-home"></i> Address</td>
                    <td>
                      <address>
                        <strong>
                          C-***, Amahiya </strong><br>
                        Kharobar, ****** <br>
                        Gorakhpur, Utter Pradesh, India<br>
                      </address>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div id="Contact" class="tab-pane fade">
            <div class="table-responsive panel">
              <table class="table">
                <tbody>

                  <tr>
                    <td class="text-dark"><i class="fa fa-envelope-o"></i> Email ID</td>
                    <td><a
                        href="mailto:****@pawanmall.net?subject=Email from &amp;body=Hello, Viddhyut Mall">****@pawanmall.net</a>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-dark"><i class="glyphicon glyphicon-phone"></i> Mobile Number</td>
                    <td>88********</td>
                  </tr>
                  <tr>
                    <td class="text-dark"><i class="fa fa-flag"></i> Nationality</td>
                    <td>Indian</td>
                  </tr>
                  <tr>
                    <td class="text-dark"><i class="fa fa-user"></i> Father's Name</td>
                    <td>Ajay Mall</td>
                  </tr>
                  <tr>
                    <td class="text-dark"><i class="glyphicon glyphicon-phone"></i> Father's Mobile</td>
                    <td>+91 99********</td>
                  </tr>
                  <tr>
                    <td class="text-dark"><i class="fa fa-user"></i> Mother's Name</td>
                    <td>Hemlata Mall</td>
                  </tr>
                  <tr>
                    <td class="text-dark"><i class="glyphicon glyphicon-phone"></i> Mother's Mobile</td>
                    <td>+91 90********</td>
                  </tr>
                  <tr>
                    <td class="text-dark"><i class="fa fa-user"></i> Emergency Contact Person</td>
                    <td>Pawan Mall</td>
                  </tr>
                  <tr>
                    <td class="text-dark"><i class="glyphicon glyphicon-phone"></i> Emergency Contact Person's
                      Mobile</td>
                    <td>+91 88********</td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
          <div id="General" class="tab-pane fade">
            <div class="table-responsive panel">
              <table class="table">
                <tbody>
                  <tr>
                    <td class="text-dark"><i class="fa fa-university"></i> Last School</td>
                    <td>Pawan Mall's School</td>
                  </tr>
                  <tr>
                    <td class="text-dark"><i class="fa fa-calendar"></i> Date of Admission</td>
                    <td>March 4, 2009</td>
                  </tr>
                  <tr>
                    <td class="text-dark"><i class="fa fa-home"></i> Birth Place</td>
                    <td>Delhi</td>
                  </tr>
                  <tr>
                    <td class="text-dark"><i class="fa fa-calendar"></i> Academic Year</td>
                    <td>2015-2016</td>
                  </tr>
                  <tr>
                    <td class="text-dark"><i class="fa fa-medkit"></i> Medical Condition</td>
                    <td>Normal</td>
                  </tr>
                  <tr>
                    <td class="text-dark"><i class="fa fa-thumbs-up"></i> Active/Inactive</td>
                    <td>Student is Active</td>
                  </tr>
                  <tr>
                    <td class="text-dark"><i class="glyphicon glyphicon-time"></i> Last Editing</td>
                    <td>2015-08-20 09:41:56</td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>

        </div>

      </div>

      <!--  -->

    </div>

  </div>
</section>