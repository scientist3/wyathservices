<!-- Main content -->
<section class="content">
  <div class="row">



    <!-- Save -->
    <div class="col-sm-6">
      <div class="card">
        <div class="card-header bg-dark">
          <h3 class="card-title"><i class="fa fa-plus"></i> <?php echo $subtitle; ?></h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
            <!-- ?php echo site_url('admin/gallery/create') ?> -->
              <form role="form" action="<?php echo site_url('/admin/candidate/trainingcenter/update') ?>" method="post" id="save_type_form" enctype="multipart/form-data">
                  <div class="col-sm-10">
                    <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo $input[0]['id'] ?>">

                      
                    </div>

                  </div>
                    <div class="col-sm-12">
                    <div class="form-group">
                      <label for="trainingcentername"><?php echo ('Training Center Name'); ?></label> <small class="req"> *</small>
                      <input name="trainingcentername" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Training Center Name') ?>" id="trainingcentername" value="<?php echo $input[0]["training_center_name"] ?>" data-toggle="tooltip" title="<?php echo ('Assessment Mode'); ?>">
                      <?php echo form_error('trainingcentername', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="trainingcenteraddress"><?php echo ('Training Center Address'); ?></label> <small class="req"> *</small>
                      <input name="trainingcenteraddress" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Training Center Address') ?>" id="trainingcenteraddress" value="<?php echo $input[0]["training_center_address"] ?>
" data-toggle="tooltip" title="<?php echo ('Agency ID'); ?>">
                      <?php echo form_error('trainingcenteraddress', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>


                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="trainingcenterdistrict"><?php echo ('Training Center District'); ?></label> <small class="req"> *</small>
                      <input name="trainingcenterdistrict" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Training Center District') ?>" id="trainingcenterdistrict" value="<?php echo $input[0]["training_center_district"] ?>
" data-toggle="tooltip" title="Agency Name">
                      <?php echo form_error('trainingcenterdistrict', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="trainingcenterpincode"><?php echo ('Training Center PINCode'); ?></label> <small class="req"> *</small>
                      <input name="trainingcenterpincode" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Training Center PINCode') ?>" id="trainingcenterpincode" value="<?php echo $input[0]["training_center_pincode"] ?>
" data-toggle="tooltip" title="<?php echo ('Assessor ID'); ?>">
                      <?php echo form_error('trainingcenterpincode', '<span class="badge bg-danger p-1">', '</span>'); ?>
                    </div>
                  </div>



                  <!-- Submit -->
                  <div class="col-sm-12 ">
                    <div class="form-group">
                      <!-- <label>Submit</label> -->
                      <?php if ($this->uri->segment(4) != "edit") {?>
                        <button type="submit" name="save" value="add_station" class="form-control form-control-sm btn btn-primary btn-sm pull-right checkbox-toggle"><i class="fa fa-plus"> &nbsp;<?php echo ('Save'); ?></i></button>
                      <?php } else {?>
                        <button style="color: ;" type="submit" name="save" value="edit_station" class="form-control form-control-sm btn btn-info btn-sm pull-right checkbox-toggle"><i class="fa fa-edit"> &nbsp;<?php echo ('Update'); ?></i></button>
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
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header bg-dark">
          <h3 class="card-title">
            <i class="fa fa-list"></i> View Training Centers
          </h3>
          <!-- <a class="btn btn-warning pull-right" href="< ?= base_url('admin/transaction/payment_report/').$search->start_date.'/'.$search->end_date; ?>"><i class="fa fa-print"></i></a> -->
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

            <?php if (!empty($trc)) { ?>
                <?php $sl = 1; ?>
                <?php foreach ($trc as $tc) { ?>
                  <tr>
                    <td><?php echo $tc->tc_id?></td>
                    <td><?php echo $tc->training_center_name?></td>
                    <td><?php echo $tc->training_center_address?></td>
                    <td><?php echo $tc->training_center_district?></td>
                    <td><?php echo $tc->training_center_pincode?></td>
                    <td>
     <a href="<?php echo base_url("/admin/candidate/trainingcenter/edit/$tc->id") ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
    <a href="<?php echo base_url("/admin/candidate/trainingcenter/trcdelete/$tc->id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo ('Are You Sure') ?>') "><i class="fa fa-trash"></i></a>  
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