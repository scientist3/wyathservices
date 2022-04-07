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
              <form role="form" action="<?php echo site_url('admin/event/create') ?>" method="post" id="save_type_form" enctype="multipart/form-data">
                <?php echo form_hidden('news_id', $input->news_id) ?>
                <div class="row">

                  <!-- type -->
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo ('Type'); ?></label><small class="req"> *</small>
                      <?php
                      $type = ['news' => 'News', 'notification' => 'Notification', 'event' => 'Event', 'carriers' => 'Carrier'];
                      echo form_dropdown('news_type', $type, $input->news_type, 'class="form-control" id="news_type" '); ?>
                      <?php echo form_error('news_type', '<span class="badge badge-danger text-xs d-block p-1 mt-1"> ', '</span>'); ?>
                    </div>
                  </div>

                  <!-- Title -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="news_title"><?php echo (' Title'); ?></label> <small class="req"> *</small>
                      <input name="news_title" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Title') ?>" id="news_title" value="<?php echo $input->news_title ?>" data-toggle="tooltip" title="<?php echo (' Title'); ?>">
                      <?php echo form_error('news_title', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>


                  <!-- Description -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="news_desc"><?php echo (' Description'); ?></label> <small class="req"> *</small>
                      <textarea name="news_desc" class="form-control form-control-sm" type="tex" placeholder="<?php echo ('Description') ?>" id="news_desc" data-toggle="tooltip" title="<?php echo (' Description'); ?>" rows="6"><?php echo $input->news_desc ?></textarea>
                      <?php echo form_error('news_desc', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <!-- link -->
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="news_link"><?php echo ('Link'); ?></label>
                      <input name="news_link" class="form-control form-control-sm" type="text" placeholder="<?php echo ('link') ?>" id="news_link" value="<?php echo $input->news_link ?>" data-toggle="tooltip" title="<?php echo ('Link'); ?>">
                      <?php echo form_error('news_link', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                  <!-- file -->
                  <div class="form-group row col-sm-12">
                    <label for="news_doc_link" class="col-sm-12 col-form-label"><?php echo ('Document') ?> </label>
                    <div class="col-sm-12">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="news_doc_link" id="news_doc_link">
                        <label class="custom-file-label" for="news_doc_link">Choose file</label>
                        <input type="hidden" name="news_doc_link_old" value="<?php echo $input->news_doc_link ?>">
                      </div>
                    </div>
                  </div>

                  <!-- Satus -->
                  <div class="col-sm-12">
                    <div class="form-group ">
                      <label for="news_status"><?php echo ('Status'); ?></label>
                      <div class="form-check row form-inline form-control-sm">
                        <div class="col-6 form-inline">
                          <label class=" radio-inline">
                            <input type="radio" name="news_status" value="1" <?= ($input->news_status == '1' || ($input->news_status != '0')) ? 'checked' : null; ?> data-toggle="tooltip" title="Active status">&nbsp;
                            <?php echo ('Active') ?>
                          </label>
                        </div>
                        <div class="col-6 form-inline">
                          <label class=" radio-inline">
                            <input type="radio" name="news_status" value="0" <?= ($input->news_status == '0') ? 'checked' : null; ?> data-toggle="tooltip" title="Disabled status"> &nbsp;<?php echo ('Inactive') ?>
                          </label>
                        </div>
                        <br>
                      </div>
                      <?php echo form_error('news_status', '<span class="badge bg-danger p-1">', '</span>'); ?>
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
            <i class="fa fa-list"></i> News | Notification | Event List
          </h3>
          <!-- <a class="btn btn-warning pull-right" href="< ?= base_url('admin/transaction/payment_report/').$search->start_date.'/'.$search->end_date; ?>"><i class="fa fa-print"></i></a> -->
        </div>
        <div class="card-body">
          <table width="100%" class="datatable_colvis table table-striped table-bordered table-hover table-sm">
            <thead>
              <tr>
                <th><?php echo ('Type') ?></th>
                <th><?php echo ('Title') ?></th>
                <th><?php echo ('Description') ?></th>
                <th><?php echo ('Status') ?></th>
                <th><?php echo ('Action') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($news)) { ?>
                <?php $sl = 1; ?>
                <?php foreach ($news as $ev) { ?>
                  <tr>
                    <td><?php echo ucfirst($ev->news_type); ?></td>
                    <td><?php echo $ev->news_title ?></td>
                    <td>
                      <?php $message_content =  (strlen($ev->news_desc) > 20) ? (substr($ev->news_desc, 0, 20) . "...") : $ev->news_desc;
                      echo htmlspecialchars($message_content);
                      ?>
                    </td>
                    <td class="text-center">
                      <?php echo ($ev->news_status) ?
                        '<i class="fa fa-check" aria-hidden="true"></i>' :
                        '<i class="fa fa-times" aria-hidden="true"></i>'; ?>
                    </td>
                    <td class="text-center" width="100">
                      <?php if (!in_array($ev->news_id, [])) { ?>
                        <a href="<?php echo base_url("admin/event/edit/$ev->news_id") ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url("admin/event/delete/$ev->news_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo ('Are You Sure') ?>') "><i class="fa fa-trash"></i></a>
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