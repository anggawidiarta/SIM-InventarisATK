<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang_model extends CI_model
{

    function getKodeKategori()
    {
        $this->db->select('RIGHT(kode_kategori,4) as kode', FALSE);
        $this->db->order_by('id_kategori', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('mst_kategori');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = 'CRG-' . date('Ym') . '-' . $kodemax;
        return $kodejadi;
    }

    public function getEditKategori($id_kategori)
    {
        $query = $this->db->get_where('mst_kategori', ['id_kategori' => $id_kategori])->row_array();
        return $query;
    }

    function getKodeBarang()
    {
        $this->db->select('RIGHT(kode_barang,4) as kode', FALSE);
        $this->db->order_by('id_barang', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_barang');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = 'PROD-' . date('Ym') . '-' . $kodemax;
        return $kodejadi;
    }

    public function getEditBarang($id_barang)
    {
        $query = $this->db->get_where('tb_barang', ['id_barang' => $id_barang])->row_array();
        return $query;
    }
}
