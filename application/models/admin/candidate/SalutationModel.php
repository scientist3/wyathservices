<?php defined('BASEPATH') or exit('No direct script access allowed');

class SalutationModel extends CI_Model
{
  public function get_salutation()
  {
    $data = ["Mr", "Ms", "Mrs", "Mx"];
    return $data;
  }
}