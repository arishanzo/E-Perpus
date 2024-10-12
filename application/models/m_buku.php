<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_buku extends CI_Model
{

    public function getdatabuku()
    {
        $this->db->select('*');
        $this->db->from('dt_buku');
        return  $this->db->get()->result_array();
    }

    public function insertbuku($data)
    {
        return $this->db->insert('dt_buku', $data);
    }

    public function gettotaldatabuku()
    {
        $this->db->select('*');
        $this->db->from('dt_buku');

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getidbuku($id)
    {
        $this->db->select('*');
        $this->db->from('dt_buku');
        $this->db->where('id_buku', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function editbuku($data, $id)
    {
        $this->db->where('id_buku', $id);
        return $this->db->update('dt_buku', $data);
    }


    public function hapusbuku($id)
    {
        $this->db->where('id_buku', $id);
        return $this->db->delete('dt_buku');
    }
}

/* End of file Databuku_model.php */
