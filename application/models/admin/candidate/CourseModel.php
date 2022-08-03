<?php defined('BASEPATH') or exit('No direct script access allowed');

class CourseModel extends CI_Model
{
  // protected $allowedFields = ['name', 'email', 'address'];

  private $table = "course_tbl";



  public function read_by_id_as_obj($id)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('id', $id)
      ->get()
      ->row();
  }


  public function update($data = [])
  {
    return $this->db->where('id', $data['id'])
      ->update($this->table, $data);
  }

  public function read()
  {
    return $this->db->select("*")
      ->from($this->table)
      ->get()
      ->result();
  }

  public function readid($id)
  {
    $query = $this->db->query("SELECT * FROM course_tbl WHERE id='$id'");
    $result = $query->result_array();
    return $result;
  }

  //for batch view 
  public  function readallcourseid()
  {
    $query = $this->db->query("SELECT course_name FROM course_tbl");
    $result = $query->result_array();
    //return $result;
    $list[''] = 'Select Course';

    foreach ($result as $row) {
      $list[$row['course_name']] = $row['course_name'];
    }
    return !empty($list) ? $list : array();
  }


  public function batchread()
  {

    $query = $this->db->get('batch_tbl');

    return $query;
  }
  public function batchinsert($data = [])
  {


    return $this->db->insert($table, $postDataUser);
  }
  public function getlastid()
  {
    $query = $this->db->query("SELECT * FROM course_tbl ORDER BY id DESC LIMIT 1");
    $result = $query->result_array();
    print_r($result);
    if (empty($result)) {
      $s = "CR-" . "1";
      return $s;
    } else {
      $s = (string)$result[0]['id'] + 1;
      $s = "CR-" . $s;
      return $s;
    }
  }

  public function trcdelete($batch_id = null)
  {
    $this->db->where('id', $batch_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
}