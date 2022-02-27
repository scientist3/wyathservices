<!-- Main content -->
<section class="content">
	<!-- Default box -->
	<!-- alert message -->
	<!-- alert message -->
	<?php if ($this->session->flashdata('message') != null) {  ?>
		<div class="alert <?= $this->session->flashdata('class_name') ?> alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?php echo $this->session->flashdata('message'); ?>
		</div>
	<?php } ?>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-12">
					<!-- <form action="" method="post" enctype="multipart/form-data"> -->
					<?php echo form_open('banner/update', ['class' => 'email', 'id' => 'myform', 'enctype' => 'multipart/form-data']); ?>
					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" id="title" name="b_title" value="<?php echo $b_title ?>" class="form-control" placeholder="Enter Title" />
					</div>
					<div class="row">
						<div class="col-sm-10">
							<div class=" form-group">
								<label for="b_img_path">Image</label>
								<input type="file" value="<?php echo base_url() . $b_img_path; ?>" id="b_img_path" name="b_img_path" class="form-control" />
								<!-- <i class="text-danger"><?php echo form_error('b_img_path') ?></i> -->
								<!-- <input type="hidden" value="<?php echo base_url() . $b_img_path; ?>" name="favicon"> -->
							</div>
						</div>
						<div class="col-sm-2">
							<div class="my-4 w-25 h-50">
								<!-- <?php echo base_url() . $b_img_path; ?> -->
								<img class="w-100 h-100" src="<?php echo base_url() . $b_img_path; ?>">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-2">
							<div class="form-group">
								<label for="b_isvisible">Visible</label>
							</div>
						</div>
						<div class="col-sm-2">
							<input type="checkbox" id="b_isvisible" <?= $b_isvisible ? 'checked' : null; ?> name="b_isvisible" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Update">
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /.card -->
</section>
<!-- /.content -->