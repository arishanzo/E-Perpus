<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporan extends CI_Controller
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
        $this->load->view('admin/laporan', $data);
        $this->load->view('layout/foot', $data);
        $this->load->view('ajaxcrud', $data);
    }

    public function datapinjam()
    {
        $datapinjam = $this->m_pinjam->getdatapinjam();
        $no = 1;
        foreach ($datapinjam as  $value) {
            $tbody = array();

            
            $tbody[] = $no++;
            $tbody[] = $value['nama_santri'];
            $tbody[] = $value['NIS'];
            $tbody[] = $value['judul_buku'];
            
            $tbody[] = $value['jumlah'];
            $tbody[] = date("d F Y", strtotime($value['tgl_pinjam']));
            $tbody[] =  date("d F Y", strtotime($value['tgl_jatuhtempo']));
         
               //  hitung denda
        $t = date_create($value['tgl_jatuhtempo']);
        $n = date_create(date('Y-m-d'));

       if($n >= $t){

       
        $terlambat = date_diff($t, $n);
        $hari = $terlambat->format("%a");
        $denda = $hari * 1000;

    

       
        $tbody[] =  $hari. ' Hari';
        $tbody[] =  'Rp.' . number_format($denda, 2, ",", ".");
       }else if ($value['status_pinjam'] == 'dikembalikan') {
        $tbody[] =  '0 Hari';
        $tbody[] =  'Rp.' . number_format(0, 2, ",", ".");
       } else{
        $tbody[] =  '0 Hari';
        $tbody[] =  'Rp.' . number_format(0, 2, ",", ".");
       }
           
       
      
       if ($value['status_pinjam'] == 'pinjam') {
        $tbody[] = "<span class='badge badge-primary'>Masih Di Pinjam</span>";
       }else   if ($value['status_pinjam'] == 'dikembalikan' ) {

        $tbody[] = "<span class='badge badge-success'>DiKembalikan</span>";
       } else {
        $tbody[] = "<span class='badge badge-danger'>dikembalikan tapi terlambat</span>";
    }

            
       
            $data[] = $tbody;
        }

        if ($datapinjam) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }

    public function  datakembalian()
    {
        $datakembalian = $this->m_kembalian->getdatakembalian();
        $no = 1;
        foreach ($datakembalian as  $value) {
            $tbody = array();

            
            $tbody[] = $no++;
            $tbody[] = $value['nama_santri'];
            $tbody[] = $value['NIS'];
            $tbody[] = $value['judul_buku'];
            $tbody[] =
            date("d F Y", strtotime( $value['tgl_pengembalian']));
         
            $data[] = $tbody;
        }

        if ($datakembalian) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
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
            
         
        $tbody[] =  'Rp.' . number_format($value['denda'], 2, ",", ".");
        $tbody[] = $value['status_pembayaran'];

          
            $data[] = $tbody;
        }

        if ($datadenda) {
            echo json_encode(array('data' => $data));
        } else {
            echo json_encode(array('data' => 0));
        }
    }


    
}

/* End of file Home.php */
