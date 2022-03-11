<?php defined('BASEPATH') or exit('No direct script access allowed');

class EventModel extends CI_Model
{

  private $table = "event_tbl";
  private $timezone = 'Asia/Kolkata';
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
      ->order_by('event_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('Select Events');
    foreach ($result as $row) {
      $list[$row->event_id] = $row->event_title;
    }
    return $list;
  }

  public function read_as_list_active_only()
  {
    $result = $this->db->select("*")
      ->from($this->table)
      ->where('event_status', 1)
      ->order_by('event_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('select_event_type');
    foreach ($result as $row) {
      $list[$row->event_id] = $row->event_title_name;
    }
    return $list;
  }

  public function read_by_id_as_array($id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('event_id', $id)
      ->get()
      ->row_array();
  }


  public function update($data = [])
  {
    date_default_timezone_set($this->timezone);
    $data['event_dou'] = date('Y-m-d h:i:sa');
    return $this->db->where('event_id', $data['event_id'])
      ->update($this->table, $data);
  }

  public function delete($event_id = null)
  {
    $this->db->where('event_id', $event_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function read_by_id($event_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('event_id', $event_id)
      ->get()
      ->row_array();
  }

  public function read_by_id_as_obj($event_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('event_id', $event_id)
      ->get()
      ->row();
  }
}
