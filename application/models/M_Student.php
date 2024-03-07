<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Student extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->db->get('students')->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert('students', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('students');
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('students', $data);
    }

    public function getById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('students')->row_array();
    }
}
