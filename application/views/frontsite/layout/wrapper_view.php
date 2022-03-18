<?php $this->load->view('frontsite/layout/header_view'); ?>
<?php $this->load->view('frontsite/layout/nav_view'); ?>
<?php echo !empty($content) ? $content : null; ?>
<?php $this->load->view('frontsite/layout/footer_view'); ?>