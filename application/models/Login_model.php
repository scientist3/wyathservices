<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

	private $table = "user_tbl";

	public function check_user($data = [])
	{
		return $this->db->select("*")
			->from($this->table)
			->where("u_email", $data["u_email"])
			->where("u_password", $data["u_pass"])
			->where("u_user_role", $data["u_role"])
			->where("u_status", 1)
			->get();
	}

	public function read()
	{
		# code...
	}

	public function read_by_id($id = null)
	{
		# code...
	}

	public function update($data = null)
	{
		# code...
	}

	public function delete($id = null)
	{
		# code...
	}
}
