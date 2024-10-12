<?php
defined('BASEPATH') or exit('No direct script access allowed');

class santri extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->m_auth->current_user()) {
            redirect('login');
        }
    }
    public function index()
    {

        $data = [
            'title' => 'E-Perpus',
            'halaman' => 'Santri',
            'apps' => 'E-Perpus',
            'app' => 'EP'
            // 'current_barang' => $this->m_auth->current_barang(),
        ];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/nav', $data);
        $this->load->view('admin/datasantri', $data);
        $this->load->view('layout/foot', $data);
        $this->load->view('ajaxcrud', $data);
    }

    public function datasantri()
    {
        $datasantri = $this->m_santri->getdatasantri();
        $no = 1;
        foreach ($datasantri as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['id_santri'];
            $tbody[] = $value['nama_santri'];
            $tbody[] = $value['NIS'];
            $tbody[] = $value['kelas'];
            $tbody[] = $value['asrama'];
            $tbody[] = $value['status'];
            $aksi = "<button class='btn btn-success ubah-santri mb-4' data-toggle='modal'  data-id=" . $value['id_santri'] . ">Ubah</button>" . ' ' . "<button class='btn btn-danger hapus-santri mb-4' id='id' data-toggle='modal' data-id=" . $value['id_santri'] . ">Hapus</button>";
          
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($datasantri) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahsantri()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}
        $namasantri = htmlspecialchars($this->input->post('namasantri'));
        $NIS = htmlspecialchars($this->input->post('nis'));
        $kelas = htmlspecialchars($this->input->post('kelas'));
        $asrama = htmlspecialchars($this->input->post('asrama'));
        $status= htmlspecialchars($this->input->post('status'));

        $tambahsantri = array(
            'nama_santri' => $namasantri,
            'NIS'  => $NIS,
            'kelas' => $kelas,
            'asrama' => $asrama,
            'status' => $status
        );

        $data = $this->m_santri->insertsantri($tambahsantri);

        echo json_encode($data);
    }

    public function editsantri()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = [
            'datasantri' => $this->m_santri->getidsantri($id),
            'type'  => 'santri'
        ];

        $this->load->view('editfrom', $data);
    }

    public function ubahsantri()
    {

        $id = htmlspecialchars($this->input->post('id_santri'));
        $namasantri = htmlspecialchars($this->input->post('namasantri'));
        $NIS = htmlspecialchars($this->input->post('nis'));
        $kelas = htmlspecialchars($this->input->post('kelas'));
        $asrama = htmlspecialchars($this->input->post('asrama'));
        $status= htmlspecialchars($this->input->post('status'));

        $data = array(
            'nama_santri' => $namasantri,
            'NIS'  => $NIS,
            'kelas' => $kelas,
            'asrama' => $asrama,
            'status' => $status
        );

        $data = $this->m_santri->editsantri($data, $id);

        echo json_encode($data);
    }

    public function hapussantri()
    {

        
        $id = htmlspecialchars($this->input->post('id', true));

        $data = $this->m_santri->hapussantri($id);
        echo json_encode($data);
    }
}

/* End of file Home.php */
