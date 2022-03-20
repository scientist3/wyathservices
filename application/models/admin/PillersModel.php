<?php defined('BASEPATH') or exit('No direct script access allowed');

class PillersModel extends CI_Model
{

  private $table = "pillers_tbl";
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

    return $this->db->update($this->table, array('pil_status' => '0'));
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
      ->order_by('pil_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('Select Events');
    foreach ($result as $row) {
      $list[$row->pil_id] = $row->event_title;
    }
    return $list;
  }

  public function read_as_list_active_only()
  {
    $result = $this->db->select("*")
      ->from($this->table)
      ->where('pil_status', 1)
      ->order_by('pil_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('select_event_type');
    foreach ($result as $row) {
      $list[$row->pil_id] = $row->event_title_name;
    }
    return $list;
  }

  public function read_by_id_as_array($id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('pil_id', $id)
      ->get()
      ->row_array();
  }


  public function update($data = [])
  {
    return $this->db->where('pil_id', $data['pil_id'])
      ->update($this->table, $data);
  }

  public function delete($pil_id = null)
  {
    $this->db->where('pil_id', $pil_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function read_by_id($pil_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('pil_id', $pil_id)
      ->get()
      ->row_array();
  }

  public function read_by_id_as_obj($pil_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('pil_id', $pil_id)
      ->get()
      ->row();
  }
}
