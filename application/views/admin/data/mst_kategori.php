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
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add-user">
                            Tambah Kategori Barang
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="table-id" style="font-size:14px;">
                                <thead>
                                    <th>#</th>
                                    <th>Kode Kategori</th>
                                    <th>Nama Kategori</th>
                                    <th>Keterangan</th>
                                    <th>Edit</th>
                                    <th>Hapus</th>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($mst_kategori as $mk) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $mk['kode_kategori']; ?></td>
                                            <td><?php echo $mk['nama_kategori']; ?></td>
                                            <td><?php echo $mk['ket_kategori']; ?></td>
                                            <td> <a href="<?php echo base_url('admin/edit_user/') . $mk['id_kategori']; ?>" class="tombol-edit btn btn-primary btn-block btn-sm" data-id="<?php echo $mk['id_kategori']; ?>" data-toggle="modal" data-target="#edit-user">Edit</a></td>
                                            <td><a href="<?php echo base_url('admin/del_kategori/') . $mk['id_kategori']; ?>" class="tombol-hapus btn btn-danger btn-block btn-sm">Hapus</a> </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Modal -->
<div class="modal fade" id="add-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kategori</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <form action="<?php echo base_url('admin/mst_kategori'); ?>" method="post" id="form_id">
                        <div class="form-group">
                            <label for="kode">Kode Kategori</label>
                            <input type="text" class="form-control form-control-sm" name="kode_kategori" value="<?php echo $kode_kategori; ?>">
                        </div>
                        <div class="form-group">
                            <label for="kat">Nama Kategori</label>
                            <input type="text" class="form-control form-control-sm" name="nama_kategori" required>
                        </div>
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <textarea class="form-control" placeholder="Isi Jika ada keterangan" name="ket_kategori"></textarea>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Simpan Data</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>

<div class="modal fade" id="edit-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Kategori</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <form action="<?php echo base_url('admin/edit_kategori'); ?>" method="post" id="form_id">
                        <div class="form-group">
                            <label for="kode">Kode Kategori</label>
                            <input type="hidden" name="id_kategori" id="idjson">
                            <input type="text" class="form-control form-control-sm" name="kode_kategori" id="kodejson"">
                        </div>
                        <div class=" form-group">
                            <label for="kat">Nama Kategori</label>
                            <input type="text" class="form-control form-control-sm" name="nama_kategori" id="namakatjson" required>
                        </div>
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <textarea class="form-control" placeholder="Isi Jika ada keterangan" name="ket_kategori" id="ketjson"></textarea>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Simpan Data</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        </div>
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
        const id_kategori = $(this).data('id');
        $.ajax({
            url: '<?php echo base_url('admin/get_edit_kategori'); ?>',
            // id kiri data yg dikirimkan, yang kanan isi datanya
            data: {
                id_kategori: id_kategori
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#kodejson').val(data.kode_kategori);
                $('#namakatjson').val(data.nama_kategori);
                $('#ketjson').val(data.ket_kategori);
                $('#idjson').val(data.id_kategori);
            }
        });
    });
</script>