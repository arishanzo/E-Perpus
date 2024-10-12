<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_santri extends CI_Model
{

    public function getdatasantri()
    {
        $this->db->select('*');
        $this->db->from('dt_santri');
        return  $this->db->get()->result_array();
    }

    public function insertsantri($data)
    {
        return $this->db->insert('dt_santri', $data);
    }

    public function gettotaldatasantri()
    {
        $this->db->select('*');
        $this->db->from('dt_santri');

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getidsantri($id)
    {
        $this->db->select('*');
        $this->db->from('dt_santri');
        $this->db->where('id_santri', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function editsantri($data, $id)
    {
        $this->db->where('id_santri', $id);
        return $this->db->update('dt_santri', $data);
    }


    public function hapussantri($id)
    {
        $this->db->where('id_santri', $id);
        return $this->db->delete('dt_santri');
    }
}

/* End of file Datasantri_model.php */
