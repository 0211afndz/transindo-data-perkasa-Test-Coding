  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Ahmad Fikri Nurjihad Dzulfikar - Backend Developer | Bandung </b>
    </div>
    Test Coding <strong>PT. Transindo Data Perkasa</strong>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets') }}/dist/js/adminlte.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
  $(function () {
    $(".dataTable").DataTable({
      "autoWidth": false,
      
    });
  });

  $(function() {
    $(".dataTableNoPaging").DataTable({
      "autoWidth": false,
      "searching": false,
      "paging": false,
      "info": false,
      "lengthChange": false,
    });
  });
</script>
</body>
</html>