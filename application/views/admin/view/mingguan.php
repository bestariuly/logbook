 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myData tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">DATA CHEKLIST MINGGUAN PERALATAN AGROKLIMAT</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script type="text/javascript">
  $(document).ready(function(){
    $("#myModal").modal('show');
  });
 </script> 
 <?php if (isset($mingguanalat)): ?>
 

<!-- Modal content-->
 <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width: 80%">

  <!--   modal lihat laporan -->

          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Tanggal : <?php echo $tgl; ?></h4>
            </div> 
            <div class="modal-body">

              <table class="table table-bordered table-stripped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Peralatan</th>
                      <th>Kondisi</th>
                      <th>keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php  $no=1; foreach ($kategori as $row1) {
                          ?>
                          <tr>
                           <td colspan="4" style="background-color:#eceaea;"><?php echo $row1->nama_kategori; ?></td>
                         </tr>
                         <?php foreach ($mingguanalat as $row2) {
                          if ($row2->id_kategori == $row1->id_kategori) {

                            ?>
                            <tr>
                              <td><?php echo $no;$no++; ?></td>
                              <td><?php echo $row2->nama_alat; ?></td>
                              <td>
                                <div class="form-group">
                                  <select class="form-control" id="sel1" name="kondisi<?php echo $row2->id_alat; ?>" required >
                                    <?php if ($row2->kondisi == 'bersih'): ?>
                                      <option value="bersih" readonly>Bersih</option>
                                    <?php endif ?>
                                    <?php if ($row2->kondisi == 'kotor'): ?>
                                      <option value="kotor" readonly>Kotor</option>
                                    <?php endif ?>
                                    <input type="hidden" name="id_kondisi<?php echo $row2->id_alat; ?>" value="<?php echo $row2->id_kondisi; ?>">
                                  </select>

                                </td>
                                <td>
                                  <textarea readonly class="form-control" name="keterangan<?php echo $row2->id_alat; ?>" placeholder="Keterangan" style="background-color: white;"><?php echo $row2->keterangan; ?></textarea>
                                </div>
                              </td>
                            </tr>
                          <?php }}} ?>
                        </tbody>
              </table>  
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>


  <?php endif ?>
  <?php if (isset($editmingguanalat)): ?>
 
<!-- Modal content-->
 <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width: 80%">

  <!--   modal lihat laporan -->

          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Edit Tanggal : <?php echo $tgl; ?></h4>
            </div> 
            <div class="modal-body">

              <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Peralatan</th>
                      <th>Kondisi</th>
                      <th>keterangan</th>
                    </tr>
                  </thead>

                  <tbody>
                    <form action="../updateharianByTanggal" method="post">
                        <?php  $no=1; foreach ($kategori as $row1) {
                          ?>
                          <tr>
                           <td colspan="4" style="background-color:#eceaea;"><?php echo $row1->nama_kategori; ?></td>
                         </tr>
                         <?php foreach ($editmingguanalat as $row2) {
                          if ($row2->id_kategori == $row1->id_kategori) {

                            ?>
                            <tr>
                              <td><?php echo $no;$no++; ?></td>
                              <td><?php echo $row2->nama_alat; ?></td>
                              <td>
                                <div class="form-group">
                                  <select class="form-control" id="sel1" name="kondisi<?php echo $row2->id_alat; ?>" required >
                                    <?php if ($row2->kondisi == 'bersih'): ?>
                                      <option value="bersih" >Bersih</option>
                                      <option value="kotor" >Kotor</option>

                                    <?php endif ?>
                                    <?php if ($row2->kondisi == 'kotor'): ?>
                                      <option value="bersih" >Bersih</option>
                                      <option value="kotor" >Kotor</option>
                                    <?php endif ?>
                                    <input type="hidden" name="id_kondisi<?php echo $row2->id_alat; ?>" value="<?php echo $row2->id_kondisi; ?>">
                                    <input type="hidden" name="tanggal<?php echo $row2->id_alat; ?>" value="<?php echo $row2->id_kondisi; ?>">
                                  </select>

                                </td>
                                <td>
                                  <textarea class="form-control" name="keterangan<?php echo $row2->id_alat; ?>" placeholder="Keterangan" style="background-color: white;"><?php echo $row2->keterangan; ?></textarea>
                                </div>
                              </td>
                            </tr>
                          <?php }}} ?>

                         
                        </tbody>
              </table>  
            </div>

            <div class="modal-footer"> <input type="submit" name="update" class="btn btn-default">
                          </form>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>


  <?php endif ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                  <div class="row2" align="right"> <input class="form-control" style="width: 30%;" id="myInput" type="text" placeholder="Search.."><br></div>
  <table class="table table-bordered table-stripped">
        <thead>
          <tr>
            <th>No.</th>
            <th>Hari</th>
            <th>Tanggal</th>
            <th>Aksi</th>
     
          </tr>
        </thead>
        <form action="#" method="post">
            <tbody id="myData">
          <tr>
                 
               </tr>
               <?php $no=1; foreach ($tanggal as $row2) {
                  ?>
                  <tr>
                    <td><?php echo $no;$no++; ?></td>
                    <td><?php 
                    $tanggal = $row2->tanggal;
                    $day = date('D', strtotime($tanggal));
                    $dayList = array(
                      'Sun' => 'Minggu',
                      'Mon' => 'Senin',
                      'Tue' => 'Selasa',
                      'Wed' => 'Rabu',
                      'Thu' => 'Kamis',
                      'Fri' => 'Jumat',
                      'Sat' => 'Sabtu'
                    );
                    echo $dayList[$day];  ?></td>
                    <td><?php echo $row2->tanggal; ?></td>
                    <td><a href="?tanggal=<?php  echo $row2->tanggal; ?>" ><span class="btn btn-default small glyphicon glyphicon-eye-open"> Lihat</span></a>    
                    <a href="?edit=<?php  echo $row2->tanggal; ?>" ><span class="btn btn-default small glyphicon glyphicon-edit"> Edit</span></a></td> 

                                               
                  </tr>
                <?php } ?>

              </tbody>
            </table>
                </div>
            </div>
            <!-- /.row -->
                        <div class="row">
                
                <!-- /.col-lg-12 -->
            </div>
</div>
        <!-- /#page-wrapper -->
