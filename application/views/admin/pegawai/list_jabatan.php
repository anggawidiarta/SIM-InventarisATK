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
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger">
                    <a class="close" data-dismiss="alert">x</a>
                    <strong><?php echo strip_tags(validation_errors()); ?></strong>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary card-outline">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Jabatan (Golongan/Ruang, Pangkat)</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table table-bordered table-hover" id="table-id" style="font-size:13px;">
                                        <thead>
                                            <th>#</th>
                                            <th>Golongan/Ruang</th>
                                            <th>Nama Pangkat</th>
                                            <th>Edit</th>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($mst_jabatan as $mj) : ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $mj['kode_jabatan']; ?></td>
                                                    <td><?php echo $mj['jabatan']; ?></td>
                                                    <td><button type="buton" class="tombol-edit btn btn-info btn-block btn-sm" data-id="<?php echo $mj['id_jabatan']; ?>" data-toggle="modal" data-target="#edit-jab">Edit Jabatan</button></td>
                                                <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Tambah Jabatan
                        </div>
                        <div class="card-body">
                            <form role="form" action="<?php echo base_url('admin/list_jabatan'); ?>" method="post">
                                <div class="form-group">
                                    <label for="kdjab">Golongan/Ruang</label>
                                    <input type="text" class="form-control" id="kdjab" name="kode_jabatan" value="<?php echo $kode_jabatan; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="jab">Nama Pangkat</label>
                                    <input type="text" class="form-control" id="jab" name="jabatan">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </form>
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

<div class="modal fade" id="edit-jab">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Jabatan</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <form action="<?php echo base_url('admin/proses_edit_jabatan'); ?>" method="post" id="form_id">
                        <div class="form-group">
                            <label for="kdjab">Gologan/Ruang</label>
                            <input type="hidden" name="id_jabatan" id="idjson">
                            <input type="text" class="form-control" id="kdjabjson" name="kode_jabatan" required>
                        </div>
                        <div class="form-group">
                            <label for="jab">Nama Pangkat</label>
                            <input type="text" class="form-control" id="jabjson" name="jabatan">
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Simpan Perubahan</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>

<script>
    $('.tombol-edit').on('click', function() {
        const id_jabatan = $(this).data('id');
        $.ajax({
            url: '<?php echo base_url('admin/edit_jabatan'); ?>',
            // id kiri data yg dikirimkan, yang kanan isi datanya
            data: {
                id_jabatan: id_jabatan
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#kdjabjson').val(data.kode_jabatan);
                $('#jabjson').val(data.jabatan);
                $('#idjson').val(data.id_jabatan);
            }
        });
    });
</script>