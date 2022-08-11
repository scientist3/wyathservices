<!-- jQuery -->
<script src="<?php echo base_url('vendor/almasaeed2010/adminlte/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Main content -->
<section class="content">
  <form role="form" action="<?php echo site_url('../admin/candidate/registration/create') ?>" method="post" id="save_type_form" enctype="multipart/form-data">
    <?php echo form_input([
      'type'  => 'hidden',
      'name'  => 'c_id',
      'id'    => 'c_id',
      'value' => '' . $input->c_id,
    ]) ?>
    <?php echo form_hidden('c_currently_enrolled', $input->c_currently_enrolled) ?>
    <?php echo form_hidden('c_training_status', $input->c_training_status) ?>
    <!-- Basic Details -->
    <?php $this->load->view('admin/candidate/registration/partials/basic_details_view'); ?>

    <!-- Educational Details -->
    <?php $this->load->view('admin/candidate/registration/partials/other_details_view'); ?>

    <!-- Address Details -->
    <?php $this->load->view('admin/candidate/registration/partials/address_details_view'); ?>

    <!-- Experience Details -->
    <?php $this->load->view('admin/candidate/registration/partials/experience_details_view'); ?>
    <div class="clearfix">
      <button type="submit" name="save" class="btn btn-dark float-right"><i class="fas fa-plus"></i>
        Register</button>
    </div>
  </form>
</section>

<script>
  const objCreateCandidate = (
    function() {
      // Defined but not called
      var init = function() {
        // Prevent Submit form on enter in any input field.
        // $(document).on("keydown", "form", function(event) {
        //   return event.key != "Enter";
        // });

        // Remove error message on blur of any input field except skip validation
        // FIXME: This Logic doesn't work
        // $("input[type='text']").not('.skip-validation').off('blur').on('blur', (e) => {
        //   ($(e.currentTarget).val() != '') && $(e.currentTarget).toggleClass('is-invalid');
        // })

        // Define events Disablity
        $('#c_disablity').off('change').on('change', function() {
          showHideDisablity();
        });

        // Define events for AlternateId
        $('#c_id_type').off('change').on('change', function() {
          showHideAlternateId();
        });

        // Define event for Same addres(Perm- Comm) 
        $('#c_comm_same_as_perm').off('click').on('click', () => {
          showHideCommunicationAddress();
        });

        // Define event for Experienced 
        $('#c_pre_traning_status').off('change').on('change', () => {
          showHideExperience();
        });


        showHideDisablity();
        showHideAlternateId();
        showHideCommunicationAddress();
        showHideExperience();
      }

      var showHideDisablity = () => {
        if (1 == $('#c_disablity').val())
          $('#c_type_of_disablity_div').show('slow')
        else
          $('#c_type_of_disablity_div').hide('slow');
      };

      var showHideAlternateId = () => {
        // If Aadhar then hide alternate ID
        if (1 == $('#c_id_type').val())
          $('#c_type_of_alternate_id_div').hide('slow')
        else
          $('#c_type_of_alternate_id_div').show('slow');
      };

      var showHideCommunicationAddress = () => {
        if ($("#c_comm_same_as_perm").prop('checked') == true) {
          $('#c_comm_same_as_perm').val(1);
          $('.comm_address_div').hide('slow');
        } else {
          $('#c_comm_same_as_perm').val(0);
          $('.comm_address_div').show('slow');
        }
      }

      var showHideExperience = () => {
        if ($('#c_pre_traning_status').val() == 1) {
          $('.experience_div').hide('slow');
        } else {
          $('.experience_div').show('slow');
        }
      }

      return {
        init: init,
        showHideDisablity: showHideDisablity,
        showHideAlternateId: showHideAlternateId,
        showHideCommunicationAddress: showHideCommunicationAddress,
        showHideExperience: showHideExperience
      }
    }
  )();

  $(document).ready(function() {

    objCreateCandidate.init();

    // On Chnage of Perm State
    $('#c_perm_state').change(function() {
      var state_id = $('#c_perm_state').val();
      if (state_id != '') {
        $.ajax({
          url: "<?php echo base_url(); ?>admin/api/fetch_district",
          method: "POST",
          data: {
            state_id: state_id
          },
          success: function(data) {
            $('#c_perm_district').html(data);
          },
          error: function() {
            alert('No District Found.');
          }
        });
      } else {
        $('#c_perm_district').html('<option value="">Select District</option>');
      }
    });

    $('#c_comm_state').change(function() {
      var state_id = $('#c_comm_state').val();
      if (state_id != '') {
        $.ajax({
          url: "<?php echo base_url(); ?>admin/api/fetch_district",
          method: "POST",
          data: {
            state_id: state_id
          },
          success: function(data) {
            $('#c_comm_district').html(data);
          }
        });
      } else {
        $('#c_comm_district').html('<option value="">Select District</option>');
      }
    });

    // Duplicate Check
    $('#c_id_no').off('blur').on('blur', function() {
      var c_id_no = $('#c_id_no').val();
      var c_id = $('#c_id').val();
      console
      if (c_id_no != '') {
        $.ajax({
          url: "<?php echo base_url(); ?>admin/api/checkDuplicateByIdNo",
          method: "POST",
          data: {
            c_id: c_id,
            c_id_no: c_id_no
          },
          beforeSend: function() {
            $('#spinning_wheel_for_id_no').removeClass('d-none');
          },
          success: function(data) {
            $('#spinning_wheel_for_id_no').addClass('d-none');
            try {
              data = jQuery.parseJSON(data);
            } catch (error) {
              $('#c_id_no').removeClass('is-invalid');
              $('#c_id_no').siblings('span').remove();
              alert(error)
              return;
            }
            if (data.status == false) {
              $('#c_id_no').addClass('is-invalid');
              if ($('#c_id_no').siblings('span').length == 1) {
                $('#c_id_no').siblings('span').text(data.message)
              } else {
                $('#c_id_no').parent().append('<span class="error invalid-feedback is-invalid">' + data.message + '</span>');
              }
            } else {
              $('#c_id_no').removeClass('is-invalid');
              $('#c_id_no').siblings('span').remove();
            }
          },
          error: function() {
            $('#spinning_wheel_for_id_no').addClass('d-none');
            alert('Unable to check duplicate id.');
          }
        });
      }
    });

  });
</script>