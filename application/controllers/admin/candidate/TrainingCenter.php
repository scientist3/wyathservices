<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TrainingCenter extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/candidate/trcModel');
        //$this->load->library('fileupload');
        if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1) {
            redirect('login/logout');
        }

        $this->user_id = $this->session->userdata('user_id');
    }



public function update()

{
       $this->form_validation->set_rules('trainingcentername', ('trainingcentername'), 'required');
    $this->form_validation->set_rules('trainingcenteraddress', ('trainingcenteraddress'), 'required');
    $this->form_validation->set_rules('trainingcenterdistrict', ('trainingcenterdistrict'), 'required');
    $this->form_validation->set_rules('trainingcenterpincode', ('Pincode'),  'required|max_length[6]|min_length[6]');



// 
      $data['input'] = (object)$postDataUser= array(
      'id'=> $this->input->post('id'),
      'training_center_name'=>$this->input->post('trainingcentername'),
      'training_center_district'=>$this->input->post('trainingcenterdistrict'),
      'training_center_address'=>$this->input->post('trainingcenteraddress'),
      'training_center_pincode'=>$this->input->post('trainingcenterpincode')
    );
          $data['trc']=($this->trcModel->read());

    // code...
    if ($this->form_validation->run() === true) {
        if ($this->trcModel->update($postDataUser)) {
          #set success message
          $this->session->set_flashdata('message', ('Updated Successfully'));
          $this->session->set_flashdata('class_name', ('alert-success'));
        } else {
          #set exception message
          $this->session->set_flashdata('message', ('Please Try  database'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
        }
        redirect('../admin/candidate/trainingcenter/edit/' . $postDataUser['id'],$data);
      }
      else
      {
           $this->session->set_flashdata('message', ('Something Went Wrong! Try Again'));
          $this->session->set_flashdata('class_name', ('alert-danger'));
    redirect('../admin/candidate/trainingcenter/edit/' . $postDataUser['id'],$data);

      } 


}

public function index()
{
    $data['title'] = ('Add/View Training Center');
    $data['subtitle'] = ('Add New Training Center');
    // $data['aboutus'] = $this->AboutusModel->read();
    $data['trc']=($this->trcModel->read());
    $data['content'] = $this->load->view('admin/candidate/registration/trainingcenter', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
}

public function trcdelete($trc_id = null)
{
  if (empty($trc_id)) {
    redirect('admin/candidate/trainingcenter/');
  }
  if ($this->trcModel->trcdelete($trc_id)) {
    // $this->location_model->delete($loc_id);
    $this->session->set_flashdata('message', ('Deleted Successfully'));
    $this->session->set_flashdata('class_name', ('alert-success'));
  } else {
    $this->session->set_flashdata('message', ('Please Try Again'));
    $this->session->set_flashdata('class_name', ('alert-danger'));
  }
  redirect('admin/candidate/trainingcenter/');
}
public function edit($id)
  {
    if (empty($id)) {
      redirect('admin/candidate/trainingcenter');
    }
    $data['title'] = ('Training Center');
    $data['subtitle'] = ('Edit Training Center');
    $data['trc']=($this->trcModel->read());

    #-------------------------------#
    $input = $this->trcModel->readid($id);
    $data["input"]=$input;
    // $data['boardmember'] = $this->BoardMembersModel->read();
    $data['content'] = $this->load->view('admin/candidate/registration/editrainingcenter', $data, true);
    $this->load->view('admin/layout/wrapper', $data);
  }

public function insert()
{
    $data['title'] = ('');
    $data['subtitle'] = ('');
    $data['trc']=($this->trcModel->read());


    $this->form_validation->set_rules('trainingcentername', ('trainingcentername'), 'required');
    $this->form_validation->set_rules('trainingcenteraddress', ('trainingcenteraddress'), 'required');
    $this->form_validation->set_rules('trainingcenterdistrict', ('trainingcenterdistrict'), 'required');
    $this->form_validation->set_rules('trainingcenterpincode', ('trainingcenterpincode'), 'required');



    $dataa['input'] = (object) $postDataInp = array(
        'trainingcentername' => $this->input->post('trainingcentername'),
        'trainingcenteraddress' => $this->input->post('trainingcenteraddress'),
        'trainingcenterdistrict' => $this->input->post('trainingcenterdistrict'),
        'trainingcenterpincode' => $this->input->post('trainingcenterpincode')
    );

    $input = $dataa['input'];
    $trcid=$this->trcModel->getlastid();

    #----------------- User Object -------------#
    $data['user'] = (object) $postDataUser = array(
        'tc_id'               =>$trcid,
        'training_center_name' => $input->trainingcentername,
        'training_center_address' => $input->trainingcenteraddress,
        'training_center_district' => $input->trainingcenterdistrict,
        'training_center_pincode' => $input->trainingcenterpincode
    );

    if ($this->form_validation->run() === true) {

        $this->db->insert('training_center_tbl', $postDataUser);
        $this->session->set_flashdata('message', ('Training Center Added Successfully'));
      $this->session->set_flashdata('class_name', ('alert-success'));
        redirect('admin/candidate/trainingcenter/insert'); 

    }

    $data['title'] = ('Add/View Training Center');
    $data['subtitle'] = ('Add New Training Center');
    $data['input'] = ['ab_title' => ''];
    $data['content'] = $this->load->view('admin/candidate/registration/trainingcenter', $data, true);
    $this->load->view('admin/layout/wrapper', $data);

}


}