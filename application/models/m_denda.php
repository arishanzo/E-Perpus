<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_denda extends CI_Model
{

    public function getdatadenda()
    {
        $this->db->select('*');
        $this->db->from('dt_denda');
        $this->db->join('dt_santri', 'dt_santri.id_santri = dt_denda.id_santri');
        
        $this->db->join('dt_buku', 'dt_buku.id_buku = dt_denda.id_buku');
        return  $this->db->get()->result_array();
    }

    public function getiddenda($id)
    {
        $this->db->select('*');
        $this->db->from('dt_denda');
        $this->db->join('dt_santri', 'dt_santri.id_santri = dt_denda.id_santri');
        $this->db->join('dt_buku', 'dt_buku.id_buku = dt_denda.id_buku');
        $this->db->where('id_denda', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function insertdenda($data)
    {
        return $this->db->insert('dt_denda', $data);
    }

    public function editdenda($data, $id)
    {
        $this->db->where('id_denda', $id);
        return $this->db->update('dt_denda', $data);
    }

}