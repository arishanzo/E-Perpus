<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pinjam extends CI_Controller
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
            'halaman' => 'Pinjam Buku',
            'apps' => 'E-Perpus',
            'datasantri' => $this->m_santri->getdatasantri(),
            'databuku' => $this->m_buku->getdatabuku(),
            'app' => 'EP'
        
        ];

        $this->load->view('layout/head', $data);
        $this->load->view('layout/nav', $data);
        $this->load->view('admin/datapinjam', $data);
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


            $aksi = ($n > $t ? "<button class='btn btn-danger denda-buku mb-4' data-toggle='modal'  data-id=" . $value['id_pinjambuku'] . ">Tambah Denda</button>" : "") .' '. "<button class='btn btn-success pengembalian-buku mb-4' data-toggle='modal'  data-id=" . $value['id_pinjambuku'] . ">Pengembalian</button>";
          
            $tbody[] = $aksi;
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
   


    public function tambahpinjam()
    {
        // didapat dari ajax yang dimana data{nama:nama,alamat:alamat}
        $id_santri = htmlspecialchars($this->input->post('id_santri'));
        $id_buku = htmlspecialchars($this->input->post('id_buku'));
        $tglpinjam = htmlspecialchars($this->input->post('tglpinjam'));


        $query = $this->db->get_where('dt_buku', ['id_buku' => htmlspecialchars($this->input->post('id_buku', true))])->row_array();

        $jmlh = htmlspecialchars($this->input->post('stokbuku'));

        $jmlhstok =  $query['jumlah_salinan'] - $jmlh;
      

        $kurangstok = array(
            'jumlah_salinan'  => $jmlhstok,
        );




        $jatuhtempo = date('Y-m-d', strtotime($tglpinjam. ' + 7 days'));
        $tambahpinjam = array(
            'id_buku'  => $id_buku,
            'id_santri' => $id_santri,
            'jumlah'   =>  $jmlh,
            'tgl_pinjam' => $tglpinjam,
            'tgl_jatuhtempo' => $jatuhtempo,
            'status_pinjam' => 'pinjam'
        );

        $data =  $this->m_pinjam->insertpinjam($tambahpinjam);
           $data = $this->m_buku->editbuku($kurangstok, $id_buku);

        echo json_encode($data);
    }

    public function editkembalikan()
    {
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = [
            'datapinjam' => $this->m_pinjam->getidpinjam($id),
            'type'  => 'Pengembalian'
        ];

        $this->load->view('editfrom', $data);
    }

  

    public function pengembalian()
    {
        
        $querybuku = $this->db->get_where('dt_buku', ['id_buku' => htmlspecialchars($this->input->post('id_buku', true))])->row_array();

        $stokedit = htmlspecialchars($this->input->post('stokbuku'));

        $jmlhstok =  $querybuku['jumlah_salinan'] + $stokedit;
      

        $data= array(
            'jumlah_salinan'  => $jmlhstok
        );

        $idbuku = htmlspecialchars($this->input->post('id_buku'));
        $data = $this->m_buku->editbuku($data, $idbuku);


        $querypinjam = $this->db->get_where('pinjam_buku', ['id_pinjambuku' => htmlspecialchars($this->input->post('id_pinjambuku', true))])->row_array();

        $t = date_create($querypinjam['tgl_jatuhtempo']);
        $n = date_create(date('Y-m-d'));

        if($n >= $t){

        $data= array(
            'status_pinjam'  => 'dikembalikan tapi terlambat'
        );

    }else{
        
        $data= array(
            'status_pinjam'  => 'dikembalikan'
        );
    }
        $idpinjam = htmlspecialchars($this->input->post('id_pinjambuku'));
        $data = $this->m_pinjam->editpinjam($data, $idpinjam);



        $tglkembalian = date('Y-m-d');
        // savepengembalian
        $datakembalian= array(
            'id_santri' => htmlspecialchars($this->input->post('id_santri')),
           'id_buku' => htmlspecialchars($this->input->post('id_buku')),
            'tgl_pengembalian'  => $tglkembalian
        );

        $data =  $this->m_kembalian->insertkembalian($datakembalian);
      

        echo json_encode($data);
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
    public function ubahdenda()
    {

       
        $id= htmlspecialchars($this->input->post('id_denda'));
       
        // $id_santri= htmlspecialchars($this->input->post('id_santri'));
        // $id_buku = htmlspecialchars($this->input->post('id_buku'));
        // $tgldenda =   htmlspecialchars($this->input->post('tgldenda'));
        // $denda = htmlspecialchars($this->input->post('denda'));
        $status= htmlspecialchars($this->input->post('status'));

        $tambahdenda = array(
            'status_pembayaran' => $status
        );


        $data = $this->m_denda->editdenda($tambahdenda, $id);

        echo json_encode($data);
    }
}

/* End of file Home.php */
