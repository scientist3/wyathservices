<?php defined('BASEPATH') or exit('No direct script access allowed');

class ContactModel extends CI_Model
{
  private $table = "contact_us_tbl";

  public function create($data = [])
  {
    return $this->db->insert($this->table, $data);
  }

  public function read()
  {
    return $this->db->select("*")
      ->from($this->table)
      ->order_by("con_us_doc", "desc")
      ->get()
      ->result();
  }

  public function read_as_array()
  {
    return $this->db->select("*")
      ->from($this->table)
      ->get()
      ->result_array();
  }


  public function read_by_id_as_array($id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('con_us_id', $id)
      ->get()
      ->row_array();
  }


  public function update($data = [])
  {
    return $this->db->where('con_us_id', $data['con_us_id'])
      ->update($this->table, $data);
  }

  public function delete($con_us_id = null)
  {
    $this->db->where('con_us_id', $con_us_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }


  public function read_by_id_as_obj($con_us_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('con_us_id', $con_us_id)
      ->get()
      ->row();
  }
}
