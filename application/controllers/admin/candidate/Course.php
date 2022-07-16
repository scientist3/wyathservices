<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Course extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('admin/CandidateModel','admin/candidate/CourseModel','Common_model', 'admin/CSD'));
        //$this->load->library('fileupload');
        if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1) {
            redirect('login/logout');
        }

        $this->user_id = $this->session->userdata('user_id');
    }


public function update()
{

    $this->form_validation->set_rules('coursename', ('coursename'), 'required');
    $this->form_validation->set_rules('coursetype', ('coursetype'), 'required');
    $this->form_validation->set_rules('sectorcovered', ('sectorcovered'), 'required');
    $this->form_validation->set_rules('coursefee', ('coursefee'), 'required');
    $this->form_validation->set_rules('feepaidBy', ('feepaidBy'), 'required');
      $data['input'] = (object)$postDataUser= array(
      'id'=> $this->input->post('id'),
      'course_name'=>$this->input->post('coursename'),
      'course_type'=>$this->input->post('coursetype'),
      'sector_covered'=>$this->input->post('sectorcovered'),
      'course_fee'=>$this->input->post('coursefee'),
      'fee_paid_by'=>$this->input->post('feepaidBy')
    );
         $data['courselists']=($this->CourseModel->read());
         echo $this->input->post('coursename');
    // code...
         if($this->form_validation->run()==true){
            if ($this->CourseModel->update($postDataUser)) {
          #set success message
          $this->session->set_flashdata('message', ('Updated Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try  database'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
        }
        redirect('../admin/candidate/course/',$data);

         }else
         {
            $this->session->set_flashdata('message',('Something Went Wrong Try Again!'));
            $this->session->set_flashdata('class_name',('alert-danger'));


        redirect('../admin/candidate/course/',$data);
         }
        


}


function index()
{
        $data['courselists']=($this->CourseModel->read());

    $data['title'] = ('Add/View Course');
        $data['subtitle'] = ('Add New Course');
         // $data['couselist'] = $this->CourseModel->read();


        $data['content'] = $this->load->view('admin/candidate/registration/course', $data, true);
        $this->load->view('admin/layout/wrapper', $data);
}

public function insert()
{
    $data['title'] = ('');
    $data['subtitle'] = ('');
    $data['courselists']=($this->CourseModel->read());

    $this->form_validation->set_rules('coursename', ('coursename'), 'required');
    // $this->form_validation->set_rules('trainingcenteraddress', ('trainingcenteraddress'), 'required');
    // $this->form_validation->set_rules('trainingcenterdistrict', ('trainingcenterdistrict'), 'required');
    // $this->form_validation->set_rules('trainingcenterpincode', ('trainingcenterpincode'), 'required');



    $dataa['input'] = (object) $postDataInp = array(
        'cn' => $this->input->post('coursename'),
        'ct' => $this->input->post('coursetype'),
        'sc' => $this->input->post('sectorcovered'),
        'cf' => $this->input->post('coursefee'),
        'fpb' => $this->input->post('feepaidBy')
    );

    $input = $dataa['input'];
    $crid=$this->CourseModel->getlastid();

    #----------------- User Object -------------#
    $data['user'] = (object) $postDataUser = array(
        'course_id'               =>$crid,
        'course_name' => $input->cn,
        'course_type' => $input->ct,
        'sector_covered' => $input->sc,
        'course_fee' => $input->cf,
        'fee_paid_by' => $input->fpb

    );

    if ($this->form_validation->run() === true) {

        $this->db->insert('course_tbl', $postDataUser);
        $this->session->set_flashdata('message', ('Training Center Added Successfully'));
      $this->session->set_flashdata('class_name', ('alert-success'));
        redirect('admin/candidate/course/'); 

    }

    $data['title'] = ('Add/View Training Center');
    $data['subtitle'] = ('Add New Training Center');
    $data['input'] = ['ab_title' => ''];
    $data['content'] = $this->load->view('admin/candidate/course/', $data, true);
    $this->load->view('admin/layout/wrapper', $data);

}



public function delete($id = null)
{
  if (empty($id)) {
    redirect('admin/candidate/course/');
  }
  if ($this->CourseModel->trcdelete($id)) {
    // $this->location_model->delete($loc_id);
    $this->session->set_flashdata('message', ('Deleted Successfully'));
    $this->session->set_flashdata('class_name', ('alert-success'));
  } else {
    $this->session->set_flashdata('message', ('Please Try Again'));
    $this->session->set_flashdata('class_name', ('alert-danger'));
  }
  redirect('admin/candidate/course/');
}

public function edit($id)
  {
    if (empty($id)) {
      redirect('admin/candidate/course');
    }
    $data['title'] = ('Course');
    $data['subtitle'] = ('Edit Course');
        $data['courselists']=($this->CourseModel->read());

    // $data['trc']=($this->CourseModel->read());

    #-------------------------------#
    $input = $this->CourseModel->readid($id);
    $data["input"]=$input;
    // $data['boardmember'] = $this->BoardMembersModel->read();
    $data['content'] = $this->load->view('admin/candidate/registration/editcourse', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }



}