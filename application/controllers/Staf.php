<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staf extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        is_staf();
        $this->load->helper('tglindo');
        $this->load->model('Staf_model', 'staf');
    }

    public function index()
    {
        $this->form_validation->set_rules('id_barang', 'Kode Barang', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Stock Keluar';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['mst_barang'] = $this->db->get('tb_barang')->result_array();
            $data['mst_divisi'] = $this->db->get('mst_divisi')->result_array();
            $data['mst_kategori'] = $this->db->get('mst_kategori')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_staf', $data);
            $this->load->view('staf/index', $data);
            $this->load->view('templates/footer');
        } else {
            $sess_id = $this->session->userdata('id');
            $data = [
                'barang_kd' => $this->input->post('barang_kd', true),
                'divisi_kd' => $this->input->post('divisi_kd', true),
                'tgl_keluar' => $this->input->post('tgl_keluar', true),
                'penerima' => $this->input->post('penerima', true),
                'ket_barang' => $this->input->post('ket_barang', true),
                'jml_minta' => $this->input->post('jml_minta', true),
                'sess_id' => $sess_id
            ];
            $this->db->insert('tb_stock_out', $data);

            $id_barang = $this->input->post('id_barang');
            $jumlah_barang = $this->input->post('jumlah_barang');
            $this->db->set('jumlah_barang', $jumlah_barang);
            $this->db->where('id_barang', $id_barang);
            $this->db->update('tb_barang');

            $this->session->set_flashdata('message', 'Simpan data');
            redirect('staf/index');
        }
    }

    public function get_barang()
    {
        echo json_encode($this->staf->getEditBarang($_POST['id_barang']));
    }

    public function stok_masuk()
    {
        $this->form_validation->set_rules('id_barang', 'Kode Barang', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Stock Masuk';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['mst_barang'] = $this->db->get('tb_barang')->result_array();
            $data['mst_divisi'] = $this->db->get('mst_divisi')->result_array();
            $data['mst_kategori'] = $this->db->get('mst_kategori')->result_array();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_staf', $data);
            $this->load->view('staf/stok_masuk', $data);
            $this->load->view('templates/footer');
        } else {
            $sess_id = $this->session->userdata('id');
            $data = [
                'barang_kd' => $this->input->post('barang_kd', true),
                'divisi_kd' => $this->input->post('divisi_kd', true),
                'tgl_masuk' => $this->input->post('tgl_masuk', true),
                'pengirim' => $this->input->post('pengirim', true),
                'ket_barang' => $this->input->post('ket_barang', true),
                'jml_masuk' => $this->input->post('jml_masuk', true),
                'sess_id' => $sess_id
            ];
            $this->db->insert('tb_stock_in', $data);

            $id_barang = $this->input->post('id_barang');
            $jumlah_barang = $this->input->post('jumlah_barang');
            $this->db->set('jumlah_barang', $jumlah_barang);
            $this->db->where('id_barang', $id_barang);
            $this->db->update('tb_barang');

            $this->session->set_flashdata('message', 'Simpan data');
            redirect('staf/stok_masuk');
        }
    }

    public function trans_keluar()
    {
        $data['title'] = 'Transaksi Barang Keluar';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['barang_keluar'] = $this->staf->getBarangKeluar();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_staf', $data);
        $this->load->view('staf/trans_keluar', $data);
        $this->load->view('templates/footer');
    }

    public function trans_masuk()
    {
        $data['title'] = 'Transaksi Barang Masuk';
        $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['barang_masuk'] = $this->staf->getBarangMasuk();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_staf', $data);
        $this->load->view('staf/trans_masuk', $data);
        $this->load->view('templates/footer');
    }
}
