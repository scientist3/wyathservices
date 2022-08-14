<?php defined('BASEPATH') or exit('No direct script access allowed');

class TrainingCenterModel extends CI_Model
{

  private $table = "training_center_tbl";
  public function create($data = [])
  {
    if (!empty($data['tc_id'])) {
      return $this->db->where('tc_id', $data['tc_id'])->update($this->table, $data);
    } else {
      return $this->db->insert($this->table, $data);
    }
  }

  public function read()
  {
    return $this->db->select("*")
      ->from($this->table)
      ->get()
      ->result();
  }

  public function readById($tc_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('tc_id', $tc_id)
      ->get()
      ->row();
  }

  public function read_trainingcenter_as_list()
  {
    $result = $this->db->select("*")
      ->from($this->table)
      ->order_by('tc_id', 'asc')
      // ->where('status', 1)
      ->get()
      ->result();
    $list[''] = 'Select Training Center';
    foreach ($result as $row) {
      $list[$row->tc_id] = $row->tc_id . ' - ' . $row->tc_name;
    }
    return $list;
  }

  public function delete($tc_id = null)
  {
    $this->db->where('tc_id', $tc_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
}
