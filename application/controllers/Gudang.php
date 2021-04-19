<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        is_gudang();
        $this->load->helper('tglindo');
        $this->load->model('Gudang_model', 'gudang');
    }

    public function index()
    {
        $data['title'] = 'Stock Barang';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['mst_barang'] = $this->db->get('tb_barang')->result_array();
        $data['mst_kategori'] = $this->db->get('mst_kategori')->result_array();
        $data['kode_barang'] = $this->gudang->getKodeBarang();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_gudang', $data);
        $this->load->view('gudang/index', $data);
        $this->load->view('templates/footer');
    }

    public function update_stok_barang()
    {
        $id_barang = $this->input->post('id_barang');
        $jumlah_barang = $this->input->post('jumlah_barang');
        $this->db->set('jumlah_barang', $jumlah_barang);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_barang');
        $this->session->set_flashdata('message', 'Tambah Stok');
        redirect('gudang/index');
    }

    public function mst_barang()
    {

        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim|is_unique[tb_barang.nama_barang]', array(
            'is_unique' => 'Simpan Gagal !.. Nama barang sudah ada'
        ));
        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required|trim|is_unique[tb_barang.kode_barang]', array(
            'is_unique' => 'Simpan Gagal !.. Kode barang sudah ada'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Daftar Barang';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['mst_barang'] = $this->db->get('tb_barang')->result_array();
            $data['mst_kategori'] = $this->db->get('mst_kategori')->result_array();
            $data['kode_barang'] = $this->gudang->getKodeBarang();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_gudang', $data);
            $this->load->view('gudang/mst_barang', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kategori_kode' => $this->input->post('kategori_kode', true),
                'kode_barang' => $this->input->post('kode_barang', true),
                'nama_barang' => $this->input->post('nama_barang', true),
                'jumlah_barang' => $this->input->post('jumlah_barang', true),
                'ket_barang' => $this->input->post('ket_barang', true)
            ];
            $this->db->insert('tb_barang', $data);
            $this->session->set_flashdata('message', 'Simpan data');
            redirect('gudang/mst_barang');
        }
    }

    public function get_barang()
    {
        echo json_encode($this->gudang->getEditBarang($_POST['id_barang']));
    }

    public function edit_barang()
    {
        $id_barang = $this->input->post('id_barang');
        $kategori_kode = $this->input->post('kategori_kode');
        $nama_barang = $this->input->post('nama_barang');
        $jumlah_barang = $this->input->post('jumlah_barang');
        $ket_barang = $this->input->post('ket_barang');
        $this->db->set('nama_barang', $nama_barang);
        $this->db->set('kategori_kode', $kategori_kode);
        $this->db->set('jumlah_barang', $jumlah_barang);
        $this->db->set('ket_barang', $ket_barang);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_barang');
        $this->session->set_flashdata('message', 'Update data');
        redirect('gudang/mst_barang');
    }

    public function del_barang($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('tb_barang');
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('gudang/mst_barang');
    }

    public function mst_kategori()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim|is_unique[mst_kategori.nama_kategori]', array(
            'is_unique' => 'Simpan Gagal !.. Nama Kategori sudah ada'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Daftar Kategori';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['mst_kategori'] = $this->db->get('mst_kategori')->result_array();
            $data['kode_kategori'] = $this->gudang->getKodeKategori();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_gudang', $data);
            $this->load->view('gudang/mst_kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_kategori' => $this->input->post('kode_kategori', true),
                'nama_kategori' => $this->input->post('nama_kategori', true),
                'ket_kategori' => $this->input->post('ket_kategori', true)
            ];
            $this->db->insert('mst_kategori', $data);
            $this->session->set_flashdata('message', 'Simpan data');
            redirect('gudang/mst_kategori');
        }
    }

    public function get_edit_kategori()
    {
        echo json_encode($this->gudang->getEditKategori($_POST['id_kategori']));
    }

    public function edit_kategori()
    {
        $id_kategori = $this->input->post('id_kategori');
        $nama_kategori = $this->input->post('nama_kategori');
        $ket_kategori = $this->input->post('ket_kategori');
        $this->db->set('nama_kategori', $nama_kategori);
        $this->db->set('ket_kategori', $ket_kategori);
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('mst_kategori');
        $this->session->set_flashdata('message', 'Update data');
        redirect('gudang/mst_kategori');
    }

    public function del_kategori($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('mst_kategori');
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('gudang/mst_kategori');
    }
}
