<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|max_length[13]|min_length[6]');
        if ($this->form_validation->run() === false) {
            $this->load->view('admin/login');
        } else {
            $this->_login();
        }
        // echo "ini dashboard";
    }

    private function _login()
    {
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');
        $user       = $this->db->get_where('admin', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'nama'      => $user['nama'],
                    'foto'      => $user['foto'],
                    'email'     => $user['email']
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success" role="alert">
                     <strong>Selamat datang, ' . $this->session->userdata('nama') . '!</strong> Awali harimu dengan semangat, walau tau dia lagi sama yang lain :) </div>'
                );
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                <strong>Password Salah!</strong> Pastikan anda telah memasukkan password yang sesuai! </div>');
                redirect('admin/auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                <strong>Akun tidak terdaftar!</strong> Halaman ini khusus admin dan pastikan akun anda telah terdaftar! </div>');
            redirect('admin/auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('foto');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        <strong>Anda berhasil logout!</strong> Harap login untuk kembali melanjutkan! </div>');
        redirect('admin/auth');
    }
}
