<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- Save -->

    <!-- Search -->
    <!-- Display -->
    <div class="col-sm-12">
      <div class="card">
        <?php
// print_r($totaldata);
// echo "<br>";
//  print_r($alldata);
?>
        <div class="card-body">
          <table width="100%" class="datatable_colvis table table-striped table-bordered table-hover table-sm">
            <thead>

              <tr>

                <th><?php echo ('Student Id') ?></th>
                <th><?php echo ('Student Name') ?></th>
                <th><?php echo ('Parantage') ?></th>
                <th><?php echo ('Address') ?></th>
                <th><?php echo ('Mobile No') ?></th>
                <th><?php echo ('Email') ?></th>
                <th><?php echo ('Action') ?></th>
              </tr>
            </thead>
            <tbody>


                          <?php if (!empty($alldata)) { ?>
                <?php $sl = 1; ?>
                <?php foreach ($alldata as $st) { ?>
                  <tr>
                    <td><?php echo $st->c_id; ?></td>
                    <td><?php echo $st->c_full_name; ?></td>
                    <td><?php echo $st->c_father_name; ?></td>
                    <td><?php echo $st->c_perm_address; ?></td>
                    <td><?php echo $st->c_mobile; ?></td>
                    <td><?php echo $st->c_email; ?></td>
                    <td> 
                      <a href="<?php echo base_url("admin/candidate/registration/viewstudent/$st->c_id") ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>

    <a href=" <?php echo base_url("admin/candidate/registration/studentdelete/$st->c_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo ('Are You Sure') ?>') "><i class="fa fa-trash"></i></a></td>
           
              
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
<!-- mymodels -->
<div class="modal fade" id="modal-message" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header d-none">
        <h4 class="modal-title">Default Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body p-0">
        <div class="col-md-12 p-0">
          <div class="card card-primary card-outline m-0">

            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5 id="msg_subject"></h5>
                <h6>From:<span id="msg_name"></span> - <span id="msg_email"></span>
                  <span class="mailbox-read-time float-right" id="msg_date"></span>
                </h6>
              </div>

              <div class="mailbox-read-message">
                <p>Hello Admin,</p>
                <p id="msg_content"></p>
                <p>Thanks,<br>Admin</p>
              </div>

            </div>

          </div>

        </div>
      </div>

    </div>

  </div>

</div>
<!-- model end -->

<!-- jQuery -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/') ?>plugins/jquery/jquery.min.js"></script>