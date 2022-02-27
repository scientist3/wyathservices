<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Banner";
        $data['content'] = $this->load->view('admin/banner/index', $data, true);
        $this->load->view('admin/layout/wrapper', $data);
    }
    public function create()
    {
        $this->load->model('BannerModel');
        $this->load->library('fileupload');
        $picture = $this->fileupload->do_upload(
            'upload/images/banner/',
            'b_img_path'
        );
        $data['input'] = [
            'b_title' => $this->input->post('b_title'),
            'b_isvisible' => ($this->input->post('b_isvisible') == 'on') ? 1 : 0,
            'b_img_path' => $picture
        ];
        if ($this->BannerModel->insert($data['input'])) {
            $this->session->set_flashdata('message', 'Data Inserted Successfully');
            redirect('Banner/index');
        } else {
            $this->session->set_flashdata('message', 'Error While Inserting Data');
            redirect('Banner/index');
        }
    }
}

/*


#-------------------------------#
		//picture upload
		$picture = $this->fileupload->do_upload(
			'assets/images/doctor/',
			'picture'
		);
		// if picture is uploaded then resize the picture
		if ($picture !== false && $picture != null) {
			$this->fileupload->do_resize(
				$picture, 
				293,
				350
			);
		}
		//if picture is not uploaded
		if ($picture === false) {
			$this->session->set_flashdata('exception', display('invalid_picture'));
		}
		#-------------------------------# 

*/