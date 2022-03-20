<?php defined('BASEPATH') or exit('No direct script access allowed');

class KeyDiffImpactModel extends CI_Model
{

  private $table = "key_differentiators_impact_tbl";
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

    return $this->db->update($this->table, array('kd_status' => '0'));
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
      ->order_by('kd_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('Select Featured Initiatives');
    foreach ($result as $row) {
      $list[$row->kd_id] = $row->kd_title;
    }
    return $list;
  }

  public function read_as_list_active_only()
  {
    $result = $this->db->select("*")
      ->from($this->table)
      ->where('kd_status', 1)
      ->order_by('kd_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('select_keydiffimpact_type');
    foreach ($result as $row) {
      $list[$row->kd_id] = $row->kd_title;
    }
    return $list;
  }

  public function read_by_id_as_array($id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('kd_id', $id)
      ->get()
      ->row_array();
  }


  public function update($data = [])
  {
    date_default_timezone_set($this->timezone);
    $data['kd_dou'] = mdate('%Y-%m-%d %H:%i:%s', now());
    return $this->db->where('kd_id', $data['kd_id'])
      ->update($this->table, $data);
  }

  public function delete($kd_id = null)
  {
    $this->db->where('kd_id', $kd_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function read_by_id($kd_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('kd_id', $kd_id)
      ->get()
      ->row_array();
  }

  public function read_by_id_as_obj($kd_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('kd_id', $kd_id)
      ->get()
      ->row();
  }
}
