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
              <form role="form" action="<?php echo site_url('admin/BoardMembers/create') ?>" method="post" id="save_type_form" enctype="multipart/form-data">
                <?php echo form_hidden('bm_id', $input->bm_id) ?>
                <div class="row">
                  <!-- Name -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="bm_name"><?php echo ('Name'); ?></label> <small class="req"> *</small>
                      <input name="bm_name" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Name') ?>" id="bm_name" value="<?php echo $input->bm_name ?>" data-toggle="tooltip" title="<?php echo ('Name'); ?>">
                      <?php echo form_error('bm_name', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <!-- Designation -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="bm_desig"><?php echo ('Designation'); ?></label> <small class="req"> *</small>
                      <input name="bm_desig" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Designation') ?>" id="bm_name" value="<?php echo $input->bm_desig ?>" data-toggle="tooltip" title="<?php echo ('Designation'); ?>">
                      <?php echo form_error('bm_desig', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <!-- chairman message -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="bm_chairman_msg"><?php echo ('Chairman Message'); ?></label> <small class="req"> *</small>
                      <textarea name="bm_chairman_msg" class="form-control form-control-sm" type="tex" placeholder="<?php echo ('Chairman Message') ?>" id="bm_chairman_msg" data-toggle="tooltip" title="<?php echo ('Chairman Message'); ?>"><?php echo $input->bm_chairman_msg ?></textarea>
                      <?php echo form_error('bm_chairman_msg', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                  <!-- image -->
                  <div class="form-group row col-sm-12">
                    <label for="bm_img_path" class="col-sm-12 col-form-label"><?php echo ('Partner Image') ?> </label>
                    <div class="col-sm-12">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="bm_img_path" id="bm_img_path">
                        <label class="custom-file-label" for="par_img_path">Choose file</label>
                        <input type="hidden" name="bm_img_path_old" value="<?php echo $input->bm_img_path ?>">
                        <input type="hidden" name="bm_img_thumb_old" value="<?php echo $input->bm_img_thumb ?>">
                      </div>
                    </div>
                  </div>
                  <!-- if setting image is already uploaded -->
                  <?php if (!empty($input->bm_img_path)) {  ?>
                    <div class="form-group row">
                      <label for="par_img_path" class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <img src="<?php echo base_url($input->bm_img_path) ?>" alt="bm_img_path" class="img-thumbnail w-50 h-100" />
                      </div>
                    </div>
                  <?php } ?>

                  <!-- is Chairman -->
                  <div class="form-group col-sm-12">
                    <div class="row">
                      <div class="col-sm-6">
                        <label for="bm_ischairman"><?php echo ('Is Chairman '); ?></label>
                      </div>
                      <div class="col-sm-6">
                        <input type="checkbox" <?php echo $input->bm_ischairman == 1 ? 'checked' : null ?> name="bm_ischairman">
                      </div>
                    </div>
                  </div>

                  <!-- Satus -->
                  <div class="col-sm-12">
                    <div class="form-group ">
                      <label for="bm_status"><?php echo ('Status'); ?></label>
                      <div class="form-check row form-inline form-control-sm">
                        <div class="col-6 form-inline">
                          <label class=" radio-inline">
                            <input type="radio" name="bm_status" value="1" <?= ($input->bm_status == '1'  || ($input->bm_status != '0')) ? 'checked' : null; ?> data-toggle="tooltip" title="Active status">&nbsp;
                            <?php echo ('Active') ?>
                          </label>
                        </div>
                        <div class="col-6 form-inline">
                          <label class=" radio-inline">
                            <input type="radio" name="bm_status" value="0" <?= ($input->bm_status == '0') ? 'checked' : null; ?> data-toggle="tooltip" title="Disabled status"> &nbsp;<?php echo ('Inactive') ?>
                          </label>
                        </div>
                        <br>
                      </div>
                      <?php echo form_error('bm_status', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <!-- Which Page -->
                  <div class="col-sm-12">
                    <div class="form-group ">
                      <label for="bm_page"><?php echo ('Select Page'); ?></label>
                      <div class="form-check row form-inline form-control-sm">
                        <div class="col-6 form-inline">
                          <label class=" radio-inline">
                            <input type="radio" name="bm_page" value="directors" <?= ($input->bm_page == 'directors') ? 'checked' : null; ?> data-toggle="tooltip" title="Airectors Page"> &nbsp;
                            <?php echo ('Directors') ?>
                          </label>
                        </div>
                        <div class="col-6 form-inline">
                          <label class=" radio-inline">
                            <input type="radio" name="bm_page" value="advisory" <?= ($input->bm_page == 'advisory') ? 'checked' : null; ?> data-toggle="tooltip" title="Advisory Page">&nbsp;
                            <?php echo ('Advisory') ?>
                          </label>
                        </div>
                        <br>
                      </div>
                      <?php echo form_error('bm_page', '<span class="badge bg-danger p-1">', '</span>'); ?>
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
            <i class="fa fa-list"></i> Services / Initiatives List
          </h3>
          <!-- <a class="btn btn-warning pull-right" href="< ?= base_url('admin/transaction/payment_report/').$search->start_date.'/'.$search->end_date; ?>"><i class="fa fa-print"></i></a> -->
        </div>
        <div class="card-body">
          <table width="100%" class="datatable_colvis table table-striped table-bordered table-hover table-sm">
            <thead>
              <tr>
                <th><?php echo ('Unique Id') ?></th>
                <th><?php echo ('Name') ?></th>
                <th><?php echo ('Image') ?></th>
                <th><?php echo ('Designation') ?></th>
                <th><?php echo ('Chairman') ?></th>
                <th><?php echo ('Chairman Message') ?></th>
                <th><?php echo ('Status') ?></th>
                <th><?php echo ('Directors Page') ?></th>
                <th><?php echo ('Action') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($boardmember)) { ?>
                <?php $sl = 1; ?>
                <?php foreach ($boardmember as $bm) { ?>
                  <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo $bm->bm_name ?></td>
                    <td><img src="<?= base_url($bm->bm_img_thumb); ?>" alt=""></td>
                    <td><?php echo $bm->bm_desig ?></td>
                    <td class="text-center">
                      <?php echo ($bm->bm_ischairman) ?
                        '<i class="fa fa-check" aria-hidden="true"></i>' :
                        '<i class="fa fa-times" aria-hidden="true"></i>'; ?>
                    </td>
                    <td>
                      <?php
                      echo strlen($bm->bm_chairman_msg) > 20 ? substr($bm->bm_chairman_msg, 0, 20) . "..." : $bm->bm_chairman_msg;
                      ?>
                    </td>
                    <td class="text-center">
                      <?php echo ($bm->bm_status) ?
                        '<i class="fa fa-check" aria-hidden="true"></i>' :
                        '<i class="fa fa-times" aria-hidden="true"></i>'; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $bm->bm_page ?>
                    </td>
                    <td class="text-center" width="100">
                      <?php if (!in_array($bm->bm_id, [])) { ?>
                        <a href="<?php echo base_url("admin/BoardMembers/edit/$bm->bm_id") ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url("admin/BoardMembers/delete/$bm->bm_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo ('Are You Sure') ?>') "><i class="fa fa-trash"></i></a>
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