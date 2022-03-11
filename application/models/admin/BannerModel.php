<?php defined('BASEPATH') or exit('No direct script access allowed');

class BannerModel extends CI_Model
{

    private $table = "banner_tbl";
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
    public function setVisible()
    {

        return $this->db->update($this->table, array('b_isvisible' => '0'));
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
            ->order_by('b_id', 'asc')
            ->get()
            ->result();
        $list[''] = ('Select Banner');
        foreach ($result as $row) {
            $list[$row->b_id] = $row->b_title;
        }
        return $list;
    }

    public function read_as_list_active_only()
    {
        $result = $this->db->select("*")
            ->from($this->table)
            ->where('b_isvisible', 1)
            ->order_by('b_id', 'asc')
            ->get()
            ->result();
        $list[''] = ('select_banner_type');
        foreach ($result as $row) {
            $list[$row->b_id] = $row->b_title_name;
        }
        return $list;
    }

    public function read_by_id_as_array($id = null)
    {
        return $this->db->select("*")
            ->from($this->table)
            ->where('b_id', $id)
            ->get()
            ->row_array();
    }


    public function update($data = [])
    {
        date_default_timezone_set($this->timezone);
        $data['b_dou'] = date('Y-m-d h:i:sa');
        return $this->db->where('b_id', $data['b_id'])
            ->update($this->table, $data);
    }

    public function delete($b_id = null)
    {
        $this->db->where('b_id', $b_id)
            ->delete($this->table);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function read_by_id($b_id = null)
    {
        return $this->db->select("*")
            ->from($this->table)
            ->where('b_id', $b_id)
            ->get()
            ->row_array();
    }

    public function read_by_id_as_obj($b_id = null)
    {
        return $this->db->select("*")
            ->from($this->table)
            ->where('b_id', $b_id)
            ->get()
            ->row();
    }
}
