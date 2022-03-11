<?php defined('BASEPATH') or exit('No direct script access allowed');

class PartnersModel extends CI_Model
{

  private $table = "partners_tbl";
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

    return $this->db->update($this->table, array('par_status' => '0'));
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
      ->order_by('par_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('Select Partners');
    foreach ($result as $row) {
      $list[$row->par_id] = $row->dept_name;
    }
    return $list;
  }

  public function read_as_list_active_only()
  {
    $result = $this->db->select("*")
      ->from($this->table)
      ->where('par_status', 1)
      ->order_by('par_id', 'asc')
      ->get()
      ->result();
    $list[''] = ('select_partner_type');
    foreach ($result as $row) {
      $list[$row->par_id] = $row->pr_caption;
    }
    return $list;
  }

  public function read_by_id_as_array($id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('par_id', $id)
      ->get()
      ->row_array();
  }


  public function update($data = [])
  {
    date_default_timezone_set($this->timezone);
    $data['par_dou'] = mdate('%Y-%m-%d %H:%i:%s', now());
    return $this->db->where('par_id', $data['par_id'])
      ->update($this->table, $data);
  }

  public function delete($par_id = null)
  {
    $this->db->where('par_id', $par_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function read_by_id($par_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('par_id', $par_id)
      ->get()
      ->row_array();
  }

  public function read_by_id_as_obj($par_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('par_id', $par_id)
      ->get()
      ->row();
  }
}
