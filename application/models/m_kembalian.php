<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_kembalian extends CI_Model
{

    public function getdatakembalian()
    {
        $this->db->select('*');
        $this->db->from('pengembalian_buku');
        $this->db->join('dt_santri', 'dt_santri.id_santri = pengembalian_buku.id_santri');
        
        $this->db->join('dt_buku', 'dt_buku.id_buku = pengembalian_buku.id_buku');

        return  $this->db->get()->result_array();
    }

    public function insertkembalian($data)
    {
        return $this->db->insert('pengembalian_buku', $data);
    }

    public function gettotalkembalian()
    {
        $this->db->select('*');
        $this->db->from('pengembalian_buku');

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getidkembalian($id)
    {
        $this->db->select('*');
        $this->db->from('pengembalian_buku');
        $this->db->where('id_pengembalian', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

  
}

/* End of file Databuku_model.php */
