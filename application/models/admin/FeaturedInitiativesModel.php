<?php
defined('BASEPATH') or exit('No direct script access allowed');
class FeaturedInitiativesModel extends CI_Model
{
    public function insert($data)
    {
        return $this->db->insert('featured_initiatives_tbl', $data);
    }
}
