<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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

        if (date("H") < 4) {
            $greet = 'Selamat Malam | &nbsp;  <i class="fas fa-moon fa-2x  text-gray-300"></i>';
        } elseif (date("H") < 11) {
            $greet = 'Selamat Pagi | &nbsp; <i class="fas fa-sun fa-2x  text-gray-300"></i>';
        } elseif (date("H") < 16) {
            $greet = 'Selamat Siang';
        } elseif (date("H") < 18) {
            $greet = 'Selamat Sore';
        } else {
            $greet = 'Selamat Malam';
        }

      

        $id = $_SESSION['id_user'];

        $data = [
            'title' => 'E-perpus',
            'halaman' => 'User',
            'apps' => 'Aplikasi E-Perpus',
            'dtsantri' =>  $this->m_santri->gettotaldatasantri(),
            'dtbuku' => $this->m_buku->gettotaldatabuku(),
            'pinjam' => $this->m_pinjam->gettotalpinjam(),
            'jam' => $greet,
            'app' => 'EP'
            // 'current_user' => $this->m_auth->current_user(),
        ];
        $this->load->view('layout/head', $data);
        $this->load->view('layout/nav', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('layout/foot', $data);
        $this->load->view('ajaxcrud', $data);
    }
}

/* End of file Home.php */
