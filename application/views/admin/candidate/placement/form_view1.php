<section class="content">
	<div class="row">
		<div class="col-sm-12 pb-2">
			<a href="<?php echo base_url("admin/candidate/placement/index/" . $batch->b_id) ?>" class="btn btn-md btn-success"><i class="fa fa-arrow-left"></i> Return to Placement</a>
		</div>
	</div>
	<div class="row">
		<!-- Placement Details Form -->
		<div class="col-md-12 col-sm-12">
			<form role="form" action="<?php echo site_url('../admin/candidate/placement/create/' . $batch->b_id . '/' . $input->bsm_id . '/' . $input->pd_id) ?>" method="post" id="save_assessment_details_form" enctype="multipart/form-data">
				<div class="card">
					<div class="card-header bg-dark">
						<h3 class="card-title"><i class="fa fa-plus"></i> <?php echo $title; ?></h3>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<!-- Batch ID -->
									<?php echo form_hidden('b_id', $batch->b_id) ?>
									<?php echo form_hidden('pd_id', $input->pd_id) ?>
									<?php echo form_hidden('bsm_id', $input->bsm_id)
									?>

									<!-- Placement ID -->
									<div class="col-sm-4">
										<div class="form-group">
											<label for="pd_pd_id"><?php echo ('Placement ID'); ?></label> <small class="req"> *</small>
											<input name="pd_pd_id" class="form-control  <?= $input_height . ' ' . (form_error("pd_pd_id") ? 'is-invalid' : null);  ?> " type="text" placeholder="<?php echo ('Placement ID') ?>" id="pd_pd_id" value="<?php echo $input->pd_pd_id ?>">
											<?php echo form_error("pd_pd_id"); ?>
										</div>
									</div>

									<!-- Placement Status -->
									<div class="col-sm-4">
										<div class="form-group">
											<label for="pd_placement_status"><?php echo ('Placement Status'); ?></label> <small class="req"> *</small>
											<?php echo form_dropdown('pd_placement_status', $yes_no_list, $input->pd_placement_status, 'class="form-control ' . $input_height . ' ' . (form_error("pd_placement_status") ? 'is-invalid' : null) . ' " id="pd_placement_status_dropdown"'); ?>
											<?php echo form_error("pd_placement_status"); ?>
										</div>
									</div>

									<!-- Employement Type -->
									<div class="col-sm-4">
										<div class="form-group">
											<label for="pd_employment_type"><?php echo ('Employement Type'); ?></label> <small class="req"> *</small>
											<?php echo form_dropdown('pd_employment_type', '', $input->pd_employment_type, 'class="form-control ' . $input_height . ' ' . (form_error("pd_employment_type") ? 'is-invalid' : null) . ' " id="pd_employment_type_dropdown"'); ?>
											<?php echo form_error("pd_employment_type"); ?>
										</div>
									</div>

									<!-- Undertaking For Self Employed Collected From Candidate -->
									<div class="col-sm-6" id="pd_undertaking_self_employed_div">
										<div class="form-group">
											<label for="pd_undertaking_self_employed"><?php echo ('Undertaking Self Employed *') ?> </label>
											<div class="col-sm-12">
												<div class="custom-label">
													<input type="file" class="custom-file-input" name="pd_undertaking_self_employed" id="pd_undertaking_self_employed">
													<label class="custom-file-label" for="pd_undertaking_self_employed">Choose file</label>
													<input type="hidden" name="pd_undertaking_self_employed_old" value="<?php echo $input->pd_undertaking_self_employed ?>">
												</div>
												<?php
												if (!empty($input->pd_undertaking_self_employed)) {
													echo "<b>Uploaded File: </b><i>" . $input->pd_undertaking_self_employed . "</i>";
												} else {
													if (!empty($input->pd_undertaking_self_employed_old)) {
														echo "<b>Uploaded File: </b><i>" . $input->pd_undertaking_self_employed_old . "</i>";
													}
												}
												?>
											</div>
										</div>
									</div>

									<!--  proof of self employed or opt higher studies -->
									<div class="col-sm-6" id="pd_proof_of_self_employed_or_opt_higher_studies_div">
										<div class="form-group">
											<label for="pd_proof_of_self_employed_or_opt_higher_studies">
												<?php echo ('Proof of self employed/Opt higher studies') ?>
											</label>
											<div class="col-sm-12">
												<div class="custom-file">
													<input type="file" class="custom-file-input" name="pd_proof_of_self_employed_or_opt_higher_studies" id="pd_proof_of_self_employed_or_opt_higher_studies">
													<label class="custom-file-label" for="pd_proof_of_self_employed_or_opt_higher_studies">Choose file</label>
													<input type="hidden" name="pd_proof_of_self_employed_or_opt_higher_studies_old" value="<?php echo $input->pd_proof_of_self_employed_or_opt_higher_studies ?>">
												</div>
												<?php
												if (!empty($input->pd_proof_of_self_employed_or_opt_higher_studies)) {
													echo "<b>Uploaded File: </b><i>" . $input->pd_proof_of_self_employed_or_opt_higher_studies . "</i>";
												} else {
													if (!empty($input->pd_proof_of_self_employed_or_opt_higher_studies_old)) {
														echo "<b>Uploaded File: </b><i>" . $input->pd_proof_of_self_employed_or_opt_higher_studies_old . "</i>";
													}
												}
												?>
											</div>
										</div>
									</div>

									<!-- Type of proof -->
									<div class="col-sm-6" id="pd_type_of_proof_div">
										<div class="form-group">
											<label for="pd_type_of_proof"><?php echo ('Type of Proof') ?> </label>
											<div class="col-sm-12">
												<div class="custom-file">
													<input type="file" class="custom-file-input" name="pd_type_of_proof" id="pd_type_of_proof">
													<label class="custom-file-label" for="pd_type_of_proof">Choose file</label>
													<input type="hidden" name="pd_type_of_proof_old" value="<?php echo $input->pd_type_of_proof ?>">
												</div>
												<?php
												if (!empty($input->pd_type_of_proof)) {
													echo "<b>Uploaded File: </b><i>" . $input->pd_type_of_proof . "</i>";
												} else {
													if (!empty($input->pd_type_of_proof_old)) {
														echo "<b>Uploaded File: </b><i>" . $input->pd_type_of_proof_old . "</i>";
													}
												}
												?>
											</div>
										</div>
									</div>

									<!-- pd date of joining -->
									<div class="col-sm-3" id="pd_date_of_joining_div">
										<div class="form-group">
											<label for="pd_date_of_joining"><?php echo ('Show Date Of Joining'); ?></label> <small class="req"> *</small>
											<input name="pd_date_of_joining" class="form-control  <?= $input_height . ' ' . (form_error("pd_date_of_joining") ? 'is-invalid' : null);  ?>" type="date" placeholder="<?php echo ('Show Date Of Joining') ?>" id="pd_date_of_joining" value="<?php echo $input->pd_date_of_joining ?>">
											<?php echo form_error("pd_date_of_joining") ?>
										</div>
									</div>

									<!-- Employee Name -->
									<div class="col-sm-3" id="pd_employer_name_div">
										<div class="form-group">
											<label for="pd_employer_name"><?php echo ('Employee Name'); ?></label> <small class="req"> *</small>
											<input name="pd_employer_name" class="form-control  <?= $input_height . ' ' . (form_error("pd_employer_name") ? 'is-invalid' : null);  ?> " type="text" placeholder="<?php echo ('Employee Name') ?>" id="pd_employer_name" value="<?php echo $input->pd_employer_name ?>">
											<?php echo form_error("pd_employer_name"); ?>
										</div>
									</div>

									<!-- Employer Contact Person Name -->
									<div class="col-sm-3" id="pd_employer_contact_person_name_div">
										<div class="form-group">
											<label for="pd_employer_contact_person_name"><?php echo ('Employer Contact Person Name'); ?></label> <small class="req"> *</small>
											<input name="pd_employer_contact_person_name" class="form-control  <?= $input_height . ' ' . (form_error("pd_employer_contact_person_name") ? 'is-invalid' : null);  ?> " type="text" placeholder="<?php echo ('Employer Contact Person Name') ?>" id="pd_employer_contact_person_name" value="<?php echo $input->pd_employer_contact_person_name ?>">
											<?php echo form_error("pd_employer_contact_person_name"); ?>
										</div>
									</div>

									<!-- Employer Contact Person Designation -->
									<div class="col-sm-3" id="pd_employer_cp_designation_div">
										<div class="form-group">
											<label for="pd_employer_cp_designation"><?php echo ('Employer C.P. Designation'); ?></label> <small class="req"> *</small>
											<input name="pd_employer_cp_designation" class="form-control  <?= $input_height . ' ' . (form_error("pd_employer_cp_designation") ? 'is-invalid' : null);  ?> " type="text" placeholder="<?php echo ('Employer Contact Person Designation') ?>" id="pd_employer_cp_designation" value="<?php echo $input->pd_employer_cp_designation ?>">
											<?php echo form_error("pd_employer_cp_designation"); ?>
										</div>
									</div>

									<!-- Employer Contact Person Number -->
									<div class="col-sm-3" id="pd_employer_contact_no_div">
										<div class="form-group">
											<label for="pd_employer_contact_no"><?php echo ('Employer C.P. No'); ?></label> <small class="req"> *</small>
											<input name="pd_employer_contact_no" class="form-control  <?= $input_height . ' ' . (form_error("pd_employer_contact_no") ? 'is-invalid' : null);  ?> " type="text" placeholder="<?php echo ('Employer Contact Person No') ?>" id="pd_employer_contact_no" value="<?php echo $input->pd_employer_contact_no ?>">
											<?php echo form_error("pd_employer_contact_no"); ?>
										</div>
									</div>

									<!-- Location of Employer Address -->
									<div class="col-sm-3" id="pd_employer_address_div">
										<div class="form-group">
											<label for="pd_employer_address"><?php echo ('Location of Employer Address'); ?></label> <small class="req"> *</small>
											<input name="pd_employer_address" class="form-control  <?= $input_height . ' ' . (form_error("pd_employer_address") ? 'is-invalid' : null);  ?> " type="text" placeholder="<?php echo ('Location of Employer Address') ?>" id="pd_employer_address" value="<?php echo $input->pd_employer_address ?>">
											<?php echo form_error("pd_employer_address"); ?>
										</div>
									</div>

									<!-- Feedback Collected  Employer -->
									<div class="col-sm-3" id="pd_feedback_collected_employer_div">
										<div class="form-group">
											<label for="pd_feedback_collected_employer"><?php echo ('Feedback Collected'); ?></label> <small class="req"> *</small>
											<?php echo form_dropdown('pd_feedback_collected_employer', $yes_no_list, $input->pd_feedback_collected_employer, 'class="form-control ' . $input_height . ' ' . (form_error("pd_feedback_collected_employer") ? 'is-invalid' : null) . ' " id="pd_feedback_collected_employer_dropdown"'); ?>
											<?php echo form_error("pd_feedback_collected_employer"); ?>
										</div>
									</div>

									<!-- Frequency oF Feedback -->
									<div class="col-sm-3" id="pd_feedback_frequency_div">
										<div class="form-group">
											<label for="pd_feedback_frequency"><?php echo ('Frequency oF Feedback'); ?></label> <small class="req"> *</small>
											<?php echo form_dropdown('pd_feedback_frequency', $frequency_feedback_list, $input->pd_feedback_frequency, 'class="form-control ' . $input_height . ' ' . (form_error("pd_feedback_frequency") ? 'is-invalid' : null) . ' " id="pd_feedback_frequency_dropdown"'); ?>
											<?php echo form_error("pd_feedback_frequency"); ?>
										</div>
									</div>

									<!-- State of Placement OR Work -->
									<div class="col-sm-4" id="pd_state_div">
										<div class="form-group">
											<label for="pd_state"><?php echo ('State of Placement OR Work'); ?></label> <small class="req"> *</small>
											<?php echo form_dropdown('pd_state', $state_list, $input->pd_state, 'class="form-control ' . $input_height . ' ' . (form_error("pd_state") ? 'is-invalid' : null) . ' " id="pd_state_dropdown"'); ?>
											<?php echo form_error("pd_state"); ?>
										</div>
									</div>

									<!-- District -->
									<div class="col-sm-4" id="pd_district_div">
										<div class="form-group">
											<label for="pd_district"><?php echo ('District of Placement OR Work'); ?></label> <small class="req"> *</small>
											<?php echo form_dropdown('pd_district', $district_list, $input->pd_district, 'class="form-control ' . $input_height . ' ' . (form_error("pd_district") ? 'is-invalid' : null) . ' " id="pd_district_dropdown"'); ?>
											<?php echo form_error("pd_district"); ?>
										</div>
									</div>

									<!-- Monthly Earning OR CTC Before Training -->
									<div class="col-sm-4" id="pd_ctc_before_div">
										<div class="form-group">
											<label for="pd_ctc_before"><?php echo ('Monthly Earning/CTC Before Training'); ?></label> <small class="req"> *</small>
											<input name="pd_ctc_before" class="form-control  <?= $input_height . ' ' . (form_error("pd_ctc_before") ? 'is-invalid' : null);  ?> " type="number" placeholder="<?php echo ('Monthly Earning OR CTC Before Training') ?>" id="pd_ctc_before" value="<?php echo $input->pd_ctc_before ?>">
											<?php echo form_error("pd_ctc_before"); ?>
										</div>
									</div>

									<!-- Monthly Current CTC OR Earning -->
									<div class="col-sm-4" id="pd_ctc_current_div">
										<div class="form-group">
											<label for="pd_ctc_current"><?php echo ('Monthly Current CTC OR Earning'); ?></label> <small class="req"> *</small>
											<input name="pd_ctc_current" class="form-control  <?= $input_height . ' ' . (form_error("pd_ctc_current") ? 'is-invalid' : null);  ?> " type="number" placeholder="<?php echo ('Monthly Current CTC OR Earning') ?>" id="pd_ctc_current" value="<?php echo $input->pd_ctc_current ?>">
											<?php echo form_error("pd_ctc_current"); ?>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="card-footer">
						<?php
						if (empty($input->pd_id)) { ?>
							<!-- Save Button -->
							<button type="submit" name="save_placement_details" value="add_placement_details" class="float-right form-control-sm btn btn-primary btn-sm"><i class="fa fa-plus"> Save</i>
							</button>
						<?php } else { ?>
							<!-- Save Button -->
							<button type="submit" name="save_placement_details" value="update_placement_details" class="float-right form-control-sm btn btn-warning btn-sm"><i class="fa fa-plus"> Update</i>
							</button>
						<?php } ?>

					</div>
				</div>
			</form>
		</div>
	</div>
</section>

<script>
	var objPlacement = (
		function() {
			var assessment_status;
			var arr_employement_type_by_placement_status;
			var init = function() {

				/**
				  Event Bind
				    ChangeEventBindForPlacementStatus {
				      changeEventForPlacementStatusHandler()
				    }
				    ChangeEventBindForEmployementType {
				      changeEventForEmployementTypeHandler()
				    }

				  Call
				    changeEventForPlacementStatusHandler
				*/
				$('#pd_placement_status_dropdown').off('change').on('change', function() {
					changeEventForPlacementStatusHandler();
				});

				// Employment Type change event
				$('#pd_employment_type_dropdown').off('change').on('change', function() {
					changeEventForEmployementTypeHandler();
				});

				// State Change Events
				$('#pd_state_dropdown').off('change').on('change', function() {
					changeStateEventHandler();
				});

				changeEventForPlacementStatusHandler();
			}


			/** Event Handler Functions */
			function changeEventForPlacementStatusHandler() {
				console.log(' changeEventForPlacementStatusHandler Call');
				var intPlacementStatus = $('#pd_placement_status_dropdown').val();
				console.log('PStatus: ' + intPlacementStatus);

				setEmploymentTypeDropdown(objPlacement.arr_employement_type_by_placement_status[intPlacementStatus]);

				switch (parseInt(intPlacementStatus)) {
					case 1:
						changeEventForEmployementTypeHandler();
						break;

					case 0:
						changeEventForEmployementTypeHandler();
						break;
				}
			}

			function changeEventForEmployementTypeHandler() {
				var intPlacementStatus = parseInt($('#pd_placement_status_dropdown').val());
				var employmentTypeValue = parseInt($('#pd_employment_type_dropdown').val());
				// For employement Status
				switch (intPlacementStatus) {
					case 0: // PS = NO
						// For Employment Tyoe
						switch (employmentTypeValue) {
							case 1: // Upskilled
							case 2:
								showHideUndertakingForSelfEmployedCollectedFromCandidate(0);
								showHideProofOfSelfEmployedOrOptHigherStudies(1);
								showHideTypeOfProof(0);
								showHideDateOfJoining(0);
								showHideEmployerName(0);
								showHideEmployerContactPersonName(0);
								showHideEmployerCpDesignation(0);
								showHideEmployerContactNo(0);
								showHideEmployerAddress(0);
								showHideFeedbackCollectedEmployer(0);
								showHideFeedbackFrequency(0);
								showHideState(0);
								showHideDistrict(0);
								showHideCTCBefore(0);
								showHideCTCCurrent(0);

								break;
								// case 2: // Opted for Higher Studies
								// 	showHideUndertakingForSelfEmployedCollectedFromCandidate(0);
								// 	showHideProofOfSelfEmployedOrOptHigherStudies(1);
								// 	showHideTypeOfProof(0);
								// 	showHideDateOfJoining(0);
								// 	showHideEmployerName(0);
								// 	showHideEmployerContactPersonName(0);
								// 	showHideEmployerCpDesignation(0);
								// 	showHideEmployerContactNo(0);
								// 	showHideEmployerAddress(0);
								// 	showHideFeedbackCollectedEmployer(0);
								// 	showHideFeedbackFrequency(0);
								// 	showHideState(0);
								// 	showHideDistrict(0);
								// 	showHideCTCBefore(0);
								// 	showHideCTCCurrent(0);
								// break;
						}
						break;

					case 1: // PS = YES
						// For Employment Tyoe
						switch (employmentTypeValue) {
							case 3: // Salaried or Waged  
								showHideUndertakingForSelfEmployedCollectedFromCandidate(0);
								showHideProofOfSelfEmployedOrOptHigherStudies(0);
								showHideTypeOfProof(1);
								showHideDateOfJoining(1);
								showHideEmployerName(1);
								showHideEmployerContactPersonName(1);
								showHideEmployerCpDesignation(1);
								showHideEmployerContactNo(1);
								showHideEmployerAddress(1);
								showHideFeedbackCollectedEmployer(1);
								showHideFeedbackFrequency(1);
								showHideState(1);
								showHideDistrict(1);
								showHideCTCBefore(1);
								showHideCTCCurrent(1);
								break;
							case 4: //"Self Employed"
								showHideUndertakingForSelfEmployedCollectedFromCandidate(1);
								showHideProofOfSelfEmployedOrOptHigherStudies(0);
								showHideTypeOfProof(0);
								showHideDateOfJoining(1);
								showHideEmployerName(0);
								showHideEmployerContactPersonName(0);
								showHideEmployerCpDesignation(0);
								showHideEmployerContactNo(0);
								showHideEmployerAddress(0);
								showHideFeedbackCollectedEmployer(0);
								showHideFeedbackFrequency(0);
								showHideState(0);
								showHideDistrict(0);
								showHideCTCBefore(1);
								showHideCTCCurrent(1);
								break;
							case 5: // "Apprenticeship"
								showHideUndertakingForSelfEmployedCollectedFromCandidate(1);
								showHideProofOfSelfEmployedOrOptHigherStudies(0);
								showHideTypeOfProof(1);
								showHideDateOfJoining(1);
								showHideEmployerName(1);
								showHideEmployerContactPersonName(1);
								showHideEmployerCpDesignation(1);
								showHideEmployerContactNo(1);
								showHideEmployerAddress(1);
								showHideFeedbackCollectedEmployer(1);
								showHideFeedbackFrequency(1);
								showHideState(1);
								showHideDistrict(1);
								showHideCTCBefore(0);
								showHideCTCCurrent(1);
								break;
						}
						break;
				}

			}

			/**   Address Ajax Request */
			function changeStateEventHandler() {
				// On Chnage of Perm State
				var state_id = $('#pd_state_dropdown').val();
				if (state_id != '') {
					$.ajax({
						url: "<?php echo base_url(); ?>admin/api/fetch_district",
						method: "POST",
						data: {
							state_id: state_id
						},
						success: function(data) {
							$('#pd_district_dropdown').html(data);
						},
						error: function() {
							alert('No District Found.');
						}
					});
				} else {
					$('#pd_district_dropdown').html('<option value="">Select District</option>');
				}
			}

			/** DOm Manupulation functions*/
			function setEmploymentTypeDropdown(employementType) {
				var strOptionsForEmploymentTypeHtml = "";
				Object.keys(employementType).map(
					(key) => {
						if (key == objPlacement.arrmixInputData.pd_employment_type) {
							return strOptionsForEmploymentTypeHtml += `<option value="${key}" selected="selected">${employementType[key]}</option>`;
						} else {
							return strOptionsForEmploymentTypeHtml += `<option value="${key}">${employementType[key]}</option>`;
						}
					}
				);
				$('#pd_employment_type_dropdown').html(strOptionsForEmploymentTypeHtml);
			}

			/* Attribute functions */
			function showHideUndertakingForSelfEmployedCollectedFromCandidate(boolIsShow) {
				if (1 == boolIsShow)
					$('#pd_undertaking_self_employed_div').show();
				else
					$('#pd_undertaking_self_employed_div').hide();
			}

			function showHideProofOfSelfEmployedOrOptHigherStudies(boolIsShow) {
				if (1 == boolIsShow)
					$('#pd_proof_of_self_employed_or_opt_higher_studies_div').show();
				else
					$('#pd_proof_of_self_employed_or_opt_higher_studies_div').hide();
			}

			function showHideTypeOfProof(boolIsShow) {
				if (1 == boolIsShow)
					$('#pd_type_of_proof_div').show();
				else
					$('#pd_type_of_proof_div').hide();
			}

			function showHideDateOfJoining(boolIsShow) {
				if (1 == boolIsShow)
					$('#pd_date_of_joining_div').show();
				else
					$('#pd_date_of_joining_div').hide();
			}

			function showHideEmployerName(boolIsShow) {
				if (1 == boolIsShow)
					$('#pd_employer_name_div').show();
				else
					$('#pd_employer_name_div').hide();
			}

			function showHideEmployerContactPersonName(boolIsShow) {
				if (1 == boolIsShow)
					$('#pd_employer_contact_person_name_div').show();
				else
					$('#pd_employer_contact_person_name_div').hide();
			}

			function showHideEmployerCpDesignation(boolIsShow) {
				if (1 == boolIsShow)
					$('#pd_employer_cp_designation_div').show();
				else
					$('#pd_employer_cp_designation_div').hide();
			}

			function showHideEmployerContactNo(boolIsShow) {
				if (1 == boolIsShow)
					$('#pd_employer_contact_no_div').show();
				else
					$('#pd_employer_contact_no_div').hide();
			}

			function showHideEmployerAddress(boolIsShow) {
				if (1 == boolIsShow)
					$('#pd_employer_address_div').show();
				else
					$('#pd_employer_address_div').hide();
			}

			function showHideFeedbackCollectedEmployer(boolIsShow) {
				if (1 == boolIsShow)
					$('#pd_feedback_collected_employer_div').show();
				else
					$('#pd_feedback_collected_employer_div').hide();
			}

			function showHideFeedbackFrequency(boolIsShow) {
				if (1 == boolIsShow)
					$('#pd_feedback_frequency_div').show();
				else
					$('#pd_feedback_frequency_div').hide();
			}

			function showHideState(boolIsShow) {
				if (1 == boolIsShow)
					$('#pd_state_div').show();
				else
					$('#pd_state_div').hide();
			}

			function showHideDistrict(boolIsShow) {
				if (1 == boolIsShow)
					$('#pd_district_div').show();
				else
					$('#pd_district_div').hide();
			}

			function showHideCTCBefore(boolIsShow) {
				if (1 == boolIsShow)
					$('#pd_ctc_before_div').show();
				else
					$('#pd_ctc_before_div').hide();
			}

			function showHideCTCCurrent(boolIsShow) {
				if (1 == boolIsShow)
					$('#pd_ctc_current_div').show();
				else
					$('#pd_ctc_current_div').hide();
			}

			/* Attribute functions End*/

			return {
				init: init
			};
		}
	)();

	$('document').ready(function() {
		// Prepare data
		objPlacement.arr_employement_type_by_placement_status = <?php echo json_encode($employement_type_by_placement_status); ?>;
		objPlacement.arrmixInputData = <?php echo json_encode($input); ?>;

		// Initialization
		objPlacement.init();
	});
</script>