<?php defined('BASEPATH') or exit('No direct script access allowed');

class BatchModel extends CI_Model
{
  // protected $allowedFields = ['name', 'email', 'address'];

  private $table = "batch_tbl";


  public function read_by_id_as_obj($id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('id', $id)
      ->get()
      ->row();
  }

  public function update($data = [])
  {
    return $this->db->where('id', $data['id'])
      ->update($this->table, $data);
  }

  public function read()
  {
    return $this->db->select("*")
      ->from($this->table)
      ->get()
      ->result();
  }

  public function readid($id)
  {
    $query = $this->db->query("SELECT * FROM batch_tbl WHERE id='$id'");
    $result = $query->result_array();
    return $result;
  }
  public function batchread()
  {

    $query = $this->db->get('batch_tbl');

    return $query;
  }
  public function batchinsert($data = [])
  {


    return $this->db->insert($table, $postDataUser);
  }
  public function getlastid()
  {

    $query = $this->db->query("SELECT * FROM batch_tbl ORDER BY id DESC LIMIT 1");
    $result = $query->result_array();
    //return current new id
    $s = (string)$result[0]['id'] + 1;
    $s = "BCH-" . $s;
    return $s;
  }

  public function batchdelete($batch_id = null)
  {
    $this->db->where('id', $batch_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
}