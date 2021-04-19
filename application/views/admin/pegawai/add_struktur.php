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
                        <a href="<?php echo base_url('admin/list_pegawai'); ?>" class="btn btn-default btn-sm">List Pegawai</a>
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
                                <h3 class="card-title">Tambah Level Struktural</h3>
                            </div>
                            <div class="card-body">
                                <?php echo form_open_multipart('admin/add_struktur/' . $pegawai['kode_pegawai']); ?>
                                <div class="form-group">
                                    <label for="nip">No Induk Pegawai</label>
                                    <input type="hidden" name="pegawai_kode" value="<?php echo $pegawai['kode_pegawai']; ?>">
                                    <input type="text" class="form-control form-control-sm" id="nip" name="pegawai_kode" value="<?php echo $pegawai['kode_pegawai']; ?>" readonly>
                                    <?php echo form_error('nip', '<small class="text-danger pl-2">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Kode Struktural</label>
                                    <input type="text" class="form-control form-control-sm" id="nama" name="kode_struktural" value="<?php echo $kode_struktural; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-sm" id="nama" value="<?php echo $pegawai['nama_lengkap']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control form-control-sm" id="email" value="<?php echo $pegawai['email']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="level">Divisi</label>
                                    <select class="form-control" name="divisi_kode" id="divisi_kode">.
                                        <option value="">- Pilih Divisi -</option>
                                        <?php foreach ($divisi as $d) : ?>
                                            <option value="<?php echo $d['kode_divisi']; ?>"><?php echo $d['divisi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="level">Jabatan</label>
                                    <select class="form-control" name="jabatan_kode" id="jabatan_kode">.
                                        <option value="">- Pilih Jabatan -</option>
                                        <?php foreach ($jabatan as $j) : ?>
                                            <option value="<?php echo $j['kode_jabatan']; ?>"><?php echo $j['jabatan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">Simpan Level Struktural</button>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">History Struktural : <?php echo $pegawai['nama_lengkap']; ?></h3>
                        </div>
                        <div class="card-body box-profile">
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Aksi | Tanggal | Divisi : </b> <a class="float-right"><b>Jabatan :</b></a>
                                </li>
                                <?php foreach ($history as $a) : ?>
                                    <li class="list-group-item">
                                        <a href="<?php echo base_url('admin/del_struktur/' . $a['id_struktural']); ?>" class="tombol-hapus btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i></a> | <?php echo format_indo($a['tgl_input']); ?> | <?php echo $a['divisi']; ?><a class="float-right"><?php echo $a['jabatan']; ?></a>
                                    </li>
                                <?php endforeach; ?>
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