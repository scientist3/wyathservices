<?php defined('BASEPATH') or exit('No direct script access allowed');

class Address_model extends CI_Model
{

	private $country_tbl = "helper_country";
	private $state_tbl   = "helper_state";
	private $city_tbl    = "helper_city";

	public function create($data = [])
	{
		return $this->db->insert($this->table, $data);
	}

	public function read($limit = 0, $offset = 0)
	{
		return $this->db->select("*")
			->from($this->country_tbl)
			->order_by('name', 'asc')
			->limit($limit, $offset)
			->get()
			->result();
	}


	// added by riyaz
	public function fetch_district($state_id)
	{
		$this->db->where('state_id', $state_id);
		$this->db->order_by('name', 'ASC');
		$query = $this->db->get('helper_city');
		$output = '<option value="">Select District</option>';
		foreach ($query->result() as $row) {
			$output .= '<option value="' . $row->ID . '">' . $row->name . '</option>';
		}
		return $output;
	}

	// end


	public function read_country_as_list()
	{
		$result = $this->db->select("*")
			->from($this->country_tbl)
			->order_by('name', 'asc')
			->where('status', 1)
			->get()
			->result();
		$list[''] = 'Select country';
		foreach ($result as $row) {
			$list[$row->ID] = $row->name;
		}
		return $list;
	}


	//default india country id assigned
	public function read_state_country_as_list()
	{
		$country_id = '101';
		$result = $this->db->select("*")
			->from($this->state_tbl)
			->where('country_id', $country_id)
			->order_by('name', 'asc')
			->get()
			->result();
		//$list['']='Name';
		foreach ($result as $row) {
			$list[$row->ID] = $row->name;
		}
		return !empty($list) ? $list : array();
	}

	public function read_state_country_as_list_ajax()
	{
		//$department_id = $this->input->post('department_id');
		$country_id = 101;
		if (!empty($country_id)) {
			$query = $this->db->select("*")
				->from($this->state_tbl)
				->where('country_id', $country_id)
				->order_by('name', 'asc')
				->get();

			$option = "<option value=\"\">" . display('select_option') . "</option>";
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $state) {
					$option .= "<option value=\"$state->ID\">$state->name</option>";
				}
				$data['message'] = $option;
				//$data
				$data['status'] = true;
			} else {
				$data['message'] = 'No State available';
				$data['status'] = false;
			}
		} else {
			$data['message'] = 'Invalid Counrty Id.';
			$data['status'] = null;
		}

		echo json_encode($data);
	}




	public function read_city_state_as_list($state_id)
	{
		$result = $this->db->select("*")
			->from($this->city_tbl)
			->where('state_id', $state_id)
			->order_by('name', 'asc')
			->get()
			->result();
		//$list['']='Name';
		foreach ($result as $row) {
			$list[$row->ID] = $row->name;
		}
		return !empty($list) ? $list : array();
	}

	public function read_city_state_as_list_ajax($state_id = null, $isBootstrapSelect = false,  $datadataBelong = null,  $dataSubtext = null)
	{
		//$department_id = $this->input->post('department_id');

		if (!empty($state_id)) {
			$query = $this->db->select("*")
				->from($this->city_tbl)
				->where('state_id', $state_id)
				->order_by('name', 'asc')
				->get();

			if ($isBootstrapSelect == true) {
				$option = "<option value=\"\">All Cities</option>";
			} else {
				$option = "<option value=\"\">" . display('select_option') . "</option>";
			}
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $city) {
					if ($isBootstrapSelect == true) {
						$option .= "<option data-ref=\"$city->ID\"  data-belong=\"$datadataBelong\"  data-subtext=\"$dataSubtext\" value=\"$city->ID\">$city->name</option>";
					} else {
						$option .= "<option value=\"$city->ID\">$city->name</option>";
					}
				}
				$data['message'] = $option;
				//$data
				$data['status'] = true;
			} else {
				$data['message'] = 'No City available';
				$data['status'] = false;
			}
		} else {
			$data['message'] = 'Invalid State Id.';
			$data['status'] = null;
		}

		echo json_encode($data);
	}

	public function read_as_list()
	{
		/*$result = $this->db->select("*")
			->from($this->table)
			->order_by('name','asc')
			->get()
			->result();
		$list['']=display('select_patient');
		foreach($result as $row){
			$list[$row->patient_id] = $row->patient_id." - ".$row->firstname;
		}
		return $list;*/
		return null;
	}

	public function read_by_id($id = null)
	{
		return $this->db->select("*")
			->from($this->table)
			->where('f_id', $id)
			->get()
			->row();
	}
	public function new_messages()
	{
		return $this->db->where('f_read', '0')
			->from($this->table)
			->count_all_results();
	}

	public function total_messages()
	{
		return $this->db->where('f_status', '1')
			->from($this->table)
			->count_all_results();
	}

	public function update($data = [])
	{
		return $this->db->where('f_id', $data['f_id'])
			->update($this->table, $data);
	}

	public function read_message($id = null)
	{
		$this->db->where('f_id', $id)
			->update($this->table, array('f_read' => '1'));
	}

	public function delete($id = null)
	{
		$this->db->where('f_id', $id)
			->delete($this->table);

		if ($this->db->affected_rows()) {
			return true;
		} else {
			return false;
		}
	}
}