<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // GET DATA ADMIN
    public function getAdmin()
    {
        return $this->db->get("admin")->result();
    }

    // INSERT DATA ADMIN
    public function addAdmin($data = array())
    {
        return $this->db->insert("admin", $data);
    }

    //CHANGE STATUS ADMIN
    public function setAktif($id)
    {
        $this->db->where('id_admin', $id);
        $this->db->update('admin', ['status' => '1']);
    }
    public function setMati($id)
    {
        $this->db->where('id_admin', $id);
        $this->db->update('admin', ['status' => '2']);
    }

    // GET DATA BAGIAN admin
    public function getBagian()
    {
        return $this->db->get("bagian_karyawan")->result();
    }

    public function index()
    {
        $query = $this->db->query("SELECT * FROM bagian_karyawan, karyawan WHERE bagian_karyawan.id_bagian = karyawan.id_bagian")->result();
        return $query;
    }

    //UPDATE DATA KARYAWAN
    public function upKaryawan($data = array(), $id)
    {
        $this->db->where('id_karyawan', $id);
        return $this->db->update("karyawan", $data);
    }

    public function detail($id)
    {
        $this->db->where('id_admin', $id);
        return $this->db->get("admin")->result();
    }

    public function getDetail($id)
    {
        $query = $this->db->query("SELECT * FROM karyawan, bagian_karyawan WHERE karyawan.id_bagian = bagian_karyawan.id_bagian AND karyawan.id_karyawan = '$id'")->result();
        return $query;
    }

    public  function getBagKar()
    {
        $query = $this->db->get('bagian_karyawan');
        return $query->result_array();
    }
}
