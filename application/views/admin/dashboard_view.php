<section class="content">
	<div class="row">
		<div class="col-md-3 col-sm-6 col-12">
			<div class="info-box">
				<span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Total Students</span>
					<span class="info-box-number"><?php echo number($candidate_stats['total_students'] ?? 0); ?></span>
				</div>
			</div>
		</div>

		<div class="col-md-3 col-sm-6 col-12">
			<div class="info-box">
				<span class="info-box-icon bg-success"><i class="fas fa-graduation-cap"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Total Entolled</span>
					<span class="info-box-number"><?php echo number($candidate_stats['total_enrolled_students'] ?? 0); ?></span>
				</div>
			</div>
		</div>

		<div class="col-md-3 col-sm-6 col-12">
			<div class="info-box">
				<span class="info-box-icon bg-success"><i class="fas fa-graduation-cap"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Training Completed</span>
					<span class="info-box-number"><?php echo number($candidate_stats['completed_training'] ?? 0); ?></span>
				</div>
			</div>
		</div>

		<div class="col-md-3 col-sm-6 col-12">
			<div class="info-box">
				<span class="info-box-icon bg-dark"><i class="fas fa-clipboard-check"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Assessment Completed</span>
					<span class="info-box-number"><?php echo number($candidate_stats['completed_assessment'] ?? 0); ?></span>
				</div>

			</div>

		</div>

		<div class="col-md-3 col-sm-6 col-12">
			<div class="info-box">
				<span class="info-box-icon bg-olive"><i class="fas fa-certificate"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Certificate Completed</span>
					<span class="info-box-number"><?php echo number($candidate_stats['completed_certified'] ?? 0); ?></span>
				</div>
			</div>
		</div>

		<div class="col-md-3 col-sm-6 col-12">
			<div class="info-box">
				<span class="info-box-icon bg-teal"><i class="fas fa-briefcase"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Placement Completed</span>
					<span class="info-box-number"><?php echo number($candidate_stats['placement_completed'] ?? 0); ?></span>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-12">
			<div class="info-box">
				<span class="info-box-icon bg-navy"><i class="fas fa-map-marker-alt"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Tracking Completed</span>
					<span class="info-box-number"><?php echo number($candidate_stats['tracking_completed'] ?? 0); ?></span>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-12">
			<div class="info-box">
				<span class="info-box-icon bg-teal"><i class="fas fa-child"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Total Males</span>
					<span class="info-box-number"><?php echo number($candidate_stats['total_male_students'] ?? 0); ?></span>
				</div>
			</div>
		</div>

		<div class="col-md-3 col-sm-6 col-12">
			<div class="info-box">
				<span class="info-box-icon bg-purple"><i class="fas fa-female"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Total Females</span>
					<span class="info-box-number"><?php echo number($candidate_stats['total_female_students'] ?? 0); ?></span>
				</div>
			</div>
		</div>

		<div class="col-md-3 col-sm-6 col-12">
			<div class="info-box">
				<span class="info-box-icon bg-blue"><i class="fas fa-transgender"></i></span>
				<div class="info-box-content">
					<span class="info-box-text">Total Transgenders</span>
					<span class="info-box-number"><?php echo number($candidate_stats['total_trans_students'] ?? 0); ?></span>
				</div>
			</div>
		</div>

	</div>
	<div class="card card-dark d-none">
		<div class="card-header">
			<h3 class="card-title">Dashboard</h3>
		</div>
		<div class="card-body"></div>
		<div class="card-footer"></div>
	</div>
</section>
