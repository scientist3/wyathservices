<section class="content">
  <!-- Display -->
  <div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header bg-dark">
          <h3 class="card-title">
            <i class="fa fa-list"></i> View Contact/ Messages
          </h3>
          <!-- <a class="btn btn-warning pull-right" href="< ?= base_url('admin/transaction/payment_report/').$search->start_date.'/'.$search->end_date; ?>"><i class="fa fa-print"></i></a> -->
        </div>

        <div class="card-body">
          <table width="100%" class="datatable_colvis table table-striped table-bordered table-hover table-sm">
            <thead>
              <tr>
                <th><?php echo ('Unique Id') ?></th>
                <th><?php echo ('Name') ?></th>
                <th><?php echo ('Email') ?></th>
                <th><?php echo ('Phone No') ?></th>
                <th><?php echo ('Subject') ?></th>
                <th><?php echo ('Message') ?></th>
                <th><?php echo ('Action') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($messages)) { ?>
                <?php $sl = 1; ?>
                <?php foreach ($messages as $message) { ?>
                  <tr>
                    <td><?php echo $sl; ?></td>
                    <td><?php echo $message->con_us_name ?></td>
                    <td><?php echo $message->con_us_email ?></td>
                    <td><?php echo $message->con_us_phoneno ?></td>
                    <td><?php echo $message->con_us_subject ?></td>
                    <td>
                      <?php
                      echo strlen($message->con_us_message) > 20 ? substr($message->con_us_message, 0, 20) . "..." : $message->con_us_message; ?>
                    </td>

                    <td class="text-center" width="100">
                      <?php if (!in_array($message->con_us_id, [])) { ?>
                        <button type="button" class="btn btn-xs btn-success btn_show_model" data-toggle="modal" data-target="#modal-message" data-name="<?= $message->con_us_name ?>" data-email="<?= $message->con_us_email ?>" data-phone="<?= $message->con_us_phoneno ?>" data-subject="<?= $message->con_us_subject ?>" data-message="<?= $message->con_us_message ?>" data-date="<?= time_elapsed_string("" . $message->con_us_doc); ?>">
                          <i class="fa fa-eye"></i>
                        </button>
                        <a href="<?php echo base_url("admin/Contact/edit/$message->con_us_id") ?>" class="btn btn-xs btn-success d-none"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo base_url("admin/Contact/delete/$message->con_us_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo ('Are You Sure') ?>') "><i class="fa fa-trash"></i></a>
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

<!-- jQuery -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/') ?>plugins/jquery/jquery.min.js"></script>

<script>
  $(document).ready(function() {
    $('.btn_show_model').on('click', function() {
      // Prepare data
      $('#msg_name').html($(this).data('name'));
      $('#msg_subject').html($(this).data('subject'));
      $('#msg_email').html($(this).data('email'));
      $('#msg_date').html($(this).data('date'));
      $('#msg_content').html($(this).data('message'));
    });
  });
</script>