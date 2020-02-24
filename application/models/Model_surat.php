<?php
class Model_surat extends CI_Model
{
    public function getdata($table)
    {
        $query = "SELECT * FROM " . $table . " INNER JOIN indeks WHERE " . $table . ".id_indeks=indeks.id_indeks";
        return $this->db->query($query);
    }

    public function getdatawithadd($table, $additional)
    {
        $query = "SELECT * FROM " . $table . " INNER JOIN indeks WHERE " . $table . ".id_indeks=indeks.id_indeks AND " . $additional;
        return $this->db->query($query);
    }

    public function countdata($table)
    {
        $query = "SELECT count(*) as total FROM " . $table . " INNER JOIN indeks WHERE " . $table . ".id_indeks=indeks.id_indeks";
        return $this->db->query($query);
    }

    public function countdatawithadd($table, $additional)
    {
        $query = "SELECT count(*) as total FROM " . $table . " INNER JOIN indeks WHERE " . $table . ".id_indeks=indeks.id_indeks AND " . $additional;
        return $this->db->query($query);
    }

    public function getother($table)
    {
        $query = "SELECT * FROM " . $table;
        return $this->db->query($query);
    }

    public function getotherwithadd($table, $additional)
    {
        $query = "SELECT * FROM " . $table . " " . $additional;
        return $this->db->query($query);
    }

    public function countother($table)
    {
        $query = "SELECT COUNT(*) AS total FROM " . $table;
        return $this->db->query($query);
    }

    public function adddata($table, $array)
    {
        return $this->db->insert($table, $array);
    }

    public function updatedata($table, $array, $where)
    {
        $this->db->where($where);
        return $this->db->update($table, $array);
    }

    public function deletedata($table, $where)
    {
        return $this->db->delete($table, $where);
    }
}
