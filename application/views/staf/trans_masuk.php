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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="table-id" style="font-size:14px;">
                                <thead>
                                    <th>#</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Divisi</th>
                                    <th>Pengirim</th>
                                    <th>Tgl Masuk</th>
                                    <th>Ket. Barang</th>
                                    <th>Jml Masuk</th>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($barang_masuk as $bm) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $bm['nama_barang']; ?></td>
                                            <td><?php echo $bm['nama_kategori']; ?></td>
                                            <td><?php echo $bm['divisi']; ?></td>
                                            <td><?php echo $bm['pengirim']; ?></td>
                                            <td><?php echo format_indo($bm['tgl_masuk']); ?></td>
                                            <td><?php echo $bm['ket_barang']; ?></td>
                                            <td><?php echo $bm['jml_masuk']; ?> pcs</td>
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