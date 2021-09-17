<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{
    public function __construct()
    {  
        parent::__construct();
        $this->load->model("admin/Akun_Model");
    }

    public function index()
    {
        $data['admin']  = $this->Akun_Model->getAdmin();
        $data['profil'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/kelolaakun/akun', $data);
        // $this->load->view('admin/partials/navbar', $data);
        // echo "ini dashboard";
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim|max_length[100]');
        $this->form_validation->set_rules('nohp', 'No Telepon', 'required|trim|numeric|min_length[11]|max_length[13]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]');
        $this->form_validation->set_rules('foto', 'Foto', 'trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|max_length[200]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password1]|max_length[100]|min_length[6]');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password1]');

        if ($this->form_validation->run() === false) {
            $data['profil'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('admin/kelolaakun/tambahakun', $data);
        } else {
            $temp = explode(".", $_FILES['foto']['name']);
            $foto = round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($_FILES['foto']['foto'], "./uploads/admin/foto/" . $foto);
            $config['allowed_types'] = 'jpg|jpeg|png|svg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './uploads/admin/foto/';
            $config['file_name'] = $foto;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $dataPost = array(
                    'id_admin'      => '',
                    'nama'          => $this->input->post("nama"),
                    'no_hp'         => $this->input->post("nohp"),
                    'email'         => $this->input->post("email"),
                    'foto'          => trim($foto),
                    'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'alamat'        => $this->input->post("alamat"),
                    'id_akses'      => '1',
                    'status'        => '1',
                    'time_in_usr'   => date('Y-M-D h-m-s')
                );
                if ($this->Akun_Model->addAdmin($dataPost)) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    <strong>Berhasil menambahkan data!</strong> Data berhasil disimpan di database! </div>');
                    redirect('admin/akun');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    <strong>Gagal menambahkan data!</strong> Data gagal disimpan di database! </div>');
                    redirect('admin/akun');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">'
                    . $this->upload->display_errors() . '</div>');
                    redirect('admin/akun');
            }
        }
    }

    public function detail($id)
    {
        $data['profil'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['admin']  = $this->Akun_Model->detail($id);
        // $data['admin']  = $this->Akun_Model->getAdmin($id);

        if (isset($_POST['aktif']))
        {
            $this->Akun_Model->setAktif($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    <strong>Berhasil memperbaharui data!</strong> Akun telah diaktifkan! </div>');
                    redirect('admin/akun');
        } elseif (isset($_POST['mati'])) {
            $this->Akun_Model->setMati($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    <strong>Berhasil memperbaharui data!</strong> Akun telah dinon-aktifkan! </div>');
                    redirect('admin/akun');
        }
        $this->load->view('admin/kelolaakun/detailakun', $data);
    }
}
