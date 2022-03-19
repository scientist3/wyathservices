<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- Save -->
    <div class="col-sm-12">
      <?php if ($this->session->flashdata('message') != null) {  ?>
        <div class="alert <?php $this->session->flashdata('class_name') ?> alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('message'); ?>
        </div>
      <?php } ?>
      <?php if ($this->session->flashdata('exception') != null) {  ?>
        <div class="alert <?php $this->session->flashdata('class_name') ?> alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('exception'); ?>
        </div>
      <?php } ?>

      <form role="form" action="<?php echo site_url('admin/aboutus/create') ?>" method="post" id="save_type_form" enctype="multipart/form-data">
        <div class="card">
          <div class="card-header bg-dark">
            <h3 class="card-title"><i class="fa fa-plus"></i> <?php echo $subtitle; ?></h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">

                <?php echo form_hidden('ab_id', $input->ab_id) ?>
                <div class="row">
                  <!-- About us Title -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="ab_title"><?php echo ('Title'); ?></label> <small class="req"> *</small>
                      <input name="ab_title" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Title') ?>" id="ab_title" value="<?php echo $input->ab_title; ?>" data-toggle="tooltip" title="<?php echo ('About Title'); ?>">
                      <?php echo form_error('ab_title', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <!-- About Us Subtitle -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="ab_desc"><?php echo ('Subtitle'); ?></label> <small class="req"> *</small>
                      <textarea name="ab_subtitle" class="form-control form-control-sm" type="tex" placeholder="<?php echo ('Subtitle') ?>" id="ab_subtitle" data-toggle="tooltip" title="<?php echo ('About Us Subtitle'); ?>"><?php echo $input->ab_subtitle ?></textarea>
                      <?php echo form_error('ab_subtitle', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <!-- About us Description -->
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="ab_desc"><?php echo ('Description'); ?></label> <small class="req"> *</small>
                      <textarea name="ab_desc" class="form-control form-control-sm" type="tex" placeholder="<?php echo ('Descriptioin') ?>" id="ab_desc" data-toggle="tooltip" title="<?php echo ('Description'); ?>"><?php echo $input->ab_desc ?></textarea>
                      <?php echo form_error('ab_desc', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                  <!-- image -->
                  <div class="form-group row col-sm-12">
                    <label for="ab_image_path" class="col-sm-12 col-form-label"><?php echo ('aboutus Image') ?> </label>
                    <div class="col-sm-12">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="ab_image_path" id="ab_image_path">
                        <label class="custom-file-label" for="ab_image_path">Choose file</label>
                        <input type="hidden" name="ab_image_path_old" value="<?php echo $input->ab_image_path ?>">
                      </div>
                    </div>
                  </div>
                  <!-- if setting image is already uploaded -->
                  <?php if (!empty($input->ab_image_path)) {  ?>
                    <div class="form-group row">
                      <label for="ab_image_path" class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <img src="<?php echo base_url($input->ab_image_path) ?>" alt="ab_image_path" class="img-thumbnail w-50 h-100" />
                      </div>
                    </div>
                  <?php } ?>
                  <!-- District Covered -->
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="ab_district_covered"><?php echo ('District Covered'); ?></label> <small class="req"> *</small>
                      <input name="ab_district_covered" class="form-control form-control-sm" type="number" placeholder="<?php echo ('District Covered') ?>" id="ab_district_covered" value="<?php echo $input->ab_district_covered ?>" data-toggle="tooltip" title="<?php echo ('District Covered'); ?>">
                      <?php echo form_error('ab_district_covered', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                  <!-- Centres Established -->
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="ab_centres_established"><?php echo ('Centres Established'); ?></label> <small class="req"> *</small>
                      <input name="ab_centres_established" class="form-control form-control-sm" type="number" placeholder="<?php echo ('Centres Established') ?>" id="ab_centres_established" value="<?php echo $input->ab_centres_established ?>" data-toggle="tooltip" title="<?php echo ('Centres Established'); ?>">
                      <?php echo form_error('ab_centres_established', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                  <!-- Students Impacted -->
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="ab_students_impacted"><?php echo ('Students Impacted'); ?></label> <small class="req"> *</small>
                      <input name="ab_students_impacted" class="form-control form-control-sm" type="number" placeholder="<?php echo ('Students Impacted') ?>" id="ab_students_impacted" value="<?php echo $input->ab_students_impacted ?>" data-toggle="tooltip" title="<?php echo ('Students Impacted'); ?>">
                      <?php echo form_error('ab_students_impacted', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                  <!-- Corporate Engaged -->
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label for="ab_corporate_engaged"><?php echo ('Corporeate Engaged'); ?></label> <small class="req"> *</small>
                      <input name="ab_corporate_engaged" class="form-control form-control-sm" type="number" placeholder="<?php echo ('Corporate Engaged') ?>" id="ab_corporate_engaged" value="<?php echo $input->ab_corporate_engaged ?>" data-toggle="tooltip" title="<?php echo ('Corporate Engaged'); ?>">
                      <?php echo form_error('ab_corporate_engaged', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                  <!-- Vision Description -->
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="ab_vision_des"><?php echo ('Vision Description'); ?></label> <small class="req"> *</small>
                      <textarea name="ab_vision_des" class="form-control form-control-sm" type="tex" placeholder="<?php echo ('Vision Description') ?>" id="ab_vision_des" data-toggle="tooltip" title="<?php echo ('Vision Description'); ?>"><?php echo $input->ab_vision_des ?></textarea>
                      <?php echo form_error('ab_vision_des', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                  <!-- Mission Description -->
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="ab_mission_des"><?php echo ('Mission Description'); ?></label> <small class="req"> *</small>
                      <textarea name="ab_mission_des" class="form-control form-control-sm" type="tex" placeholder="<?php echo ('Mission Description') ?>" id="ab_mission_des" data-toggle="tooltip" title="<?php echo ('Mission Description'); ?>"><?php echo $input->ab_mission_des ?></textarea>
                      <?php echo form_error('ab_mission_des', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <!-- status -->
                  <div class="col-sm-4">
                    <div class="form-group ">
                      <label for="ab_status"><?php echo ('Status'); ?></label>
                      <div class="form-check row form-inline form-control-sm">
                        <div class="col-6 form-inline">
                          <label class=" radio-inline">
                            <input type="radio" name="ab_status" value="1" <?php ($input->ab_status == '1') ? 'checked' : null; ?> data-toggle="tooltip" title="Active status">&nbsp;
                            <?php echo ('Active') ?>
                          </label>
                        </div>
                        <div class="col-6 form-inline">
                          <label class=" radio-inline">
                            <input type="radio" name="ab_status" value="0" <?php ($input->ab_status == '0') ? 'checked' : null; ?> data-toggle="tooltip" title="Disabled status"> &nbsp;<?php echo ('Inactive') ?>
                          </label>
                        </div>
                        <br>
                      </div>
                      <?php echo form_error('ab_status', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                </div>
                <!-- <hr><hr> -->

              </div>

            </div>

          </div>
          <div class="card-footer">
            <!-- Submit -->
            <div class="col-sm-3 float-right">
              <div class="form-group mb-0">
                <!-- <label>Submit</label> -->
                <?php if ($this->uri->segment(3) != "edit") { ?>
                  <button type="submit" name="save" value="add_station" class="form-control form-control-sm btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-plus"> &nbsp;<?php echo ('Save'); ?></i></button>
                <?php } else { ?>

                  <button type="submit" name="save" value="edit_station" class="form-control form-control-sm btn btn-warning btn-sm pull-right checkbox-toggle"><i class="fa fa-edit"> &nbsp;<?php echo ('Update'); ?></i></button>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <!-- Search -->
    <!-- Display -->
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header bg-dark">
          <h3 class="card-title">
            <i class="fa fa-list"></i> About Us Details
          </h3>
          <!-- <a class="btn btn-warning pull-right" href="< ?= base_url('admin/transaction/payment_report/').$search->start_date.'/'.$search->end_date; ?>"><i class="fa fa-print"></i></a> -->
        </div>

        <div class="card-body">
          <table width="100%" class="datatable_colvis table table-striped table-bordered table-hover table-sm">
            <thead>
              <tr>
                <th><?php echo ('Unique Id') ?></th>
                <th><?php echo ('Title') ?></th>
                <th><?php echo ('Subtitle') ?></th>
                <th><?php echo ('Description') ?></th>
                <th><?php echo ('Districts Covered') ?></th>
                <th><?php echo ('Centres Established') ?></th>
                <th><?php echo ('Students Impacted') ?></th>
                <th><?php echo ('Corporate Engaged') ?></th>
                <th><?php echo ('Vision Description') ?></th>
                <th><?php echo ('Mission Description') ?></th>
                <th><?php echo ('Status') ?></th>
                <th><?php echo ('Action') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($aboutus)) { ?>
                <?php $sl = 1; ?>
                <?php foreach ($aboutus as $ab) { ?>
                  <tr>
                    <td><?php echo $sl; ?></td>
                    <td><small><?php echo $ab->ab_title ?></small></td>
                    <td><small>
                        <?php
                        echo strlen($ab->ab_subtitle) > 20 ? substr($ab->ab_subtitle, 0, 20) . "..." : $ab->ab_subtitle;
                        ?></small>
                    </td>
                    <td><small>
                        <?php
                        echo strlen($ab->ab_desc) > 20 ? substr($ab->ab_desc, 0, 20) . "..." : $ab->ab_desc;
                        ?></small>
                    </td>
                    <td><?php echo $ab->ab_district_covered ?></td>
                    <td><?php echo $ab->ab_centres_established ?></td>
                    <td><?php echo $ab->ab_students_impacted ?></td>
                    <td><?php echo $ab->ab_corporate_engaged ?></td>
                    <td><small>
                        <?php
                        echo strlen($ab->ab_vision_des) > 20 ? substr($ab->ab_vision_des, 0, 20) . "..." : $ab->ab_vision_des;
                        ?></small>
                    <td><small>
                        <?php
                        echo strlen($ab->ab_mission_des) > 20 ? substr($ab->ab_mission_des, 0, 20) . "..." : $ab->ab_mission_des;
                        ?></small>
                    </td>
                    <td class="text-center">
                      <?php echo ($ab->ab_status) ?
                        '<i class="fa fa-check" aria-hidden="true"></i>' :
                        '<i class="fa fa-times" aria-hidden="true"></i>'; ?>
                    </td>
                    <!-- <td>
                      <div class="w-100 h-100">
                        <img class="w-25 h-25" src="<?php echo base_url() . $ab->s_img_path; ?>">
                      </div>
                    </td> -->
                    <td class="text-center" width="100">
                      <?php if (!in_array($ab->ab_id, [])) { ?>
                        <a href="<?php echo base_url("admin/aboutus/edit/$ab->ab_id") ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url("admin/aboutus/delete/$ab->ab_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo ('Are You Sure') ?>') "><i class="fa fa-trash"></i></a>
                      <?php } ?>
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
<!-- <script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script> -->

<!-- jquery-validation -->
<!-- <script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/jquery-validation/jquery.validate.min.js"></script>

<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/jquery-validation/additional-methods.min.js"></script> -->

<script type="text/javascript">
  $(document).ready(function() {
    $(function() {
      // $('#save_type_form').validate({
      //   rules: {
      //     s_title: {
      //       required: true,
      //     },
      //     u_status: {
      //       required: true,
      //     }
      //   },
      //   messages: {
      //     s_title: {
      //       required: "Please provide a Property Label Name"
      //     },
      //     u_status: {
      //       required: "Please select status"
      //     }
      //   },
      //   errorElement: 'span',
      //   errorPlacement: function(error, element) {
      //     error.addClass('badge badge-danger invalid-feedback');
      //     element.siblings('span.invalid-feedback').remove();
      //     element.closest('.form-group').append(error);
      //   },
      //   highlight: function(element, errorClass, validClass) {
      //     $(element).addClass('is-invalid');
      //   },
      //   unhighlight: function(element, errorClass, validClass) {
      //     $(element).removeClass('is-invalid');
      //   }
      // });
    });
    //$('[data-toggle="tooltip"]').tooltip();
    //bsCustomFileInput.init();

    // $('.datatable2').DataTable({
    //   responsive: true,
    //   dom: "<'row'<'col-sm-6 btn-sm'B><'col-sm-6 p-1'f>>tp",
    //   "lengthChange": false,
    //   "autoWidth": false,
    //   // "lengthMenu": [
    //   //   [10, 25, 50, -1],
    //   //   [10, 25, 50, "All"]
    //   // ],
    //   buttons: [{
    //     extend: 'colvis',
    //     className: 'btn-sm'
    //   }]
    // });
    // $(".dataTables_wrapper > div > div")[0].remove();
    // $(".dataTables_wrapper > div > div").each(function() {
    //   $(this).addClass('col-sm-6');
    // });
  });
</script>