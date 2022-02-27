<?php defined('BASEPATH') or exit('No direct script access allowed');

class BannerModel extends CI_Model
{

    private $table = "banner_tbl";

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

    public function read_as_list()
    {
        $result = $this->db->select("*")
            ->from($this->table)
            ->order_by('dept_id', 'asc')
            ->get()
            ->result();
        $list[''] = ('Select Department');
        foreach ($result as $row) {
            $list[$row->dept_id] = $row->dept_name;
        }
        return $list;
    }

    public function read_as_list_active_only()
    {
        $result = $this->db->select("*")
            ->from($this->table)
            ->where('dept_status', 1)
            ->order_by('dept_id', 'asc')
            ->get()
            ->result();
        $list[''] = ('select_property_type');
        foreach ($result as $row) {
            $list[$row->dept_id] = $row->dept_name;
        }
        return $list;
    }

    public function read_by_id_as_array($id = null)
    {
        return $this->db->select("*")
            ->from($this->table)
            ->where('dept_id', $id)
            ->get()
            ->row_array();
    }


    public function update($data = [])
    {
        return $this->db->where('dept_id', $data['dept_id'])
            ->update($this->table, $data);
    }

    public function delete($dept_id = null)
    {
        $this->db->where('dept_id', $dept_id)
            ->delete($this->table);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function read_by_id($dept_id = null)
    {
        return $this->db->select("*")
            ->from($this->table)
            ->where('dept_id', $dept_id)
            ->get()
            ->row_array();
    }

    public function read_by_id_as_obj($dept_id = null)
    {
        return $this->db->select("*")
            ->from($this->table)
            ->where('dept_id', $dept_id)
            ->get()
            ->row();
    }
}


/*class BannerModel extends CI_Model
{
    public function update($data)
    {
        $id = $this->db->get('banner_tbl')->row_array();
        $this->db->where('b_id', $id);
        return $this->db->update('banner_tbl', $data);
    }
    public function getBannerDetails()
    {
        return $this->db->get('banner_tbl')->row_array();
    }
    // public function getAdminProfile()
    // {
    //     return $this->db->get('admin')->row_array();
    // }
    // public function update($data)
    // {
    //     $this->db->where('set_id', 1);
    //     return $this->db->update('setting', $data);
    // }
    // public function updateProfile($data)
    // {
    //     $this->db->where('admin_id', 1);
    //     return $this->db->update('admin', $data);
    // }
}*/
