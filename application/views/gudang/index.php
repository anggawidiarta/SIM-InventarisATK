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
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="table-id" style="font-size:14px;">
                                <thead>
                                    <th>#</th>
                                    <th>Kode Barang</th>
                                    <th>Kode Kategori</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                    <th>Edit</th>

                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($mst_barang as $mb) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $mb['kode_barang']; ?></td>
                                            <td><?php echo $mb['kategori_kode']; ?></td>
                                            <td><?php echo $mb['nama_barang']; ?></td>
                                            <td><?php echo $mb['jumlah_barang']; ?></td>
                                            <td><?php echo $mb['ket_barang']; ?></td>
                                            <td> <a href="<?php echo base_url('gudang/edit_user/') . $mb['id_barang']; ?>" class="tombol-edit btn btn-primary btn-block btn-sm" data-id="<?php echo $mb['id_barang']; ?>" data-toggle="modal" data-target="#edit-user">Tambah Stock</a></td>
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


<div class="modal fade" id="edit-user">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Stock</h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <form action="<?php echo base_url('gudang/update_stok_barang'); ?>" method="post" id="form_id">
                        <input type="hidden" name="id_barang" id="idjson">
                        <!-- <div class="form-group">
                            <label for="kode">Kode Barang</label>
                            <input type="hidden" name="id_barang" id="idjson">
                            <input type="text" class="form-control form-control-sm" id="kodejson"" readonly>
                        </div> -->
                        <!-- <div class=" form-group">
                            <label for="kategori">Nama Kategori</label>
                            <input type="text" class="form-control form-control-sm" id="katjson" readonly>
                        </div> -->
                        <div class=" form-group">
                            <label for="kat">Nama Barang</label>
                            <input type="text" class="form-control form-control-sm" id="namajson" readonly>
                        </div>
                        <div class=" form-group">
                            <label for="kat">Stock Terakhir</label>
                            <input type="text" class="txt2 form-control form-control-sm" id="jmljson" readonly>
                        </div>
                        <div class=" form-group">
                            <label for="kat">Masukkan Stock</label>
                            <input type="text" class="form-control form-control-sm" id="txt1" onkeyup="sum();" required>
                        </div>
                        <div class=" form-group">
                            <label for="kat">Total Stock</label>
                            <input type="text" class="form-control form-control-sm" id="txt3" name="jumlah_barang" readonly>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary pull-right">Simpan Stok</button>
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
        var result = parseInt(stokawal) + parseInt(stokakhir);
        if (!isNaN(result)) {
            document.getElementById('txt3').value = result;
        }
    }
</script>

<script>
    $('.tombol-edit').on('click', function() {
        const id_barang = $(this).data('id');
        $.ajax({
            url: '<?php echo base_url('gudang/get_barang'); ?>',
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