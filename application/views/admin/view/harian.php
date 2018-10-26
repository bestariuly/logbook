<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">DATA CHEKLIST HARIAN PERALATAN AGROKLIMAT</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script type="text/javascript">
  $(document).ready(function(){
    $("#myModal").modal('show');
  });
 </script> 
 <?php if (isset($harianalat)): ?>
 

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

              <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Peralatan</th>
                      <th>Operasi</th>
                      <th>keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php  $no=1; foreach ($kategori as $row1) {
                          ?>
                          <tr>
                           <td colspan="4" style="background-color:#eceaea;"><?php echo $row1->nama_kategori; ?></td>
                         </tr>
                         <?php foreach ($harianalat as $row2) {
                          if ($row2->id_kategori == $row1->id_kategori) {

                            ?>
                            <tr>
                              <td><?php echo $no;$no++; ?></td>
                              <td><?php echo $row2->nama_alat; ?></td>
                              <td>
                                <div class="form-group">
                                  <select class="form-control" id="sel1" name="operasi<?php echo $row2->id_alat; ?>" required >
                                    <?php if ($row2->operasi == 'normal'): ?>
                                      <option value="normal" readonly>Normal</option>
                                    <?php endif ?>
                                    <?php if ($row2->operasi == 'gangguan'): ?>
                                      <option value="gangguan" readonly>Gangguan</option>
                                    <?php endif ?>
                                    <input type="hidden" name="id_operasi<?php echo $row2->id_alat; ?>" value="<?php echo $row2->id_operasi; ?>">
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
  <?php if (isset($editharianalat)): ?>
 

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
                      <th>Operasi</th>
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
                         <?php foreach ($editharianalat as $row2) {
                          if ($row2->id_kategori == $row1->id_kategori) {

                            ?>
                            <tr>
                              <td><?php echo $no;$no++; ?></td>
                              <td><?php echo $row2->nama_alat; ?></td>
                              <td>
                                <div class="form-group">
                                  <select class="form-control" id="sel1" name="operasi<?php echo $row2->id_alat; ?>" required >
                                    <?php if ($row2->operasi == 'normal'): ?>
                                      <option value="normal" >Normal</option>
                                      <option value="gangguan" >Gangguan</option>

                                    <?php endif ?>
                                    <?php if ($row2->operasi == 'gangguan'): ?>
                                      <option value="normal" >Normal</option>
                                      <option value="gangguan" >Gangguan</option>
                                    <?php endif ?>
                                    <input type="hidden" name="id_operasi<?php echo $row2->id_alat; ?>" value="<?php echo $row2->id_operasi; ?>">
                                    <input type="hidden" name="tanggal<?php echo $row2->id_alat; ?>" value="<?php echo $row2->id_operasi; ?>">
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
  <table class="table table-bordered">
        <thead>
          <tr>
            <th>No.</th>
            <th>Hari</th>
            <th>Tanggal</th>
            <th>Aksi</th>
     
          </tr>
        </thead>
        <form action="#" method="post">
            <tbody>
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
</div>
        <!-- /#page-wrapper -->
