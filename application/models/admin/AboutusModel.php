<?php defined('BASEPATH') or exit('No direct script access allowed');

class AboutusModel extends CI_Model
{
  private $table = "about_tbl";
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
      ->order_by('ab_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('Select About');
    foreach ($result as $row) {
      $list[$row->ab_id] = $row->dept_name;
    }
    return $list;
  }

  public function read_as_list_active_only()
  {
    $result = $this->db->select("*")
      ->from($this->table)
      ->where('s_status', 1)
      ->order_by('ab_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('select_about_type');
    foreach ($result as $row) {
      $list[$row->ab_id] = $row->s_title;
    }
    return $list;
  }

  public function read_by_id_as_array($id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('ab_id', $id)
      ->get()
      ->row_array();
  }


  public function update($data = [])
  {
    return $this->db->where('ab_id', $data['ab_id'])
      ->update($this->table, $data);
  }

  public function delete($ab_id = null)
  {
    $this->db->where('ab_id', $ab_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function read_by_id($ab_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('ab_id', $ab_id)
      ->get()
      ->row_array();
  }

  public function read_by_id_as_obj($ab_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('ab_id', $ab_id)
      ->get()
      ->row();
  }
}
