<!-- /.content -->
</div>
<!-- /.content-wrapper -->



<footer class="main-footer">
  <strong>Copyright &copy; 2021 <a href="#">IDB-BISEW, BITL WDPF ROUND-46</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0.0
  </div>
</footer>



<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
  $(document).ready(function() {
    $("#bankinf").hide();
    $("#pMethod").click(function() {

      var pm = $("#pMethod").val();
      if (pm == 'bank') {
        $("#bankinf").show();
      } else {
        $("#bankinf").hide();
      }
    })
  });
  $(document).ready(function() {
    $("#bank_name").hide();
    $("#method").click(function() {
      var m = $("#method").val();
      if (m == 'bank') {
        $("#bank_name").show();
      } else {
        $("#bank_name").hide();
      }
    })
  })
</script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
  integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
  integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.1/datatables.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.js"></script>
</body>

</html>