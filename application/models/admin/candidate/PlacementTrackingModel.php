<?php defined('BASEPATH') or exit('No direct script access allowed');
class PlacementTrackingModel extends CI_Model
{

  private $table = "placement_tracking_detail_tbl";
  // create
  public function create($data = [])
  {
    if (!empty($data['ptd_id'])) {
      return $this->db->where('ptd_id', $data['ptd_id'])->update($this->table, $data);
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

  public function readById($ptd_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('ptd_id', $ptd_id)
      ->get()
      ->row();
  }

  public function update($data)
  {
    return $this->db->where('ptd_id', $data['ptd_id'])->update($this->table, $data);
  }

  // public function update_batch($data)
  // {
  //   return $this->db->update_batch($this->table, $data, 'cert_id');
  // }

  public function delete($ptd_id = null)
  {
    $this->db->where('ptd_id', $ptd_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
}
