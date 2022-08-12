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
      'admin/candidate/TrainingCenterModel'
    ));
    //$this->load->library('fileupload');
    if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1) {
      redirect('login/logout');
    }

    $this->user_id = $this->session->userdata('user_id');
  }
  // TODO: If Data id form input make :-> data['input']
  // TODO: If Data id form database make :-> data['batch'] for single record and data['batches'] 
  // TODO: Model:
  //        create, read, readById, readByIdByFilter, update, delete
  //        $this->BatchModel->readByIdByFilter($id,$filter)
  function index()
  {
    $data['title'] = ('Add New Batch');
    $data['subtitle'] = ('Add Batch');

    $data['batch'] = $this->BatchModel->read();
    $data['courselist'] = $this->CourseModel->readallcourseid();
    $data['traininglist'] = $this->TrainingCenterModel->readalltrainingcenterid();

    // print($batchread['bch_id']);
    // $data['aboutus'] = $this->AboutusModel->read();
    // CRS-001    Ajaz Sofi    TC-001    Yes    Yes    AS-001
    // TODO: Remove this code and used the same form common model
    $data['trainingcompleted'] =
      [
        "Yes",
        "No",
      ];
    $data['assessmentcompleted'] =
      [
        "Yes",
        "No",
      ];
    $data['content'] = $this->load->view('admin/candidate/registration/batch', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }
  // TODO: Make create, edit, view, delete function only
  // Explaination: batch/edit/2
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
