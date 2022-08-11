<?php $this->load->view('admin/layout/header') ?>
<?php $this->load->view('admin/layout/navbar') ?>
<?php $this->load->view('admin/layout/sidebar') ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo $title ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active"><?php echo $title ?></li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->

		<?php if ($this->session->flashdata('message') != null) {  ?>
			<div class="alert <?= $this->session->flashdata('class_name') ?> alert-dismissable is-invalid">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php echo $this->session->flashdata('message'); ?>
			</div>
		<?php } ?>
		<?php if ($this->session->flashdata('exception') != null) {  ?>
			<div class="alert <?= $this->session->flashdata('class_name') ?> alert-dismissable is-invalid">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<?php echo $this->session->flashdata('exception'); ?>
			</div>
		<?php } ?>
	</section>

	<?php echo !empty($content) ? $content : null; ?>
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('admin/layout/footer') ?>