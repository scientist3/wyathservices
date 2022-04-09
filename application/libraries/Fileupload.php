<?php defined('BASEPATH') or exit('No direct script access allowed');

class Fileupload
{

    // To load this model
    // $this->fileupload->do_upload($upload_path = 'assets/images/profile/', $field_name = 'userfile');

    function do_upload($upload_path = null, $field_name = null)
    {
        if (empty($_FILES[$field_name]['name'])) {
            return null;
        } else {
            //-----------------------------
            $ci = &get_instance();
            $ci->load->helper('url');

            //folder upload
            // $file_path = $upload_path . date('Y-m-d') . "/";
            $file_path = $upload_path;
            if (!is_dir($file_path))
                mkdir($file_path, 0755, true);
            //ends of folder upload 

            //set config 
            $config = [
                'upload_path'   => $file_path,
                'allowed_types' => 'gif|jpg|png|jpeg|ico|',
                'max_filename'  => 5,
                'overwrite'     => false,
                'maintain_ratio' => true,
                'encrypt_name'  => false,
                'remove_spaces' => true,
                'file_ext_tolower' => true
            ];
            $ci->load->library('upload', $config);

            if (!$ci->upload->do_upload($field_name)) {
                return false;
            } else {
                $file = $ci->upload->data();
                return $file_path . $file['file_name'];
            }
        }
    }

    public function do_resize($file_path = null, $width = null, $height = null)
    {
        $ci = &get_instance();
        $ci->load->library('image_lib');
        $config = [
            'image_library'  => 'gd2',
            'source_image'   => $file_path,
            'create_thumb'   => false,
            'maintain_ratio' => false,
            'width'          => $width,
            'height'         => $height,
        ];
        $ci->image_lib->initialize($config);
        $ci->image_lib->resize();
    }

    function create_thumbnail($file_path, $new_file_path, $width, $height)
    {

        $ci = &get_instance();
        $ci->load->library('image_lib');
        $config['image_library']  = 'gd2';
        $config['source_image']   = $file_path;
        $config['create_thumb']   = TRUE;
        $config['maintain_ratio'] = false;
        $config['width']          = $width;
        $config['height']         = $height;
        $config['new_image']      = $new_file_path;
        $ci->image_lib->initialize($config);
        if (!$ci->image_lib->resize()) {
            echo $ci->image_lib->display_errors();
        } else {
            $file = $ci->upload->data();
            return $new_file_path . $file['raw_name'] . '_thumb' . $file['file_ext'];
        }
    }

    function doc_upload($upload_path = null, $field_name = null)
    {
        if (empty($_FILES[$field_name]['name'])) {
            return null;
        } else {
            //-----------------------------
            $ci = &get_instance();
            $ci->load->helper('url');

            //folder upload
            // $file_path = $upload_path . date('Y-m-d') . "/";
            $file_path = $upload_path;
            if (!is_dir($file_path))
                mkdir($file_path, 0755, true);
            //ends of folder upload 

            //set config 
            $config = [
                'upload_path'   => $file_path,
                'allowed_types' => 'gif|jpg|png|jpeg|ico|doc|docx|pdf',
                'max_filename'  => 5,
                'overwrite'     => false,
                'maintain_ratio' => true,
                'encrypt_name'  => false,
                'remove_spaces' => true,
                'file_ext_tolower' => true
            ];
            $ci->load->library('upload', $config);

            if (!$ci->upload->do_upload($field_name)) {
                return false;
            } else {
                $file = $ci->upload->data();
                return $file_path . $file['file_name'];
            }
        }
    }
}
