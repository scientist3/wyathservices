<?php defined('BASEPATH') or exit('No direct script access allowed');

class EventGalleryModel extends CI_Model
{

  private $table = "event_gallery_tbl";

  public function create($data = [])
  {
    return $this->db->insert($this->table, $data);
  }

  public function read()
  {
    return $this->db->select("*")
      ->from($this->table)
      ->get()
      ->result();
  }
  public function setVisible()
  {
    return $this->db->update($this->table, array('s_status' => '0'));
  }

  public function read_as_array()
  {
    return $this->db->select("*")
      ->from($this->table)
      ->get()
      ->result_array();
  }

  public function read_as_list()
  {
    $result = $this->db->select("*")
      ->from($this->table)
      ->order_by('ev_gl_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('Select Slider');
    foreach ($result as $row) {
      $list[$row->ev_gl_id] = $row->dept_name;
    }
    return $list;
  }

  public function read_as_list_active_only()
  {
    $result = $this->db->select("*")
      ->from($this->table)
      // ->where('s_status', 1)
      ->order_by('ev_gl_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('Select Event');
    foreach ($result as $row) {
      $list[$row->ev_gl_id] = $row->ev_gl_name;
    }
    return $list;
  }

  public function read_by_id_as_array($id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('ev_gl_id', $id)
      ->get()
      ->row_array();
  }


  public function update($data = [])
  {
    return $this->db->where('ev_gl_id', $data['ev_gl_id'])
      ->update($this->table, $data);
  }

  public function delete($ev_gl_id = null)
  {
    $this->db->where('ev_gl_id', $ev_gl_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function read_by_id($ev_gl_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('ev_gl_id', $ev_gl_id)
      ->get()
      ->row_array();
  }

  public function read_by_id_as_obj($ev_gl_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('ev_gl_id', $ev_gl_id)
      ->get()
      ->row();
  }
}
