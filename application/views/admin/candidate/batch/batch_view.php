<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- Save -->
    <div class="col-sm-12">
      <form role="form" action="<?php echo site_url('../admin/candidate/batch/addStudentsToBatch/' . $batch->b_id) ?>"
        method="post" id="save_type_form" enctype="multipart/form-data">
        <?php echo form_hidden('b_id', $batch->b_id) ?>
        <div class="card">
          <div class="card-header bg-dark">
            <h3 class="card-title"><i class="fa fa-plus"></i> <?php echo $subtitle; ?></h3>
          </div>
          <div class="card-body">
            <table width="100%" class="datatable_colviss tables table-striped table-bordered table-hover table-sm">
              <thead>
                <tr>
                  <th></th>
                  <th><?php echo ('Candidate ID') ?></th>
                  <th><?php echo ('Candidate Name') ?></th>
                  <!-- TODO:Remove Extra Fields, FIX UI, Check checkbox -->
                  <th><?php echo ('Action') ?></th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($not_enrolled_students)) { ?>
                <?php $sl = 1; ?>
                <?php foreach ($not_enrolled_students as $student) { ?>
                <tr>
                  <td>
                    <div class="form-group">
                      <div class="">
                        <input name="students[]" class="students" type="checkbox" value="<?php echo $student->c_id; ?>">
                      </div>
                    </div>
                  </td>
                  <td><?php echo $student->c_cand_id ?></td>
                  <td><?php echo $student->c_full_name ?></td>
                  <td>
                </tr>
                <?php $sl++; ?>
                <?php } ?>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <button type="submit" name="save" value="add_students"
              class="form-control form-control-sm btn btn-primary btn-sm pull-right checkbox-toggle"><i
                class="fa fa-plus"> &nbsp;<?php echo ('Add Students To Batch'); ?></i></button>
          </div>
        </div>
      </form>
    </div>

    <div class="col-sm-12">
      <form role="form"
        action="<?php echo site_url('../admin/candidate/batch/removeStudentsFromBatch/' . $batch->b_id) ?>"
        method="post" id="save_type_form" enctype="multipart/form-data">
        <?php echo form_hidden('b_id', $batch->b_id) ?>
        <div class="card">
          <div class="card-header bg-dark">
            <h3 class="card-title"><i class="fa fa-list"></i> Existing Batch Students</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <table width="100%" class="datatable_colviss tables table-striped table-bordered table-hover table-sm">
                <thead>
                  <tr>
                    <th></th>
                    <th><?php echo ('Candidate ID') ?></th>
                    <th><?php echo ('Candidate Name') ?></th>
                    <th><?php echo ('Action') ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($enrolled_students)) { ?>
                  <?php $sl = 1; ?>
                  <?php foreach ($enrolled_students as $student) { ?>
                  <tr>
                    <td>
                      <div class="form-group">
                        <div class="">
                          <input name="bsm_c_ids[]" class="" id="bsm_c_id" type="checkbox"
                            value="<?php echo $student->bsm_c_id; ?>">
                          <input name="bsm_ids[]" class="" id="bsm_id" type="hidden"
                            value="<?php echo $student->bsm_id; ?>">
                        </div>
                      </div>
                    </td>
                    <td><?php echo $student->c_cand_id ?></td>
                    <td><?php echo $student->c_full_name ?></td>
                    <td>
                  </tr>
                  <?php $sl++; ?>
                  <?php } ?>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" name="save" value="add_students"
              class="form-control form-control-sm btn btn-danger btn-sm pull-right checkbox-toggle"><i
                class="fa fa-plus"> &nbsp;<?php echo ('Remove Student From Batch'); ?></i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

<script>
$('input[class=students]').on('change', function(e) {
  if ($('input[class=students]:checked').length > 0) {
    $(this).prop('checked', false);
    alert("allowed only 3");
  }
});
</script>