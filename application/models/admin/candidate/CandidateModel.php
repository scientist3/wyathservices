<?php defined('BASEPATH') or exit('No direct script access allowed');

class CandidateModel extends CI_Model
{
  private $table = "candidate_tbl";

  // Using
  public function create($data = [])
  {
    if (isset($data['c_id']) && !empty($data['c_id'])) {
      return $this->db->update($this->table, $data)
        ->where('c_id', $data['c_id']);
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

  public function read_by_id_as_obj($c_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('c_id', $c_id)
      ->get()
      ->row();
  }

  public function checkDuplicateStudent($data = [])
  {
    $result = $this->db->select("c_id_no")
      ->from($this->table)
      ->where('c_id_no', $data['c_id_no'])
      ->get();

    $count_row = $result->num_rows();

    if ($count_row > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  public function delete($student_id = null)
  {
    $this->db->where('c_id', $student_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function get_count()
  {
    return $this->db->count_all($this->table);
  }
}
