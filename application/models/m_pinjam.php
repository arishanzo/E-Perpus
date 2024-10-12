<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_pinjam extends CI_Model
{

    public function getdatapinjam()
    {
        $this->db->select('*');
        $this->db->from('pinjam_buku');
        $this->db->join('dt_santri', 'dt_santri.id_santri = pinjam_buku.id_santri');
        
        $this->db->join('dt_buku', 'dt_buku.id_buku = pinjam_buku.id_buku');

        return  $this->db->get()->result_array();
    }

    public function insertpinjam($data)
    {
        return $this->db->insert('pinjam_buku', $data);
    }

    public function gettotalpinjam()
    {
        $this->db->select('*');
        $this->db->from('pinjam_buku');

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getidpinjam($id)
    {
        $this->db->select('*');
        $this->db->from('pinjam_buku');
        $this->db->join('dt_santri', 'dt_santri.id_santri = pinjam_buku.id_santri');
        
        $this->db->join('dt_buku', 'dt_buku.id_buku = pinjam_buku.id_buku');

        $this->db->where('id_pinjambuku', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function editpinjam($data, $id)
    {
        $this->db->where('id_pinjambuku', $id);
        return $this->db->update('pinjam_buku', $data);
    }


    public function hapuspinjam($id)
    {
        $this->db->where('id_pinjam', $id);
        return $this->db->delete('id_pinjam');
    }
}

/* End of file Databuku_model.php */
