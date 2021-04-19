<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="<?php echo base_url('manager/list_pegawai'); ?>" class="btn btn-default btn-sm">List Pegawai</a>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger">
                    <a class="close" data-dismiss="alert">x</a>
                    <strong><?php echo strip_tags(validation_errors()); ?></strong>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-7">
                    <div class="card card-primary card-outline">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Pegawai</h3>
                            </div>
                            <div class="card-body">
                                <?php echo form_open_multipart('manager/detail_pegawai/' . $pegawai['kode_pegawai']); ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nip">No Induk Pegawai</label>

                                            <input type="text" class="form-control form-control-sm" id="nip" name="kode_pegawai" value="<?php echo $pegawai['kode_pegawai']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap</label>
                                            <input type="text" class="form-control form-control-sm" id="nama" name="nama_lengkap" value="<?php echo $pegawai['nama_lengkap']; ?>">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sex">Jenis Kelamin</label>
                                                    <select class="form-control form-control-sm" id="sex" name="sex" required>
                                                        <option value="<?php echo $pegawai['sex']; ?>"><?php echo $pegawai['sex']; ?></option>
                                                        <option value="Pria">Pria</option>
                                                        <option value="Wanita">Wanita</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="kotaLahir">Kota Lahir</label>
                                                    <input type="text" class="form-control form-control-sm" id="kotaLahir" name="kota_lahir" value="<?php echo $pegawai['kota_lahir']; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="tglLahir">Tgl Lahir</label>
                                            <input type="date" class="form-control form-control-sm" id="tglLahir" name="tgl_lahir" value="<?php echo $pegawai['tgl_lahir']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat Sekarang</label>
                                            <input type="text" class="form-control form-control-sm" id="alamat" name="alamat_skrg" value="<?php echo $pegawai['alamat_skrg']; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control form-control-sm" id="email" name="email" value="<?php echo $pegawai['email']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="agama">Agama</label>
                                            <select class="form-control form-control-sm" id="agama" name="agama" required>
                                                <option value="<?php echo $pegawai['agama']; ?>"><?php echo $pegawai['agama']; ?></option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Lain-lain">Lain-lain</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="ktp">No KTP</label>
                                            <input type="number" class="form-control form-control-sm" id="ktp" name="no_ktp" value="<?php echo $pegawai['no_ktp']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status Pernikahan</label>
                                            <select class="form-control form-control-sm" id="status" name="status" required>
                                                <option value="<?php echo $pegawai['status']; ?>"><?php echo $pegawai['status']; ?></option>
                                                <option value="Belum Menikah">Belum Menikah</option>
                                                <option value="Menikah">Menikah</option>
                                                <option value="Janda">Janda</option>
                                                <option value="Duda">Duda</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pendAkhir">Pendidikan Terakhir</label>
                                            <select class="form-control form-control-sm" id="pendAkhir" name="pend_akhir" required>
                                                <option value="<?php echo $pegawai['pend_akhir']; ?>"><?php echo $pegawai['pend_akhir']; ?></option>
                                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                                                <option value="SD">SD</option>
                                                <option value="SMP">SMP</option>
                                                <option value="SMA">SMA</option>
                                                <option value="D3">D3</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Foto Pegawai</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pegawai_active" value="1" checked>
                                                <label class="form-check-label">Aktif</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="pegawai_active" value="0">
                                                <label class="form-check-label">Tidak Aktif</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Detail Pegawai</h3>
                        </div>
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('assets/dist/img/profile/') . $pegawai['image']; ?>" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center"><?php echo $pegawai['nama_lengkap']; ?></h3>
                            <p class="text-muted text-center"><?php echo $pegawai['kode_pegawai']; ?></p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Jenis Kelamin</b> <a class="float-right"><?php echo $pegawai['sex']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Kota - Tgl Lahir</b> <a class="float-right"><?php echo $pegawai['kota_lahir']; ?> - <?php echo format_indo($pegawai['tgl_lahir']); ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Alamat</b> <a class="float-right"><?php echo $pegawai['alamat_skrg']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Alamat Email</b> <a class="float-right"><?php echo $pegawai['email']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Agama</b> <a class="float-right"><?php echo $pegawai['agama']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>No KTP</b> <a class="float-right"><?php echo $pegawai['no_ktp']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Status</b> <a class="float-right"><?php echo $pegawai['status']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Pendidikan Terakhir</b> <a class="float-right"><?php echo $pegawai['pend_akhir']; ?></a>
                                </li>
                                <?php if ($pegawai['pegawai_active'] == 1) : ?>
                                    <li class="list-group-item">
                                        <b>Status Aktif / Tidak Aktif</b> <a class="float-right">Aktif</a>
                                    <?php else : ?>
                                        <b>Status Aktif / Tidak Aktif</b> <a class="float-right"><span class="btn btn-danger btn-block btn-xs">Tidak Aktif</span></a>
                                    <?php endif; ?>
                                    </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data : <?php echo $pegawai['nama_lengkap']; ?> - <?php echo $pegawai['kode_pegawai']; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" action="<?php echo base_url('manager/add_data_lain/' . $pegawai['kode_pegawai']); ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nip">No Induk Pegawai</label>
                                <input type="text" class="form-control form-control-sm" id="nip" name="nip" value="<?php echo $pegawai['kode_pegawai']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Suami / Istri</label>
                                <input type="text" class="form-control form-control-sm" id="nama" name="nama_pasangan" required>
                            </div>
                            <div class="form-group">
                                <label for="tglLahir">Tgl Lahir Suami / Istri</label>
                                <input type="date" class="form-control form-control-sm" id="tglLahir" name="tgl_lahir_pasangan" required>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" class="form-control form-control-sm" id="pekerjaan" name="pekerjaan" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat Suami / Istri</label>
                                <input type="text" class="form-control form-control-sm" id="alamat" name="alamat_pasangan" required>
                            </div>
                            <div class="form-group">
                                <label for="jmlAnak">Jumlah Anak</label>
                                <input type="number" class="form-control form-control-sm" id="jmlAnak" name="jml_anak" required>
                            </div>
                            <div class="form-group">
                                <label for="noTelp">No Telp Suami / Istri</label>
                                <input type="number" class="form-control form-control-sm" id="noTelp" name="telp_pasangan" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- modal edit -->
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Keluarga : <?php echo $pegawai['nama_lengkap']; ?> - <?php echo $pegawai['kode_pegawai']; ?></h4>
            </div>
            <div class="modal-body">
                <form role="form" action="<?php echo base_url('manager/add_data_lain/' . $pegawai['kode_pegawai']); ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nip">No Induk Pegawai</label>
                                <input type="text" class="form-control form-control-sm" id="nip" name="nip" value="<?php echo $pegawai['kode_pegawai']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Suami / Istri</label>
                                <input type="text" class="form-control form-control-sm" id="nama" name="nama_pasangan" value="<?php echo $keluarga['nama_pasangan']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="tglLahir">Tgl Lahir Suami / Istri</label>
                                <input type="date" class="form-control form-control-sm" id="tglLahir" name="tgl_lahir_pasangan" value="<?php echo $keluarga['tgl_lahir_pasangan']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" class="form-control form-control-sm" id="pekerjaan" name="pekerjaan" value="<?php echo $keluarga['pekerjaan']; ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat Suami / Istri</label>
                                <input type="text" class="form-control form-control-sm" id="alamat" name="alamat_pasangan" value="<?php echo $keluarga['alamat_pasangan']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="jmlAnak">Jumlah Anak</label>
                                <input type="number" class="form-control form-control-sm" id="jmlAnak" name="jml_anak" value="<?php echo $keluarga['jml_anak']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="noTelp">No Telp Suami / Istri</label>
                                <input type="number" class="form-control form-control-sm" id="noTelp" name="telp_pasangan" value="<?php echo $keluarga['telp_pasangan']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- modal view -->
<div class="modal fade" id="modal-view">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card-body box-profile">
                    <h3 class="profile-username text-left">View Data Keluarga : <?php echo $pegawai['nama_lengkap']; ?></h3>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Nama Suami / Istri</b> <a class="float-right"><?php echo $keluarga['nama_pasangan']; ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Tgl Lahir Suami / Istri</b> <a class="float-right"><?php echo format_indo($keluarga['tgl_lahir_pasangan']); ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Jumlah Anak</b> <a class="float-right"><?php echo $keluarga['jml_anak']; ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>No Telp Suami / Istri</b> <a class="float-right"><?php echo $keluarga['telp_pasangan']; ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Alamat Suami / Istri</b> <a class="float-right"><?php echo $keluarga['alamat_pasangan']; ?></a>
                        </li>
                        <li class="list-group-item">
                            <b>Pekerjaan Suami / Istri</b> <a class="float-right"><?php echo $keluarga['pekerjaan']; ?></a>
                        </li>
                    </ul>
                    <button type="button" class="btn btn-default float-right" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>