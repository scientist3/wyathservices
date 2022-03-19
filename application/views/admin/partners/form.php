<!-- Main content -->
<section class="content">

  <div class="row">
    <!-- Save -->
    <div class="col-sm-4">
      <div class="card">
        <div class="card-header bg-dark">
          <h3 class="card-title"><i class="fa fa-plus"></i> <?php echo $subtitle; ?></h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <form role="form" action="<?php echo site_url('admin/partners/create') ?>" method="post" id="save_type_form" enctype="multipart/form-data">
                <?php echo form_hidden('par_id', $input->par_id) ?>
                <div class="row">
                  <!-- image -->
                  <div class="form-group row col-sm-12">
                    <label for="par_img_path" class="col-sm-12 col-form-label"><?php echo ('Partner Image') ?> </label>
                    <div class="col-sm-12">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="par_img_path" id="par_img_path">
                        <label class="custom-file-label" for="par_img_path">Choose file</label>
                        <input type="hidden" name="par_img_path_old" value="<?php echo $input->par_img_path ?>">
                        <input type="hidden" name="par_img_thumb_old" value="<?php echo $input->par_img_thumb ?>">
                      </div>
                    </div>
                  </div>
                  <!-- if setting image is already uploaded -->
                  <?php if (!empty($input->par_img_path)) {  ?>
                    <div class="form-group row">
                      <label for="par_img_path" class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <img src="<?php echo base_url($input->par_img_path) ?>" alt="par_img_path" class="img-thumbnail w-50 h-100" />
                      </div>
                    </div>
                  <?php } ?>
                  <!-- projects Url -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="par_url"><?php echo ('Partner Url'); ?></label> <small class="req"> *</small>
                      <input name="par_url" class="form-control form-control-sm" type="text" placeholder="<?php echo ('URL') ?>" id="par_url" value="<?php echo $input->par_url ?>" data-toggle="tooltip" title="<?php echo ('Project URl'); ?>">
                      <?php echo form_error('par_url', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                  <!-- Description -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="par_desc"><?php echo ('Partner Description'); ?></label>
                      <input name="par_desc" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Description') ?>" id="par_desc" value="<?php echo $input->par_desc ?>" data-toggle="tooltip" title="<?php echo ('Project Description'); ?>">
                      <?php echo form_error('par_desc', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                  <!-- Satus -->
                  <div class="col-sm-12">
                    <div class="form-group ">
                      <label for="par_status"><?php echo ('Status'); ?></label>
                      <div class="form-check row form-inline form-control-sm">
                        <div class="col-6 form-inline">
                          <label class=" radio-inline">
                            <input type="radio" name="par_status" value="1" <?= ($input->par_status == '1' || ($input->par_status != '0')) ? 'checked' : null; ?> data-toggle="tooltip" title="Active status">&nbsp;
                            <?php echo ('Active') ?>
                          </label>
                        </div>
                        <div class="col-6 form-inline">
                          <label class=" radio-inline">
                            <input type="radio" name="par_status" value="0" <?= ($input->par_status == '0') ? 'checked' : null; ?> data-toggle="tooltip" title="Disabled status"> &nbsp;<?php echo ('Inactive') ?>
                          </label>
                        </div>
                        <br>
                      </div>
                      <?php echo form_error('par_status', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                  <!-- </div> 
                  <div class="row"> -->
                  <!-- Submit -->
                  <div class="col-sm-12 ">
                    <div class="form-group">
                      <!-- <label>Submit</label> -->
                      <?php if ($this->uri->segment(3) != "edit") { ?>
                        <button type="submit" name="save" value="add_station" class="form-control form-control-sm btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-plus"> &nbsp;<?php echo ('Save'); ?></i></button>
                      <?php } else { ?>
                        <button type="submit" name="save" value="edit_station" class="form-control form-control-sm btn btn-warning btn-sm pull-right checkbox-toggle"><i class="fa fa-edit"> &nbsp;<?php echo ('Update'); ?></i></button>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <!-- <hr><hr> -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Search -->
    <!-- Display -->
    <div class="col-sm-8">
      <div class="card">
        <div class="card-header bg-dark">
          <h3 class="card-title">
            <i class="fa fa-list"></i> Partners List
          </h3>
          <!-- <a class="btn btn-warning pull-right" href="< ?= base_url('admin/transaction/payment_report/').$search->start_date.'/'.$search->end_date; ?>"><i class="fa fa-print"></i></a> -->
        </div>
        <div class="card-body">
          <table width="100%" class="datatable_colvis table table-striped table-bordered table-hover table-sm">
            <thead>
              <tr>
                <th><?php echo ('Unique Id') ?></th>
                <th><?php echo ('Image') ?></th>
                <th><?php echo ('Page Url') ?></th>
                <th><?php echo ('Description') ?></th>
                <th><?php echo ('Status') ?></th>
                <th><?php echo ('Action') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($partners)) { ?>
                <?php $sl = 1; ?>
                <?php foreach ($partners as $par) { ?>
                  <tr>
                    <td><?php echo $sl; ?></td>
                    <td><img src="<?= base_url($par->par_img_thumb); ?>" alt=""></td>
                    <td><?php echo $par->par_url ?></td>
                    <td>
                      <?php
                      echo $par->par_desc == null  ? 'Not Available' : $par->par_desc;
                      ?>

                    </td>
                    <td class="text-center">
                      <?php echo ($par->par_status) ?
                        '<i class="fa fa-check" aria-hidden="true"></i>' :
                        '<i class="fa fa-times" aria-hidden="true"></i>'; ?>
                    </td>
                    <!-- <td>
                      <div class="w-100 h-100">
                        <img class="w-25 h-25" src="<?php echo base_url() . $par->par_img_path; ?>">
                      </div>
                    </td> -->
                    <td class="text-center" width="100">
                      <?php if (!in_array($par->par_id, [])) { ?>
                        <a href="<?php echo base_url("admin/partners/edit/$par->par_id") ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url("admin/partners/delete/$par->par_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo ('Are You Sure') ?>') "><i class="fa fa-trash"></i></a>
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
<!-- <script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/jquery-validation/jquery.validate.min.js"></script> -->

<!-- <script src="<?php echo base_url('vendor/almasaeed2010/adminlte/'); ?>plugins/jquery-validation/additional-methods.min.js"></script> -->

<script type="text/javascript">
  $(document).ready(function() {
    $(function() {
      // $('#save_type_form').validate({
      //   rules: {
      //     dept_name: {
      //       required: true,
      //     },
      //     par_status: {
      //       required: true,
      //     }
      //   },
      //   messages: {
      //     dept_name: {
      //       required: "Please provide a Property Label Name"
      //     },
      //     par_status: {
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