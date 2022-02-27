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
    </section>

    <?php echo !empty($content) ? $content : null; ?>
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('admin/layout/footer') ?>