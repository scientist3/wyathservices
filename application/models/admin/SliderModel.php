<?php defined('BASEPATH') or exit('No direct script access allowed');

class SliderModel extends CI_Model
{

  private $table = "slider_tbl";
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

    return $this->db->update($this->table, array('s_status' => '0'));
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
      ->order_by('s_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('Select Slider');
    foreach ($result as $row) {
      $list[$row->s_id] = $row->dept_name;
    }
    return $list;
  }

  public function read_as_list_active_only()
  {
    $result = $this->db->select("*")
      ->from($this->table)
      ->where('s_status', 1)
      ->order_by('s_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('select_slideer_type');
    foreach ($result as $row) {
      $list[$row->s_id] = $row->s_title;
    }
    return $list;
  }

  public function read_by_id_as_array($id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('s_id', $id)
      ->get()
      ->row_array();
  }


  public function update($data = [])
  {
    date_default_timezone_set($this->timezone);
    $data['s_dou'] = mdate('%Y-%m-%d %H:%i:%s', now());
    return $this->db->where('s_id', $data['s_id'])
      ->update($this->table, $data);
  }

  public function delete($s_id = null)
  {
    $this->db->where('s_id', $s_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function read_by_id($s_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('s_id', $s_id)
      ->get()
      ->row_array();
  }

  public function read_by_id_as_obj($s_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('s_id', $s_id)
      ->get()
      ->row();
  }
}