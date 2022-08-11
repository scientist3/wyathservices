<?php defined('BASEPATH') or exit('No direct script access allowed');

class CandidateModel extends CI_Model
{
  private $table = "candidate_tbl";

  public function create($data = [])
  {
    return $this->db->insert($this->table, $data);
  }

  public function read_by_id_as_obj($c_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('c_id', $c_id)
      ->get()
      ->row();
  }
  public function get_count()
  {
    return $this->db->count_all($this->table);
  }

  public function studentdelete($student_id = null)
  {
    $this->db->where('c_id', $student_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
  public function read()
  {
    return $this->db->select("*")
      ->from($this->table)
      ->get()
      ->result();
  }

  public function insert($data = [])
  {
    // return $this->db->insert($this->table, $data);
    // return $this->db->insert($this->table, $data);
    return $this->db->insert($table, $postDataUser);
  }
}
