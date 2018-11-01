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
        <h1 class="page-header">DATA CHEKLIST HARIAN RADAR AGROKLIMAT</h1>
      </div>
      <!-- /.col-lg-12 -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#myModal").modal('show');
      });
    </script> 
    <?php if (isset($harianradar)): ?>
     

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
                    <th>Nama Radar</th>
                    <th>Standar</th>
                    <th>Pembacaan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php  $no=1; foreach ($kategoriradar as $row1) {
                    ?>
                    <tr>
                     <td colspan="4" style="background-color:#eceaea;"><?php echo $row1->nama_kategori; ?></td>
                   </tr>
                   <?php foreach ($harianradar as $row2) {
                    if ($row2->id_kategoriradar == $row1->id_kategori) {
                      ?>
                      <tr>
                        <td><?php echo $no;$no++; ?></td>
                        <td><?php echo $row2->nama_radar; ?></td>
                        <td><?php echo $row2->standar; ?></td>
                        <td>
                          <div class="form-group">
                            <?php if ($row2->pembacaan=='MENYALA') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select disabled="true" style="background-color: rgb(255,255,255);" class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="MENYALA">Menyala</option>
                            <option value="MATI">Mati</option></select>
                            <?php
                          }else if ($row2->pembacaan=='MATI') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                           <select disabled="true" style="background-color: rgb(255,255,255);" class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="MATI">Mati</option>
                            <option value="MENYALA">Menyala</option>
                            <option value="MENYALA HIJAU">Menyala Hijau</option>
                            <option value="MENYALA MERAH">Menyala Merah</option>
                            <option value="BERKEDIP">Berkedip</option></select>
                            <?php
                          }else if ($row2->pembacaan=='ENABLE') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                           <select disabled="true" style="background-color: rgb(255,255,255);" class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="ENABLE">Enable</option>
                            <option value="DISABLE">Disable</option></select>
                            <?php
                          }else if ($row2->pembacaan=='DISABLE') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                           <select disabled="true" style="background-color: rgb(255,255,255);" class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="DISABLE">Disable</option>
                            <option value="ENABLE">Enable</option></select>
                            <?php
                          }else if ($row2->pembacaan=='MENYALA HIJAU') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select disabled="true" style="background-color: rgb(255,255,255);" class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                          <option value="MENYALA HIJAU">Menyala Hijau</option>
                          <option value="MENYALA MERAH">Menyala Merah</option>
                            <option value="MATI">Mati</option></select>
                            <?php
                          }else if ($row2->pembacaan=='MENYALA MERAH') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select disabled="true" style="background-color: rgb(255,255,255);" class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                          <option value="MENYALA MERAH">Menyala Merah</option>
                          <option value="MENYALA HIJAU">Menyala Hijau</option>
                            <option value="MATI">Mati</option></select>
                            <?php
                          }else if ($row2->pembacaan=='BERKEDIP') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select disabled="true" style="background-color: rgb(255,255,255);" class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="BERKEDIP">Berkedip</option>
                            <option value="MATI">Mati</option></select>
                            <?php
                          }else if ($row2->pembacaan=='HIJAU') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select disabled="true" style="background-color: rgb(255,255,255);" class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="HIJAU">Hijau</option>
                            <option value="PUTIH">Putih</option></select>
                            <?php
                          }else if ($row2->pembacaan=='PUTIH') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select disabled="true" style="background-color: rgb(255,255,255);" class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="PUTIH">Putih</option>
                            <option value="HIJAU">Hijau</option></select>
                            <?php
                          }else if ($row2->pembacaan=='HIJAU MENYALA') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select disabled="true" style="background-color: rgb(255,255,255);" class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="HIJAU MENYALA">Hijau Menyala</option>
                          <option value="HIJAU TUA">Hijau Tua</option></select>
                            <?php
                          }else if ($row2->pembacaan=='HIJAU TUA') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select disabled="true" style="background-color: rgb(255,255,255);" class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="HIJAU TUA">Hijau Tua</option>
                            <option value="HIJAU MENYALA">Hijau Menyala</option></select>
                            <?php
                          }else if ($row2->pembacaan=='CONNECT') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select disabled="true" style="background-color: rgb(255,255,255);" class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="CONNECT">Connect</option>
                            <option value="DISCONNECT">Disconnect</option></select>
                            <?php
                          }else if ($row2->pembacaan=='DISCONNECT') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select disabled="true" style="background-color: rgb(255,255,255);" class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="DISCONNECT">Disconnect</option>
                            <option value="CONNECT">Connect</option></select>
                            <?php
                          }else if($row2->pembacaan=='CONTROL'){
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select disabled="true" style="background-color: rgb(255,255,255);" class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="CONTROL">Control</option>
                          <option value="CTRL YOGFROG">CTRL YogFrog</option></select>
                            <?php
                          }else if($row2->pembacaan=='CTRL YOGFROG'){
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select disabled="true" style="background-color: rgb(255,255,255);" class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="CTRL YOGFROG">CTRL YogFrog</option>
                            <option value="CONTROL">Control</option></select>
                            <?php
                          }else{
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <input readonly style="background-color: rgb(255,255,255);" type="number" class="form-control" name="pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->pembacaan ?>" >
                            <?php
                          }?>
                                              
                                              
                                              
                                              
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
                        <?php if (isset($editharianradar)): ?>
                         

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
                                        <th>Nama Radar</th>
                                        <th>Standar</th>
                                        <th>Pembacaan</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <form action="../updateharianradarByTanggal" method="post">
                                        <?php  $no=1; foreach ($kategoriradar as $row1) {
                                          ?>
                                          <tr>
                                           <td colspan="4" style="background-color:#eceaea;"><?php echo $row1->nama_kategori; ?></td>
                                         </tr>
                                         <?php foreach ($editharianradar as $row2) {
                                          if ($row2->id_kategoriradar == $row1->id_kategori) {

                                            ?>
                                            <tr>
                                              <td><?php echo $no;$no++; ?></td>
                                              <td><?php echo $row2->nama_radar; ?></td>
                                              <td><?php echo $row2->standar; ?></td>
                                              <td>
                                                <div class="form-group">
                                                  <?php if ($row2->pembacaan=='MENYALA') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="MENYALA">Menyala</option>
                            <option value="MATI">Mati</option></select>
                            <?php
                          }else if ($row2->pembacaan=='MATI') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                           <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="MATI">Mati</option>
                            <option value="MENYALA">Menyala</option>
                            <option value="MENYALA HIJAU">Menyala Hijau</option>
                            <option value="MENYALA MERAH">Menyala Merah</option>
                            <option value="BERKEDIP">Berkedip</option></select>
                            <?php
                          }else if ($row2->pembacaan=='ENABLE') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                           <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="ENABLE">Enable</option>
                            <option value="DISABLE">Disable</option></select>
                            <?php
                          }else if ($row2->pembacaan=='DISABLE') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                           <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="DISABLE">Disable</option>
                            <option value="ENABLE">Enable</option></select>
                            <?php
                          }else if ($row2->pembacaan=='MENYALA HIJAU') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                          <option value="MENYALA HIJAU">Menyala Hijau</option>
                          <option value="MENYALA MERAH">Menyala Merah</option>
                            <option value="MATI">Mati</option></select>
                            <?php
                          }else if ($row2->pembacaan=='MENYALA MERAH') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                          <option value="MENYALA MERAH">Menyala Merah</option>
                          <option value="MENYALA HIJAU">Menyala Hijau</option>
                            <option value="MATI">Mati</option></select>
                            <?php
                          }else if ($row2->pembacaan=='BERKEDIP') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="BERKEDIP">Berkedip</option>
                            <option value="MATI">Mati</option></select>
                            <?php
                          }else if ($row2->pembacaan=='HIJAU') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="HIJAU">Hijau</option>
                            <option value="PUTIH">Putih</option></select>
                            <?php
                          }else if ($row2->pembacaan=='PUTIH') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="PUTIH">Putih</option>
                            <option value="HIJAU">Hijau</option></select>
                            <?php
                          }else if ($row2->pembacaan=='HIJAU MENYALA') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="HIJAU MENYALA">Hijau Menyala</option>
                          <option value="HIJAU TUA">Hijau Tua</option></select>
                            <?php
                          }else if ($row2->pembacaan=='HIJAU TUA') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="HIJAU TUA">Hijau Tua</option>
                            <option value="HIJAU MENYALA">Hijau Menyala</option></select>
                            <?php
                          }else if ($row2->pembacaan=='CONNECT') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="CONNECT">Connect</option>
                            <option value="DISCONNECT">Disconnect</option></select>
                            <?php
                          }else if ($row2->pembacaan=='DISCONNECT') {
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="DISCONNECT">Disconnect</option>
                            <option value="CONNECT">Connect</option></select>
                            <?php
                          }else if($row2->pembacaan=='CONTROL'){
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="CONTROL">Control</option>
                          <option value="CTRL YOGFROG">CTRL YogFrog</option></select>
                            <?php
                          }else if($row2->pembacaan=='CTRL YOGFROG'){
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <select  class="form-control" id="sel1" name="pembacaan<?php echo $row2->id_radar; ?>" required>
                            <option value="CTRL YOGFROG">CTRL YogFrog</option>
                            <option value="CONTROL">Control</option></select>
                            <?php
                          }else{
                            ?>
                            <input type="hidden" name="id_pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->id_pembacaan; ?>">
                            <input type="number" class="form-control" name="pembacaan<?php echo $row2->id_radar; ?>" value="<?php echo $row2->pembacaan ?>" >
                            <?php
                          }?>
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

                          <!-- tampil data radar by date -->
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
                                    <?php $no=1; foreach ($tanggal_radar as $row2) {
                                      ?>
                                      <tr>
                                        <td><?php echo $no;$no++; ?></td>
                                        <td><?php 
                                        $tanggal_radar = $row2->tanggal;
                                        $day = date('D', strtotime($tanggal_radar));
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
                              <div class="col-lg-12">
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambahkategoriRadar">Tambah Kategori Radar</button>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambahkategoriRadar">Tambah Kategori Radar</button>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tambahkategoriRadar">Tambah Kategori Radar</button>
  

                              </div>
                             
                              

                              
                            </div>
                            <!-- /#page-wrapper -->
