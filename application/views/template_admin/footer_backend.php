<!-- Main Footer -->
<footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2021 <a href="<?= base_url() ?>">Laperpool</a>.</strong>
</footer>
</div>
<!-- ./wrapper -->
<script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
<script>
    var flash = $('#flash').data('flash');
    if (flash) {
        Swal.fire({
            icon: 'success',
            title: 'Oops...',
            text: flash
        })
    }
</script>
<script>
    window.setTimeout(function() {
        $('.alert').fadeTo(50, 0).slideUp(50, function() {
            $(this).remove();
        });
    }, 3000);
</script>
</body>

</html>