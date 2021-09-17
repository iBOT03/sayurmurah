<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasar_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // GET DATA PASAR
    public function getPasar()
    {
        return $this->db->get("pasar")->result();
    }

    // GET DATA DAERAH
    public function getDaerah()
    {
        return $this->db->get("daerah")->result();
    }
}