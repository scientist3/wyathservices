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
              <form role="form" action="<?php echo site_url('../admin/candidate/course/insert') ?>" method="post" id="save_type_form" enctype="multipart/form-data">

                <div class="row">

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="coursename"><?php echo ('Course Name'); ?></label> <small class="req"> *</small>
                      <input name="coursename" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Course Name') ?>" id="coursename" value="" data-toggle="tooltip" title="<?php echo ('Course Name'); ?>">
                      <?php echo form_error('gal_img_caption', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="coursetype"><?php echo ('Course Type'); ?></label> <small class="req"> *</small>
                      <input name="coursetype" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Course Type') ?>" id="coursetype" value="" data-toggle="tooltip" title="<?php echo ('Course Type'); ?>">
                      <?php echo form_error('coursetype', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>


                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="sectorcovered"><?php echo ('Sector Covered'); ?></label> <small class="req"> *</small>
                      <input name="sectorcovered" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Sector Covered') ?>" id="sectorcovered" value="" data-toggle="tooltip" title="Sector Covered">
                      <?php echo form_error('sectorcovered', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="coursefee"><?php echo ('Course Fee'); ?></label> <small class="req"> *</small>
                      <input name="coursefee" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Course Fee') ?>" id="coursefee" value="" data-toggle="tooltip" title="<?php echo ('Course Fee'); ?>">
                      <?php echo form_error('coursefee', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="feepaidBy"><?php echo ('Fee PaidBy'); ?></label> <small class="req"> *</small>
                      <input name="feepaidBy" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Fee PaidBy') ?>" id="feepaidBy" value="" data-toggle="tooltip" title="<?php echo ('Fee PaidBy'); ?>">
                      <?php echo form_error('feepaidBy', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <!-- Submit -->
                  <div class="col-sm-12 ">
                    <div class="form-group">
                      <!-- <label>Submit</label> -->
                      <?php if ($this->uri->segment(3) != "edit") {?>
                        <button type="submit" name="save" value="add_station" class="form-control form-control-sm btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-plus"> &nbsp;<?php echo ('Save'); ?></i></button>
                      <?php } else {?>
                        <button type="submit" name="save" value="edit_station" class="form-control form-control-sm btn btn-warning btn-sm pull-right checkbox-toggle"><i class="fa fa-edit"> &nbsp;<?php echo ('Update'); ?></i></button>
                      <?php }?>
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
            <i class="fa fa-list"></i> View Course
          </h3>
          <!-- <a class="btn btn-warning pull-right" href="< ?= base_url('admin/transaction/payment_report/').$search->start_date.'/'.$search->end_date; ?>"><i class="fa fa-print"></i></a> -->
        </div>
        <div class="card-body">
          <table width="100%" class="datatable_colvis table table-striped table-bordered table-hover table-sm">
            <thead>
              <tr>
                <th><?php echo ('Unique Id') ?></th>
                <th><?php echo ('Course Name') ?></th>
                <th><?php echo ('Course Type') ?></th>
                <th><?php echo ('Sector Covered') ?></th>
                <th><?php echo ('Course Fee') ?></th>
                <th><?php echo ('Fee PaidBy') ?></th>
                <th><?php echo ('Action') ?></th>
              </tr>
            </thead>
            <tbody>

                      <?php if (!empty($courselists)) { ?>
                <?php $sl = 1; ?>
                <?php foreach ($courselists as $st) { ?>
                  <tr>
                    <td><?php echo $st->course_id; ?></td>
                    <td><?php echo $st->course_name; ?></td>
                    <td><?php echo $st->course_type; ?></td>
                    <td><?php echo $st->sector_covered; ?></td>
                    <td><?php echo $st->course_fee; ?></td>
                    <td><?php echo $st->fee_paid_by; ?></td>
                    <td> 
                      <a href="<?php echo base_url("admin/candidate/course/edit/$st->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>

    <a href=" <?php echo base_url("admin/candidate/course/delete/$st->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo ('Are You Sure') ?>') "><i class="fa fa-trash"></i></a></td>
           
              
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