<?php defined('BASEPATH') or exit('No direct script access allowed');

class FeaturedInitiativesModel extends CI_Model
{

    private $table = "featured_initiatives_tbl";
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

        return $this->db->update($this->table, array('fi_status' => '0'));
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
            ->order_by('fi_id', 'asc')
            ->get()
            ->result();
        $list[''] = ('Select Featured Initiatives');
        foreach ($result as $row) {
            $list[$row->fi_id] = $row->fi_title;
        }
        return $list;
    }

    public function read_as_list_active_only()
    {
        $result = $this->db->select("*")
            ->from($this->table)
            ->where('fi_status', 1)
            ->order_by('fi_id', 'asc')
            ->get()
            ->result();
        $list[''] = ('select_FeaturedInitiatives_type');
        foreach ($result as $row) {
            $list[$row->fi_id] = $row->fi_title_name;
        }
        return $list;
    }

    public function read_by_id_as_array($id = null)
    {
        return $this->db->select("*")
            ->from($this->table)
            ->where('fi_id', $id)
            ->get()
            ->row_array();
    }


    public function update($data = [])
    {
        date_default_timezone_set($this->timezone);
        $data['fi_dou'] = date('Y-m-d h:i:sa');
        return $this->db->where('fi_id', $data['fi_id'])
            ->update($this->table, $data);
    }

    public function delete($fi_id = null)
    {
        $this->db->where('fi_id', $fi_id)
            ->delete($this->table);

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function read_by_id($fi_id = null)
    {
        return $this->db->select("*")
            ->from($this->table)
            ->where('fi_id', $fi_id)
            ->get()
            ->row_array();
    }

    public function read_by_id_as_obj($fi_id = null)
    {
        return $this->db->select("*")
            ->from($this->table)
            ->where('fi_id', $fi_id)
            ->get()
            ->row();
    }
}
