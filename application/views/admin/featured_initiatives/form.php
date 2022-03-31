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
							<form role="form" action="<?php echo site_url('admin/featuredinitiatives/create') ?>" method="post" id="save_type_form" enctype="multipart/form-data">
								<?php echo form_hidden('fi_id', $input->fi_id) ?>
								<div class="row">
									<!-- FeaturedInitiatives_title -->
									<div class="col-sm-12">
										<div class="form-group">
											<label for="fi_title"><?php echo ('Featured Initiatives Title'); ?></label> <small class="req"> *</small>
											<input name="fi_title" class="form-control form-control-sm" type="text" placeholder="<?php echo ('Title') ?>" id="fi_title" value="<?php echo $input->fi_title ?>" data-toggle="tooltip" title="<?php echo ('FeaturedInitiatives Title'); ?>">
											<?php echo form_error('fi_title', '<span class="badge bg-danger p-1">', '</span>'); ?>
										</div>
									</div>
									<!-- FeaturedInitiatives_description -->
									<div class="col-sm-12">
										<div class="form-group">
											<label for="fi_desc"><?php echo ('Featured Initiatives Description'); ?></label> <small class="req"> *</small>
											<textarea name="fi_desc" class="form-control form-control-sm" type="tex" placeholder="<?php echo ('Description') ?>" id="fi_desc" data-toggle="tooltip" title="<?php echo ('Featured Initiatives Description'); ?>"><?php echo $input->fi_desc ?></textarea>
											<?php echo form_error('fi_desc', '<span class="badge bg-danger p-1">', '</span>'); ?>
										</div>
									</div>
									<!-- Satus -->
									<div class="col-sm-12">
										<div class="form-group ">
											<label for="fi_status"><?php echo ('Status'); ?></label>
											<div class="form-check row form-inline form-control-sm">
												<div class="col-6 form-inline">
													<label class=" radio-inline">
														<input type="radio" name="fi_status" value="1" <?= ($input->fi_status == '1' || ($input->fi_status != '0')) ? 'checked' : null; ?> data-toggle="tooltip" title="Active status">&nbsp;
														<?php echo ('Active') ?>
													</label>
												</div>
												<div class="col-6 form-inline">
													<label class=" radio-inline">
														<input type="radio" name="fi_status" value="0" <?= ($input->fi_status == '0') ? 'checked' : null; ?> data-toggle="tooltip" title="Disabled status"> &nbsp;<?php echo ('Inactive') ?>
													</label>
												</div>
												<br>
											</div>
											<?php echo form_error('fi_status', '<span class="badge bg-danger p-1">', '</span>'); ?>
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
						<i class="fa fa-list"></i> Featured Initiatives List
					</h3>
					<!-- <a class="btn btn-warning pull-right" href="< ?= base_url('admin/transaction/payment_report/').$search->start_date.'/'.$search->end_date; ?>"><i class="fa fa-print"></i></a> -->
				</div>
				<div class="card-body">
					<table width="100%" class="datatable_colvis table table-striped table-bordered table-hover table-sm">
						<thead>
							<tr>
								<th><?php echo ('Unique Id') ?></th>
								<th><?php echo ('Title') ?></th>
								<th><?php echo ('Description') ?></th>
								<th><?php echo ('Status') ?></th>
								<th><?php echo ('Action') ?></th>
							</tr>
						</thead>
						<tbody>
							<?php if (!empty($featuredfnitiatives)) { ?>
								<?php $sl = 1; ?>
								<?php foreach ($featuredfnitiatives as $fi) { ?>
									<tr>
										<td><?php echo $sl; ?></td>
										<td><?php echo $fi->fi_title ?></td>
										<td><?php echo $fi->fi_desc ?></td>
										<td class="text-center">
											<?php echo ($fi->fi_status) ?
												'<i class="fa fa-check" aria-hidden="true"></i>' :
												'<i class="fa fa-times" aria-hidden="true"></i>'; ?>
										</td>
										<td class="text-center" width="100">
											<?php if (!in_array($fi->fi_id, [])) { ?>
												<a href="<?php echo base_url("admin/featuredinitiatives/edit/$fi->fi_id") ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i></a>
												<a href="<?php echo base_url("admin/featuredinitiatives/delete/$fi->fi_id") ?>" class="btn btn-xs btn-danger" onclick="return confirm('<?php echo ('Are You Sure') ?>') "><i class="fa fa-trash"></i></a>
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