<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	private $user_role_tbl = "user_role_tbl";
	private $table = "user_tbl";

	public function get_user_role()
	{
		$result = $this->db->select('ur_id,ur_name')
			->from($this->user_role_tbl)
			->where('ur_status', '1')
			->get()
			->result();

		$list[''] = "Select User Role"; //display('select_user_role');
		if (!empty($result)) {
			foreach ($result as $value) {
				$list[$value->ur_id] = ($value->ur_name);
			}
			return $list;
		} else {
			return false;
		}
	}


	public function profile($u_id = null)
	{
		return $this->db->select($this->table . ".*, designation_tbl.desg_name, department_tbl.dept_name, user_role_tbl.ur_name")
			->from($this->table)
			->where('u_id', $u_id)
			->join('designation_tbl', 'desg_id 	= ' . $this->table . '.u_desg_id', 'left')
			->join('department_tbl',  'dept_id 	= ' . $this->table . '.u_dept_id', 'left')
			->join('user_role_tbl',   'ur_id 		= ' . $this->table . '.u_user_role', 'left')
			->get()
			->row();
	}
	public function update($data = [])
	{
		return $this->db->where('u_id', $data['u_id'])
			->update($this->table, $data);
	}

	public function read_faculty_as_list()
	{
		$result = $this->db->select('ur_id,ur_name')
			->from($this->user_role_tbl)
			->where('ur_status', '1')
			->get()
			->result();

		$list[''] = "Select User Role"; //display('select_user_role');
		if (!empty($result)) {
			foreach ($result as $value) {
				$list[$value->ur_id] = ($value->ur_name);
			}
			return $list;
		} else {
			return false;
		}
	}

	// public function get_facutl(Type $var = null)
	// {
	// 	# code...
	// }
}
