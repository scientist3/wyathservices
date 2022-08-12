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
              <form role="form" action="<?php echo site_url('../admin/candidate/trainingcenter/index') ?>" method="post"
                id="save_type_form" enctype="multipart/form-data">
                <?php echo form_input([
                  'type'  => 'hidden',
                  'name'  => 'tc_id',
                  'id'    => 'tc_id',
                  'value' =>  $input->tc_id,
                ]) ?>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="tc_tc_id"><?php echo ('Training Center ID'); ?></label> <small class="req">
                        *</small>
                      <input name="tc_tc_id" class="form-control <?= $input_height . ' ' . (form_error("tc_tc_id") ? 'is-invalid' : null) ?>
                      " type="text" placeholder="<?php echo ('Training Center Name') ?>" id="tc_tc_id"
                        value="<?php echo  $input->tc_tc_id ?>">
                      <?php echo form_error('tc_tc_id'); ?>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="tc_name"><?php echo ('Training Center Name'); ?></label> <small class="req"> *</small>
                      <input name="tc_name" class="form-control <?= $input_height . ' ' . (form_error("tc_name") ? 'is-invalid' : null) ?>
                      " type="text" placeholder="<?php echo ('Training Center Name') ?>" id="tc_name"
                        value="<?php echo $input->tc_name ?>">
                      <?php echo form_error('tc_name'); ?>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="tc_address"><?php echo ('Training Center Address'); ?></label> <small class="req">
                        *</small>
                      <input name="tc_address" class="form-control <?= $input_height . ' ' . (form_error("tc_address") ? 'is-invalid' : null) ?>
                      " type="text" placeholder="<?php echo ('Training Center Address') ?>" id="tc_address"
                        value="<?php echo $input->tc_address ?>" data-toggle="tooltip"
                        title="<?php echo ('Agency ID'); ?>">
                      <?php echo form_error('tc_address'); ?>
                    </div>
                  </div>


                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="tc_district"><?php echo ('Training Center District'); ?></label> <small class="req">
                        *</small>
                      <input name="tc_district" class="form-control <?= $input_height . ' ' . (form_error("tc_district") ? 'is-invalid' : null) ?>
                      " type="text" placeholder="<?php echo ('Training Center District') ?>" id="tc_district"
                        value="<?php echo $input->tc_district ?>" data-toggle="tooltip" title="Agency Name">
                      <?php echo form_error('tc_district'); ?>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="tc_pincode"><?php echo ('Training Center PINCode'); ?></label> <small class="req">
                        *</small>
                      <input name="tc_pincode" class="form-control <?= $input_height . ' ' . (form_error("tc_pincode") ? 'is-invalid' : null) ?>
                      " type="text" placeholder="<?php echo ('Training Center PINCode') ?>" id="tc_pincode"
                        value="<?php echo $input->tc_pincode ?>" data-toggle="tooltip"
                        title="<?php echo ('Assessor ID'); ?>">
                      <?php echo form_error('tc_pincode'); ?>
                    </div>
                  </div>
                  <!-- Submit -->
                  <div class="col-sm-12 ">
                    <div class="form-group">
                      <?php if (empty($input->tc_id)) { ?>
                      <button type="submit" name="save" value="add_station"
                        class="form-control btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-plus">
                          &nbsp;<?php echo ('Save'); ?></i></button>
                      <?php } else { ?>
                      <button type="submit" name="save" value="edit_station"
                        class="form-control btn btn-warning btn-sm pull-right checkbox-toggle"><i class="fa fa-edit">
                          &nbsp;<?php echo ('Update'); ?></i></button>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Display -->
    <div class="col-sm-8">
      <div class="card">
        <div class="card-header bg-dark">
          <h3 class="card-title">
            <i class="fa fa-list"></i> View Training Centers
          </h3>
        </div>
        <div class="card-body">
          <table width="100%" class="datatable_colvis table table-striped table-bordered table-hover table-sm">
            <thead>
              <tr>
                <th><?php echo ('Training Center Id') ?></th>
                <th><?php echo ('Training Center Name') ?></th>
                <th><?php echo ('Training Center Address ') ?></th>
                <th><?php echo ('Training Center District') ?></th>
                <th><?php echo ('Training Center PINCode') ?></th>
                <th><?php echo ('Action') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($trainingcenters)) { ?>
              <?php $sl = 1; ?>
              <?php foreach ($trainingcenters as $trainingcenter) { ?>
              <tr>
                <td><?php echo $trainingcenter->tc_tc_id ?></td>
                <td><?php echo $trainingcenter->tc_name ?></td>
                <td><?php echo $trainingcenter->tc_address ?></td>
                <td><?php echo $trainingcenter->tc_district ?></td>
                <td><?php echo $trainingcenter->tc_pincode ?></td>
                <td>
                  <a href="<?php echo base_url("/admin/candidate/trainingcenter/index/$trainingcenter->tc_id") ?>"
                    class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                  <a href="<?php echo base_url("/admin/candidate/trainingcenter/delete/$trainingcenter->tc_id") ?>"
                    class="btn btn-xs btn-danger" onclick="return confirm('<?php echo ('Are You Sure') ?>') "><i
                      class="fa fa-trash"></i></a>
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