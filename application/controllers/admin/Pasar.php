<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasar extends CI_Controller
{
    public function __construct()
    {  
        parent::__construct();
        $this->load->model("admin/Pasar_Model");
    }

    public function index()
    {
        $data['pasar']  = $this->Pasar_Model->getPasar();
        $data['daerah']  = $this->Pasar_Model->getDaerah();
        $data['profil'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/pasar/pasar', $data);
        // $this->load->view('admin/partials/navbar', $data);
        // echo "ini dashboard";
    }
}