<style>
    .dataTables_wrapper {
        font-size: 16px
    }
</style>

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
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger">
                        <a class="close" data-dismiss="alert">x</a>
                        <strong><?php echo strip_tags(validation_errors()); ?></strong>
                    </div>
                <?php } ?>
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg">
                            Tambah Pegawai
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table-id" class="table table-bordered table-striped" style="font-size:13px;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIP</th>
                                        <th>Nama Lengkap</th>
                                        <th>Kota - Tgl Lahir</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Agama</th>
                                        <th>Status</th>
                                        <th>Pend.Terakhir</th>
                                        <th>Opsi</th>
                                        <th>User</th>
                                        <th>Struktural</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pegawai as $p) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $p['kode_pegawai']; ?></td>
                                            <td><?php echo $p['nama_lengkap']; ?></td>
                                            <td><?php echo $p['kota_lahir']; ?> - <?php echo format_indo($p['tgl_lahir']); ?></td>
                                            <td><?php echo $p['alamat_skrg']; ?></td>
                                            <td><?php echo $p['email']; ?></td>
                                            <td><?php echo $p['agama']; ?></td>
                                            <td><?php echo $p['status']; ?></td>
                                            <td><?php echo $p['pend_akhir']; ?></td>
                                            <td><a href="<?php echo base_url('manager/detail_pegawai/' . $p['kode_pegawai']); ?>" class="btn btn-primary btn-block btn-xs"><i class="fas fa-user-tag"></i></a></td>
                                            <td><a href="<?php echo base_url('manager/add_user/' . $p['kode_pegawai']); ?>" class="btn btn-info btn-block btn-xs font-weight-bolder"><i class="fas fa-plus"></i></a></td>
                                            <td><a href="<?php echo base_url('manager/add_struktur/' . $p['kode_pegawai']); ?>" class="btn btn-info btn-block btn-xs font-weight-bolder"><i class="fas fa-sitemap"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
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
                <h4 class="modal-title">Tambah Pegawai</h4>
            </div>
            <div class="modal-body">
                <form role="form" action="<?php echo base_url('manager/list_pegawai'); ?>" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nip">No Induk Pegawai</label>
                                <input type="text" class="form-control form-control-sm" id="nip" name="kode_pegawai" value="<?php echo $kode_pegawai; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control form-control-sm" id="nama" name="nama_lengkap" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sex">Jenis Kelamin</label>
                                        <select class="form-control form-control-sm" id="sex" name="sex" required>
                                            <option value="">- Pilih Jenis Kelamin -</option>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kotaLahir">Kota Lahir</label>
                                        <input type="text" class="form-control form-control-sm" id="kotaLahir" name="kota_lahir" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tglLahir">Tgl Lahir</label>
                                <input type="date" class="form-control form-control-sm" id="tglLahir" name="tgl_lahir" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Sekarang</label>
                                <input type="text" class="form-control form-control-sm" id="alamat" name="alamat_skrg" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control form-control-sm" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select class="form-control form-control-sm" id="agama" name="agama" required>
                                    <option value="">- Pilih Agama -</option>
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
                                <input type="number" class="form-control form-control-sm" id="ktp" name="no_ktp" required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status Pernikahan</label>
                                <select class="form-control form-control-sm" id="status" name="status" required>
                                    <option value="">- Pilih Status -</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Janda">Janda</option>
                                    <option value="Duda">Duda</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pendAkhir">Pendidikan Terakhir</label>
                                <select class="form-control form-control-sm" id="pendAkhir" name="pend_akhir" required>
                                    <option value="">- Pilih Pendidikan Terakhir -</option>
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
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>