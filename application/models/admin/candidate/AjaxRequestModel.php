<?php defined('BASEPATH') or exit('No direct script access allowed');

class CSD extends CI_Model
{

    public function fetch_state()
    {
        $this->db->order_by("state_name", "ASC");
        $query = $this->db->get("state");
        return $query->result();
    }
    public function fetch_state_array()
    {
        $this->db->select('state_name');
        $this->db->from('state');
        $a = $this->db->get()->result();
        print_r($a);
    }
    // public function fetch_district($state_id)
    // {
    //     $this->db->where('state_id', $state_id);
    //     $this->db->order_by('name', 'ASC');
    //     $query = $this->db->get('helper_city');
    //     $output = '<option value="">Select District</option>';
    //     foreach ($query->result() as $row) {
    //         $output .= '<option value="' . $row->ID . '">' . $row->name . '</option>';
    //     }
    //     return $output;
    // }

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


    // ffor database fetching

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
}