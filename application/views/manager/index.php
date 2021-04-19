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
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-teal">
                                <div class="inner">
                                    <h3><?php echo $count_user; ?></h3>
                                    <p>Total User</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                                <a href="#" <a class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3><?php echo $count_user; ?></h3>
                                    <p>Total Pegawai</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-users"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3><?php echo $sum_asset; ?></h3>
                                    <p>Total Barang</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-layer-group"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3><?php echo $sum_out; ?></h3>
                                    <p>Barang Keluar</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-cubes"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-primary card-outline">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger">
                        <a class="close" data-dismiss="alert">x</a>
                        <strong><?php echo strip_tags(validation_errors()); ?></strong>
                    </div>
                <?php } ?>
                <div class="card">
                    <div class="modal-header">
                        <h4 class="modal-title">Stock Barang</h4>
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