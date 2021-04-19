<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_model
{
    function getKodePegawai()
    {
        $this->db->select('RIGHT(kode_pegawai,4) as kode', FALSE);
        $this->db->order_by('id_pegawai', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('mst_pegawai');
        if ($query->num_rows() <> 0) {

            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = "PEG-" . date('ym') . "-" . $kodemax;
        return $kodejadi;
    }

    public function getUserEdit($id)
    {
        $query = $this->db->get_where('mst_user', ['id' => $id])->row_array();
        return $query;
    }

    function getKodeJabatan()
    {
        $this->db->select('RIGHT(kode_jabatan,4) as kode', FALSE);
        $this->db->order_by('id_jabatan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('mst_jabatan');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = "JAB-" . date('ym') . "-" . $kodemax;
        return $kodejadi;
    }

    public function getEditJabatan($id_jabatan)
    {
        $query = $this->db->get_where('mst_jabatan', ['id_jabatan' => $id_jabatan])->row_array();
        return $query;
    }

    function getKodeDivisi()
    {
        $this->db->select('RIGHT(kode_divisi,4) as kode', FALSE);
        $this->db->order_by('id_divisi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('mst_divisi');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = "DEP-" . date('ym') . "-" . $kodemax;
        return $kodejadi;
    }

    public function getEditDivisi($id_divisi)
    {
        $query = $this->db->get_where('mst_divisi', ['id_divisi' => $id_divisi])->row_array();
        return $query;
    }

    function getKodeStruktural()
    {
        $this->db->select('RIGHT(kode_struktural,4) as kode', FALSE);
        $this->db->order_by('id_struktural', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tb_struktural');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }
        $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodejadi = date('YmdHis') . $kodemax;
        return $kodejadi;
    }

    public function getHistoryStruktural($kode_pegawai)
    {
        $query = "SELECT id_struktural,divisi,jabatan,tgl_input
                  FROM tb_struktural 
                  LEFT JOIN mst_divisi
                  ON tb_struktural.divisi_kode = mst_divisi.kode_divisi
                  LEFT JOIN mst_jabatan
                  ON mst_jabatan.kode_jabatan = tb_struktural.jabatan_kode
                  WHERE tb_struktural.pegawai_kode = '$kode_pegawai'";
        return $this->db->query($query)->result_array();
    }

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
