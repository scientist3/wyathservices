<?php defined('BASEPATH') or exit('No direct script access allowed');
class AssessmentModel extends CI_Model
{

  private $table = "assessment_tbl";
  // create
  public function create($data = [])
  {
    if (!empty($data['as_id'])) {
      return $this->db->where('as_id', $data['as_id'])->update($this->table, $data);
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

  public function readById($as_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('as_id', $as_id)
      ->get()
      ->row();
  }
  public function delete($as_id = null)
  {
    $this->db->where('as_id', $as_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
}
