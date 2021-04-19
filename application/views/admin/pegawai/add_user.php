<style>
    .dataTables_wrapper {
        font-size: 13px
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
                        <a href="<?php echo base_url('admin/list_pegawai'); ?>" class="btn btn-default btn-sm">Daftar Pegawai</a>
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
                <div class="col-md-6">
                    <div class="card card-primary card-outline">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Tambah User Pegawai</h3>
                            </div>
                            <div class="card-body">
                                <?php echo form_open_multipart('admin/add_user/' . $pegawai['kode_pegawai']); ?>
                                <div class="form-group">
                                    <label for="nip">No Induk Pegawai</label>
                                    <input type="text" class="form-control form-control-sm" id="nip" name="nip" value="<?php echo $pegawai['kode_pegawai']; ?>">
                                    <?php echo form_error('nip', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?php echo $pegawai['nama_lengkap']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control form-control-sm" id="email" name="email" value="<?php echo $pegawai['email']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="level">Level</label>
                                    <select class="form-control" name="level" id="level">.
                                        <option value="">- Pilih Level -</option>
                                        <option value="Admin">ADMINISTRATOR</option>
                                        <option value="Manager">MANAGER</option>
                                        <option value="Gudang">GUDANG</option>
                                        <option value="Staf">STAF</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control form-control-sm" id="username" name="username" required>
                                    <?php echo form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password1" id="password" required>
                                            <?php echo form_error('password1', '<small class="text-danger pl-2">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password2">Ketik Ulang Password</label>
                                            <input type="password" class="form-control" name="password2" id="password2" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">BUAT USER</button>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Daftar User</h3>
                        </div>
                        <div class="card-body box-profile">
                            <div class="table-responsive">
                                <table class=" table table-bordered table-hover" id="table-id" style="font-size:13px;">
                                    <thead>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>User</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($list_user as $lu) : ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $lu['nama']; ?></td>
                                                <td><?php echo $lu['nip']; ?></td>
                                                <td><?php echo $lu['username']; ?></td>
                                                <td><?php echo $lu['level']; ?></td>
                                                <?php if ($lu['is_active'] == 1) : ?>
                                                    <td>Aktif</td>
                                                <?php else : ?>
                                                    <td>Tidak Aktif</td>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
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