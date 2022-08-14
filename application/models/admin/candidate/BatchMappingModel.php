<?php defined('BASEPATH') or exit('No direct script access allowed');
class BatchMappingModel extends CI_Model
{

  private $table = "batch_student_mapping_tbl";

  public function create($data = [])
  {
    return $this->db->insert($this->table, $data);
  }

  public function create_batch($data = [])
  {
    return $this->db->insert_batch($this->table, $data);
  }

  public function readStudentsByBatchId($b_id)
  {
    return $this->db->select($this->table . ".*, 
    candidate_tbl.c_cand_id,
    candidate_tbl.c_full_name
    ")
      ->from($this->table)
      ->where('bsm_b_id', $b_id)
      ->join('candidate_tbl', 'candidate_tbl.c_id = ' . $this->table . '.	bsm_c_id')
      ->get()
      ->result();
  }

  public function delete_batch($bsm_ids = [])
  {
    $this->db->where_in('bsm_id', $bsm_ids)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
}
