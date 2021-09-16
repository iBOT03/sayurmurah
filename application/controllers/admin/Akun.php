<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

    public function index()
    {
        $this->load->view('admin/kelolaakun/akun');
        // echo "ini dashboard";
    }

    public function tambah()
    {
        $this->load->view('admin/kelolaakun/tambahakun');
    }

    public function detail() 
    {
        $this->load->view('admin/kelolaakun/detailakun');
    }
}
