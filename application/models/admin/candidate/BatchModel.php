<?php defined('BASEPATH') or exit('No direct script access allowed');
class BatchModel extends CI_Model
{

  private $table = "batch_tbl";
  // create
  public function create($data = [])
  {
    if (!empty($data['b_id'])) {
      return $this->db->where('b_id', $data['b_id'])->update($this->table, $data);
    } else {
      return $this->db->insert($this->table, $data);
    }
  }

  public function read()
  {
    return $this->db->select($this->table . ".*, course_tbl.crs_course_name")
      ->from($this->table)
      ->join('course_tbl', 'course_tbl.crs_id = ' . $this->table . '.b_course_id', 'left')
      ->get()
      ->result();
  }

  public function readById($b_id = null)
  {
    return $this->db->select($this->table . ".*, course_tbl.crs_course_name")
      ->from($this->table)
      ->where('b_id', $b_id)
      ->join('course_tbl', 'course_tbl.crs_id = ' . $this->table . '.b_course_id', 'left')
      ->get()
      ->row();
  }
  public function delete($b_id = null)
  {
    $this->db->where('b_id', $b_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function isBatchTrainingCompleted($b_id =  null)
  {
    $result = $this->db->select($this->table . ".b_training_completed")
      ->from($this->table)
      ->where('b_id', $b_id)
      ->get()
      ->row();
    // echo "hii";
    // dd($b_id);
    // dd($result);
    return $result->b_training_completed == 1 ? true : false;
    // die();
  }
}
