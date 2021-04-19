<footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a href="http://mataram.imigrasi.go.id/" target="_blank">Kantor Imigrasi Kelas 1 TPI Mataram</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/'); ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/'); ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('assets/'); ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>plugins/jqvmap/maps/jquery.vmap.world.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/'); ?>plugins/jquery-knob/jquery.knob.min.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/'); ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url('assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/'); ?>dist/js/adminlte.js"></script>
<!-- Sweetalert -->
<script src="<?= base_url('assets/swal/'); ?>sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/swal/'); ?>myscript.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/'); ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/'); ?>dist/js/demo.js"></script>
<script>
    $(function() {
        $("#table-id").DataTable();
        $('#id-table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
<script>
    $('.tombol-hapus').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            title: 'Konfirmasi Hapus Data',
            text: 'Klik hapus untuk menghapus data',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });
</script>
<script>
    $('#tombol-logout').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            title: 'Konfirmasi Logout',
            text: 'Klik keluar untuk mengakhiri session',
            type: 'danger',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Keluar'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    });
</script>

</body>

</html>