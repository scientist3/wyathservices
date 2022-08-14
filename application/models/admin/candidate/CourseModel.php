<?php defined('BASEPATH') or exit('No direct script access allowed');

class CourseModel extends CI_Model
{
  private $table = "course_tbl";

  public function create($data = [])
  {
    if (!empty($data['crs_id'])) {
      return $this->db->where('crs_id', $data['crs_id'])->update($this->table, $data);
    } else {
      return $this->db->insert($this->table, $data);
    }
  }

  public function read()
  {
    return $this->db->select("*")
      ->from($this->table)
      ->get()
      ->result();
  }

  public function readById($crs_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('crs_id', $crs_id)
      ->get()
      ->row();
  }

  public function read_course_as_list()
  {
    $result = $this->db->select("*")
      ->from($this->table)
      ->order_by('crs_course_name', 'asc')
      // ->where('status', 1)
      ->get()
      ->result();
    $list[''] = 'Select Course';
    foreach ($result as $row) {
      $list[$row->crs_id] = $row->crs_course_id . ' - ' . $row->crs_course_name;
    }
    return $list;
  }

  public function delete($crs_id = null)
  {
    $this->db->where('crs_id', $crs_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
}
