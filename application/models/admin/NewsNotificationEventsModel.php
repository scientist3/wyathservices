<?php defined('BASEPATH') or exit('No direct script access allowed');

class NewsNotificationEventsModel extends CI_Model
{

  private $table = "news_notification_tbl";
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

  public function read_as_array()
  {
    return $this->db->select("*")
      ->from($this->table)
      ->get()
      ->result_array();
  }


  public function read_by_id_as_array($news_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('news_id', $news_id)
      ->get()
      ->row_array();
  }


  public function update($data = [])
  {
    date_default_timezone_set($this->timezone);
    $data['news_dou'] = date('Y-m-d h:i:sa');
    return $this->db->where('news_id', $data['news_id'])
      ->update($this->table, $data);
  }

  public function delete($news_id = null)
  {
    $this->db->where('news_id', $news_id)
      ->delete($this->table);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function read_by_id($news_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('news_id', $news_id)
      ->get()
      ->row_array();
  }

  public function read_by_id_as_obj($news_id = null)
  {
    return $this->db->select("*")
      ->from($this->table)
      ->where('news_id', $news_id)
      ->get()
      ->row();
  }
}
