<?php defined('BASEPATH') or exit('No direct script access allowed');

class BoardMembersModel extends CI_Model
{

  private $table = "board_members_tbl";
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

    return $this->db->update($this->table, array('bm_status' => '0'));
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
      ->order_by('bm_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('Select boardmember');
    foreach ($result as $row) {
      $list[$row->bm_id] = $row->bm_name;
    }
    return $list;
  }

  public function read_as_list_active_only()
  {
    $result = $this->db->select("*")
      ->from($this->table)
      ->where('bm_status', 1)
      ->order_by('bm_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('select_boardmember_type');
    foreach ($result as $row) {
      $list[$row->bm_id] = $row->bm_name_name;
    }
    return $list;
  }

  public function read_by_id_as_array($id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('bm_id', $id)
      ->get()
      ->row_array();
  }


  public function update($data = [])
  {
    return $this->db->where('bm_id', $data['bm_id'])
      ->update($this->table, $data);
  }

  public function delete($bm_id = null)
  {
    $this->db->where('bm_id', $bm_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function read_by_id($bm_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('bm_id', $bm_id)
      ->get()
      ->row_array();
  }

  public function read_by_id_as_obj($bm_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('bm_id', $bm_id)
      ->get()
      ->row();
  }
}
