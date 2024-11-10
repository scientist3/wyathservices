<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
	.stat-tile {
		background-color: #f0f9ff;
		/* Light blue background */
		border: 2px solid #00aaff;
		/* Blue border */
		border-radius: 10px;
		padding: 20px;
		margin: 10px 0;
		color: #005073;
		/* Darker blue text color */
		box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		height: 150px;
	}

	.stat-tile i {
		font-size: 2em;
		margin-bottom: 10px;
	}

	.stat-tile h4 {
		font-weight: bold;
		color: #003f5c;
		/* Title color */
	}

	.stat-tile p {
		font-size: 1.5em;
		font-weight: bold;
	}
</style>

<!-- BEGIN: PAGE CONTAINER -->
<div class="c-layout-page">
	<?php $this->load->view('frontsite/about/parts/about_nav'); ?>
	<!-- BEGIN: PAGE CONTENT -->

	<div class="c-content-box c-size-md">
		<div class="container">

			<!-- Begin: Statistics Section -->
			<div class="c-content-title-1">
				<h3 class="c-center c-font-uppercase c-font-bold">Student Statistics</h3>
				<div class="c-line-center c-theme-bg"></div>
			</div>
			<div class="row c-content-statistics">
				<div class="col-md-4 col-sm-6 text-center">
					<div class="stat-tile total-students">
						<i class="fas fa-user-graduate"></i>
						<h4>Total Students</h4>
						<p><?= $candidateStats['total_students']; ?></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 text-center">
					<div class="stat-tile total-enrolled">
						<i class="fas fa-book-open"></i>
						<h4>Total Enrolled Students</h4>
						<p><?= $candidateStats['total_enrolled_students']; ?></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 text-center">
					<div class="stat-tile total-male">
						<i class="fas fa-male"></i>
						<h4>Total Male Students</h4>
						<p><?= $candidateStats['total_male_students']; ?></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 text-center">
					<div class="stat-tile total-female">
						<i class="fas fa-female"></i>
						<h4>Total Female Students</h4>
						<p><?= $candidateStats['total_female_students']; ?></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 text-center">
					<div class="stat-tile total-transgender">
						<i class="fas fa-transgender"></i>
						<h4>Total Transgender Students</h4>
						<p><?= $candidateStats['total_trans_students']; ?></p>
					</div>
				</div>

				<div class="col-md-4 col-sm-6 text-center">
					<div class="stat-tile completed-training">
						<i class="fas fa-chalkboard-teacher"></i>
						<h4>Completed Training</h4>
						<p><?= $candidateStats['completed_training']; ?></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 text-center">
					<div class="stat-tile completed-assessment">
						<i class="fas fa-clipboard-check"></i>
						<h4>Completed Assessment</h4>
						<p><?= $candidateStats['completed_assessment']; ?></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 text-center">
					<div class="stat-tile certified">
						<i class="fas fa-certificate"></i>
						<h4>Certified</h4>
						<p><?= $candidateStats['completed_certified']; ?></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 text-center">
					<div class="stat-tile placed">
						<i class="fas fa-briefcase"></i>
						<h4>Placed</h4>
						<p><?= $candidateStats['placement_completed']; ?></p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 text-center">
					<div class="stat-tile tracking-completed">
						<i class="fas fa-map-marker-alt"></i>
						<h4>Placement Tracking Completed</h4>
						<p><?= $candidateStats['tracking_completed']; ?></p>
					</div>
				</div>
			</div>
			<!-- End: Statistics Section -->

		</div>
	</div>
</div>
<!-- END: PAGE CONTAINER -->