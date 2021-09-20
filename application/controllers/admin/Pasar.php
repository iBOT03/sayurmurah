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
        $data['data']  = $this->Pasar_Model->relDaerah();
        $data['profil'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/pasar/pasar', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama Pasar', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('daerah', 'Daerah Pasar', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('foto', 'Foto', 'trim');
        $this->form_validation->set_rules('lokasi', 'Lokasi Pasar', 'required|trim|max_length[200]');

        if ($this->form_validation->run() === false) {
            $data['daerah']  = $this->Pasar_Model->getDaerah();
            $data['profil'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('admin/pasar/tambahpasar', $data);
        } else {
            $temp = explode(".", $_FILES['foto']['name']);
            $foto = round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($_FILES['foto']['foto'], "./uploads/admin/pasar/" . $foto);
            $config['allowed_types'] = 'jpg|jpeg|png|svg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './uploads/admin/pasar/';
            $config['file_name'] = $foto;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $dataPost = array(
                    'id_pasar'      => '',
                    'nama_pasar'    => $this->input->post("nama"),
                    'id_daerah'     => $this->input->post("daerah"),
                    'foto_pasar'    => trim($foto),
                    'alamat_pasar'  => $this->input->post("lokasi")
                );
                if ($this->Pasar_Model->addPasar($dataPost)) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    <strong>Berhasil menambahkan data!</strong> Data berhasil disimpan di database! </div>');
                    redirect('admin/pasar');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    <strong>Gagal menambahkan data!</strong> Data gagal disimpan di database! </div>');
                    redirect('admin/pasar');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">'
                    . $this->upload->display_errors() . '</div>');
                redirect('admin/pasar');
            }
        }
    }

    public function edit($id = null)
    {
        $this->form_validation->set_rules('nama', 'Nama Pasar', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('daerah', 'Daerah Pasar', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('foto', 'Foto', 'trim');
        $this->form_validation->set_rules('lokasi', 'Lokasi Pasar', 'required|trim|max_length[200]');

        if ($this->form_validation->run() === false) {
            $data['daerah'] = $this->Pasar_Model->getDaerah($id);
            $data['detail'] = $this->Pasar_Model->detail($id);
            $data['data'] = $this->Pasar_Model->getDetail($id);
            $data['profil'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('admin/pasar/editpasar', $data);
        } else {
            $update = $this->Pasar_Model->upPasar(array(
                'id_pasar'      => $this->input->post("id"),
                'nama_pasar'    => $this->input->post("nama"),
                'id_daerah'     => $this->input->post("daerah"),
                'alamat_pasar'  => $this->input->post("lokasi")
            ), $id);
            if ($update) {
                $ubahfoto = $_FILES['foto']['name'];

                if ($ubahfoto) {
                    $config['allowed_types'] = 'jpg|jpeg|png|svg';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './uploads/admin/pasar/';
                    $config['file_name'] = $ubahfoto;

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('foto')) {
                        $pasar = $this->db->get_where('pasar', ['id_pasar' => $id])->row_array();
                        $fotolama = $pasar['foto'];
                        if ($fotolama) {
                            unlink(FCPATH . '.uploads/admin/pasar/' . $fotolama);
                        }
                        $fotobaru = $this->upload->data('file_name');
                        $this->db->set('foto_pasar', $fotobaru);
                        $this->db->where('id_pasar', $id);
                        $this->db->update('pasar');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
                            . $this->upload->display_errors() . '</div>');
                        redirect('admin/pasar');
                    }
                }
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    <strong>Berhasil mengubah data!</strong> Data berhasil disimpan di database! </div>');
                redirect('admin/pasar');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    <strong>Gagal mengubah data!</strong> Data gagal disimpan di database! </div>');
                redirect('admin/pasar');
            }
        }
    }

    public function hapus($id)
    {
        $delete = $this->Pasar_Model->delPasar($id);
        if ($delete) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    <strong>Berhasil menghapus data!</strong> Database berhasil diperbaharui! </div>');
            redirect('admin/pasar');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    <strong>Gagal menghapus data!</strong> Database gagal diperbaharui! </div>');
            redirect('admin/pasar');
        }
    }
}
