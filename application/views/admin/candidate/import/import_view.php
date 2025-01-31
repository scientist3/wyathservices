<!-- <div class="container">
	<h2><?php echo $title; ?></h2>
	<h4><?php echo $subtitle; ?></h4>
	<?php if (isset($error)): ?>
		<div class="alert alert-danger"><?php echo $error; ?></div>
	<?php endif; ?>
	<?php echo form_open_multipart('admin/candidate/registration/import'); ?>
	<div class="form-group">
		<label for="csv_file">Upload CSV File</label>
		<input type="file" name="csv_file" id="csv_file" class="form-control">
	</div>
	<button type="submit" name="submit" value="submit" class="btn btn-primary">Import</button>
	<?php echo form_close(); ?>
	<br>
	<a href="<?php echo base_url('admin/candidate/registration/downloadSampleCSV'); ?>" class="btn btn-secondary">Download Sample CSV</a>
</div> -->

<!-- Main content -->
<section class="content">
	<div class="row">
		<!-- Display -->
		<div class="col-sm-12">
			<div class="card card-dark">
				<div class="card-header">
					<h3 class="card-title"> <i class="fas fa-list"></i> Upload Candidates</h3>
				</div>
				<div class="card-body">
					<h2><?php echo $title; ?></h2>
					<h4><?php echo $subtitle; ?></h4>
					<?php if (isset($error)): ?>
						<div class="alert alert-danger"><?php echo $error; ?></div>
					<?php endif; ?>
					<?php echo form_open_multipart('admin/candidate/registration/import'); ?>
					<div class="form-group">
						<label for="csv_file">Upload CSV File</label>
						<input type="file" name="csv_file" id="csv_file" class="form-control">
					</div>
					<button type="submit" name="submit" value="submit" class="btn btn-primary">Import</button>
					<?php echo form_close(); ?>
					<br>
				</div>
				<div class="card-footer">
					<a href="<?php echo base_url('admin/candidate/registration/downloadSampleCSV'); ?>" class="btn btn-secondary">Download Sample CSV</a>
					<a href="<?php echo base_url('uploads/samplefiles/reference.xlsx'); ?>" class="btn btn-secondary">Reference File</a>
				</div>
			</div>
		</div>
	</div>
	</div>
</section>
