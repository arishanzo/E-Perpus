<?php
defined('BASEPATH') or exit('No direct script access allowed');

class buku extends CI_Controller
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
            'halaman' => 'Buku',
            'apps' => 'E-Perpus',
            'app' => 'EP'
            // 'current_barang' => $this->m_auth->current_barang(),
        ];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/nav', $data);
        $this->load->view('admin/databuku', $data);
        $this->load->view('layout/foot', $data);
        $this->load->view('ajaxcrud', $data);
    }

    public function databuku()
    {
        $databuku = $this->m_buku->getdatabuku();
        $no = 1;
        foreach ($databuku as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['judul_buku'];
            $tbody[] = $value['pengarang'];
            $tbody[] = $value['kategori'];
            $tbody[] = $value['ISBN'];
            $tbody[] = $value['Tahun_terbit'];
            
            $tbody[] = $value['jumlah_salinan'];
            $aksi = "<button class='btn btn-success ubah-buku mb-4' data-toggle='modal'  data-id=" . $value['id_buku'] . ">Ubah</button>" . ' ' . "<button class='btn btn-danger hapus-buku mb-4' id='id' data-toggle='modal' data-id=" . $value['id_buku'] . ">Hapus</button>";
          
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($databuku) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahbuku()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}
        $judulbuku = htmlspecialchars($this->input->post('judulbuku'));
        $pengarang = htmlspecialchars($this->input->post('pengarang'));
        $kategori = htmlspecialchars($this->input->post('kategori'));
        $isbn = htmlspecialchars($this->input->post('isbn'));
        $tahunterbit = htmlspecialchars($this->input->post('tahunterbit'));
        
        $jumlahsalinan = htmlspecialchars($this->input->post('jumlahsalinan'));

        $tambahbuku = array(
            'judul_buku' => $judulbuku,
            'pengarang'  => $pengarang,
            'kategori' => $kategori,
            'ISBN' => $isbn,
            'Tahun_terbit' => $tahunterbit,
            'jumlah_salinan' => $jumlahsalinan
        );

        $data = $this->m_buku->insertbuku($tambahbuku);

        echo json_encode($data);
    }

    public function editbuku()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = [
            'databuku' => $this->m_buku->getidbuku($id),
            'type'  => 'buku'
        ];

        $this->load->view('editfrom', $data);
    }

  

    public function ubahbuku()
    {
        $judulbuku = htmlspecialchars($this->input->post('judulbuku'));
        $pengarang = htmlspecialchars($this->input->post('pengarang'));
        $kategori = htmlspecialchars($this->input->post('kategori'));
        $isbn = htmlspecialchars($this->input->post('isbn'));
        $tahunterbit = htmlspecialchars($this->input->post('tahunterbit'));
        
        $jumlahsalinan = htmlspecialchars($this->input->post('jumlahsalinan'));

        $data = array(
            'judul_buku' => $judulbuku,
            'pengarang'  => $pengarang,
            'kategori' => $kategori,
            'ISBN' => $isbn,
            'Tahun_terbit' => $tahunterbit,
            'jumlah_salinan' => $jumlahsalinan
        );

        $id = htmlspecialchars($this->input->post('id'));
        $data = $this->m_buku->editbuku($data, $id);

        echo json_encode($data);
    }

   

    public function hapusbuku()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = $this->m_buku->hapusbuku($id);
        echo json_encode($data);
    }
}

/* End of file Home.php */
