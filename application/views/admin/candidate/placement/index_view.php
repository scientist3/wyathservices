<!-- Main content -->
<section class="content">
  <div class="row">
    <!-- Save -->
    <!-- Course Form -->
    <div class="col-sm-3">
      <?php $this->load->view('admin/candidate/placement/form_view'); ?>
    </div>
    <!-- Search -->
    <!-- Display -->
    <div class="col-sm-9">
      <div class="card">
        <div class="card-header bg-dark">
          <h3 class="card-title">
            <i class="fa fa-list"></i> View placement
          </h3>
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
              <?php if (!empty($courses)) { ?>
                <?php $sl = 1; ?>
                <?php foreach ($courses as $course) { ?>
                  <tr>
                    <td><?php echo $course->crs_course_id; ?></td>
                    <td><?php echo $course->crs_course_name; ?></td>
                    <td><?php echo $course->crs_course_type; ?></td>
                    <td><?php echo $course->crs_sector_covered; ?></td>
                    <td><?php echo $course->crs_course_fee; ?></td>
                    <td><?php echo $course->crs_fee_paid_by; ?></td>
                    <td>
                      <a href="<?php echo base_url("admin/candidate/course/index/$course->crs_id") ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
                      <a href=" <?php echo base_url("admin/candidate/course/delete/$course->crs_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo ('Are You Sure') ?>') "><i class="fa fa-trash"></i></a>
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