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
              <form role="form" action="<?php echo site_url('admin/banner/create') ?>" method="post" id="save_type_form" enctype="multipart/form-data">
                <?php echo form_hidden('b_id', $input->b_id) ?>
                <div class="row">
                  <!-- banner_title -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="b_title"><?php echo ('Banner Title'); ?></label> <small class="req"> *</small>
                      <input name="b_title" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Title') ?>" id="b_title" value="<?php echo $input->b_title ?>" data-toggle="tooltip" title="<?php echo ('Banner Title'); ?>">
                      <?php echo form_error('b_title', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                  <!-- image -->
                  <div class="form-group row col-sm-12">
                    <label for="b_img_path" class="col-sm-12 col-form-label"><?php echo ('Banner Image') ?> </label>
                    <div class="col-sm-12">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="b_img_path" id="b_img_path">
                        <label class="custom-file-label" for="b_img_path">Choose file</label>
                        <input type="hidden" name="b_img_path_old" value="<?php echo $input->b_img_path ?>">
                      </div>
                    </div>
                  </div>
                  <!-- if setting image is already uploaded -->
                  <?php if (!empty($input->b_img_path)) {  ?>
                    <div class="form-group row">
                      <label for="b_img_path" class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <img src="<?php echo base_url($input->b_img_path) ?>" alt="b_img_path" class="img-thumbnail w-50 h-100" />
                      </div>
                    </div>
                  <?php } ?>
                  <!-- Satus -->
                  <div class="form-group col-sm-12">
                    <div class="row">
                      <div class="col-sm-2">
                        <label for="b_isvisible"><?php echo ('Visible'); ?></label>
                      </div>
                      <div class="col-sm-4">
                        <input type="checkbox" <?php $input->b_isvisible ? 'checked' : null ?> name="b_isvisible">
                      </div>
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
            <i class="fa fa-list"></i> Banner List
          </h3>
          <!-- <a class="btn btn-warning pull-right" href="< ?= base_url('admin/transaction/payment_report/').$search->start_date.'/'.$search->end_date; ?>"><i class="fa fa-print"></i></a> -->
        </div>
        <div class="card-body">
          <table width="100%" class="datatable_colvis table table-striped table-bordered table-hover table-sm">
            <thead>
              <tr>
                <th><?php echo ('Unique Id') ?></th>
                <th><?php echo ('Title') ?></th>
                <th><?php echo ('Visible') ?></th>
                <!-- <th><?php echo ('Image') ?></th> -->
                <th><?php echo ('Action') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($banner)) { ?>
                <?php $sl = 1; ?>
                <?php foreach ($banner as $ban) { ?>
                  <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo $ban->b_title ?></td>
                    <td class="text-center">
                      <?php echo ($ban->b_isvisible) ?
                        '<i class="fa fa-check" aria-hidden="true"></i>' :
                        '<i class="fa fa-times" aria-hidden="true"></i>'; ?>
                    </td>
                    <!-- <td>
                      <div class="w-100 h-100">
                        <img class="w-25 h-25" src="<?php echo base_url() . $ban->b_img_path; ?>">
                      </div>
                    </td> -->
                    <td class="text-center" width="100">
                      <?php if (!in_array($ban->b_id, [])) { ?>
                        <a href="<?php echo base_url("admin/banner/edit/$ban->b_id") ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url("admin/banner/delete/$ban->b_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo ('Are You Sure') ?>') "><i class="fa fa-trash"></i></a>
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