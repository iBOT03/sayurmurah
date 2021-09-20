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

    // INSERT DATA PASAR
    public function addPasar($data = array())
    {
        return $this->db->insert("pasar", $data);
    }

    //UPDATE DATA PASAR
    public function upPasar($data = array(), $id)
    {
        $this->db->where('id_pasar', $id);
        return $this->db->update("pasar", $data);
    }

    // GET DETAIL DATA PASAR
    public function detail($id)
    {
        $this->db->where('id_pasar', $id);
        return $this->db->get("pasar")->result();
    }

    // GET RELASI DETAIL DATA PASAR
    public function getDetail($id)
    {
        $query = $this->db->query("SELECT * FROM pasar, daerah WHERE pasar.id_daerah = daerah.id_daerah AND pasar.id_pasar = '$id'")->result();
        return $query;
    }

    //DELETE DATA PASAR
    public function delPasar($id)
    {
        $this->db->where('id_pasar', $id);
        return $this->db->delete("pasar");
    }

    public function relDaerah()
    {
        $this->db->select('*');
        $this->db->from('pasar, daerah');
        $this->db->where('pasar.id_daerah = daerah.id_daerah');
        $query = $this->db->get()->result();
        return $query;
    }
}
