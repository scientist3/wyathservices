<?php defined('BASEPATH') or exit('No direct script access allowed');
class PlacementModel extends CI_Model
{

  private $table = "placement_detail_tbl";
  // create
  public function create($data = [])
  {
    if (!empty($data['pd_id'])) {
      return $this->db->where('pd_id', $data['pd_id'])->update($this->table, $data);
    } else {
      return $this->db->insert($this->table, $data);
    }
  }

  public function create_batch($data = [])
  {
    return $this->db->insert_batch($this->table, $data);
  }

  public function read()
  {
    return $this->db->select("*")
      ->from($this->table)
      ->get()
      ->result();
  }

  public function readById($pd_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('pd_id', $pd_id)
      ->get()
      ->row();
  }

  public function update($data)
  {
    return $this->db->where('pd_id', $data['pd_id'])->update($this->table, $data);
  }

  public function update_batch($data)
  {
    return $this->db->update_batch($this->table, $data, 'cert_id');
  }

  public function delete($pd_id = null)
  {
    $this->db->where('pd_id', $pd_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
}
