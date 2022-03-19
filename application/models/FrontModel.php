<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FrontModel extends CI_Model
{
  // Featured Initatives
  public function get_featured_initatives()
  {
    return $this->db->select("*")
      ->from('featured_initiatives_tbl')
      ->where('fi_status', 1)
      ->get()
      ->result();
  }

  // Projects
  public function get_projects()
  {
    return $this->db->select("*")
      ->from('projects_tbl')
      ->where('pr_status', 1)
      ->get()
      ->result();
  }

  // Partners
  public function get_partners()
  {
    return $this->db->select("*")
      ->from('partners_tbl')
      ->where('par_status', 1)
      ->get()
      ->result();
  }
}
