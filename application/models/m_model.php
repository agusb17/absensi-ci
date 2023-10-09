<?php

class M_model extends CI_Model
{
    function get_data($tabel)
    {
        return $this->db->get($tabel);
    }

    function getwhere($tabel, $data)
    {
        return $this->db->get_where($tabel, $data);
    }
    public function delete($tabel, $field, $id)
    {
        $data = $this->db->delete($tabel, array($field => $id));
        return $data;
    }
    public function tambah_data($tabel, $data)
    {
        $this->db->insert($tabel, $data);
        return $this->db->insert_id();
    }

    public function get_by_id($tabel, $id_column, $id)
    {
        $data = $this->db->where($id_column, $id)->get($tabel);
        return ($data);
    }

}
?>