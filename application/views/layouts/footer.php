
  <!-- Footer -->
  <footer class="py-5 bg-success mt-5">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Ismastore 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script>
      // Add img js
      $(function() {
        $(document).on('change', ':file', function() {
        var input = $(this),
          numFiles = input.get(0).files ? input.get(0).files.length : 1,
          label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
        });
        $(document).ready( function() {
          $(':file').on('fileselect', function(event, numFiles, label) {
            var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;
            if( input.length ) {
              input.val(log);
            } else {
              if( log ) alert(log);
            }
          });
        });
      });
  </script>
</body>

</html>
