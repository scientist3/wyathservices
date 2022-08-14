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
    return $this->db->select("*")
      ->from($this->table)
      ->get()
      ->result();
  }

  public function readById($b_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('b_id', $b_id)
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

  public function getlastid()
  {
    $query = $this->db->query("SELECT * FROM batch_tbl ORDER BY id DESC LIMIT 1");
    $result = $query->result_array();
    //return current new id

    if (empty($result)) {
      $s = "BCH-1";
      return $s;
    } else {

      $s = (string)$result[0]['id'] + 1;
      $s = "BCH-" . $s;
      return $s;
    }
  }
}
