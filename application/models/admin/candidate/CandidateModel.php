<?php defined('BASEPATH') or exit('No direct script access allowed');

class CandidateModel extends CI_Model
{
  private $table = "candidate_tbl";

  // Add new candidate 
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

  // Read Student as per the limit and offset
  public function readAll($limit = null, $start = null)
  {
    # code...
  }

  // Read Student by ID
  public function readById($c_id, $returnAsArray = false)
  {
    $this->db->select("*")
      ->from($this->table)
      ->where('c_id', $c_id);
    // ->get();
    if ($returnAsArray == false) {
      return $this->db->get()->row();
    } else {
      return $this->db->row_array();
    }
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


  public function insert($data = [])
  {
    // return $this->db->insert($this->table, $data);
    // return $this->db->insert($this->table, $data);
    return $this->db->insert($table, $postDataUser);
  }
}