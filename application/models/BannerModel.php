<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BannerModel extends CI_Model
{
    public function insert($data)
    {
        return $this->db->insert('banner_tbl', $data);
    }
}
