<link href="<?php echo base_url(); ?>asset/dist/css/user.css" rel="stylesheet">
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header text-center" >Manajemen User</h1>
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambahUser">Tambah User</button>
      <hr>

    <table class="table table-bordered table-hover" id="user">
      <thead>
        <tr>
          <th style= "text-align: center">No</th>
          <th style= "text-align: center">Nama Admin</th>
          <th style= "text-align: center">Username </th>
          <th style= "text-align: center">Aksi</th>
        </tr>
      </thead>

      <tbody>
        <?php $no = 1; foreach ($user as $user) { ?>
          <tr>
            <td style= "text-align: center"><?php echo $no; $no++; ?></td>
            <td style= "text-align: center"><?php echo $user->nama; ?></td>
            <td style= "text-align: center"><?php echo $user->username; ?></td>
            <td>
<!-- button  -->
<?php echo anchor('admin/hapuslaporan/'.$user->id, 
'<button style="float: right" class="btn btn-default small glyphicon glyphicon-trash" id="btn-delete" title="Hapus"> Hapus</button>',
  array('class'=>'delete', 'onclick'=>"return confirmDialog();")); ?>  
<button style="float: right" class="btn btn-default small glyphicon glyphicon-edit" title="Edit" id="btn-edit" 
  data-toggle="modal" data-target="#<?php echo $user->id; ?>"> Edit</button>
       </td>
     </tr>
     <?php } ?>
</tbody>
    </table>

<!-- tambah kategori -->
      <div id="tambahUser" class="modal fade" role="dialog">
        <div class="modal-dialog">

<!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Tambah User</h4>
            </div>
            
  

<!-- modal body tambah user -->
            <div class="modal-body">
              <form action="../tambah_user" method="post">
                <div class="form-group">
                  <label for="nama">Nama Admin</label>
                  <input type="text" name="nama" class="form-control" id="nama" name="nama">

                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" id="username" name="username">

                  <label for="password">Password</label>
                  <input type="text" name="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
              </form>
            </div>




     
<!--modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>

