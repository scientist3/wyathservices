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
              <form role="form" action="<?php echo site_url('admin/gallery/create') ?>" method="post" id="save_type_form" enctype="multipart/form-data">
                <?php echo form_hidden('gal_id', $input->gal_id) ?>
                <div class="row">
                  <!-- Image Caption -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="gal_img_caption"><?php echo ('Image Caption'); ?></label> <small class="req"> *</small>
                      <input name="gal_img_caption" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Title') ?>" id="gal_img_caption" value="<?php echo $input->gal_img_caption ?>" data-toggle="tooltip" title="<?php echo ('Image Caption'); ?>">
                      <?php echo form_error('gal_img_caption', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <!-- Event  -->

                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo ('Select Event'); ?></label>
                      <?php echo form_dropdown('gal_event_id', $event_list, $input->gal_event_id, 'class="form-control" id="gal_event_id" '); ?>
                      <?php echo form_error('gal_event_id', '<span class="badge badge-danger text-xs d-block p-1 mt-1"> ', '</span>'); ?>
                    </div>
                  </div>
                  <!-- image -->
                  <div class="form-group row col-sm-12">
                    <label for="gal_img_path" class="col-sm-12 col-form-label"><?php echo ('Upload Image') ?> </label>
                    <div class="col-sm-12">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="gal_img_path" id="gal_img_path">
                        <label class="custom-file-label" for="gal_img_path">Choose file</label>
                        <input type="hidden" name="gal_img_path_old" value="<?php echo $input->gal_img_path ?>">
                      </div>
                    </div>
                  </div>
                  <!-- if setting image is already uploaded -->
                  <?php if (!empty($input->gal_img_path)) {  ?>
                    <div class="form-group row">
                      <label for="gal_img_path" class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <img src="<?php echo base_url($input->gal_img_path) ?>" alt="s_img_path" class="img-thumbnail w-50 h-100" />
                      </div>
                    </div>
                  <?php } ?>
                  <!-- Satus -->
                  <div class="col-sm-12">
                    <div class="form-group ">
                      <label for="gal_status"><?php echo ('Status'); ?></label>
                      <div class="form-check row form-inline form-control-sm">
                        <div class="col-6 form-inline">
                          <label class=" radio-inline">
                            <input type="radio" name="gal_status" value="1" <?= ($input->gal_status == '1' || ($input->gal_status != '0')) ? 'checked' : null; ?> data-toggle="tooltip" title="Active status">&nbsp;
                            <?php echo ('Active') ?>
                          </label>
                        </div>
                        <div class="col-6 form-inline">
                          <label class=" radio-inline">
                            <input type="radio" name="gal_status" value="0" <?= ($input->gal_status == '0') ? 'checked' : null; ?> data-toggle="tooltip" title="Disabled status"> &nbsp;<?php echo ('Inactive') ?>
                          </label>
                        </div>
                        <br>
                      </div>
                      <?php echo form_error('gal_status', '<span class="badge bg-danger p-1">', '</span>'); ?>
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
            <i class="fa fa-list"></i> Gallery List
          </h3>
          <!-- <a class="btn btn-warning pull-right" href="< ?= base_url('admin/transaction/payment_report/').$search->start_date.'/'.$search->end_date; ?>"><i class="fa fa-print"></i></a> -->
        </div>
        <div class="card-body">
          <table width="100%" class="datatable_colvis table table-striped table-bordered table-hover table-sm">
            <thead>
              <tr>
                <!-- <th><?php echo ('Unique Id') ?></th> -->
                <th><?php echo ('Event') ?></th>
                <th><?php echo ('Title') ?></th>
                <th><?php echo ('Image') ?></th>
                <th><?php echo ('Status') ?></th>
                <th><?php echo ('Action') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($gallery)) { ?>
                <?php $sl = 1; ?>
                <?php foreach ($gallery as $image) { ?>
                  <tr>
                    <!-- <td><?php echo $sl; ?></td> -->
                    <td><?php echo $event_list[$image->gal_event_id]  ?></td>
                    <td><?php echo $image->gal_img_caption ?></td>
                    <td><img src="<?= base_url($image->gal_img_thumb); ?>" alt=""></td>
                    <td class="text-center">
                      <?php echo ($image->gal_status) ?
                        '<i class="fa fa-check" aria-hidden="true"></i>' :
                        '<i class="fa fa-times" aria-hidden="true"></i>'; ?>
                    </td>
                    <td class="text-center" width="100">
                      <?php if (!in_array($image->gal_id, [])) { ?>
                        <a href="<?php echo base_url("admin/gallery/edit/$image->gal_id") ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url("admin/gallery/delete/$image->gal_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo ('Are You Sure') ?>') "><i class="fa fa-trash"></i></a>
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