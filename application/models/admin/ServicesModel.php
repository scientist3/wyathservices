<?php defined('BASEPATH') or exit('No direct script access allowed');

class ServicesModel extends CI_Model
{

  private $table = "init_services_tbl";
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
  public function setVisible()
  {

    return $this->db->update($this->table, array('init_ser_status' => '0'));
  }
  public function read_as_array()
  {
    return $this->db->select("*")
      ->from($this->table)
      ->get()
      ->result_array();
  }

  public function read_as_list()
  {
    $result = $this->db->select("*")
      ->from($this->table)
      ->order_by('init_ser_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('Select Featured Initiatives');
    foreach ($result as $row) {
      $list[$row->init_ser_id] = $row->init_ser_title;
    }
    return $list;
  }

  public function read_as_list_active_only()
  {
    $result = $this->db->select("*")
      ->from($this->table)
      ->where('init_ser_status', 1)
      ->order_by('init_ser_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('select_Services_type');
    foreach ($result as $row) {
      $list[$row->init_ser_id] = $row->init_ser_title_name;
    }
    return $list;
  }

  public function read_by_id_as_array($id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('init_ser_id', $id)
      ->get()
      ->row_array();
  }


  public function update($data = [])
  {
    return $this->db->where('init_ser_id', $data['init_ser_id'])
      ->update($this->table, $data);
  }

  public function delete($init_ser_id = null)
  {
    $this->db->where('init_ser_id', $init_ser_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function read_by_id($init_ser_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('init_ser_id', $init_ser_id)
      ->get()
      ->row_array();
  }

  public function read_by_id_as_obj($init_ser_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('init_ser_id', $init_ser_id)
      ->get()
      ->row();
  }
}
