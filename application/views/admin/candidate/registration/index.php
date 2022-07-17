<!-- Main content -->
<section class="content">
  <div class="col-sm-12">
    <!-- <span> <?php // echo $this->session->flashdata('message'); 
                ?> </span> -->
  </div>

<<<<<<< HEAD
      <form role="form" action="<?php echo site_url('../admin/candidate/registration/insert') ?>" method="post" id="save_type_form" enctype="multipart/form-data">
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
=======
  <form role="form" action="<?php echo site_url('../admin/candidate/registration/insert') ?>" method="post" id="save_type_form" enctype="multipart/form-data">
    <div class="card">
      <div class="card-header bg-dark">
        <h3 class="card-title"><i class="fa fa-plus"></i> <?php echo $subtitle; ?></h3>
      </div>



      <div class="card-body">
        <div class="row">

          <!-- salutation -->
          <div class="col-md-12">
            <?php //echo form_hidden('ab_id', $input->ab_id) 
            ?>
            <div class="row">
              <div class="input-group mb-1">


              </div>
              <!-- salutation end-->
>>>>>>> fb50908fc99589f9f28e65fa6b173dc60779939c

              <!-- Fullname -->
              <!-- Gender -->
              <!-- Dateofbirth -->
              <div class="col-sm-1">
                <div class="form-group">
                  <label for="salutation"><?php echo ('Salutation'); ?></label> <small class="req"></small>
<<<<<<< HEAD
                <select name="salutation"  id="salutation" class="form-control input-lg">
                    
  <?php
foreach ($salutation as $row) {
    echo '<option value="' . $row . '">' . $row . '</option>';
}
?>
    </select>
                  </div>
=======
                  <select name="salutation" id="salutation" class="form-control input-lg">

                    <?php
                    foreach ($salutation as $row) {
                      echo '<option value="' . $row . '">' . $row . '</option>';
                    }
                    ?>
                  </select>
>>>>>>> fb50908fc99589f9f28e65fa6b173dc60779939c
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="fullname"><?php echo ('Full Name'); ?></label> <small class="req"> *</small>
                  <?php //echo $input->c_full_name 
                  ?>
                  <input name="fullname" class="form-control form-control-sm" type="text" value="<?= set_value('fullname') ?>" placeholder="<?php echo ('Full Name') ?>" id="fullname" style="padding:18px;" value="<?= set_value('fullname') ?>">
                  <?php echo form_error("fullname", '<span class="badge bg-danger p-1">', '</span>'); ?>

                </div>
              </div>


              <div class="col-sm-2">
                <div class="form-group">
                  <label for="gender"><?php echo ('Gender'); ?></label> <small class="req"> *</small>

                  <select name="gender" id="gender" class="form-control input-lg">

                    <option value="">Select Gender</option>
                    <?php
                    foreach ($gender as $row) {
                      echo '<option value="' . $row . '">' . $row . '</option>';
                    }
                    ?>
                  </select>


                  <?php echo form_error("gender", '<span class="badge bg-danger p-1">', '</span>'); ?>

                </div>
              </div>

              <div class="col-sm-2">
                <div class="form-group">
                  <label for="dob"><?php echo ('Date of Birth'); ?></label> <small class="req"> *</small>
                  <input type="date" name="dob" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Date od Birth ') ?>" id="dob" style="padding:18px;" value="<?= set_value('dob') ?>">
                  <?php echo form_error("dob", '<span class="badge bg-danger p-1">', '</span>'); ?>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="mobilenumber"><?php echo ('Mobile Number'); ?></label> <small class="req"> *</small>
                  <input name="mobilenumber" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Mobile Number') ?>" id="mobilenumber" style="padding:18px;" value="<?= set_value('mobilenumber') ?>">
                  <?php echo form_error("mobilenumber", '<span class="badge bg-danger p-1">', '</span>'); ?>
                </div>
              </div>



              <div class="col-sm-4">
                <div class="form-group">
                  <label for="email"><?php echo ('Email'); ?></label> <small class="req"> *</small>
                  <input name="email" class="form-control form-control-sm" type="email" placeholder="<?php echo ('Email') ?>" id="email" style="padding:18px;" value="<?= set_value('email') ?>">
                  <?php echo form_error("email", '<span class="badge bg-danger p-1">', '</span>'); ?>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="maritalstatus"><?php echo ('Marital Status'); ?></label> <small class="req"> *</small>
                  <select name="maritalstatus" id="maritalstatus" class="form-control input-lg">

                    <!--               <option value="">Select Marital Status</option> -->
                    <?php
                    foreach ($maritalstatus as $row) {
                      echo '<option value="' . $row . '">' . $row . '</option>';
                    }
                    ?>
                  </select>

                  <?php echo form_error("maritalstatus", '<span class="badge bg-danger p-1">', '</span>'); ?>
                </div>
              </div>


              <div class="col-sm-5">
                <div class="form-group">
                  <label for="fathersname"><?php echo ('Fathers/Guardian Name'); ?></label> <small class="req"> *</small>

                  <input name="fathersname" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Fathers/Guardian Name') ?>" id="fathersname" style="padding:18px;" value="<?= set_value('fathersname') ?>">

                  <?php echo form_error("fathersname", '<span class="badge bg-danger p-1">', '</span>'); ?>
                </div>
              </div>



              <div class="col-sm-3">
                <div class="form-group">
                  <label for="mothersname"><?php echo ('Mothers Name'); ?></label> <small class="req"> *</small>
                  <input name="mothersname" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Mothers Name') ?>" id="mothersname" style="padding:18px;" value="<?= set_value('mothersname') ?>">
                  <?php echo form_error("mothersname", '<span class="badge bg-danger p-1">', '</span>'); ?>
                </div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label for="guardianname"><?php echo ('Guardians Name'); ?></label> <small class="req"> *</small>
                  <input name="guardianname" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Guardians Name') ?>" id="guardianname" style="padding:18px;" value="<?= set_value('guardianname') ?>">
                  <?php echo form_error("guardianname", '<span class="badge bg-danger p-1">', '</span>'); ?>
                </div>
              </div>

              <div class="col-sm-2">
                <div class="form-group">
                  <label for="education"><?php echo ('Education Level'); ?></label> <small class="req"> *</small>
                  <?php //echo form_dropdown('education', $education, 0, 'class="form-control" id="gal_event_id" '); 
                  ?>
                  <select name="education" id="education" class="form-control input-lg">

                    <option value="">Select Education</option>
                    <?php
                    foreach ($education as $row) {
                      echo '<option value="' . $row . '">' . $row . '</option>';
                    }
                    ?>
                  </select>

                  <?php echo form_error("education", '<span class="badge bg-danger p-1">', '</span>'); ?>

                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="religion"><?php echo ('Religion'); ?></label> <small class="req"> *</small>
                  <?php //echo form_dropdown('religion', $religion, 0, 'class="form-control" id="gal_event_id" '); 
                  ?>
                  <select name="religion" id="religion" class="form-control input-lg">

                    <option value="">Select Religion</option>
                    <?php
                    foreach ($religion as $row) {
                      echo '<option value="' . $row . '">' . $row . '</option>';
                    }
                    ?>
                  </select>
                  <?php echo form_error("religion", '<span class="badge bg-danger p-1">', '</span>'); ?>

                </div>
              </div>

              <div class="col-sm-2">
                <div class="form-group">
                  <label for="category"><?php echo ('Category '); ?></label> <small class="req"> *</small>
                  <?php //echo form_dropdown('category', $category, 0, 'class="form-control" id="gal_event_id" '); 
                  ?>
                  <select name="category" id="category" class="form-control input-lg">

                    <?php
                    foreach ($category as $row) {
                      echo '<option value="' . $row . '">' . $row . '</option>';
                    }
                    ?>
                  </select>
                  <?php echo form_error("category", '<span class="badge bg-danger p-1">', '</span>'); ?>

                </div>
              </div>

              <div class="col-sm-2">
                <div class="form-group">
                  <label for="ab_status"><?php echo ('Disability '); ?></label> <small class="req"> *</small>
                  <select name="ab_status" id="ab_status" class="form-control input-lg">
                    <option value="no">No</option>
                    <option value="yes">Yes</option>

                  </select>
                </div>
              </div>

              <div class="col-sm-4" id="todisability">
                <div class="form-group">
                  <label for="todisability"><?php echo ('TypeofDisability'); ?></label> <small class="req"> *</small>
                  <select name="todisability" id="todisability" class="form-control input-lg">

                    <option value="">Select Disability</option>
                    <?php
                    foreach ($todisability as $row) {
                      echo '<option value="' . $row . '">' . $row . '</option>';
                    }
                    ?>
                  </select>
                  <?php echo form_error("todisability", '<span class="badge bg-danger p-1">', '</span>'); ?>

                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="idtype"><?php echo ('ID Type'); ?></label> <small class="req"> *</small>
                  <select name="idtype" id="idtype" class="form-control input-lg">
                    <option value="">Select ID Type</option>

                    <?php
                    foreach ($idtype as $row) {
                      echo '<option value="' . $row . '">' . $row . '</option>';
                    }
                    ?>
                  </select>
                  <?php echo form_error("idtype", '<span class="badge bg-danger p-1">', '</span>'); ?>

                </div>
              </div>

              <div class="col-sm-3" id="typeofalternateid">
                <div class="form-group">
                  <label for="typeofalternateid"><?php echo ('Type of AlternateID'); ?></label> <small class="req"> *</small>
                  <select name="typeofalternateid" id="typeofalternateid" class="form-control input-lg">
                    <option value="">Type Of Alternate ID</option>

                    <?php
                    foreach ($typeofalternateid as $row) {
                      echo '<option value="' . $row . '">' . $row . '</option>';
                    }
                    ?>
                  </select>
                  <?php echo form_error("typeofalternateid", '<span class="badge bg-danger p-1">', '</span>'); ?>

                </div>
              </div>

              <div class="col-sm-3" id="idno">
                <div class="form-group">
                  <label for="idno"><?php echo ('ID No.'); ?></label> <small class="req"> *</small>
                  <input name="idno" class="form-control form-control-sm" type="text" placeholder="<?php echo ('ID No.') ?>" id="idno" style="padding:18px;" value="<?= set_value('fullname') ?>">
                  <?php echo form_error("idno", '<span class="badge bg-danger p-1">', '</span>'); ?>


                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="permanentaddress"><?php echo ('Permanent Address.'); ?></label> <small class="req"> *</small>
                  <input name="permanentaddress" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Permanent Address') ?>" id="permanentaddress" style="padding:18px;" value="<?= set_value('permanentaddress') ?>">
                  <?php echo form_error("permanentaddress", '<span class="badge bg-danger p-1">', '</span>'); ?>

                </div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label for="permanentstate"><?php echo ('Permanent State'); ?></label> <small class="req"> *</small>

                  <select name="state" id="state" class="form-control input-lg">

                    <option value="">Select State</option>
                    <?php
                    foreach ($state as $row) {
                      echo '<option value="' . $row->state_name . '">' . $row->state_name . '</option>';
                    }
                    ?>
                  </select>
                  <?php echo form_error("state", '<span class="badge bg-danger p-1">', '</span>'); ?>

                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="permanentdistrict"><?php echo ('Permanent District'); ?></label> <small class="req"> *</small>
                  <select name="district" id="district" class="form-control input-lg">
                    <option value="">Select District</option>
                  </select>
                  <?php echo form_error("district", '<span class="badge bg-danger p-1">', '</span>'); ?>

                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="permanenttehsil"><?php echo ('Permanent Tehsil'); ?></label> <small class="req"> *</small>
                  <input name="permanenttehsil" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Permanent Tehsil') ?>" id="permanenttehsil" style="padding:18px;" value="<?= set_value('permanenttehsil') ?>">
                  <?php echo form_error("permanenttehsil", '<span class="badge bg-danger p-1">', '</span>'); ?>

                </div>
              </div>

              <div class="col-sm-2">
                <div class="form-group">
                  <label for="permanentcity"><?php echo ('Permanent City'); ?></label> <small class="req"> *</small>
                  <input name="permanentcity" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Permanent City') ?>" id="permanentcity" style="padding:18px;" value="<?= set_value('permanentcity') ?>">
                  <?php echo form_error("permanentcity", '<span class="badge bg-danger p-1">', '</span>'); ?>

                </div>
              </div>

              <div class="col-sm-2">
                <div class="form-group">
                  <label for="permanentpincode"><?php echo ('Permanent PINCode'); ?></label> <small class="req"> *</small>
                  <input name="permanentpincode" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Permanent PINCode') ?>" id="permanentpincode" style="padding:18px;" value="<?= set_value('permanentpincode') ?>">
                  <?php echo form_error("permanentpincode", '<span class="badge bg-danger p-1">', '</span>'); ?>
                </div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label for="permanentconstituency"><?php echo ('Permanent Constituency'); ?></label> <small class="req"> *</small>
                  <input name="permanentconstituency" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Permanent Constituency') ?>" id="permanentconstituency" style="padding:18px;" value="<?= set_value('permanentconstituency') ?>">
                  <?php echo form_error("permanentconstituency", '<span class="badge bg-danger p-1">', '</span>'); ?>
                </div>
              </div>

              <div class="col-sm-10">
                <div class="form-group form-check ">
                  <input type="checkbox" class="form-check-input" name="comm_address" id="comm_address" value="1">
                  <label class="form-check-label" for="comm_address">Communication Same as Permanent Address</label>
                </div>
              </div>

              <div class="col-sm-5">
                <div class="form-group">
                  <label for="communicationaddress"><?php echo ('Communication Address.'); ?></label> <small class="req"> *</small>
                  <input name="communicationaddress" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Communication Address') ?>" id="communicationaddress" style="padding:18px;" value="<?= set_value('communicationaddress') ?>">
                  <?php echo form_error("communicationaddress", '<span class="badge bg-danger p-1">', '</span>'); ?>

                </div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label for="communicationstate"><?php echo ('Communication State'); ?></label> <small class="req"> *</small>

                  <select name="communicationstate" id="communicationstate" class="form-control input-lg">

                    <option value="">Select State</option>
                    <?php
                    foreach ($state as $row) {
                      echo '<option value="' . $row->state_name . '">' . $row->state_name . '</option>';
                    }
                    ?>
                  </select>
                  <?php echo form_error("state", '<span class="badge bg-danger p-1">', '</span>'); ?>

                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="communicationdistrict"><?php echo ('Communication District'); ?></label> <small class="req"> *</small>
                  <input type="text" name="communicationdistrict" id="communicationdistrict" value="" />
                  <!-- 
                    <select name="communicationdistrict"  id="communicationdistrict" class="form-control input-lg">
                      <option value="">Select District</option>
                    </select>
                  -->
                  <?php echo form_error("communicationdistrict", '<span class="badge bg-danger p-1">', '</span>'); ?>

                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="communicationtehsil"><?php echo ('Communication Tehsil'); ?></label> <small class="req"> *</small>
                  <input name="communicationtehsil" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Communication Tehsil') ?>" id="communicationtehsil" style="padding:18px;" value="<?= set_value('communicationtehsil') ?>">
                  <?php echo form_error("communicationtehsil", '<span class="badge bg-danger p-1">', '</span>'); ?>

                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="communicationcity"><?php echo ('Communication City'); ?></label> <small class="req"> *</small>
                  <input name="communicationcity" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Communication City') ?>" id="communicationcity" style="padding:18px;" value="<?= set_value('communicationcity') ?>">
                  <?php echo form_error("communicationcity", '<span class="badge bg-danger p-1">', '</span>'); ?>

                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="communicationpincode"><?php echo ('Communication PINCode'); ?></label> <small class="req"> *</small>
                  <input name="communicationpincode" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Communication PINCode') ?>" id="communicationpincode" style="padding:18px;" value="<?= set_value('communicationpincode') ?>">
                  <?php echo form_error("communicationpincode", '<span class="badge bg-danger p-1">', '</span>'); ?>
                </div>
              </div>

              <div class="col-sm-3">
                <div class="form-group">
                  <label for="communicationconstituency"><?php echo ('Communication Constituency'); ?></label> <small class="req"> *</small>
                  <input name="communicationconstituency" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Communication Constituency') ?>" id="communicationconstituency" style="padding:18px;" value="<?= set_value('communicationconstituency') ?>">
                  <?php echo form_error("communicationconstituency", '<span class="badge bg-danger p-1">', '</span>'); ?>
                </div>
              </div>

              <div class="col-sm-12 ">
                <div class="form-group">
                  <!-- <label>Submit</label> -->

                  <button type="submit" name="save" value="add_station" class="form-control form-control-sm btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-plus"> &nbsp;<?php echo ('Register'); ?></i></button>


                </div>
              </div>

            </div>

          </div>

        </div>

      </div>

    </div>
  </form>
  <!-- Search -->
  <!-- Display -->

</section>
<script>
  $(document).ready(function() {

    $('#todisability').hide()
    $('#typeofalternateid').hide();
    $('#idno').hide();

    // ab_status
    $('#ab_status').change(function() {
      // ab_status
      var status = $('#ab_status').val();
      if (status == "yes") {
        $('#todisability').show()
      }
      if (status == "no") {
        $('#todisability').hide()
      }
    });


    $('#idtype').change(function() {
      var type = $('#idtype').val();

      if (type == "") {
        $('#typeofalternateid').hide();
        $('#idno').hide();
      }
      if (type == "Aadhar ID") {
        // $('#idno').attr('placeholder','sfefe');
        $('#idno').show();

        $('#typeofalternateid').hide();

      }
      if (type == 'Alternate ID') {
        $('#typeofalternateid').show();
        $('#idno').show();
      }


    });


    $('#comm_address').change(function() {
      if ($("#comm_address").prop('checked') == true) {
        // var commad=$('permanentaddress').val();
        var pa = $("#permanentaddress").val();
        var st = $("#state").val();
        var dt = $("#district").val();
        var pt = $("#permanenttehsil").val();
        var pc = $("#permanentcity").val();
        var ppc = $("#permanentpincode").val();
        var ptc = $("#permanentconstituency").val();
        //setvalue
        // alert(value);

        $("#communicationaddress").prop('value', pa);
        $("#communicationstate").prop('value', st);
        $("#communicationdistrict").prop('value', dt);
        $("#communicationtehsil").prop('value', pt);
        $("#communicationcity").prop('value', pc);
        $("#communicationpincode").prop('value', ppc);
        $("#communicationconstituency").prop('value', ptc);

        // $("id:permanentaddress").val("Shadow Cracker");

        // var userId = $(id).find("input[name='permanentaddress']").val();
        //   alert(userId);
        // $('#communicationaddress').val(userId);


        $("#communicationaddress").prop('disabled', true);
        // $("#communicationaddress").attr('value',commadd);



        $("#communicationstate").prop('disabled', true);

        $("#communicationdistrict").prop('disabled', true);

        $("#communicationtehsil").prop('disabled', true);

        $("#communicationcity").prop('disabled', true);
        $("#communicationpincode").prop('disabled', true);

        $("#communicationconstituency").prop('disabled', true);


      } else {
        $("#communicationaddress").prop('disabled', false);
        $("#communicationstate").prop('disabled', false);

        $("#communicationdistrict").prop('disabled', false);

        $("#communicationtehsil").prop('disabled', false);

        $("#communicationcity").prop('disabled', false);
        $("#communicationpincode").prop('disabled', false);

        $("#communicationconstituency").prop('disabled', false);


      }

    });



    // Aadhar ID
    // Alternate ID


    //  $('#state').change(function(){
    //   var state_id = $('#state').val();
    //   if(state_id != '')
    //   {
    //    $.ajax({
    //     url:"<?php // echo base_url(); 
                ?>CSD/fetch_state",
    //     method:"POST",
    //     data:{state_id:state_id},
    //     success:function(data)
    //     {
    //      $('#state').html(data);
    //      $('#district').html('<option value="">Select District</option>');
    //     }
    //    });
    //   }
    //   else
    //   {
    //    $('#state').html('<option value="">Select State</option>');
    //    $('#city').html('<option value="">Select District</option>');
    //   }
    //  });




    $('#state').change(function() {
      var state_name = $('#state').val();
      if (state_name != '') {
        $.ajax({
          url: "<?php echo base_url(); ?>/admin/candidate/registration/fetch_district",
          method: "POST",
          data: {
            state_name: state_name
          },
          success: function(data) {
            $('#district').html(data);
          }
        });
      } else {
        $('#district').html('<option value="">Select District</option>');
      }
    });

  });
</script>


<!-- jQuery -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/') ?>plugins/jquery/jquery.min.js"></script>