<?php
defined('BASEPATH') or exit('No direct script access allowed');

class denda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->m_auth->current_user()) {
            redirect('login');
        }
    }
    
    public function datadenda()
    {
        $datadenda = $this->m_denda->getdatadenda();
        $no = 1;
        foreach ($datadenda as  $value) {
            $tbody = array();
            $tbody[] = $no++;
            $tbody[] = $value['nama_santri'];
            $tbody[] = $value['NIS'];
            $tbody[] = $value['judul_buku'];
            $tbody[] = $value['tgl_denda'];
            $tbody[] = $value['denda'];
         
        $tbody[] =  'Rp.' . number_format($value['status_pembayaran'], 2, ",", ".");

            $aksi = "<button class='btn btn-success lunasi-denda mb-4' data-toggle='modal'  data-id=" . $value['id_denda'] . ">Lunasi</button>";
          
            $tbody[] = $aksi;
            $data[] = $tbody;
        }

        if ($datadenda) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function tambahdenda()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}
        $id_santri= htmlspecialchars($this->input->post('id_santri'));
        $id_buku = htmlspecialchars($this->input->post('id_buku'));
        $tgldenda =   htmlspecialchars($this->input->post('tgldenda'));
        $denda = htmlspecialchars($this->input->post('denda'));
        $status= htmlspecialchars($this->input->post('status'));

        $tambahdenda = array(
            'id_santri' => $id_santri,
            'id_buku'  => $id_buku,
            'tgl_denda' => $tgldenda,
            'denda' => $denda,
            'status_pembayaran' => $status
        );

        $data = $this->m_denda->insertdenda($tambahdenda);

        echo json_encode($data);
    }

    public function editdenda()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = [
            'datapinjam' => $this->m_pinjam->getidpinjam($id),
            'type'  => 'denda'
        ];

        $this->load->view('editfrom', $data);
    }


    public function lunasform()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = [
            'datadenda' => $this->m_denda->getiddenda($id),
            'type'  => 'lunasi'
        ];

        $this->load->view('editfrom', $data);
    }

    

}

/* End of file Home.php */
