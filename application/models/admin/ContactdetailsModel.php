<?php defined('BASEPATH') or exit('No direct script access allowed');

class ContactdetailsModel extends CI_Model
{

  private $table = "contact_det_tbl";
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

    return $this->db->update($this->table, array('event_status' => '0'));
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
      ->order_by('cont_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('Select Contact Details');
    foreach ($result as $row) {
      $list[$row->cont_id] = $row->event_title;
    }
    return $list;
  }

  public function read_as_list_active_only()
  {
    $result = $this->db->select("*")
      ->from($this->table)
      ->where('event_status', 1)
      ->order_by('cont_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('select_contactdetails_type');
    foreach ($result as $row) {
      $list[$row->cont_id] = $row->event_title_name;
    }
    return $list;
  }

  public function read_by_id_as_array($id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('cont_id', $id)
      ->get()
      ->row_array();
  }


  public function update($data = [])
  {
    return $this->db->where('cont_id', $data['cont_id'])
      ->update($this->table, $data);
  }

  public function delete($cont_id = null)
  {
    $this->db->where('cont_id', $cont_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function read_by_id($cont_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('cont_id', $cont_id)
      ->get()
      ->row_array();
  }

  public function read_by_id_as_obj($cont_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('cont_id', $cont_id)
      ->get()
      ->row();
  }
}
