<?php defined('BASEPATH') or exit('No direct script access allowed');

class CSD extends CI_Model
{

    public function fetch_state()
    {
        $this->db->order_by("state_name", "ASC");
        $query = $this->db->get("state");
        return $query->result();
    }

    public function fetch_district($state_id)
    {
        $this->db->where('state_id', $state_id);
        $this->db->order_by('district_name', 'ASC');
        $query = $this->db->get('district');
        $output = '<option value="">Select District</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->district_name . '">' . $row->district_name . '</option>';
        }
        return $output;
    }



}
