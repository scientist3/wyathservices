<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="../../index3.html" class="brand-link">
		<img src="<?php echo base_url('vendor/almasaeed2010/adminlte/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light">Wyathservices</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?php echo base_url('vendor/almasaeed2010/adminlte/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">Wyathservices</a>
			</div>
		</div>

		<!-- SidebarSearch Form -->
		<div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
				<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-sidebar">
						<i class="fas fa-search fa-fw"></i>
					</button>
				</div>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column my-3" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

				<!-- DASHBOARD -->
				<li class="nav-item">
					<a href="<?php echo base_url('') ?>" class="nav-link">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>

				<!-- Banner -->
				<li class="nav-item <?php echo ($this->uri->segment(2) == "banner") ? "menu-open" : null; ?>">
					<a href="#" class="nav-link <?php echo ($this->uri->segment(2) == "banner") ? "active" : null; ?>">
						<i class="nav-icon fas fa-ad"></i>
						<p>
							Banner
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url('admin/banner/index') ?>" class="nav-link <?php echo $this->uri->segment(2) == 'banner' ? 'active' : null ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Add / View Banner</p>
							</a>
						</li>

					</ul>
				</li>

				<!-- Slider -->
				<li class="nav-item <?php echo ($this->uri->segment(2) == "slider") ? "menu-open" : null; ?>">
					<a href="#" class="nav-link <?php echo $this->uri->segment(2) == 'slider' ? 'active' : null ?>">
						<i class="nav-icon fas fa-photo-video"></i>
						<p>
							Slider
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url('admin/slider/index') ?>" class="nav-link <?php echo $this->uri->segment(2) == 'slider' ? 'active' : null ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Add / View Slider</p>
							</a>
						</li>

					</ul>
				</li>

				<!-- Projects -->
				<li class="nav-item <?php echo ($this->uri->segment(2) == "projects") ? "menu-open" : null; ?>">
					<a href="#" class="nav-link <?php echo $this->uri->segment(2) == 'projects' ? 'active' : null ?>">
						<i class="nav-icon fas fa-project-diagram"></i>
						<p>
							Projects
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url('admin/projects/index') ?>" class="nav-link <?php echo $this->uri->segment(2) == 'projects' ? 'active' : null ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Add / View Projects</p>
							</a>
						</li>

					</ul>
				</li>


				<!-- Partners -->
				<li class="nav-item <?php echo ($this->uri->segment(2) == "partners") ? "menu-open" : null; ?>">
					<a href="#" class="nav-link <?php echo $this->uri->segment(2) == 'partners' ? 'active' : null ?>">
						<i class="nav-icon fas fa-handshake"></i>
						<p>
							Partners
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item ">
							<a href="<?php echo base_url('admin/partners/index') ?>" class="nav-link <?php echo $this->uri->segment(2) == 'partners' ? 'active' : null ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Add / View Partners</p>
							</a>
						</li>

					</ul>
				</li>
				<!-- Initiatives -->
				<li class="nav-item <?php echo ($this->uri->segment(2) == "FeaturedInitiatives") ? "menu-open" : null; ?>">
					<a href="#" class="nav-link <?php echo $this->uri->segment(2) == 'FeaturedInitiatives' ? 'active' : null ?>">
						<i class="nav-icon far fa-lightbulb"></i>
						<p>
							Featured Initiatives
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url('admin/FeaturedInitiatives/index') ?>" class="nav-link <?php echo $this->uri->segment(2) == 'FeaturedInitiatives' ? 'active' : null ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Add / View Initiatives</p>
							</a>
						</li>
					</ul>
				</li>
				<!-- Services -->
				<li class="nav-item <?php echo ($this->uri->segment(2) == "Services") ? "menu-open" : null; ?>">
					<a href="#" class="nav-link <?php echo $this->uri->segment(2) == 'Services' ? 'active' : null ?>">
						<i class="nav-icon far fa-lightbulb"></i>
						<p>
							Services / Initatives
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url('admin/Services/index') ?>" class="nav-link <?php echo $this->uri->segment(2) == 'Services' ? 'active' : null ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Add / View Services</p>
							</a>
						</li>
					</ul>
				</li>
				<!-- News -->
				<li class="nav-item <?php echo ($this->uri->segment(2) == "Event") ? "menu-open" : null; ?>">
					<a href="#" class="nav-link <?php echo $this->uri->segment(2) == 'Event' ? 'active' : null ?>">
						<i class="nav-icon fas fa-newspaper"></i>
						<p>
							News
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url('admin/Event/index') ?>" class="nav-link <?php echo $this->uri->segment(2) == 'Event' ? 'active' : null ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Add / View News</p>
							</a>
						</li>
					</ul>
				</li>
				<!-- Gallery -->
				<li class="nav-item <?php echo ($this->uri->segment(2) == "Gallery") ? "menu-open" : null; ?>">
					<a href="#" class="nav-link">
						<i class=" nav-icon fas fa-images"></i>
						<p>
							Gallery
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">

						<li class="nav-item">
							<a href="<?php echo base_url('admin/Gallery/index') ?>" class="nav-link <?php echo $this->uri->segment(2) == 'Gallery' ? 'active' : null ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Add / View Gallery</p>
							</a>
						</li>

					</ul>
				</li>
				<!-- About Us -->
				<li class="nav-item <?php echo ($this->uri->segment(2) == "Aboutus") ? "menu-open" : null; ?>">
					<a href="#" class="nav-link <?php echo $this->uri->segment(2) == 'Aboutus' ? 'active' : null ?>">
						<i class="nav-icon fas fa-address-card"></i>
						<p>
							About Us
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url('admin/Aboutus/index') ?>" class="nav-link <?php echo $this->uri->segment(2) == 'Aboutus' ? 'active' : null ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Add / View About Us</p>
							</a>
						</li>
					</ul>
				</li>
				<!-- Contact Us -->
				<li class="nav-item">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-address-book"></i>
						<p>
							Contact Us
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="chartjs.html" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Add / Contact Us</p>
							</a>
						</li>
					</ul>
				</li>

				<!-- Contact Details -->
				<li class="nav-item <?php echo ($this->uri->segment(2) == "ContactDetails") ? "menu-open" : null; ?>">
					<a href="#" class="nav-link <?php echo $this->uri->segment(2) == 'ContactDetails' ? 'active' : null ?>">
						<i class="nav-icon fas fa-address-card"></i>
						<p>
							Contact Details
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url('admin/ContactDetails/index') ?>" class="nav-link <?php echo $this->uri->segment(2) == 'ContactDetails' ? 'active' : null ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Add / View Contact Details</p>
							</a>
						</li>
					</ul>
				</li>

				<!-- Pillers -->
				<li class="nav-item <?php echo ($this->uri->segment(2) == "Pillers") ? "menu-open" : null; ?>">
					<a href="#" class="nav-link <?php echo $this->uri->segment(2) == 'Pillers' ? 'active' : null ?>">
						<i class="nav-icon fas fa-address-card"></i>
						<p>
							Pillers
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url('admin/Pillers/index') ?>" class="nav-link <?php echo $this->uri->segment(2) == 'Pillers' ? 'active' : null ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Add / View Pillers</p>
							</a>
						</li>
					</ul>
				</li>

				<!-- Key Differentiators and Impact -->
				<li class="nav-item <?php echo ($this->uri->segment(2) == "KeyDiffImpact") ? "menu-open" : null; ?>">
					<a href="#" class="nav-link <?php echo $this->uri->segment(2) == 'KeyDiffImpact' ? 'active' : null ?>">
						<i class="nav-icon fas fa-address-card"></i>
						<p>
							KeyDiffImpact
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url('admin/KeyDiffImpact/index') ?>" class="nav-link <?php echo $this->uri->segment(2) == 'KeyDiffImpact' ? 'active' : null ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Add / View KeyDiffImpact</p>
							</a>
						</li>
					</ul>
				</li>
				<!-- Board Members -->
				<li class="nav-item <?php echo ($this->uri->segment(2) == "BoardMembers") ? "menu-open" : null; ?>">
					<a href="#" class="nav-link <?php echo $this->uri->segment(2) == 'BoardMembers' ? 'active' : null ?>">
						<i class="nav-icon fas fa-address-card"></i>
						<p>
							BoardMembers
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo base_url('admin/BoardMembers/index') ?>" class="nav-link <?php echo $this->uri->segment(2) == 'BoardMembers' ? 'active' : null ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>Add / View Boardmember</p>
							</a>
						</li>
					</ul>
				</li>

			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>