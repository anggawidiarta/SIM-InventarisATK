<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staf_model extends CI_model
{
    public function getEditBarang($id_barang)
    {
        $query = $this->db->get_where('tb_barang', ['id_barang' => $id_barang])->row_array();
        return $query;
    }

    public function getBarangKeluar()
    {
        $query = "SELECT nama_barang,nama_kategori,divisi,penerima,tgl_keluar,tb_stock_out.ket_barang,jml_minta
                  FROM tb_stock_out
                  LEFT JOIN tb_barang
                  ON tb_stock_out.barang_kd = tb_barang.kode_barang
                  LEFT JOIN mst_kategori
                  ON mst_kategori.kode_kategori = tb_barang.kategori_kode
                  LEFT JOIN mst_divisi
                  ON mst_divisi.kode_divisi = tb_stock_out.divisi_kd
                  ORDER BY tb_stock_out.id_stock_out DESC
                 ";
        return $this->db->query($query)->result_array();
    }

    public function getBarangMasuk()
    {
        $query = "SELECT nama_barang,nama_kategori,divisi,pengirim,tgl_masuk,tb_stock_in.ket_barang,jml_masuk
                  FROM tb_stock_in
                  LEFT JOIN tb_barang
                  ON tb_stock_in.barang_kd = tb_barang.kode_barang
                  LEFT JOIN mst_kategori
                  ON mst_kategori.kode_kategori = tb_barang.kategori_kode
                  LEFT JOIN mst_divisi
                  ON mst_divisi.kode_divisi = tb_stock_in.divisi_kd
                  ORDER BY tb_stock_in.id_stock_in DESC
                 ";
        return $this->db->query($query)->result_array();
    }
}
