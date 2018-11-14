<!-- back up buat user -->

<!-- modal buat laporan -->
<!-- //laporan1 -->
<div id="buatUser" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Buat User</h4>
      </div>
      <div class="modal-body">
      <!-- //buat_laporan -->
        <form action="../buat_user" method="post">
          <div class="form-group">
            <label for="nama">Nama Admin</label>
            <input type="text" class="form-control" id="nama" name="nama">

            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username">

            <label for="password">Password</label>
            <input type="text" class="form-control" id="password" name="password">

            <label for="ulangpassword">Ulangi Password</label>
            <input type="text" class="form-control" id="ulangpassword" name="ulangpassword">

          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
