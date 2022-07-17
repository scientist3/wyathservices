<?php defined('BASEPATH') or exit('No direct script access allowed');

class trcModel extends CI_Model
{
    // protected $allowedFields = ['name', 'email', 'address'];

    private $table = "training_center_tbl";


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
      $query=$this->db->query("SELECT * FROM training_center_tbl WHERE id='$id'");
     $result = $query->result_array();
     return $result;
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

            $query = $this->db->query("SELECT * FROM training_center_tbl ORDER BY id DESC LIMIT 1");
            $result = $query->result_array();
            //return current new id
           $s= (string)$result[0]['id']+1;
           $s="TRC-".$s;
            return $s;
        

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