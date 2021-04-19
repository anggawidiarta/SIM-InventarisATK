<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager_model extends CI_model
{

    public function countJmlUser()
    {

        $query = $this->db->query(
            "SELECT COUNT(id) as jml_user
                               FROM mst_user"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_user;
        } else {
            return 0;
        }
    }

    public function countJmlPegawai()
    {

        $query = $this->db->query(
            "SELECT COUNT(id_pegawai) as jml_pegawai
                               FROM mst_pegawai"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_pegawai;
        } else {
            return 0;
        }
    }

    public function sumAsset()
    {

        $query = $this->db->query(
            "SELECT SUM(jumlah_barang) as jml_barang
                                    FROM tb_barang"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_barang;
        } else {
            return 0;
        }
    }

    public function sumAssetOut()
    {

        $query = $this->db->query(
            "SELECT SUM(jml_minta) as jml_minta
                                    FROM tb_stock_out"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_minta;
        } else {
            return 0;
        }
    }

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

    public function getBarangKeluar()
    {
        $query = "SELECT nama_barang,nama_kategori,divisi,penerima,tgl_keluar,tb_stock_out.ket_barang,jml_minta,nama
                  FROM tb_stock_out
                  LEFT JOIN tb_barang
                  ON tb_stock_out.barang_kd = tb_barang.kode_barang
                  LEFT JOIN mst_kategori
                  ON mst_kategori.kode_kategori = tb_barang.kategori_kode
                  LEFT JOIN mst_divisi
                  ON mst_divisi.kode_divisi = tb_stock_out.divisi_kd
                  LEFT JOIN mst_user
                  ON mst_user.id = tb_stock_out.sess_id
                  ORDER BY tb_stock_out.id_stock_out DESC
                 ";
        return $this->db->query($query)->result_array();
    }

    public function getBarangMasuk()
    {
        $query = "SELECT nama_barang,nama_kategori,divisi,pengirim,tgl_masuk,tb_stock_in.ket_barang,jml_masuk,nama
                  FROM tb_stock_in
                  LEFT JOIN tb_barang
                  ON tb_stock_in.barang_kd = tb_barang.kode_barang
                  LEFT JOIN mst_kategori
                  ON mst_kategori.kode_kategori = tb_barang.kategori_kode
                  LEFT JOIN mst_divisi
                  ON mst_divisi.kode_divisi = tb_stock_in.divisi_kd
                  LEFT JOIN mst_user
                  ON mst_user.id = tb_stock_in.sess_id
                  ORDER BY tb_stock_in.id_stock_in DESC
                 ";
        return $this->db->query($query)->result_array();
    }
}
