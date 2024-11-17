<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		<!-- Batch Filter Card -->
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-info">
					<div class="card-header">
						<h3 class="card-title"><i class="fa fa-search"></i> Filter by Batch</h3>
					</div>
					<div class="card-body">
						<form method="GET" action="<?= site_url('admin/candidate/batch/export') ?>" class="row">
							<!-- Label Column -->
							<div class="col-md-2 form-group d-flex align-items-end">
								<label for="batch" class="d-block text-center">Select Batch:</label>
							</div>
							<!-- Dropdown Column -->
							<div class="col-md-6 form-group">
								<select name="batch_id" id="batch" class="form-control">
									<option value="">-- All Batches --</option>
									<?php foreach ($batches_list as $batch): ?>
										<option value="<?= $batch->b_id ?>" <?= set_select('batch_id', $batch->b_id, isset($selected_batch) && $selected_batch->b_id == $batch->b_id) ?>>
											<?= $batch->b_bch_id ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>
							<!-- Button Column -->
							<div class="col-md-2 offset-md-2 form-group">
								<button type="submit" class="btn btn-info btn-block">
									<i class="fa fa-search"></i> Filter
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Students List Card -->
		<div class="row">
			<div class="col-md-12">
				<div class="card card-outline card-success">
					<div class="card-header">
						<h3 class="card-title">
							<?php if (isset($selected_batch) && $selected_batch): ?>
								Students for Batch: <?= $selected_batch->b_bch_id ?>
							<?php else: ?>
								All Students
							<?php endif; ?>
						</h3>
					</div>
					<div class="card-body table-responsive p-1">
						<table width="100%" class="datatable_export table table-striped table-bordered table-hover table-sm">
							<thead>
								<tr>
									<th>Candidate ID</th>
									<th>Batch ID</th>
									<th>Full Name</th>
									<th>Gender</th>
									<th>DOB</th>
									<th>Phone</th>
									<th>Email</th>
									<th>Martial</th>
									<th>Father Name</th>
									<th>Mother Name</th>
									<th>Gardian Name</th>
									<th>Education</th>
									<th>Religion</th>
									<th>Catagory</th>
									<th>Disablity</th>
									<th>Disablity Type</th>
									<th>Identification</th>
									<th>ID Type</th>
									<th>ID NO.</th>
									<th>Perm. Address</th>
									<th>Perm. Pincode</th>
									<th>Comm. Adddress</th>
									<th>Comm. Pincode</th>
									<th>Pre Training</th>
									<th>Pre Experience Sec.</th>
									<th>Pre Experience</th>
									<th>Employeed</th>
									<th>Employee Status</th>
									<th>Enrolled</th>
									<th>Training Status</th>
									<th>Certified</th>
									<th>Placement</th>
									<th>Placement Type</th>
									<th>Tracking 1</th>
									<th>Tracking 2</th>
									<th>Tracking 3</th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($students)): ?>
									<?php foreach ($students as $student): ?>
										<tr>
											<td><?= $student->c_cand_id ?></td>
											<td><?= $student->b_bch_id ?></td>
											<td><?= $student->c_full_name ?></td>
											<td><?= $student->c_gender ?></td>
											<td><?= date('Y-m-d', strtotime($student->c_dob)) ?></td>
											<td><?= $student->c_mobile ?></td>
											<td><?= $student->c_email ?></td>
											<td><?= $student->c_marital_status ?></td>
											<td><?= $student->c_father_name ?></td>
											<td><?= $student->c_mother_name ?></td>
											<td><?= $student->c_guardian_name ?></td>
											<td><?= $student->c_education ?></td>
											<td><?= $student->c_religion ?></td>
											<td><?= $student->c_catagory ?></td>
											<td><?= $student->c_disablity ?></td>
											<td><?= $student->c_type_of_disablity ?></td>
											<td><?= $student->c_id_type ?></td>
											<td><?= $student->c_type_of_alternate_id ?></td>
											<td><?= $student->c_id_no ?></td>
											<td><?= $student->c_perm_address ?></td>
											<td><?= $student->c_perm_pincode ?></td>
											<td><?= $student->c_comm_address ?></td>
											<td><?= $student->c_comm_pincode ?></td>
											<td><?= $student->c_pre_traning_status ?></td>
											<td><?= $student->c_prev_exp_sector ?></td>
											<td><?= $student->c_prev_exp_no_of_months ?></td>
											<td><?= $student->c_employed ? 'Yes' : 'No' ?></td>
											<td><?= $student->c_employment_status ?></td>
											<td><?= $student->c_currently_enrolled ? 'Yes' : 'No' ?></td>
											<td><?= $student->c_training_status ?></td>
											<td><?= $student->cer_certified ?></td>
											<td><?= $student->pd_placement_status ?></td>
											<td><?= $student->pd_employment_type ?></td>
											<td><?= $student->ptd_status_1 ?></td>
											<td><?= $student->ptd_status_2 ?></td>
											<td><?= $student->ptd_status_3 ?></td>
										</tr>
									<?php endforeach; ?>
								<?php else: ?>
									<tr>
										<td colspan="35" class="text-center">No students found for the selected batch.</td>
									</tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
