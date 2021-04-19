<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        is_admin();
        $this->load->helper('tglindo');
        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('kota_lahir', 'Kota Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl Lahir', 'required|trim');
        $this->form_validation->set_rules('alamat_skrg', 'Alamat Sekarang', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required|trim');
        $this->form_validation->set_rules('status', 'Status Perkawinan', 'required|trim');
        $this->form_validation->set_rules('pend_akhir', 'Pendidikan Terakhir', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Daftar Pegawai';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['kode_pegawai'] = $this->admin->getKodePegawai();
            $data['pegawai'] = $this->db->get('mst_pegawai')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/pegawai/list_pegawai', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_pegawai' => $this->input->post('kode_pegawai', true),
                'nama_lengkap' => $this->input->post('nama_lengkap', true),
                'sex' => $this->input->post('sex', true),
                'kota_lahir' => $this->input->post('kota_lahir', true),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'alamat_skrg' => $this->input->post('alamat_skrg', true),
                'email' => $this->input->post('email', true),
                'agama' => $this->input->post('agama', true),
                'no_ktp' => $this->input->post('no_ktp', true),
                'status' => $this->input->post('status', true),
                'pend_akhir' => $this->input->post('pend_akhir', true),
                'image' => 'default.jpg',
                'pegawai_created' => date("Y/m/d"),
                'pegawai_active' => 1
            ];
            $this->db->insert('mst_pegawai', $data);
            $this->session->set_flashdata('message', 'Simpan data');
            redirect('admin/list_pegawai');
        }
    }

    public function list_pegawai()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('kota_lahir', 'Kota Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl Lahir', 'required|trim');
        $this->form_validation->set_rules('alamat_skrg', 'Alamat Sekarang', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required|trim');
        $this->form_validation->set_rules('status', 'Status Perkawinan', 'required|trim');
        $this->form_validation->set_rules('pend_akhir', 'Pendidikan Terakhir', 'required|trim');

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Daftar Pegawai';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['kode_pegawai'] = $this->admin->getKodePegawai();
            $data['pegawai'] = $this->db->get('mst_pegawai')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/pegawai/list_pegawai', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_pegawai' => $this->input->post('kode_pegawai', true),
                'nama_lengkap' => $this->input->post('nama_lengkap', true),
                'sex' => $this->input->post('sex', true),
                'kota_lahir' => $this->input->post('kota_lahir', true),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'alamat_skrg' => $this->input->post('alamat_skrg', true),
                'email' => $this->input->post('email', true),
                'agama' => $this->input->post('agama', true),
                'no_ktp' => $this->input->post('no_ktp', true),
                'status' => $this->input->post('status', true),
                'pend_akhir' => $this->input->post('pend_akhir', true),
                'image' => 'default.jpg',
                'pegawai_created' => date("Y/m/d"),
                'pegawai_active' => 1
            ];
            $this->db->insert('mst_pegawai', $data);
            $this->session->set_flashdata('message', 'Simpan data');
            redirect('admin/list_pegawai');
        }
    }

    public function detail_pegawai($kode_pegawai)
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('kota_lahir', 'Kota Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl Lahir', 'required|trim');
        $this->form_validation->set_rules('alamat_skrg', 'Alamat Sekarang', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('agama', 'Agama', 'required|trim');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required|trim');
        $this->form_validation->set_rules('status', 'Status Perkawinan', 'required|trim');
        $this->form_validation->set_rules('pend_akhir', 'Pendidikan Terakhir', 'required|trim');
        $this->form_validation->set_rules('pegawai_active', 'Pegawai Aktif ??', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Detail Pegawai';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['pegawai'] = $this->db->get_where('mst_pegawai', ['kode_pegawai' => $kode_pegawai])->row_array();
            $data['keluarga'] = $this->db->get_where('dt_keluarga', ['nip' => $kode_pegawai])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/pegawai/detail_pegawai', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/dist/img/profile';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = ['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/dist/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $kode_pegawai = $this->input->post('kode_pegawai');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $sex = $this->input->post('sex');
            $kota_lahir = $this->input->post('kota_lahir');
            $tgl_lahir = $this->input->post('tgl_lahir');
            $alamat_skrg = $this->input->post('alamat_skrg');
            $email = $this->input->post('email');
            $agama = $this->input->post('agama');
            $no_ktp = $this->input->post('no_ktp');
            $status = $this->input->post('status');
            $pend_akhir = $this->input->post('pend_akhir');
            $pegawai_active = $this->input->post('pegawai_active');

            $this->db->set('nama_lengkap', $nama_lengkap);
            $this->db->set('sex', $sex);
            $this->db->set('kota_lahir', $kota_lahir);
            $this->db->set('tgl_lahir', $tgl_lahir);
            $this->db->set('alamat_skrg', $alamat_skrg);
            $this->db->set('email', $email);
            $this->db->set('agama', $agama);
            $this->db->set('no_ktp', $no_ktp);
            $this->db->set('status', $status);
            $this->db->set('pend_akhir', $pend_akhir);
            $this->db->set('pegawai_active', $pegawai_active);

            $this->db->where('kode_pegawai', $kode_pegawai);
            $this->db->update('mst_pegawai');
            $this->session->set_flashdata('message', 'Update data');
            redirect('admin/detail_pegawai/' . $kode_pegawai);
        }
    }

    public function add_data_lain($kode_pegawai)
    {
        $this->form_validation->set_rules('nip', 'No Induk Pegawai', 'required|trim|is_unique[dt_keluarga.nip]', array(
            'is_unique' => 'SIMPAN GAGAL !!.. No Induk Pegawai sudah ada'
        ));

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Detail Pegawai';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['pegawai'] = $this->db->get_where('mst_pegawai', ['kode_pegawai' => $kode_pegawai])->row_array();
            $data['keluarga'] = $this->db->get_where('dt_keluarga', ['nip' => $kode_pegawai])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/pegawai/detail_pegawai', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'nip' => $this->input->post('nip', true),
                'nama_pasangan' => $this->input->post('nama_pasangan', true),
                'tgl_lahir_pasangan' => $this->input->post('tgl_lahir_pasangan', true),
                'alamat_pasangan' => $this->input->post('alamat_pasangan', true),
                'jml_anak' => $this->input->post('jml_anak', true),
                'telp_pasangan' => $this->input->post('telp_pasangan', true),
                'pekerjaan' => $this->input->post('pekerjaan', true)
            );
            $this->db->insert('dt_keluarga', $data);
            $this->session->set_flashdata('message', 'Simpan data');
            redirect('admin/detail_pegawai/' . $kode_pegawai);
        }
    }

    public function add_user($kode_pegawai)
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[mst_user.username]', array(
            'is_unique' => 'SIMPAN GAGAL !!.. Username sudah ada'
        ));
        $this->form_validation->set_rules('nip', 'No Induk Pegawai', 'required|trim|is_unique[mst_user.nip]', array(
            'is_unique' => 'SIMPAN GAGAL !!.. No Induk sudah ada'
        ));
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', array(
            'matches' => 'Password tidak sama',
            'min_length' => 'password min 3 karakter'
        ));
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Tambah User';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_user'] = $this->db->get('mst_user')->result_array();
            $data['pegawai'] = $this->db->get_where('mst_pegawai', ['kode_pegawai' => $kode_pegawai])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/pegawai/add_user', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'nama' => $this->input->post('nama', true),
                'nip' => $this->input->post('nip', true),
                'email' => $this->input->post('email', true),
                'level' => $this->input->post('level', true),
                'username' => $this->input->post('username', true),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'date_created' => date('Y/m/d'),
                'is_active' => 1
            );
            $this->db->insert('mst_user', $data);
            $this->session->set_flashdata('message', 'Tambah user');
            redirect('admin/man_user');
        }
    }

    public function man_user()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[mst_user.username]', array(
            'is_unique' => 'Username sudah ada'
        ));
        $this->form_validation->set_rules('nip', 'No Induk Pegawai', 'required|trim|is_unique[mst_user.nip]', array(
            'is_unique' => 'No Induk Pegawai Sudah terdaftar'
        ));
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', array(
            'matches' => 'Password tidak sama',
            'min_length' => 'password min 3 karakter'
        ));
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Daftar Pengguna';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_user'] = $this->db->get('mst_user')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/pegawai/man_user', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'nama' => $this->input->post('nama', true),
                'nip' => $this->input->post('nip', true),
                'email' => $this->input->post('email', true),
                'level' => $this->input->post('level', true),
                'username' => $this->input->post('username', true),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'date_created' => date('Y/m/d'),
                'is_active' => 1
            );
            $this->db->insert('mst_user', $data);
            $this->session->set_flashdata('message', 'Tambah user');
            redirect('admin/man_user');
        }
    }

    public function edit_user()
    {
        echo json_encode($this->admin->getUserEdit($_POST['id']));
    }

    public function proses_edit_user()
    {
        $id = $this->input->post('id');
        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $level = $this->input->post('level');
        $is_active = $this->input->post('is_active');

        $this->db->set('nama', $nama);
        $this->db->set('nip', $nip);
        $this->db->set('email', $email);
        $this->db->set('level', $level);
        $this->db->set('is_active', $is_active);

        $this->db->where('id', $id);
        $this->db->update('mst_user');
        $this->session->set_flashdata('message', 'Update data');
        redirect('admin/man_user');
    }

    public function del_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('mst_user');
        $this->session->set_flashdata('message', 'Hapus user');
        redirect('admin/man_user');
    }

    public function list_jabatan()
    {
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim|is_unique[mst_jabatan.jabatan]', array(
            'is_unique' => 'Simpan Gagal !.. Jabatan sudah ada'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Daftar Jabatan';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['kode_jabatan'] = $this->admin->getKodeJabatan();
            $data['mst_jabatan'] = $this->db->get('mst_jabatan')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/pegawai/list_jabatan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_jabatan' => $this->input->post('kode_jabatan', true),
                'jabatan' => $this->input->post('jabatan', true),
            ];
            $this->db->insert('mst_jabatan', $data);
            $this->session->set_flashdata('message', 'Simpan data');
            redirect('admin/list_jabatan');
        }
    }

    public function edit_jabatan()
    {
        echo json_encode($this->admin->getEditJabatan($_POST['id_jabatan']));
    }

    public function proses_edit_jabatan()
    {
        $id_jabatan = $this->input->post('id_jabatan');
        $jabatan = $this->input->post('jabatan');
        $kode_jabatan = $this->input->post('kode_jabatan');
        $this->db->set('jabatan', $jabatan);
        $this->db->set('kode_jabatan', $kode_jabatan);
        $this->db->where('id_jabatan', $id_jabatan);
        $this->db->update('mst_jabatan');
        $this->session->set_flashdata('message', 'Update data');
        redirect('admin/list_jabatan');
    }

    public function list_divisi()
    {
        $this->form_validation->set_rules('divisi', 'Divisi', 'required|trim|is_unique[mst_divisi.divisi]', array(
            'is_unique' => 'Simpan Gagal !.. Divisi / Departemen sudah ada'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Daftar Divisi';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['kode_divisi'] = $this->admin->getKodeDivisi();
            $data['mst_divisi'] = $this->db->get('mst_divisi')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/pegawai/list_divisi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_divisi' => $this->input->post('kode_divisi', true),
                'divisi' => $this->input->post('divisi', true),
            ];
            $this->db->insert('mst_divisi', $data);
            $this->session->set_flashdata('message', 'Simpan data');
            redirect('admin/list_divisi');
        }
    }

    public function edit_divisi()
    {
        echo json_encode($this->admin->getEditDivisi($_POST['id_divisi']));
    }

    public function proses_edit_divisi()
    {
        $id_divisi = $this->input->post('id_divisi');
        $divisi = $this->input->post('divisi');
        $kode_divisi = $this->input->post('kode_divisi');
        $this->db->set('divisi', $divisi);
        $this->db->set('kode_divisi', $kode_divisi);
        $this->db->where('id_divisi', $id_divisi);
        $this->db->update('mst_divisi');
        $this->session->set_flashdata('message', 'Update data');
        redirect('admin/list_divisi');
    }

    public function add_struktur($kode_pegawai)
    {
        $this->form_validation->set_rules('kode_struktural', 'Kode Struktural', 'required|trim|is_unique[tb_struktural.kode_struktural]', array(
            'is_unique' => 'Simpan Gagal !.. Kode Struktural sudah ada'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Tambah Level Struktural';
            $data['user'] = $this->db->get_where('mst_user', ['username' => $this->session->userdata('username')])->row_array();
            $data['history'] = $this->admin->getHistoryStruktural($kode_pegawai);
            $data['kode_struktural'] = $this->admin->getKodeStruktural();
            $data['pegawai'] = $this->db->get_where('mst_pegawai', ['kode_pegawai' => $kode_pegawai])->row_array();
            $data['divisi'] = $this->db->get('mst_divisi')->result_array();
            $data['jabatan'] = $this->db->get('mst_jabatan')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/pegawai/add_struktur', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_struktural' => $this->input->post('kode_struktural', true),
                'pegawai_kode' => $this->input->post('pegawai_kode', true),
                'divisi_kode' => $this->input->post('divisi_kode', true),
                'jabatan_kode' => $this->input->post('jabatan_kode', true),
                'tgl_input' => date('Y/m/d')
            ];
            $this->db->insert('tb_struktural', $data);
            $this->session->set_flashdata('message', 'Simpan data');
            redirect('admin/add_struktur/' . $kode_pegawai);
        }
    }

    public function del_struktur($id_struktural)
    {
        $this->db->where('id_struktural', $id_struktural);
        $this->db->delete('tb_struktural');
        $this->session->set_flashdata('message', 'Hapus data');
        redirect($_SERVER['HTTP_REFERER']);
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
            $data['kode_kategori'] = $this->admin->getKodeKategori();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/data/mst_kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_kategori' => $this->input->post('kode_kategori', true),
                'nama_kategori' => $this->input->post('nama_kategori', true),
                'ket_kategori' => $this->input->post('ket_kategori', true)
            ];
            $this->db->insert('mst_kategori', $data);
            $this->session->set_flashdata('message', 'Simpan data');
            redirect('admin/mst_kategori');
        }
    }

    public function get_edit_kategori()
    {
        echo json_encode($this->admin->getEditKategori($_POST['id_kategori']));
    }

    public function edit_kategori()
    {
        $id_kategori = $this->input->post('id_kategori');
        $nama_kategori = $this->input->post('nama_kategori');
        $kode_kategori = $this->input->post('kode_kategori');
        $ket_kategori = $this->input->post('ket_kategori');
        $this->db->set('nama_kategori', $nama_kategori);
        $this->db->set('ket_kategori', $ket_kategori);
        $this->db->set('kode_kategori', $kode_kategori);
        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('mst_kategori');
        $this->session->set_flashdata('message', 'Update data');
        redirect('admin/mst_kategori');
    }

    public function del_kategori($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('mst_kategori');
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('admin/mst_kategori');
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
            $data['kode_barang'] = $this->admin->getKodeBarang();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('admin/data/mst_barang', $data);
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
            redirect('admin/mst_barang');
        }
    }

    public function get_barang()
    {
        echo json_encode($this->admin->getEditBarang($_POST['id_barang']));
    }

    public function edit_barang()
    {
        $id_barang = $this->input->post('id_barang');
        $kode_barang = $this->input->post('kode_barang');
        $kategori_kode = $this->input->post('kategori_kode');
        $nama_barang = $this->input->post('nama_barang');
        $jumlah_barang = $this->input->post('jumlah_barang');
        $ket_barang = $this->input->post('ket_barang');
        $this->db->set('kode_barang', $kode_barang);
        $this->db->set('nama_barang', $nama_barang);
        $this->db->set('kategori_kode', $kategori_kode);
        $this->db->set('jumlah_barang', $jumlah_barang);
        $this->db->set('ket_barang', $ket_barang);
        $this->db->where('id_barang', $id_barang);
        $this->db->update('tb_barang');
        $this->session->set_flashdata('message', 'Update data');
        redirect('admin/mst_barang');
    }

    public function del_barang($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('tb_barang');
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('admin/mst_barang');
    }
}
