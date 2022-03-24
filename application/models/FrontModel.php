<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FrontModel extends CI_Model
{


  // get_banner
  public function get_banner()
  {
    return $this->db->select("*")
      ->from('banner_tbl')
      ->where('b_isvisible', 1)
      ->where('b_status', 1)
      ->get()
      ->row();
  }

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

  // sliders
  public function get_sliders()
  {
    return $this->db->select("*")
      ->from('slider_tbl')
      ->where('s_status', 1)
      ->get()
      ->result();
  }

  // what_we_do_tbl
  public function get_what_we_do()
  {
    return $this->db->select("*")
      ->from('what_we_do_tbl')
      ->where('w_status', 1)
      ->get()
      ->result();
  }

  // get_about_us
  public function get_about_us()
  {
    return $this->db->select("*")
      ->from('about_tbl')
      ->where('ab_status', 1)
      ->get()
      ->row();
  }

  // get get_students_impacted
  public function get_students_impacted()
  {
    return $this->db->select("ab_students_impacted")
      ->from('about_tbl')
      ->where('ab_status', 1)
      ->get()
      ->row()->ab_students_impacted;
  }

  // get_initiatives
  public function get_initiatives()
  {
    return $this->db->select("*")
      ->from('init_services_tbl')
      ->where('init_ser_status', 1)
      ->where('init_ser_page', 'initiatives')
      ->get()
      ->result();
  }

  // get_services
  public function get_services()
  {
    return $this->db->select("*")
      ->from('init_services_tbl')
      ->where('init_ser_status', 1)
      ->where('init_ser_page', 'services')
      ->get()
      ->result();
  }
  // get_our_impact
  public function get_our_impact()
  {
    return $this->db->select("*")
      ->from('key_differentiators_impact_tbl')
      ->where('kd_status', 1)
      ->where('kd_page', 'our_impact')
      ->get()
      ->result();
  }


  public function get_board_members()
  {
    return $this->db->select("*")
      ->from('board_members_tbl')
      ->where('bm_status', 1)
      ->where('bm_page', 'directors')
      ->get()
      ->result();
  }

  public function get_advisory_members()
  {
    return $this->db->select("*")
      ->from('board_members_tbl')
      ->where('bm_status', 1)
      ->where('bm_page', 'advisory')
      ->get()
      ->result();
  }

  public function get_event_gallery_as_list_active_only()
  {
    $result = $this->db->select("*")
      ->from('event_gallery_tbl')
      ->order_by('ev_gl_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('Select Event');
    foreach ($result as $row) {
      $list[$row->ev_gl_id] = $row->ev_gl_name;
    }
    return $list;
  }

  public function get_gallery_by_events()
  {
    $result =  $this->db->select("*")
      ->from('gallery_tbl')
      ->where('gal_status', 1)
      ->get()
      ->result();

    $list = [];
    if (valArr($result)) {
      foreach ($result as $key => $gal) {
        $list[$gal->gal_event_id][] = $gal;
      }
    }

    return $list;
  }

  // get_pillars
  public function get_pillars()
  {
    return $this->db->select("*")
      ->from('pillers_tbl')
      ->where('pil_status', 1)
      ->get()
      ->result();
  }
}
