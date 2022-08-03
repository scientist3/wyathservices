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


              <!-- ?php echo site_url('admin/gallery/create') ?> -->
              <form role="form" action="<?php echo site_url('../admin/candidate/batch/batchinsert') ?>" method="post"
                id="save_type_form" enctype="multipart/form-data">

                <div class="row">

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="batchtype"><?php echo ('Batch Type'); ?></label> <small class="req"> *</small>
                      <input name="batchtype" class="form-control form-control-sm" type="text"
                        placeholder="<?php echo ('Batch Type') ?>" id="batchtype" style="padding:18px;"
                        value="<?= set_value('batchtype') ?>">

                      <?php echo form_error("batchtype", '<span class="badge bg-danger p-1">', '</span>'); ?>

                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="startdate"><?php echo ('Start Date'); ?></label> <small class="req"> *</small>
                      <input name="startdate" class="form-control form-control-sm" type="date"
                        placeholder="<?php echo ('Start Date') ?>" id="startdate" style="padding:18px;"
                        value="<?= set_value('startdate') ?>">
                      <?php echo form_error('startdate', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="enddate"><?php echo ('End Date'); ?></label> <small class="req"> *</small>
                      <input name="enddate" class="form-control form-control-sm" type="date"
                        placeholder="<?php echo ('End Date') ?>" id="enddate" style="padding:18px;"
                        value="<?= set_value('enddate') ?>">
                      <?php echo form_error('enddate', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <!-- <div class="col-sm-12">
                  <div class="form-group">
                  <label for="courseid"><?php echo ('Course List'); ?></label> <small class="req"> *</small>
                  <input name="courseid" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Course ID') ?>" id="courseid" style="padding:18px;" value="<?= set_value('courseid') ?>" >
                  <?php echo form_error("courseid", '<span class="badge bg-danger p-1">', '</span>'); ?>
  
                </div>
                </div> -->

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="courseid"><?php echo ('Course ID'); ?></label> <small class="req"> *</small>
                      <?php echo form_dropdown('courseid', $courselist, 1, 'class="form-control" id="courseid" name="courseid" '); ?>
                      <?php echo form_error("courseid", '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="trainername"><?php echo ('Trainer Name'); ?></label> <small class="req"> *</small>
                      <input name="trainername" class="form-control form-control-sm" type="text"
                        placeholder="<?php echo ('Trainer Name') ?>" id="trainername" style="padding:18px;"
                        value="<?= set_value('trainername') ?>">
                      <?php echo form_error("trainername", '<span class="badge bg-danger p-1">', '</span>'); ?>

                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="trainingcenterid"><?php echo ('Training Center ID'); ?></label> <small class="req">
                        *</small>
                      <?php echo form_dropdown('trainingcenterid', $traininglist, 1, 'class="form-control" id="trainingcompleted" name="trainingcompleted" '); ?>

                      <?php echo form_error("trainingcenterid", '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="trainingcompleted"><?php echo ('Training Completed'); ?></label> <small class="req">
                        *</small>
                      <?php echo form_dropdown('trainingcompleted', $trainingcompleted, 1/*$user->user_role*/, 'class="form-control" id="trainingcompleted" name="trainingcompleted" '); ?>
                      <?php echo form_error("trainingcompleted", '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="assessmentcompleted"><?php echo ('Assessment Completed'); ?></label> <small
                        class="req"> *</small>
                      <?php echo form_dropdown('assessmentcompleted', $assessmentcompleted, 1/*$user->user_role*/, 'class="form-control" id="assessmentcompleted" name="assessmentcompleted" '); ?>
                      <?php echo form_error("assessmentcompleted", '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="assessmentid"><?php echo ('Assessment ID'); ?></label> <small class="req"> *</small>
                      <input name="assessmentid" class="form-control form-control-sm" type="text"
                        placeholder="<?php echo ('Assessment ID') ?>" id="assessmentid" style="padding:18px;"
                        value="<?= set_value('assessmentid') ?>">
                      <?php echo form_error("assessmentid", '<span class="badge bg-danger p-1">', '</span>'); ?>

                    </div>
                  </div>

                  <!-- Submit -->
                  <div class="col-sm-12 ">
                    <div class="form-group">
                      <!-- <label>Submit</label> -->
                      <?php if ($this->uri->segment(3) != "edit") { ?>
                      <button type="submit" name="save" value="add_station"
                        class="form-control form-control-sm btn btn-primary btn-sm pull-right checkbox-toggle"><i
                          class="fa fa-plus"> &nbsp;<?php echo ('Save'); ?></i></button>
                      <?php } else { ?>
                      <button type="submit" name="save" value="edit_station"
                        class="form-control form-control-sm btn btn-warning btn-sm pull-right checkbox-toggle"><i
                          class="fa fa-edit"> &nbsp;<?php echo ('Update'); ?></i></button>
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
            <i class="fa fa-list"></i> View Batch
          </h3>
          <!-- <a class="btn btn-warning pull-right" href="< ?= base_url('admin/transaction/payment_report/').$search->start_date.'/'.$search->end_date; ?>"><i class="fa fa-print"></i></a> -->
        </div>
        <div class="card-body">
          <table width="100%" class="datatable_colvis table table-striped table-bordered table-hover table-sm">
            <thead>
              <tr>

                <th><?php echo ('Unique Id') ?></th>
                <th><?php echo ('Batch  Type') ?></th>
                <th><?php echo ('Start Date') ?></th>
                <th><?php echo ('End Date') ?></th>
                <th><?php echo ('Course ID') ?></th>
                <th><?php echo ('Trainer Name') ?></th>
                <th><?php echo ('Traning Center ID') ?></th>
                <th><?php echo ('Training Completed') ?></th>
                <th><?php echo ('Assessment Completed') ?></th>
                <th><?php echo ('Assessment ID ') ?></th>
                <th><?php echo ('Action') ?></th>
              </tr>
            </thead>
            <tbody>
              <!--  -->
              <?php if (!empty($batch)) { ?>
              <?php $sl = 1; ?>
              <?php foreach ($batch as $bt) { ?>
              <tr>
                <td><?php echo $bt->bch_id ?></td>
                <td><?php echo $bt->batch_type ?></td>
                <td><?php echo $bt->start_date ?></td>
                <td><?php echo $bt->end_date ?></td>
                <td><?php echo $bt->course_id ?></td>

                <td><?php echo $bt->trainer_name ?></td>
                <td><?php echo $bt->tc_id ?></td>
                <td>
                  <?php
                      if ($bt->training_completed == 1) {
                        echo "No";
                      } else {
                        echo "Yes";
                      }
                      ?>
                </td>

                <td>

                  <?php
                      if ($bt->assessment_completed == 1) {
                        echo "No";
                      } else {
                        echo "Yes";
                      }
                      ?>
                </td>
                <td><?php echo $bt->as_id ?></td>
                <td>
                  <a href="<?php echo base_url("admin/candidate/batch/edit/$bt->id") ?>"
                    class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>

                  <a href="<?php echo base_url("/admin/candidate/batch/batchdelete/$bt->id") ?>"
                    class="btn btn-xs btn-danger" onclick="return confirm('<?php echo ('Are You Sure') ?>') "><i
                      class="fa fa-trash"></i></a>




              </tr>
              <?php $sl++; ?>
              <?php } ?>
              <?php } ?>
              <!--  -->







            </tbody>
          </table> <!-- /.table-responsive -->
        </div>
      </div>
    </div>
  </div>
</section>

<!-- jQuery -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/') ?>plugins/jquery/jquery.min.js"></script>