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
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#view">
                            Lihat Kategori
                        </button>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="table-id" style="font-size:14px;">
                                <thead>
                                    <th>#</th>
                                    <th>Kode Barang</th>
                                    <th>Kode Kategori</th>
                                    <th>Nama Barang</th>
                                    <th>Stock Gudang</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($mst_barang as $mb) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $mb['kode_barang']; ?></td>
                                            <td><?php echo $mb['kategori_kode']; ?></td>
                                            <td><?php echo $mb['nama_barang']; ?></td>
                                            <td><?php echo $mb['jumlah_barang']; ?> pcs</td>
                                            <td><?php echo $mb['ket_barang']; ?></td>
                                            <td> <a href="<?php echo base_url('gudang/edit_user/') . $mb['id_barang']; ?>" class="tombol-edit btn btn-info btn-block btn-sm" data-id="<?php echo $mb['id_barang']; ?>" data-toggle="modal" data-target="#edit-user"><i class="fas fa-plus"></i> &nbsp BARANG</a></td>
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

<div class="modal fade" id="view">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Kategori Barang</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <table class="table table-bordered table-hover" id="id-table" style="font-size:14px;">
                        <thead>
                            <th>#</th>
                            <th>Kode Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Keterangan</th>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($mst_kategori as $mk) : ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $mk['kode_kategori']; ?></td>
                                    <td><?php echo $mk['nama_kategori']; ?></td>
                                    <td><?php echo $mk['ket_kategori']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
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
                <h4 class="modal-title">Stock Masuk/Retur</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <form action="<?php echo base_url('staf/stok_masuk'); ?>" method="post" id="form_id">
                        <input type="hidden" name="id_barang" id="idjson">
                        <div class="form-group">
                            <label for="kode">Kode Barang</label>
                            <input type="text" class="form-control form-control-sm" name="barang_kd" id="kodejson"" readonly>
                        </div>
                        <div class=" form-group">
                            <label for="kat">Nama Barang</label>
                            <input type="text" class="form-control form-control-sm" id="namajson" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class=" form-group">
                                    <label for="kategori">Tgl Masuk / Retur</label>
                                    <input type="date" class="form-control form-control-sm" name="tgl_masuk" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class=" form-group">
                                    <label for="kategori">Dari Divisi</label>
                                    <select class="form-control form-control-sm" id="kategori" name="divisi_kd" required>
                                        <option value="">- Pilih Divisi -</option>
                                        <?php foreach ($mst_divisi as $mk) : ?>
                                            <option value="<?php echo $mk['kode_divisi']; ?>"><?php echo $mk['divisi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class=" form-group">
                            <label for="kategori">Pengirim</label>
                            <input type="text" class="form-control form-control-sm" name="pengirim" required>
                        </div>
                        <div class=" form-group">
                            <label for="kategori">Keterangan</label>
                            <textarea type="text" row="2" class="form-control form-control-sm" name="ket_barang" placeholder="Diisi jika ada keterangan tambahan"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class=" form-group">
                                    <label for="kat">Stock Gudang</label>
                                    <input type="text" class="txt2 form-control form-control-sm" id="jmljson" readonly>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class=" form-group">
                                    <label for="kat">Stock Masuk</label>
                                    <input type="text" class="form-control form-control-sm" name="jml_masuk" id="txt1" onkeyup="sum();" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class=" form-group">
                                    <label for="kat">Sisa Stock</label>
                                    <input type="text" class="form-control form-control-sm" id="txt3" name="jumlah_barang" readonly>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Simpan Stok Masuk</button>
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
    function sum() {
        var stokawal = document.getElementById('txt1').value;
        var stokakhir = document.getElementById('jmljson').value;
        var result = parseInt(stokakhir) + parseInt(stokawal);
        if (!isNaN(result)) {
            document.getElementById('txt3').value = result;
        }
    }
</script>

<script>
    $('.tombol-edit').on('click', function() {
        const id_barang = $(this).data('id');
        $.ajax({
            url: '<?php echo base_url('staf/get_barang'); ?>',
            data: {
                id_barang: id_barang
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#kodejson').val(data.kode_barang);
                $('#katjson').val(data.kategori_kode);
                $('#namajson').val(data.nama_barang);
                $('#jmljson').val(data.jumlah_barang);
                $('#ketjson').val(data.ket_barang);
                $('#idjson').val(data.id_barang);
            }
        });
    });
</script>