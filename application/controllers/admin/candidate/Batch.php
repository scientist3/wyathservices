<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Batch extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model(array(
      'admin/candidate/BatchModel',
      'admin/candidate/CourseModel',
      'admin/candidate/TrainingCenterModel',
      'admin/candidate/CommonModel'
    ));
    if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1) {
      redirect('login/logout');
    }
    $this->user_id = $this->session->userdata('user_id');
  }


  // Full texts	
  // b_id
  // b_bch_id
  // b_batch_type
  // b_start_date
  // b_end_date
  // b_course_id
  // b_trainer_name
  // b_tc_id
  // b_training_completed
  // b_assessment_completed
  // b_as_id


  function index($edit_id = null)
  {
    $data['title'] = ('Add New Batch');
    $data['subtitle']     = (empty($edit_id)) ? 'Add Batch' : 'Edit Batch';
    $data['input_height'] = 'form-control-sm';


    $data['training_completed'] = $this->CommonModel->getYesNoList();

    $data['assessment_completed'] = $this->CommonModel->getYesNoList();

    $data['course_list'] = $this->CourseModel->read_course_as_list();
    $data['training_center_list'] = $this->TrainingCenterModel->read_trainingcenter_as_list(); {
      $this->form_validation->set_rules('b_bch_id', ('Batch ID'), 'required');

      $this->form_validation->set_rules('b_batch_type', ('Batch Type'), 'required');
      $this->form_validation->set_rules('b_start_date', ('Start Date'), 'required');
      $this->form_validation->set_rules('b_end_date', ('End Date'), 'required');
      $this->form_validation->set_rules('b_course_id', ('Course ID'), 'required');
      $this->form_validation->set_rules('b_trainer_name', ('Trainer Name'), 'required');
      $this->form_validation->set_rules('b_tc_id', ('Training Center ID'), 'required');
      $this->form_validation->set_rules('b_training_completed', ('Training Completed'), 'required');
      $this->form_validation->set_rules('b_assessment_completed', ('Assessment Completed'), 'required');
      $this->form_validation->set_rules('b_as_id', ('Assessment ID'), 'required');
      $this->form_validation->set_error_delimiters('<span class="error invalid-feedback is-invalid">', '</span>');
    }

    // Prepare Data for Listing
    $data['batchs'] = $this->BatchModel->read();
    $data['input'] = (object) $postDataInp = array(
      'b_bch_id' => $this->input->post('b_bch_id'),
      'b_batch_type' => $this->input->post('b_batch_type'),
      'b_start_date' => $this->input->post('b_start_date'),
      'b_end_date' => $this->input->post('b_end_date'),
      'b_course_id' => $this->input->post('b_course_id'),
      'b_trainer_name' => $this->input->post('b_trainer_name'),
      'b_tc_id' => $this->input->post('b_tc_id'),
      'b_training_completed' => $this->input->post('b_training_completed'),
      'b_assessment_completed' => $this->input->post('b_assessment_completed'),
      'b_as_id' => $this->input->post('b_as_id')
    );

    if (!empty($edit_id)) {
      $data['input'] = $this->BatchModel->readById($edit_id);
    }
    if ($this->form_validation->run() === true) {
      if ($this->BatchModel->create($postDataInp)) {
        $this->session->set_flashdata('class_name', ('alert-success'));
        if (empty($this->input->post('b_id'))) {
          $this->session->set_flashdata('message', ('Course added sucessfully.'));
          redirect('admin/candidate/batch/');
        } else {
          $this->session->set_flashdata('message', ('Course updated sucessfully.'));
          redirect('admin/candidate/batch/');
        }
      } else {
        $this->session->set_flashdata('message', ('Please try again.'));
        $this->session->set_flashdata('class_name', ('alert-success'));
        redirect('admin/candidate/batch/');
      }
    } else {
      $data['content'] = $this->load->view('admin/candidate/batch/index_view', $data, true);
      $this->load->view('admin/layout/wrapper', $data);
    }
  }

  function batchinsert()
  {
    $data['title'] = ('Add New Batch');
    $data['subtitle'] = ('Add Batch');

    $data['batch'] = $this->BatchModel->read();
    $data['courselist'] = $this->CourseModel->readallcourseid();
    $data['traininglist'] = $this->TrainingCenterModel->readalltrainingcenterid();

    $this->form_validation->set_rules('batchtype', ('Batch Type'), 'required');
    $this->form_validation->set_rules('startdate', ('startdate'), 'required');
    $this->form_validation->set_rules('enddate', ('enddate'), 'required');
    $this->form_validation->set_rules('courseid', ('courseid'), 'required');
    $this->form_validation->set_rules('trainername', ('trainername'), 'required');
    $this->form_validation->set_rules('trainingcenterid', ('trainingcenterid'), 'required');
    $this->form_validation->set_rules('trainingcompleted', ('trainingcompleted'), 'required');
    $this->form_validation->set_rules('assessmentcompleted', ('assessmentcompleted'), 'required');
    $this->form_validation->set_rules('assessmentid', ('assessmentid'), 'required');
    //##################3
    $dataa['input'] = (object) $postDataInp = array(
      'batchtype' => $this->input->post('batchtype'),
      'startdate' => $this->input->post('startdate'),
      'enddate' => $this->input->post('enddate'),
      'courseid' => $this->input->post('courseid'),
      'trainername' => $this->input->post('trainername'),
      'trainingcenterid' => $this->input->post('trainingcenterid'),
      'trainingcompleted' => $this->input->post('trainingcompleted'),
      'assessmentcompleted' => $this->input->post('assessmentcompleted'),
      'assessmentid' => $this->input->post('assessmentid')
    );
    $bchid = $this->BatchModel->getlastid();
    //object
    $input = $dataa['input'];
    #----------------- User Object -------------#
    $data['user'] = (object) $postDataUser = array(
      'bch_id' => $bchid,
      'batch_type' => $input->batchtype,
      'start_date' => $input->startdate,
      'end_date' => $input->enddate,
      'course_id' => $input->courseid,
      'trainer_name' => $input->trainername,
      'tc_id' => $input->trainingcenterid,
      'training_completed' => $input->trainingcompleted,
      'assessment_completed' => $input->assessmentcompleted,
      'as_id' => $input->assessmentid
    );
    //######################

    if ($this->form_validation->run() === true) {

      $this->db->insert('batch_tbl', $postDataUser);
      $this->session->set_flashdata('message', ('Batch Added Successfully'));
      $this->session->set_flashdata('class_name', ('alert-success'));

      redirect('admin/candidate/batch');
    }
    $data['trainingcompleted'] =
      [
        "No",
        "Yes",
      ];
    $data['assessmentcompleted'] =
      [
        "No",
        "Yes",
      ];
    $data['content'] = $this->load->view('admin/candidate/registration/batch', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }
  public function batchdelete($batch_id = null)
  {
    if (empty($batch_id)) {
      redirect('admin/candidate/batch/');
    }
    if ($this->BatchModel->batchdelete($batch_id)) {
      // $this->location_model->delete($loc_id);
      $this->session->set_flashdata('message', ('Deleted Successfully'));
      $this->session->set_flashdata('class_name', ('alert-success'));
    } else {
      $this->session->set_flashdata('message', ('Please Try Again'));
      $this->session->set_flashdata('class_name', ('alert-danger'));
    }
    redirect('admin/candidate/batch/');
  }

  public function update()
  {
    $data['trainingcompleted'] =
      [
        "No",
        "Yes",
      ];
    $data['assessmentcompleted'] =
      [
        "No",
        "Yes",
      ];
    // code...
    $data['title'] = "Batch";
    $data['subtitle'] = "Update Batch";
    // $data['content']
    $data['content'] = $this->load->view('admin/candidate/registration/editbatch', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }

  public function edit($id)
  {
    if (empty($id)) {
      redirect('admin/candidate/batch');
    }
    $data['trainingcompleted'] =
      [
        "No",
        "Yes",
      ];
    $data['assessmentcompleted'] =
      [
        "No",
        "Yes",
      ];
    $data['title'] = ('Batch');
    $data['subtitle'] = ('Edit Batch');
    $data['batchlist'] = ($this->BatchModel->read());
    // print_r($data['batchlist']);
    #-------------------------------#
    $input = $this->BatchModel->readid($id);
    $data["input"] = $input;
    // $data['boardmember'] = $this->BoardMembersModel->read();
    $data['content'] = $this->load->view('admin/candidate/registration/editbatch', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }
}
