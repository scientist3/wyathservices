<?php defined('BASEPATH') or exit('No direct script access allowed');

class StateHandleModel extends CI_Model
{
    // protected $allowedFields = ['name', 'email', 'address'];

    private $table = "state";


public function getstateid($state_name)
{
    // code...
    $sql= "SELECT state_id  FROM state WHERE state_name='$state_name' limit 1";
    // $this->db->where('state_name',$statename)->get('state_id')->result();
    $query=$this->db->query($sql)->result();
     // print_r($query);
    return $query[0]->state_id;
}

}